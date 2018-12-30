<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //

    public function chats()
    {
        return $this->hasMany('app\Chat');
    }

    public function user(){
        return $this->belongsTo('app\User');
    }
    
}
