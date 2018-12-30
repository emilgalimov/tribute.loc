<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    //

    public function shedules()
    {
        return $this->hasMany('app\Shedule');
    }
}
