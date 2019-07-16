  @extends('master')
  @section('content')
  <section class="news_area single-post-area p_100">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-8">
                <div class="main_title2">
                      <h2> Thông tin tài khoản </h2>
                 @if(Auth::check()) 
                    </div>
                <span style="font-size: 20px;color: blue;"> </span>
                <br>

       					<div class="main_blog_details">
                  <br>
       						<img  style="float:left;padding-right: 50px" class="img-fluid" src="/source/img/Product" alt="">
                  <div style="padding-left:50px;font-size:20px;font-family:Times New Roman;margin-bottom: 20px">
  
                    <div>Họ tên:  <span style="font-size: 20px;color: blue;">{{Auth::user()->name}}</span> </div>
                    <br>

                    <div>Số chứng minh: <span style="font-size: 20px;color: blue;">{{Auth::user()->cmnd}}</span></div>
                     <br>
                     <div>Địa Chỉ: <span style="font-size: 20px;color: blue;">{{Auth::user()->diachi}} </span></div>
                    <br>
                    <div>Số điện thoại: <span style="font-size: 20px;color: blue">{{Auth::user()->sodienthoai}}</span></div>

                     <br>

                     <div>Gmail: <span style="font-size: 20px;color: blue;">{{Auth::user()->email}} </span></div>

                     <div style=" margin-top: 20px">
                        <a class="genric-btn primary small" href="">Sửa thông tin</a>
                        <a class="genric-btn primary small" href="{{route('doimatkhau')}}">Đổi mật khẩu</a>
                     </div>

                  @endif   
                  </div>
                  <div style="margin-bottom:100px"></div>
       					</div>
        			</div>
        		</div>
        	</div>
  </section>
  @endsection