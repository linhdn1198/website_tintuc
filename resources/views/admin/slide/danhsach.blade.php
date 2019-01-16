@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-primary">Slide
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if (session('thongbao'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session('thongbao')}}</strong>
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="20%">Tên slide</th>
                            <th width="40%">Nội dung</th>
                            <th width="20%">Link</th>
                            <th width="7.5%">Xóa</th>
                            <th width="7.5%">Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dsslide as $item)
                            <tr class="odd gradeX">
                                <td>{{$item->id}}</td>
                                <td>
                                    <p>{{$item->Ten}}</p>
                                </td>
                                <td>{{$item->NoiDung}}</td>
                                <td>
                                    <p>{{$item->Hinh}}</p>
                                    <img class="img-fluid" src="upload/slide/{{$item->Hinh}}" alt="" width="200px" height="120px">
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/slide/xoa/{{$item->id}}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/sua/{{$item->id}}"> Sửa</a></td>
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