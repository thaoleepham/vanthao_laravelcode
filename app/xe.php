<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class xe extends Model
{

    protected $table="xe";
    protected $kiemtra;
    public function loaixe(){
    	return $this->belongsTo('App\loai_xe','id_loaixe','id');
    }

    public function chuxe(){
    	return $this->belongsTo('App\User','chuxe_id','id');
    }

    public function xedat()
    {
    	return $this->hasMany('App\xe_dat','id_xe','id');
    }

}
