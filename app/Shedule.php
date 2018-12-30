<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Shedule extends Model
{
    //
    public function group(){
        return $this->belongsTo('app\Group');
    }
    public function day(){
        return $this->belongsTo('app\Day');
    }
    
    public function teacher(){
        return $this->belongsTo('app\Teacher');
    }
    public function lesson(){
        return $this->belongsTo('app\Lesson');
    }
    public function building(){
        return $this->belongsTo('app\Building');
    }


}
