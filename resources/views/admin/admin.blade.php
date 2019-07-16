@extends('admin.masterAd')
@section('admin.content')
       <div id="page-wrapper">
       		<div>Số thành viên hiện tại: <span style="color: blue">{{count($stk)}}</span></div>
       		<div>Số đối tác hiện tại:<span style="color: blue">{{count($sodt)}}</span></div>
       		<div>Số xe máy hiện tại:<span style="color: blue">{{count($xm)}}</span></div>
       		<div>Số ô tô hiện tại: <span style="color: blue">{{count($oto)}}</span></div>
       		<div>Số tài khoản thường hiện tại: <span style="color: blue">{{count($st)}}</span></div>
       	</div>
@endsection