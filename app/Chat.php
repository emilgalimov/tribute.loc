<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    //

    public function messages()
    {
        return $this->hasMany('app\Message');
    }

    public function teacher(){
        return $this->belongsTo('app\Teacher');
    }
    public function group(){
        return $this->belongsTo('app\Group');
    }



}
