@extends('admin.masterAd')
@section('admin.content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Danh sách Slide</small>
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
                                <th>Tiêu đề</th>
                                <th>Hình</th>
                                 <td>Trạng thái</td>                                                     
                                <th>Ngày Tạo</th>
                                <th>Sửa</th>
                                <th>Xóa</th> 
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($slide as $us)
                            <tr class="odd gradeX" align="center">
                                <td>{{$us->id}}</td>
                                 <td>{{$us->tieu_de}}</td>
                                <td><img width="200px" src="/source/img/slide/{{$us->url}}"></td>
                               <td>
                                    @if($us->active==1)
                                    {{'Đang Dùng'}}
                                    @else 
                                         
                                      {{'Không Sử Dụng'}}   
                                    @endif 
                                   </td> 
                                <td>{{$us->created_at}}</td>     
                                 <td class="center"><i class=" fa fa-pencil fa-fw"></i><a href="
                                   {{route('suaSlide',$us->id)}}">Sửa</a></td>          
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i> <a href="{{route('xoaSlide',$us->id)}}">Xóa</a></td>
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
        