<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\User;
use App\Http\Requests\PostRequest;
use App\Follow;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::user()->posts()->orderBy('created_at','desc')->paginate(10);
        $userDetails = Auth::user();
        return view('posts.index')->with(compact(['posts', 'userDetails']));
    }

    public function showProfile($id){
       
        //$posts = User::find($id)->posts->orderBy('created_at','desc')->paginate(10);
        $posts = User::find($id)->posts()->orderBy('created_at','desc')->paginate(10);
        $userDetails = User::find($id);
        $follow = new Follow();
        $isFollowing = $follow->follow_check($id);
        return view('posts.index', compact('id', 'posts', 'userDetails', 'isFollowing'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //the first parameter sends the full request object including the values passed from the form
        //the second parameter is an array that specifies the rules for the desired attributes within the passed request

        // $this->validate($request, [
        //     'title' => 'required',
        //     'body' => 'required',
        // ]);
        //creates a new post object
        $post = new Post();
        //gets the values from the request object and assigns them to the post variables
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->userID = Auth::user()->id;
        //call the save method 
        $post->save();

        return redirect('/posts')->with('success', 'Your post has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('/posts.show')->with(compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function timeline(){
        $posts = Post::whereHas('user', function($query){
            $query->where('id', 1);
        })->orWhereHas('user', function($query){
            $query->whereHas('followers', function($query){
                $query->where('follower_id', 1);
            });
        })->orderBy('created_at', 'desc')->paginate(10);
        
        
        return view('posts.timeline', compact('posts'));
    }
}
