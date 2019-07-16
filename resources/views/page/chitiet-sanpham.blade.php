  @extends('master')
  @section('content')
  <section class="news_area single-post-area p_100">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-8">
                <div class="main_title2">
                      <h2> Thông tin </h2>
                    </div>
                <span style="font-size: 20px;color: blue;">{{$chitietSP->tenxe}} </span>
                <br>

       					<div class="main_blog_details">
                  <br>
       						<img  style="float:left;padding-right: 50px" class="img-fluid" src="/source/img/Product/{{$chitietSP->hinhanh}}" alt="">
                  <div style="padding-left:50px;font-size:20px;font-family:Times New Roman;margin-bottom: 20px">
                    <div class="date">
                      <br>
                              <a class="genric-btn success circle" 
                              href="{{route('datxe',$chitietSP->id)}}">Đặt ngay</a>
                   <!--    <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i></a>
                      <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>05</a> -->
                    </div>

                    <div>Chủ xe: <span style="font-size: 25px;color: blue;">{{$chuxe->name}} </span> </div>
                    <br>

                    <div>Biển số:  <span style="font-size: 25px;color: blue;">{{$chitietSP->bien_so}} </span> </div>
                    <br>

                     <div>Gía thuê: <span style="font-size: 25px;color: blue;"> {{number_format($chitietSP->gia_thue)}}vnđ/ngày</span></div>
                   <br>

                   
                    <div>Mô tả:<br><span style="font-size: 20px"> {{$chitietSP->ghi_chu}} </span></div>

                  </div>
                  <div style="margin-bottom:100px"></div>
       					</div>
        			</div>
        			<div class="col-lg-4">
        				<div class="right_sidebar">
        					<aside class="r_widgets news_widgets">
        						
        						<div class="choice_item">
									<div class="choice_text">
										<div><h4>Xe liên quan</h4></div>
                    <div class="">
                  @foreach( $kiemtra as $sp) 

                            <div class="media">
                                <div class="d-flex">
                                    <img  class="zoom" style="width:200px;height:130px;" src="/source/img/Product/{{$sp->hinhanh}}" alt="">
                                    <style type="text/css">
                                      .zoom{
                                         transition: transform .2s; /* Animation */
                                      }
                                      .zoom:hover{
                                        transform: scale(1.07);
                                      }
                                    </style>
                                </div>
                                <div class="">
                                    <div class="">
                                        <div class="date">
                                        <a class="genric-btn success circle" href="{{route('chitietsanpham',$sp->id)}}">Xem chi tiết</a>
                                        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{$sp->created_at}}</a>
                                         <h4 style="margin:20px; ">{{$sp->bien_so}}</h4>
                                         <h4 style="color: blue; margin-left:5px" href="">{{$sp->tenxe}}</h4>
                                         <div style="margin-top:5px; ">
                                            <font style="font-size:14px;color: #EE3400" > Gía:  {{number_format($sp->gia_thue)}}vnđ/ngày</font>
                                            
                                       </div>

                                    </div>
                                    
                                    </div>
                                </div>
                            </div>
                        @endforeach  
                        </div>
                          <div style="margin:40px;margin-left:170px;font-size:18px">
                            {{$kiemtra->links()}}        
                    
                    </div>
									</div>
								</div>
       							<div class="news_slider owl-carousel">
             								<div class="item">
             									<div class="choice_item">
      											<img src="source/img/blog/popular-post/pp-3.jpg" alt="">
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