  @extends('master')
  @section('content')
  <section class="news_area single-post-area p_100">
          <div class="container" style="margin-top:10px;">
              
                    <div class="row">
              <div class="col-lg-8">
                <div class="main_title2">
                      <h2> Đặt Xe </h2>
                      
                    </div>
                 
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        
                        <span style="font-size: 20px;color: blue;"> </span>
                    <br>
                <div class="main_blog_details">
                       <div style="font-size:20px">Tên Xe: <span style="font-size:20px;color: blue;">{{$chitietSP->tenxe}} </span> </div>
                <br>                
                  <br>
                  <img  style="float:left;padding-right: 50px" class="img-fluid" src="/source/img/Product/{{$chitietSP->hinhanh}}" alt="">
                  <div style="padding-left:50px;font-size:20px;font-family:Times New Roman;margin-bottom: 20px">
               
                    <div style="font-size:20px">Chủ xe: <span style="font-size: 20px;color: blue;">{{$chuxe->name}} </span> </div>  <br>
                     <div style="font-size:20px">Địa chỉ: <span style="font-size: 20px;color: blue;">{{$chuxe->diachi}} </span> </div>  <br>
                    <div style="font-size:20px">Số điện thoại: <span style="font-size: 20px;color: blue;">{{$chuxe->sodienthoai}} </span> </div>  <br>
                    <div style="font-size:20px">Biển số:  <span style="font-size: 20px;color: blue;">{{$chitietSP->bien_so}} </span> </div>  <br>
                     <div style="font-size:20px">Gía thuê: <span style="font-size: 20px;color: blue;"> {{number_format($chitietSP->gia_thue)}}vnđ/ngày </span></div>
                   <br><br>
                <br>


                   <!-- 
                    <div>Mô tả:<br><span style="font-size: 20px"> {{$chitietSP->ghi_chu}} </span></div> -->

                  </div>
                  <div  style="margin-bottom:100px;"></div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="right_sidebar">
                  <aside class="r_widgets news_widgets">
                    
                    <div class="choice_item">
                  <div class="choice_text">
                    <div ></div><br>
                    <br>
                    <br>
                    <div style="margin-top: 20px"><h4 >Thông Tin Khách Đặt</h4></div>
                    @if(Auth::check())
                    <div class="">
                            <div class="media">
                             
                                <div class="">

                               <div>Họ tên:  <span style="font-size: 20px;color: blue;">{{Auth::User()->name}} </span>  </div><br>
                                 <div>Địa chỉ: <span style="font-size: 20px;color: blue;">{{Auth::User()->diachi}} </span> </div><br>
                                 <div>Số Điện Thoaị: <span style="font-size: 20px;color: blue;">{{Auth::User()->sodienthoai}} </span> </div><br>
                                  <div>Email: <span style="font-size: 20px;color: blue;">{{Auth::User()->email}} </span> </div>
                                  <div style="color:gray;margin-top:20px;font-size:16px">
                                        <div  class="">
                                        <div class="date" style="margin-top: 30px">


                                        <a style="margin-top:20px" class="genric-btn success circle" href="{{route('thongtinxedat',$chitietSP->id)}}">Tiếp tục</a>
                                       <!--  <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i></a> -->
                                         <h4 style="margin:20px; "></h4>
                                         <h4 style="color: blue; margin-left:5px" href=""></h4>
                                         <div style="margin-top:5px; ">
                                            <font style="font-size:14px;color: #EE3400" ></font>
                                            
                                       </div>

                                    </div>
                                    
                                    </div>
                                    @endif
                                </div>
                            </div>
       
                      </form>
                
                        </div>
                
                  </div>
                </div>
                    <div class="news_slider owl-carousel">
                            <div class="item">
                              <div class="choice_item">
                            
                          </div>
                            </div>
                    </div>
                  </aside>
                  <aside class="r_widgets add_widgets text-center">
                  </aside>
                </div>
              </div>
            </div>
      
          </div>
  </section>
  @endsection