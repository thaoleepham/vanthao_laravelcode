@extends('master')
@section('content')
<body class="bodydata">
	<div style="margin-top:20px"></div>

	<form id="login-form" action="{{route('dangnhapnguoidung')}}" method="post">
	<h3>Mời Đăng Nhập</h3>
		<input type="hidden" name="_token" value="{{csrf_token()}}">


		@if(Session::has('flag'))	
				<div  style="margin:5px" class="alert alert-{{Session::get('flag')}}">
						{{Session::get('message')}} 
				</div>

		@endif

		 @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <p>{{ $error }}</p>
                  @endforeach
              </ul>
          </div>
         @endif
		<input type="text" placeholder=" nhập email"class="inputtext username" name="email" required>
		<input type="password" placeholder=" nhập mật khẩu"class="inputtext password" name="password" required>
		<br>
		<div>Bạn chưa có tài khoản ? <a href="{{route('dangkynguoidung')}}"> Đăng ký</a></div>
		<input style ="width:400px;"type="submit" class="submitdata" value="Đăng Nhập">
	</form>
</body>
@endsection

