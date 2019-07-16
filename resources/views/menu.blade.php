<nav id="fixNav">
  <div class="sub_header" style="margin-bottom:20px">
            <div class="container">
                <div class="row align-items-center">
                  <div class="col-md-4 col-xl-6">
                      <!-- <div id="logo">
                          <a href="index.html"><img src="img/Logo.png" alt="" title="" /></a>
                      </div> -->
                  </div>
                  <div class="col-md-8 col-xl-6">
                      <div style="margin-left:200px">
                        @if(Auth::check())
                            <a href="">Tài Khoản {{Auth::user()->name}} </a> 
                             <a href="#">|</a>
                              <a href="{{route('dangxuat')}}"> Đăng Xuất</a>                
                        @else
                        <a href="{{route('dangkynguoidung')}}">ĐĂNG KÝ</a>
                        <a href="#">|</a>
                       <a href="{{route('dangnhapnguoidung')}}">ĐĂNG NHÂP</a>
                        @endif
                      </div>
                    </div>
                </div>
         </div>
</div>
  <ul>
    <li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
    <li><a href="#">Giới Thiệu</a></li>
    <li>
	    <a href="">Xe Máy</a>
	      <ul class="sub-menu">
	     @foreach($xemay as $xe) 
	        <li><a href="{{route('loaisanpham',$xe->id)}}">{{$xe->hang_xe}}</a></li>
	     @endforeach  
	     </ul>
    </li>
    <li>
      <a href="#">ÔTÔ</a>
      <ul class="sub-menu">
       @foreach($oto as $oto) 
	        <li><a href="{{route('loaisanpham',$oto->id)}}">{{$oto->hang_xe}}</a></li>
	    @endforeach  
     </ul>
    </li>
    @if(Auth::check())
    <li>
      <a href="#">Quản Lý Tài Khoản</a>
      <ul class="sub-menu">
          <li><a href="{{route('chitietnguoidung')}}">Thông tin cá nhân</a></li>
          <li><a href="{{route('xemdanhsachdangchoduyet')}}">Yêu cầu xe chờ duyệt</a></li>  
          <li><a href="{{route('xemdanhsachdaduyet')}}">Xem Lịch Sử Thuê</a></li>  
     </ul>
    </li>
    @endif
   <!-- <li>
      <a href="#">Đối Tác</a>
      <ul class="sub-menu">
          <li><a href="{{route('dangkynguoidung')}}">Đăng Ký</a></li>
          <li><a href="{{route('dangnhapnguoidung')}}">Đăng Nhập</a></li>  
     </ul>
    </li> -->
  
    <li><a href="#">Hướng Đẫn Đặt Xe</a></li>
    <li><a href="#">Liên Hệ</a></li>   
  </ul>
</nav>
