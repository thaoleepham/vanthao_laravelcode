@extends('Doitac.doitacMaster')
@section('Doitac.content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Thêm Xe</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('themxe')}}" method="POST"enctype="multipart/form-data">
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
                        @if(Session::has('thongbao'))
                          <div class="alert alert-success">{{Session::get('thongbao')}}</div>
                         @endif
                            <div class="form-group">
                                <label>Loại Xe</label>
                              <select name="loai">
                                @foreach ($loaixe as $l)
                                  <option value="{{$l->id}}">{{$l->hang_xe}}</option>
                                @endforeach 
                              </select>
                            </div>
                             <div class="form-group">
                                <label>Tên xe</label>
                                <input class="form-control" name="tenxe" placeholder="nhập tên xe"  required="vui lòng nhập trường này" />
                            </div>
                            <label>Số bánh</label>
                              <SELECT name="sobanh">
                               
                                  <option value="2">2 bánh</option>
                                  <option value="4">4 bánh</option>
                              </SELECT>
                             <div class="form-group">
                                <label>Biển Số</label>
                                <input class="form-control" name="bienso" type="text"placeholder="nhập biển số"  required="vui lòng nhập trường này" />
                            </div>
                            <div class="form-group">
                                <label>Gía cho thuê</label>
                                <input class="form-control" name="gia" placeholder="Nhập giá"  required="vui lòng nhập trường này" />
                            </div>
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <input class="form-control" name="ghichu" placeholder="Nhập mô tả"  required="vui lòng nhập trường này" />
                            </div>
                             <div class="form-group">
                                <label>Hình</label>
                                <input type="file" class="form-control" name="image" required="vui lòng nhập trường này"multiple="multiple" />
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
        