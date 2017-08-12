<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
    protected $table = 'kliens';
    protected $dates = ['tgl_lahir'];
    
    public function jadwals()
    {
        return $this->hasMany('App\Jadwal');
    }
    
    public function sks()
    {
        return $this->hasMany('App\Sk');
    }
}
