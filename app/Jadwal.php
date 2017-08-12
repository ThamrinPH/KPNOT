<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwals';
    protected $dates = ['tanggal'];
    protected $times = ['mulai','selesai'];
    
    public function klien()
    {
        return $this->belongsTo('App\Klien');
    }

}
