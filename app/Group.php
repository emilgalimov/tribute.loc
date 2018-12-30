<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    public function students()
    {
        return $this->hasMany('app\Student');
    }

    public function shedules()
    {
        return $this->hasMany('app\Shedule');
    }

    public function chats()
    {
        return $this->hasMany('app\Chats');
    }
}
