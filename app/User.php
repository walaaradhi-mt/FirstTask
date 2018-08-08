<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'activation_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post', 'userID','id');
    }

    public function followers(){
        return $this->hasMany('App\Follow', 'following_id', 'id');
    }

    public function following(){
        return $this->hasMany('App\Follow','follower_id', 'id');
    }

    public function postsByFollowing(){
        return $this->hasManyThrough('App\Post', 'App\Follow', 'follower_id', 'userID', 'id', 'following_id');
    }


}
