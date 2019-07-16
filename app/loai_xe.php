<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loai_xe extends Model
{
    protected $table="loai_xe";

    public function xe(){
    	return $this->hasMany('App\xe','id_loaixe','id');
    }
}
