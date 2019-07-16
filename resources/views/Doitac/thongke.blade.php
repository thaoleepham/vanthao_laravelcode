@extends('Doitac.doitacMaster')
@section('Doitac.content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Thống Kê Thu Nhập</small>
                               @if(Session::has('thongbao'))
                              <div class="alert alert-success">{{Session::get('thongbao')}}</div>
                             @endif 
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Mã Hợp Đồng</th>
                                 <th>Mã phiếu đặt</th>
                                 <th>Gía tạm tính</th>
                                <th>Tiền Cọc</th>                               
                                <th>Số tiền thực thu</th>
                                <th>Người lập</th>
                                <th>Ngày lập</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($hoadon as $us)
                            <tr class="odd gradeX" align="center">
                                <td>{{$us->id}}</td>
                                <td>{{$us->id_xedat}}</td>
                                <td>{{number_format($us->tien_tra)}}vnđ</td>
                                <td>{{number_format($us->tien_coc)}}vnđ</td>
                                <td>{{number_format($us->tien_thuctra+$us->tien_coc)}}vnđ</td>
                                <td>{{(Auth::User()->name)}}</td>
                                <td>{{($us->created_at)}}</td>
                            </tr>
                           @endforeach 
                        </tbody>
                    </table>
                    <div>Tổng tiền thực thu: <span style="color: blue;font-size: 15px">{{number_format($thu)}}vnđ</span></div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection
        