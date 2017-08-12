<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warmerken extends Model
{
    protected $table = 'warmerkens';
    protected $dates = ['waktu'];
    
    public function sk(){
        return $this->belongsTo('App\Sk');
    }
}
