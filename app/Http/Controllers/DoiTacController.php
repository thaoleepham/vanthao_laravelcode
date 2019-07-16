<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\xe;
use App\xe_dat;
use DB;
use App\loai_xe;
use Carbon\Carbon;
use App\hop_dong;
use Illuminate\Support\collection;
class DoiTacController extends Controller
{
    public function getLogin()
    {
    	return view('Doitac.login');  	
    }

    	public function PostDoiTacLogin(Request $req)
    {
        $this->validate($req,
            [
                'email'=>'email',
                'password'=>'min:6',

            ],
            [
                'email'=>':attribute không đúng định dạng! ', 
                'min' =>':attribute ít nhất 6 ký tự ', 
            ]
        );

            $credentials = array('email' => $req->email,'password'=> $req->password);
            if(Auth::attempt($credentials))

            {
                return redirect()->route('doitacindex');
            }
            else{
               return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công !']);
            }
           
    }

    public function index()
    {

        $thunhap= hop_dong::get();
        $tien=0;
        $thu=0;
        foreach ($thunhap as $k ) {
         $tien=$k->tien_thuctra+$k->tien_coc;
          $thu=$thu+$tien;

        }
         
        $tinh= xe::where('chuxe_id',Auth::User()->id)->get();

        $tinh1= xe::where('chuxe_id',Auth::User()->id)->where('tinhtrang',1)->get();
        $yeucau1 = xe_dat::where([['id_chuxe',Auth::User()->id],['tinh_trang',1]])->get();
         $yeucau2 = xe_dat::where([['id_chuxe',Auth::User()->id],['tinh_trang',0]])->get();
    	return view('doitac.doitac',compact('tinh','tinh1','yeucau1','thu','yeucau2'));
    }

    public function getDanhSachXe()
    {
        $xe=xe::where('chuxe_id',Auth::User()->id)->get();
       $yeucau1 = xe_dat::where([['id_chuxe',Auth::User()->id],['tinh_trang',3]])->get();
        return view('Doitac.xe.danhSachXe',compact('xe','yeucau1'));
    }

    public function getxoaXe($id)
    {
        $xoa= xe::find($id);
        $xoa->delete();
        return redirect()->back()->with('thongbao','Đã xóa thành công!');
    }
    public function getXemYeuCau()
    {
        $yeucau1 = xe_dat::where([['id_chuxe',Auth::User()->id],['tinh_trang',1]])->first();

         if($yeucau1 == null)
         {
             return redirect()->back()->with('thongbao','Hiện không có yêu cầu nào!'); 
         }
         else   
         $yeucau = xe_dat::where([['id_chuxe',Auth::User()->id],['tinh_trang',1]])->get();               
        return view('Doitac.xedat.yeuCau',compact('yeucau'));

    }
    public function getDuyetyeucau($id)
    {
        $duyet=xe_dat::find($id);
        
        $duyet->tinh_trang = 0;
        $duyet->tinh_trang = 2;
        $duyet->save();
        return redirect()->back()->with('thongbao','Yêu cầu đã đươc duyệt!');

    }
     public function getXoaYeuCau($id)
    {
            
        $an=xe_dat::find($id);
        $an->tinh_trang=0;
        $xoa=xe::find($an->id_xe);
        $xoa->tinhtrang=1;
        $an->save();
         $xoa->save();
        return redirect()->back()->with('thongbao','Yêu cầu đã đươc xóa!');

    }

    public function getXemYeuCauDaDuyet()
    {
         $yeucau = xe_dat::where([['id_chuxe',Auth::User()->id],['tinh_trang',2]])->get();
        return view('Doitac.xedat.danhSachDaduyet',compact('yeucau','xe'));
    }

    public function getXemDanhSachDangThue()
    {
        $yeucau = xe_dat::where([['id_chuxe',Auth::User()->id],['tinh_trang',3]])->get();
        return view('Doitac.xedat.danhSachDangThue',compact('yeucau','khach','xe'));
    }

    public function getChoMuon($id)
    {
        $duyet=xe_dat::find($id);
        $duyet->tinh_trang = 3;
        
        $hopdong= new hop_dong();
        $hopdong->id_xedat=$id;
        $hopdong->tien_tra=$duyet->so_tien;
        $hopdong->tien_coc=($duyet->so_tien)/2;

        $hopdong->save();

        $duyet->save();

        return redirect()->back()->with('thongbao','Đã cho mượn !');

    }
    public function getTra($id)
    {


         $now= Carbon::now();
        $duyet=xe_dat::find($id);
          $xe=xe::find($duyet->id_xe);
          $xe->tinhtrang=1;
          $xe->save();
        $duyet->tinh_trang = 0;


        $second_date = strtotime($duyet->ngay_Ptra);
         $second1_date = strtotime($now);
        $datediff = abs($second1_date - $second_date);
          
        $a=floor($datediff/ (60*60*24));


        $hopdong1=hop_dong::where('id_xedat',$duyet->id)->first();

        $hopdong=hop_dong::find($hopdong1->id);

        if($a==0)
        {
              $hopdong->tien_thuctra=($duyet->so_tien)/2;
        }
        else 
        {
            $hopdong->tien_thuctra=(($duyet->so_tien)/2+($duyet->gia_thue*10/100*$a)); 
        }    
     
        $hopdong->save();
        $duyet->save();
        return redirect()->back()->with('thongbao','Đã trả thành công!');
    }
    public function DangXuat()
    {
      Auth::logout();
      return redirect()->route('doitaclogin');
    }

