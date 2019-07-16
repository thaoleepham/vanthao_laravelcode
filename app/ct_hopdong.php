<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chi_tietDH extends Model
{
   	protected $table="ct_hopdong";

   	public function hd_ct(){
   		return $this->beLongTo('App\ct_hopdong','id_hd','id');
    }
}

