@extends('admin.masterAd')
@section('admin.content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small>Thêm slide</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('themSlide')}}" method="POST" enctype="multipart/form-data">
                        	    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <hr>
                    @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                     @endif  
                        @if(Session::has('thanhcong'))
                          <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                         @endif
                         	<div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="name" placeholder="Nhập tiêu đề" required="Không để trống trường này !" />
                            </div>
                            <div class="form-group">
                                <label>Hình</label>
                            <input type="file" name="image" multiple="multiple">
                            </div>
                             <div class="form-group">
                                <label>Trạng thái</label>
                                <select name="active">
                                	<option value="1"> Sử dụng</option>
                                	<option value="0"> Tạm ẩn</option>

                                </select>
                            </div>
                               <button type="submit" class="btn btn-default">Thêm Slide</button>
                            <button type="reset" class="btn btn-default">Trở lại</button>
                        </form>
             
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
        