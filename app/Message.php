<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //

    public function Chat(){
        return $this->belongsTo('app\Chat');
    }

    public function user(){
        return $this->belongsTo('app\User');
    }

}
