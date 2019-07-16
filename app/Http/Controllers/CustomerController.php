<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\User;
use App\xe;
use App\xe_dat;
class CustomerController extends Controller
{
    public function getDangkynguoidung()
    {
  		return view('page.dangkynguoidung');
  	}

    public function postDangkynguoidung(Request $req)
    {
        $this->validate($req,[
            'cmnd'=>'integer|min:9|unique:users,cmnd',
            'email'=>'email|unique:users,email',
            'phone'=>'min:9|unique:users,sodienthoai',
            'password'=>'min:6',
            'psw-repeat'=>'same:password'
          ],[   
              'email'=>':attribute Không đúng',     
              'min' => ':attribute Không được nhỏ hơn :min',
              'max' => ':attribute Không được lớn hơn :max',
              'integer' => ':attribute Chỉ được nhập số',
              'unique' =>':attribute đã tồn tại',
              'same'   =>':attribute phải giống nhau!',
        ]);

       $User = new User();

        $User->name = $req->hoten;
        $User->cmnd = $req->cmnd;
        $User->diachi = $req->diachi;
        $User->sodienthoai = $req->phone;
        $User->email = $req->email;     
        $User->password = Hash::make($req->password);
        $User->role=2;
        // dd($User);
        $User->save();

        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công !');

    }

    public function getDangnhap()
    {
       session(['link' => url()->previous()]);
      return view('page.dangnhap');
    }


   public function postDangnhap(Request $req)
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
            // dd($credentials);
            // dd(Auth::attempt($credentials));

            if(Auth::attempt($credentials))

            {
                return redirect(session('link'));
            }
            else{
               return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công !']);
            }
           
    }

    public function getChitietnguoidung()
    {
      return view('Customer.custdetail');
    }

    public function getDoimatkhau()
    {
      return view('Customer.doimatkhau');
    }

    public function postDoimatkhau( Request $req)
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
  
    public function DangXuat()
    {
      Auth::logout();
      return redirect()->route('trang-chu');
    }

    public function getDatxe($id)
    {
        $chitietSP=xe::where('id',$id)->first();
        $chuxe=User::where('id',$chitietSP->chuxe_id)->first();
        
      return view('Customer.datxe',compact('chitietSP','chuxe'));
    }

     public function getThongtinDatXe($id)
    {
        $chitietSP=xe::where('id',$id)->first();
     
        return view ('Customer.thongtinDatXe',compact('chitietSP'));
    
    }
    public function postThongtinDatXe($id,Request $req)
    {

        $xe= xe::find($id);        
        $xe->tinhtrang=0; 
        $xe_dat= new xe_dat();
        $xe_dat->id_xe =$id;
        $xe_dat->id_chuxe= $xe->chuxe_id;
        $xe_dat->ten_xe= $xe->tenxe;

        $xe_dat->hinh= $xe->hinhanh;
        $xe_dat->bien_so= $xe->bien_so;
         $xe_dat->gia_thue= $xe->gia_thue;
        $xe_dat->id_khach= Auth::User()->id;
        $xe_dat->ten_khach= Auth::User()->name;
        $xe_dat->phone=Auth::User()->sodienthoai;        
        $xe_dat->dia_diem = $req->diachi;
        $xe_dat->ngay_dk  = $req->nhan;
         $xe_dat->ngay_Ptra = $req->tra;   
         $xe_dat->tinh_trang =1;  

          $first_date = strtotime($req->nhan);
          $second_date = strtotime($req->tra);
          $datediff = abs($first_date - $second_date);
          
          $a=floor($datediff/ (60*60*24))+1;
         

         $xe_dat->so_tien= $a*$xe->gia_thue;

        $xe->save();
        $xe_dat->save();

        return redirect()->back()->with('thanhcong','Đăng ký mượn thành công, vui lòng chờ đối tác chúng tôi xát nhận,quý khách hàng  vào phần quản lý tài khoản để biết thêm chi tiết !');
       
    }

    public function getXemDanhSachDangChoDuyet()
    {
      $yeucau = xe_dat::where([['id_khach',Auth::User()->id],['tinh_trang',1]])->get();
      if($yeucau==null)
      {
        
        return redirect()->back()->with('thongbao','Hiện không tim thấy yêu cầu nào!!');
      }
        return view('Customer.xemdanhsachyeucau',compact('yeucau'));
    }
    public function getXoayeucau($id)
    {

        $duyet=xe_dat::find($id);
        $xe=$duyet->id_xe;
        $xoa=xe::find($xe);
        $xoa->tinhtrang=1;
        $xoa->save();
        $duyet->delete();
        return redirect()->back()->with('thongbao','Yêu cầu đã đươc xóa!');
    }
    public function getXemDanhSachDaDuyet()
    {
       $yeucau = xe_dat::where([['id_khach',Auth::User()->id],['tinh_trang','<>',1]])->get();
      if($yeucau==null)
      {
        
        return redirect()->back()->with('thongbao','Hiện không tim thấy yêu cầu nào!!');
      }
        return view('Customer.xemdanhsach',compact('yeucau'));
    }
}
