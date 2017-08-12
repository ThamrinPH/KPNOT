<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ppat extends Model
{
    protected $table = 'ppats';
    protected $dates = ['waktu'];
    
    public function sk(){
        return $this->belongsTo('App\Sk');
    }
    
    public function properti(){
        return $this->hasOne('App\Properti');
    }
}
