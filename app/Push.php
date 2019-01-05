<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Push extends Model
{
    protected $table = 'push';
    //

    public function user(){
        return $this->belongsTo('app\User');
    }
}
