<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;
use App\xe;
use App\Slide;
use App\loai_xe;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
  	public function getLogin()
  	{
  		return view('admin.login');
  	}

  	public function postLogin(Request $req)
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
                return redirect()->route('indexadmin');
            }
            else{
               return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công !']);
            }
           
    }

    public function index()
    {
      $stk = User::all();
      $sodt = User::where('role',1)->get();
      $st = User::where('role',2)->get();
      $xm =xe::where('so_banh',2)->get();
      $oto =xe::where('so_banh',4)->get();
    	return view('admin.admin',compact('stk','sodt','st','xm','oto'));
    }

    public function getThongtin()
    {
      return view('admin.thongtin');
    }

    public function DangXuat()
    {
      Auth::logout();
      return redirect('admin-login');
    }

    public function getDanhsachuser()
    {
        $user = User::all();
        return view('admin.user.danhsachuser',compact('user'));

    }
    public function getThemUser()
    {
       
        return view('admin.user.themuser');

    }
    public function postThemUser(Request $req)
    {
       
       $this->validate($req,[
            'cmnd'=>'integer|min:9|unique:users,cmnd',
            'email'=>'email|unique:users,email',
            'phone'=>'min:9|unique:users,sodienthoai',
            'password'=>'min:6',
            're_password'=>'same:password'
          ],[   
              'email'=>':attribute Không đúng',     
              'min' => ':attribute Không được nhỏ hơn :min',
              'max' => ':attribute Không được lớn hơn :max',
              'integer' =>':attribute Chỉ được nhập số',
              'unique' =>':attribute đã tồn tại',
              'same'   =>':attribute phải giống nhau!',
        ]);

       $User = new User();

        $User->name = $req->name;
        $User->cmnd = $req->cmnd;
        $User->diachi = $req->diachi;
        $User->sodienthoai = $req->phone;
        $User->email = $req->email;     
        $User->password = Hash::make($req->password);
        $User->role=$req->quyen;
        // dd($User);
        $User->save();

        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công !');

    }

    public function getSuaUser($id)
    {
        $user= User::find($id);

        return view('admin.user.suaUser',compact('user')); 
    }
    public function postSuaUser($id,Request $req)
    {
       $this->validate($req,[
          
            'phone'=>'min:9|unique:users,sodienthoai',
          ],[   
               
              'min' => ':attribute Không được nhỏ hơn :min',
              'max' => ':attribute Không được lớn hơn :max',
              'integer' => ':attribute Chỉ được nhập số',
              'unique' =>':attribute đã tồn tại',
              'same'   =>':attribute phải giống nhau!',
        ]);

       $User = User::find($id);  
        $User->role=$req->quyen;
        $User->save();

        return redirect()->back()->with('thanhcong','Cập nhật thành công !');

    }
    public function getXoa($id)
    {
      $user= User::find($id);
      $user->delete();
      return redirect()->back()->with('thongbao','Đã xóa tài khoản !');
    }

    public function getThemLoaiXe()
    {
      return view('admin.loai-xe.themLoaiXe');
    }

    public function getDanhsachloaixe()
    {
        $xemay=loai_xe::all();
        return view('admin.loai-xe.danhsachLoaiXe',compact('xemay'));
    }
    public function postThemLoaiXe(Request $req)
    { 

        $loai= new loai_xe();

        $loai->hang_xe=$req->name;
        $loai->so_banh=$req->sobanh;
        $loai->ghi_chu=$req->mota;
        $loai->save();

        return redirect()->back()->with('thanhcong','thêm loại thành công!');
    }
    public function getXoaLoaixe($id)
    {
      $xoa= loai_xe::find($id);
      $xoa->delete();
      return redirect()->back()->with('thongbao','Đã xóa thành công!');
    }

    public function getDanhsachOto()
    {
      // $2banh =xe::where('so_banh',2)->get();
      $banh =xe::where('so_banh',4)->get();
      return view('admin.xe.danhSachOto',compact('banh'));
    }

   public function  getDanhsachXmay()
   {

    $banh =xe::where('so_banh',2)->get();
      return view('admin.xe.danhSachXmay',compact('banh'));
   }

    public function getXoaxeoto($id)
    {
      $xoa= xe::find($id);
      $xoa->delete();
     return redirect()->back()->with('thongbao','Đã xóa thành công!');
    }

  public function getDanhsachSlide()
  {
    $slide = Slide::all();
    return view('admin.slide.danhSachSlide',compact('slide'));
  }

  public function getThemSlide()
  {
    return view('admin.slide.themSlide');
  }

  public function postThemSlide(Request $request)
  { 
        $slide = new Slide; 
        $slide->tieu_de=$request->name;
         if($request->hasFile('image')){
               $file = $request->file('image');
                  $duoi = $file->getClientOriginalExtension();
               if($duoi != 'jpg' && $duoi != 'png'){
       
              }
       
          $name = $file->getClientOriginalName();
          $Hinh = str_random(4)."_".$name;
         while(file_exists("source/img/slide/".$Hinh)){
             $Hinh = str_random(4)."_".$name;
         }
       
          $file->move('source/img/slide', $Hinh);
          $slide->url =$Hinh;
       
         }else{
          $slide->url = "";
        }
        $slide->active=$request->active;
        $slide->save();

        return redirect()->back()->with('thanhcong','Cập nhật thành công !');
  }

  public function getXoaSlide($id)
  {
    $xoa= Slide::find($id);
      $xoa->delete();
     return redirect()->back()->with('thongbao','Đã xóa thành công!');
  }
 
}
