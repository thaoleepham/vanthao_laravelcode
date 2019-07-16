@extends('Doitac.doitacMaster')
@section('Doitac.content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Sửa xe</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST"enctype="multipart/form-data">
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
                                <label>Tên xe</label>
                                <input class="form-control" name="tenxe"  value="{{$xe->tenxe}}" required="vui lòng nhập trường này" disabled="" />
                            </div>
                            <label>Số bánh</label>
                              <input class="form-control" name="bienso" type="text" value="{{$xe->so_banh}}"  required="vui lòng nhập trường này" disabled="" />
                             <div class="form-group">
                                <label>Biển Số</label>
                                <input class="form-control" name="bienso" type="text" value="{{$xe->bien_so}}" required="vui lòng nhập trường này" disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Gía cho thuê</label>
                                <input class="form-control" name="gia" placeholder="Nhập giá"  required="vui lòng nhập trường này" value="{{$xe->gia_thue}}" />
                            </div>
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <input class="form-control" name="ghichu" placeholder="Nhập mô tả"  required="vui lòng nhập trường này" value="{{$xe->ghi_chu}}" />
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Bỏ qua</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
        