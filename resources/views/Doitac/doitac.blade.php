@extends('Doitac.doitacMaster')
@section('Doitac.content')
 <div id="page-wrapper">
 	<h3>Thống kê</h3>
		<div>Đối tác hiện có:<span style="color:#00008B"> {{count($tinh)}}</span> xe</div>
		<div>Số xe còn sẳn sàng: <span style="color:#00CC33">{{count($tinh1)}}</span> xe</div>
		<div>Có : <span style="color:red" >{{count($yeucau1)}}</span> yêu cầu đang chờ duyệt <a style="margin-left: 10px" 
			href="{{route('xemyeucau')}}"> xem</a></div>
		<div style="padding-top: 10px" >Số lần giao dịch thành công: <span style="color:#00CC33;font-size: 18px">{{count($yeucau2)}} </span>lần </div>		
		<!-- <div style="padding-top: 10px" >Thu nhập hiện tại: <span style="color:#00CC33;font-size: 18px">{{number_format(($thu))}} vnđ </span> </div>	 -->
	</div>

@endsection