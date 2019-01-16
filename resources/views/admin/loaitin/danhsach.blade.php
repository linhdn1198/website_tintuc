@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-primary">Loại tin
                    <small>Danh sách</small>
                </h1>
            </div>
            <div class="col-lg-12">
                @if (session('thongbao'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{session('thongbao')}}</strong>
                    </div>
                @endif
            </div>  
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên loại tin</th>
                                <th>Tên không dấu</th>
                                <th>Thể loại</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($dsloaitin as $item)
                            <tr class="odd gradeX">
                                <td>{{$item->id}}</td>
                                <td>{{$item->Ten}}</td>
                                <td>{{$item->TenKhongDau}}</td>
                                <td>{{$item->theloai->Ten}}</td>
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/loaitin/xoa/{{$item->id}}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loaitin/sua/{{$item->id}}">Sửa</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection