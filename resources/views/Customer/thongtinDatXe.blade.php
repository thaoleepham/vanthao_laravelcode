@extends('master')
@section('content')
<div style="margin-top:10px;"></div>

<form action="" method="post" style="color:#AA0000">
      <div class="container">
        <h1>Thông Tin Đặt Xe</h1>
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

         <label for="diachi"><b>Địa chỉ nhận xe*</b></label>
        <input type="text" placeholder="Nhập địa chỉ" name="diachi" required>

        <label style="" for="nhan"><b>Thời gian nhận*</b></label><br>
        <input type="date"  name="nhan" required><br><br>
        <label for="tra"><b>Thời gian trả*</b></label><br>
        <input type="date"  name="tra" required>

              <div class="date" style="margin-top: 30px">
               

  		     <button type="submit" class= "genric-btn danger-border">Xát nhận</button>

               <h4 style="margin:20px; "></h4>
                                         <h4 style="color: blue; margin-left:5px" href=""></h4>
                                         <div style="margin-top:5px; ">
                          <font style="font-size:14px;color: #EE3400" ></font>
                                            
                                       </div>
        </div>
      </div>
</form>
@endsection