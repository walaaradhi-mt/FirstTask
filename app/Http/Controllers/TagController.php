<?php

namespace App\Http\Controllers;
use App\Tag;
use App\Post;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getTags(){
        $tag = new Tag();
        $hashtags = $tag->getAll();
        return $hashtags;
    }

    public function index()
    {
        $hashtags = Self::getTags();
        return view('posts.search', compact(['hashtags']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        $posts = $tag->posts()->orderBy('created_at', 'desc')->paginate(10);
        return view('/posts.tags', compact(['tag', 'posts']));
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

    public function displayPosts(Request $request){
        $selectedTags = request('search');
        $posts = Post::whereHas('tags',function($query){
            $query->whereIn('tags.id',request('search'));
        })->orderBy('created_at', 'desc')->paginate(10);
        $hashtags = Self::getTags();
        return view('posts.search', compact(['hashtags', 'selectedTags', 'posts']));
       
    }
}
