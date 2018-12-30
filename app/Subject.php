<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    public function lecturer(){
        return $this->belongsTo('app\Teacher','lecturer_id');
    }
    public function practicer(){
        return $this->belongsTo('app\Teacher','practicer_id');
    }
    public function lab(){
        return $this->belongsTo('app\Teacher','lab_id');
    }
    public function lesson(){
        return $this->belongsTo('app\Lesson','lesson_id');
    }
    public function group(){
        return $this->belongsTo('app\Group');
    }
    

}
