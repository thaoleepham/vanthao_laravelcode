@extends('Doitac.doitacMaster')
@section('Doitac.content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Danh sách Yêu Cầu</small>
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
                                 <th>Tên khách hàng</th>
                                 <th>Số điện thoại</th>
                                <th>Tên Xe</th>                               
                                 <th>Biển số</th>
                                 <th>Hình</th>
                                <th>Gía cho thuê</th>
                                <th>Địa điểm nhận </th>
                                <th>Ngày Nhận</th> 
                                <th>Ngày Trả</th>
                                <th>Thông tin khách</th>
                                <th>Duyệt</th>                              
                                <th>Hủy</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($yeucau as $us)
                            <tr class="odd gradeX" align="center">
                                <td>{{$us->id}}</td>
                                <td>{{$us->ten_khach}}</td>
                                <td>{{$us->phone}}</td>
                                <td>{{$us->ten_xe}}</td>
                                <td>{{$us->bien_so}}</td>
                                <td><img width="200px" src="/source/img/product/{{$us->hinh}}"></td>
                                <td>{{number_format($us->gia_thue)}}vnđ/ngày</td>
                                <td>{{$us->dia_diem}}</td>
                            
                                <td>{{$us->ngay_dk}}</td>
                                <td>{{$us->ngay_Ptra}}</td>   
                                <td><a href="{{route('thongtinkhachhang',$us->id_khach)}}">xem</a></td>            
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('duyetyeucau',$us->id)}}">Duyệt</a></td>
                                 <td class="center"><i class=" fa fa-trash-o  fa-fw"></i><a href="
                                   {{route('xoayeucau',$us->id)}}">Hủy</a></td>
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
        