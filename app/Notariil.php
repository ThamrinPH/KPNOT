<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notariil extends Model
{
    protected $table = 'notariils';
    protected $dates = ['waktu'];
    
    public function sk(){
        return $this->belongsTo('App\Sk');
    }
}
