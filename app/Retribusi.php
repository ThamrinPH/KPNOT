<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retribusi extends Model
{
    protected $table = 'retribusis';
    protected $dates = ['waktu'];
    
    public function sk(){
        return $this->belongsTo('App\Sk');
    }
}
