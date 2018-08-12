<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts(){
        return $this->belongsToMany('App\Post');
    }

    public function getAll(){
        $hastags = Self::orderby('name', 'asc')->get();
        return $hastags;
    }

    public function saveTag($name){
        $tag = new Tag();
        $tag->name = $name;
        $tag->save();
        return $tag->id;
    }
}
