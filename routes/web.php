<?php
use App\User;
use App\Follow;
use App\Tag;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/invalidCode', function(){
    return view('activationCodeError');
});

Route::get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');

Route::resource('/posts', 'PostController');


Route::resource('/users', 'UserController');

Route::get('/profile/{id}', 'PostController@showProfile')->name('show.profile');

Route::resource('/follow', 'FollowController');

Route::get('/listOfFollowing', 'UserController@listOfFollowing');

Route::get('/timeline', 'PostController@timeline');

Route::resource('/tag', 'TagController');

Route::get('/test', function(){

    // dd(Follow::find(1)->user_following);
    // //dd(User::find(1)->followers);
    
    // $followers = User::find(1)->followers->user;
    // foreach($followers as $follower){
    //     return $follower->user->name;
    // }
    // $posts = User::find(1)->following()->posts;

    // $posts = App\Post::whereHas('user', function($query){
    //             $query->where('id', 1);
    //         })->orWhereHas('user', function($query){
    //             $query->whereHas('followers', function($query){
    //                 $query->where('follower_id', 1);
    //             });
    //         })->get();
    // $posts = User::find(1)->postsByFollowing()->orderBy('created_at', 'desc')->get();
    // dd($posts);
    // foreach($posts as $post){
    //     echo $post->id;
    // }

    // $tag = new Tag();
    // return $tag->getAll();

    return view('posts.search');
});

Route::post('/search', 'TagController@displayPosts')->name('tags.search');