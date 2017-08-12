<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sk extends Model
{
    protected $table = 'sks';
    
    public function warmerkens(){
        return $this->hasMany('App\Warmerken');
    }
    
    public function notariils(){
        return $this->hasMany('App\Notariil');
    }
    
    public function legals(){
        return $this->hasMany('App\Legal');
    }
    
    public function transaksis(){
        return $this->hasMany('App\Transaksi');
    }
    
    public function retribusis(){
        return $this->hasMany('App\Retribusi');
    }
    
    public function ppats(){
        return $this->hasMany('App\Ppat');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function klien(){
        return $this->belongsTo('App\Klien');
    }
}
