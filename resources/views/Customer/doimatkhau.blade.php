@extends('master')
@section('content')
<body class="bodydata">
	<div style="margin-top:20px"></div>

	<form id="login-form" action="{{route('doimatkhau')}}" method="post">
	<h3>Đổi Mật Khẩu </h3>
		<input type="hidden" name="_token" value="{{csrf_token()}}">


		@if(Session::has('flag'))	
				<div  style="margin:5px" class="alert alert-{{Session::get('flag')}}">
						{{Session::get('message')}} 
				</div>
		@endif
		 @if(Session::has('thongbao'))
                              <div class="alert alert-success">{{Session::get('thongbao')}}</div>
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
		<input type="password" placeholder=" nhập khẩu mới"class="inputtext password" name="newpw" required>
		<input type="password" placeholder=" nhập lại mật khẩu"class="inputtext password" name="rspassword" required>
		<br>
		<input style ="width:400px;"type="submit" class="submitdata" value="Đổi">
	</form>
</body>
@endsection

