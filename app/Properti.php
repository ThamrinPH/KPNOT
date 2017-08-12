<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Properti extends Model
{
    protected $table = 'propertis';
    protected $dates = ['waktu_su','akhr_tgl_hak','tgl_dp','tgl_su','tgl_pemeganghak','tgl_pps'];
    
    public function ppat(){
        return $this->belongsTo('App\Ppat');
    }
}