    public function getThemXe()
    {
        $loaixe= loai_xe::where('is_delete',0)->get();

        return view('Doitac.xe.themXe',compact('loaixe'));
    }

     public function postThemXe(Request $request)
    {
   
        $this->validate($request,[
            'gia'=>'integer',
        ],[
            'gia.integer' => 'giá tiền không hợp lệ',
        ]);

        $xe = new xe;
        $xe->chuxe_id=Auth::User()->id;
        $xe->id_loaixe=$request->loai;
        $xe->so_banh=$request->sobanh;
        $xe->tenxe=$request->tenxe;
        $xe->bien_so=$request->bienso;
        $xe->gia_thue=$request->gia;
        $xe->ghi_chu=$request->ghichu;
        if($request->hasFile('image')){
               $file = $request->file('image');
                  $duoi = $file->getClientOriginalExtension();
               if($duoi != 'jpg' && $duoi != 'png'){
       
              }
       
          $name = $file->getClientOriginalName();
          $Hinh = str_random(4)."_".$name;
         while(file_exists("source/img/product/".$Hinh)){
             $Hinh = str_random(4)."_".$name;
         }
       
          $file->move('source/img/product', $Hinh);
          $xe->hinhanh =$Hinh;
       
         }else{
          $xe->hinhanh = "";
        }
        $xe->tinhtrang=1;
        $xe->save();
        return redirect()->back()->with('thongbao','Đã thêm thành công!');
    }

    public function getSuaXe($id)
    {
        $xe= xe::find($id);

        return view('Doitac.xe.suaxe',compact('xe'));
    }
    public function postSuaXe($id,Request $request)
    {
        $this->validate($request,
            [
                'gia'=>'integer',

            ],[
                'gia.integer'=>'giá tiền không hợp lệ',
            ]);
        $xe= xe::find($id);
        $xe->gia_thue=$request->gia;
        $xe->ghi_chu=$request->ghichu;
        $xe->save();
        return redirect()->back()->with('thongbao','Cập nhật thành công!');
    }
    public function getThongtinkhachhang($id)
    {
        $thongtin=User::find($id);
        return view('doitac.xedat.khachhangdetail',compact('thongtin'));
    }
    public function getDoimatkhau()
    {
        return view('doitac.doimatkhau');
    }
    public function postDoimatkhau(Request $req)
    {
      $this->validate($req,[
        'newpw'=>'min:6',
        'rspassword'=>'same:newpw',

      ],[
           'min' => 'Mật khẩu Không được nhỏ hơn :min',
           'same' => 'Mật khẩu nhập lại phải giống nhau!',
      ]);
        $User =User::find(Auth::User()->id);
        $User->password=Hash::make($req->newpw);

        $User->save();

        return redirect()->back()->with('thongbao','Đổi mật khẩu thành công');
  
    }
    public function getHoaDon($id)
    {
        $hoadon= xe_dat::find($id);
        $chuxe= User::find($hoadon->id_chuxe);
          $khach= User::find($hoadon->id_khach);
          $now= Carbon::now();
        return view('Doitac.xedat.hoadonnhanxe',compact('hoadon','chuxe','khach','now'))->with('thongbao','Đã cho mượn thành công!!');
    }

    public function getHoaDonTraXe($id)
    {
        $hoadon= xe_dat::find($id);
        $chuxe= User::find($hoadon->id_chuxe);
          $khach= User::find($hoadon->id_khach);
          $now= Carbon::now();

          $second_date = strtotime($hoadon->ngay_Ptra);
            $second1_date = strtotime($now);
          $datediff = abs($second1_date - $second_date);
          
          $a=floor($datediff/ (60*60*24));


        return view('Doitac.xedat.hoadontraxe',compact('hoadon','chuxe','khach','now','a')); 
    }

    public function getXemHoaDon()
    {
        $hoadon =hop_dong::where('tien_thuctra','>',0)->get();

         $tien=0;
          $thu=0;
        foreach ($hoadon as $k ) {
         $tien=$k->tien_thuctra+$k->tien_coc;
          $thu=$thu+$tien;

        }
      
        
        return view('Doitac.thongke',compact('hoadon','thu'));

    }
}
