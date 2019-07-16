@extends('master')
@section('content')
  <section class="news_area p_100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="main_title2">
                            <h2>KẾT QUẢ</h2>
                        </div>
                        <div>Tìm thấy {{count($sp_theoloai)}} kết quả</div>
                    @foreach( $sp_theoloai as $sp)
                        <div class="latest_news">
                            <div class="media">
                                <div class="d-flex">
                                    <img class="img-fluid" src="/source/img/Product/{{$sp->hinhanh}}" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="choice_text">
                                        <div class="date">
                                            <a class="genric-btn success circle" href="{{route('chitietsanpham',$sp->id)}}">Xem chi tiết</a>
                                        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{$sp->date_created}}</a>
                                         <h3 style="margin: 10px; ">{{$sp->bien_so}}</h3>
                                         <h4 style="color: blue; margin-left:5px" href="">{{$sp->tenxe}}</h4>
                                        <div style="margin-top:5px; ">
                                            <font style="font-size:18px;color: #EE3400" > Gía: {{$sp->gia_thue}} VNĐ/Ngày</font>
                                            
                                          </div>
                                         </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                   <div style="margin-top:30px;margin-left:500px;font-size:20px" class="row">
                             {{$sp_theoloai->links()}}
                     </div>
                   
                </div>
            </div>
        </section>
 @endsection