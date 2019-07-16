@extends('Doitac.doitacMaster')
@section('Doitac.content')
<!-- Page Content -->
        <div id="page-wrapper" style="width: 800px">
        	@if(Session::has('thongbao'))
                              <div class="alert alert-success">{{Session::get('thongbao')}}</div>
                   @endif 
        	<h3 style="margin-left:150px">HÓA ĐƠN TRẢ XE</h3>
        	<div style="margin-top: 40px">
        		<div style="padding-left: 20px; float:left;width: 350px" >Bên A
        			<div>Họ tên: {{$chuxe->name}}</div><br>
        			<div>Địa chỉ:{{$chuxe->diachi}}</div>
        		</div>
        		<div style="padding-right: 5px; float:right;width: 350px" >Bên B
        			<div>Họ tên:{{$hoadon->ten_khach}} </div><br>
        			<div>Địa chỉ:{{$khach->diachi}}</div>
        		</div><br>
        		<div style=" padding-left: 20px; padding-top: 70px">Hôm nay ngày {{date("d/m/Y", strtotime($now))}} bên B đã tiến hành trả tiện mang biển số {{$hoadon->bien_so}} cho bên A. 
        			<br>
        			Việc thuê tiến hành từ ngày  {{date("d/m/Y", strtotime($hoadon->ngay_dk))}}  đến hết ngày  {{date("d/m/Y", strtotime($hoadon->ngay_Ptra))}} .
        		<div style="padding-top: 10px">Qúa hạn:@if ($a==0) {{'không'}} @else {{$a}} @endif </div>	 <br>
        		 <div>Giá cho thuê :{{number_format($hoadon->gia_thue)}}vnđ/ngày  </div><br>
        		 <div>Giá tạm tính là:{{number_format($hoadon->so_tien)}}vnđ  </div><br>
        		 <div>Bên B đã  trả trước 50% tương đương với: {{number_format(($hoadon->so_tien)/2)}}vnđ  </div>

        		  <div>Bên B vui lòng thanh toán 50% còn lại tương đương với: 
        		  	@if($a==0) {{number_format(($hoadon->so_tien)/2)}}vnđ 
        		  	@else 
        		  		{{number_format(($hoadon->so_tien)/2 + (($hoadon->gia_thue*10/100*$a))) }}

        		  	vnđ @endif
        		    (*số tiền này được tính với là 50% số tiền còn lại cộng với 10% /ngày nếu khách hàng trả xe không đúng thời hạn đã đưa ra với đối tác chúng tôi! ) </div>
        		 <div style="padding-top:40px">
        		 	<div style="padding-left: 20px; float:left;width: 350px" >Bên A
        				<div>Ký (ghi rõ họ tên) </div><br>
        			</div>

        			<div style="padding-right: 5px; float:right;width: 350px" >Bên B
        				<div>Ký (ghi rõ họ tên) </div><br>
        			</div>
        		 	
        		 </div>

   				</div>
   				<div style=" padding-top: 150px; padding-left: 30px">
                        <button><a class="genric-btn primary small" href="{{route('duyettraxe',$hoadon->id)}}">Xát nhận</a></button>

                        <button style="margin-left: 30px"><a class="genric-btn primary small" href="{{route('xemyeucaudaduyet')}}">Hủy</a></button>
                 </div>  
        	</div>
        </div>
@endsection        