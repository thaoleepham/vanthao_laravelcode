@extends('masterAd')
@section('admin.content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Danh sách</small>
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
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Số chứng minh</th>
                                <th>Địa chỉ</th>
                                <th>Quyền</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $us)
                            <tr class="odd gradeX" align="center">
                                <td>{{$us->id}}</td>
                                <td>{{$us->name}}</td>
                                <td>{{$us->email}}</td>
                                <td>{{$us->cmnd}}</td>
                                <td>{{$us->diachi}}</td>
                                <td>
                                    @if($us->role==0)
                                    {{'Admin'}}
                                    @else 
                                         @if($us->role==1)
                                              {{'Đối tác'}}
                                          @else 
                                                 {{'Thường'}}   
                                           @endif
                                    @endif 
                                   </td>              
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="
                                   {{route('suaUser',$us->id)}}">Sửa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('xoaUser',$us->id)}}">Xóa</a></td>
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
        