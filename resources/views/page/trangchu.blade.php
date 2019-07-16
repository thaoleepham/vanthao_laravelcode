@extends('master')

<!-- /*banner*/  -->
    <div id="banner" style="margin:2px;margin-bottom:2px;margin-top:10px"> 
     @foreach($slide as $slide)
        
                <img class="mySlides" src="source/img/slide/{{$slide->url}}" style="width:100%; height:600px">
    @endforeach
    </div>
    <script>
        var myIndex = 0;
        carousel();
        function carousel() 
        {
             var i;
            var x = document.getElementsByClassName("mySlides");
             for (i = 0; i < x.length; i++) 
             {
                  x[i].style.display = "none";  
                }
             myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            setTimeout(carousel,2000); // Change image every 2 seconds
        }
    </script>

@section('content')
<div class="container">
        <div class="main_title2">
                    <h2>XE GẮN MÁY</h2>
         </div>     
         <div>Tìm thấy {{count($spxm)}} kết quả</div>  
                <div class="row choice_inner">
                     @foreach($new_product as $new) 
                        <div class="col-lg-3 col-md-6">
                            <div class="choice_item">
                                <img class="img-fluid" src="source/img/Product/{{$new->hinhanh}}" alt="">
                            <div class="choice_text">
                                    <div class="date">
                                        <a class="genric-btn success circle" href="{{route('chitietsanpham',$new->id)}}">Xem</a>
                                        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{$new->created_at}}</a>

                                         <h3 style="margin: 10px; ">{{$new->bien_so}}</h3>
                                         <h4 style="color: blue; margin-left:5px" href="">{{$new->tenxe}}</h4>
                                        <div style="margin-top:5px; ">
                                            <font style="font-size:18px;color: #EE3400" > Gía: {{number_format($new->gia_thue)}}vnđ/ngày</font>
                                            
                                          </div>
                                         </a>
                                        
                                    </div>
                                    
                                   
                                </div>
                            </div>
                        </div>                      
                    @endforeach  
                    </div>
                        <div style="margin-top:30px;margin-left:500px" class="row">
                            <ul class="pagination">
                                <li style="font-size:20px">{{$new_product->links()}}</li>
                            </ul>
                             
                        </div>
              

        </section>
        <!--================End Choice Area =================-->
        
        <!--================News Area =================-->
        <section class="news_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="main_title2">
                            <h2>XE ÔTÔ</h2>
                        </div>
                        <div>Tìm thấy {{count($kq)}} kết quả</div>  

                        <div class="latest_news">
                   @foreach($new_product1 as $sp) 
                            <div class="media">
                                <div class="d-flex">
                                    <img class="img-fluid" src="source/img/Product/{{$sp->hinhanh}}" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="choice_text">
                                        <div class="date">
                                        <a class="genric-btn success circle" href="{{route('chitietsanpham',$sp->id)}}">Xem chi tiết</a>
                                        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{$sp->created_at}}</a>
                                         <h3 style="margin: 10px; ">{{$sp->bien_so}}</h3>
                                         <h4 style="color: blue; margin-left:5px" href="">{{$sp->tenxe}}</h4>
                                         <div style="margin-top:5px; ">
                                            <font style="font-size:18px;color: #EE3400" > Gía:  {{number_format($sp->gia_thue)}}vnđ/ngày</font>
                                            
                                       </div>
                                     </a>

                                    </div>
                                    
                                    </div>
                                </div>
                            </div>
                        @endforeach  
                        </div>
                    <div style="margin-top:30px;margin-left:500px;font-size: 20px" class="row">
                            {{$new_product->links()}}
                    </div>

                        <div class="tavel_food mt-100">
                            <div class="main_title2">
                                <h2></h2>
                            </div>
                            <div class="row">
                                
                            </div>
                        </div>
                        <div class="wedding_megazin mt-100">
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="right_sidebar">
                            <aside class="r_widgets news_widgets">
                                <div class="main_title2">
                                    
                                </div>
                            
                                <div class="news_slider owl-carousel">
                                    
                                </div>
                            </aside>
                            <aside class="r_widgets social_widgets">
                                <div class="main_title2">
                                    
                                </div>
                            </aside>
                            <aside class="r_widgets newsleter_widgets">
                                
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--================End News Area =================-->
        
        <!--================Product List Area =================-->

</div>

        	
 @endsection