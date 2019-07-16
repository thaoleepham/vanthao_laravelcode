@extends('admin.masterAd')
@section('admin.content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Thêm Loại Xe</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('themLoaiXe')}}" method="POST">
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
                                <label>Hãng Xe*</label>
                                <input class="form-control" name="name" placeholder="nhập họ tên"  required="vui lòng nhập trường này"  />
                            </div>
                             <div class="form-group">
                                <label>Mô tả*</label>
                                <input class="form-control" name="mota" placeholder="nhập họ tên"  required="vui lòng nhập trường này" />
                            </div> 
                             <div class="form-group">
                                <label>Số Bánh*</label>
                                <select name="sobanh"> 
                                    <option value="2">2</option>
                                     <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div> 
                            
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Bỏ qua</button>   
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
        