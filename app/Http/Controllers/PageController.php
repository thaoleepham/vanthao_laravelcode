<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\xe;
use App\loai_xe;
use App\User;
use Hash;
use App\xe_dat;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Slide;

class PageController extends Controller
{
  	public function getIndex()
    {
       $slide =Slide::where('active',[1])->get();
      
      $new_product=xe::where('so_banh',2) ->orderBy('id','desc') ->paginate(8);
      $spxm =xe::where('so_banh',2)->get();

      $new_product1=xe::where('so_banh',4)->orderBy('id','desc')->paginate(4);
      $kq =xe::where('so_banh',4)->get();
 

  		return view('page.trangchu',compact('new_product','new_product1','spxm','kq','slide','kiemtra'));
  	}

  	public function getLoaiSp($type)
    {
      $sp_theoloai=xe::where('id_loaixe',$type)->paginate(7);

  		return view('page.loai-sanpham',compact('sp_theoloai',compact('sp_theoloai')));	
  	}

  	public function getChitiet(Request $req)
    {
       $chitietSP=xe::where('id',$req->id)->first();
       $chuxe=User::where('id',$chitietSP->chuxe_id)->first();

       if($chitietSP->id_loaixe == 1 or $chitietSP->id_loaixe == 2 )
           $kiemtra=xe::where('so_banh',2)->orderBy('id','desc')->where('id','<>',$req->id) ->paginate(5);
         else
        $kiemtra=xe::where('so_banh',4)->orderBy('id','desc')->where('id','<>',$req->id)->paginate(5);

       // dd($chuxe);
  		return view('page.chitiet-sanpham',compact('chitietSP','chuxe','kiemtra'));
  	}

    public function test()
    {
      return view('page.paginate');
    }
 

}
