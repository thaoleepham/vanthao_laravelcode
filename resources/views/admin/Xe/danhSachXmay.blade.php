@extends('admin.masterAd')
@section('admin.content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Danh sách Xe Máy</small>
                               @if(Session::has('thongbao'))
                              <div class="alert alert-success">{{Session::get('thongbao')}}</div>
                             @endif 
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>ID Chủ xe</th>
                                <th>Tên Xe</th>
                                <th>Số bánh</th>
                                 <th>Biển số</th>
                                  <th>Hình</th>
                                <th>Gía cho thuê</th>
                                <th>Tình trạng</th>
                                <th>Ngày tạo</th>                               
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($banh as $us)
                            <tr class="odd gradeX" align="center">
                                <td>{{$us->id}}</td>
                                <td>{{$us->chuxe_id}}</td>
                                <td>{{$us->tenxe}}</td>
                                <td>{{$us->so_banh}}</td>
                                <td>{{$us->bien_so}}</td>
                                  <td><img  style="width: 100px" src="/source/img/product/{{$us->hinhanh}}"></td>
                                <td>{{number_format($us->gia_thue)}}vnđ/ngày</td>
                                <td>
                                    @if($us->tinhtrang==1)
                                    {{'Chưa được thuê'}}
                                    @else 
                                         
                                      {{'Đang thuê'}}   
                                    @endif 
                                   </td> 
                                <td>{{$us->created_at}}</td>               
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('xoaxeoto',$us->id)}}">Xóa</a></td>
                            </tr>
                           @endforeach 
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection
        