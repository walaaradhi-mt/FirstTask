<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    public function user_follower(){
       return $this->belongsTo('App\User', 'follower_id', 'id');
    }

    public function user_following(){
        return $this->belongsTo('App\User', 'following_id', 'id');
    }

    

    public function follow_check($following_id){
        $isFollowing = Self::where('follower_id', Auth::id())->where('following_id', $following_id)->get();
        if(count($isFollowing)){
            return true;
        } else{
            return false;
        }

    }
}
