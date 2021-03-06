<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, "userID");
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
