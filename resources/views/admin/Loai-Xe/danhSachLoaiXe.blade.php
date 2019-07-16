@extends('admin.masterAd')
@section('admin.content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Danh sách loai xe</small>
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
                                <th>Hãng xe</th>
                                <th>Số bánh</th>
                                <th>Mô tả </th>
                                <th>Ngày Thêm</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($xemay as $us)
                            <tr class="odd gradeX" align="center">
                                <td>{{$us->id}}</td>
                                <td>{{$us->hang_xe}}</td>
                                <td>{{$us->so_banh}}</td>
                                <td>{{$us->ghi_chu}}</td>
                                <td>{{$us->created_at}}</td>                
                               <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('xoaLoaiXe',$us->id)}}">Xóa</a></td>
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
        