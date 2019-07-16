@extends('master')
@section('content')
<div style="margin-top:10px;"></div>
<form action="{{route('dangkynguoidung')}}" method="post">

      <div class="container">
        <h1>Đăng Ký</h1>
        <p style="color:blue;margin: 10px;">Vui lòng điền thông tin đầy đủ</p>
         <input type="hidden" name="_token" value="{{csrf_token()}}">
        <hr>
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
         @endif  
            @if(Session::has('thanhcong'))
              <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
             @endif

         
         <label for="hoten"><b>Họ Tên</b></label>
        <input type="text" placeholder="Nhập họ tên" name="hoten" required>

         <label for="diachi"><b>Địa chỉ</b></label>
        <input type="text" placeholder="Nhập địa chỉ" name="diachi" required>

        <label for="socm"><b>Số CMND</b></label>
        <input type="text" placeholder="Nhập số chứng minh" name="cmnd" required>


        <label for="sodt"><b>Số Điện Thoại</b></label>
        <input type="text" placeholder="Nhập số điện thoại" name="phone" required>


        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Nhập Email" name="email" required>

        <label for="psw"><b>Mật khẩu</b></label>
        <input type="password" placeholder="Nhập mật khẩu" name="password" required>

        <label for="psw-repeat"><b>Nhập lại mật khẩu</b></label>
        <input type="password" placeholder="Nhập lại mật khẩu" name="psw-repeat" required>
        <hr>

        <button type="submit" class="registerbtn">Đăng Ký</button>
      </div>
      
      <div class="container signin">
        <p>Bạn đã có tài khoản? <a href="{{route('dangnhapnguoidung')}}">Đăng Nhập</a>.</p>
      </div>
</form>
@endsection