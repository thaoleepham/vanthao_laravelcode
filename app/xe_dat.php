<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class xe_dat extends Model
{
    
    protected $table="xe_dat";

    public function user(){
   		return $this->beLongTo('App\User','id_khach','id');
    }
    public function xe(){
   		return $this->beLongTo('App\xe','id_xe','id');
    }
}
