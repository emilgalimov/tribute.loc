<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    public function user(){
        return $this->belongsTo('app\User');
    }

    public function group()
    {
        return $this->belongsTo('app\Group');
    }

}
