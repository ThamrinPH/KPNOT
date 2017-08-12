<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';
    protected $dates = ['waktu'];
    
    public function sk(){
        return $this->belongsTo('App\Sk');
    }
}
