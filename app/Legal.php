<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Legal extends Model
{
    protected $table = 'legals';
    protected $dates = ['waktu'];
    
    public function sk(){
        return $this->belongsTo('App\Sk');
    }

    public function unserialize_lklien($query){
    	return unserialize($this->lklien);
    }
}
