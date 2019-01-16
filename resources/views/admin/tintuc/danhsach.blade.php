@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-primary">Tin tức
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col lg-12">
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
                            <th width="5%">Tiêu đề</th>
                            <th width="35%">Tóm tắt</th>
                            <th width="7.5%">Thể loại</th>
                            <th width="7.5%">Loại tin</th>
                            <th width="7.5%">Nổi bật</th>
                            <th width="7.5%">Lượt xem</th>
                            <th width="7.5%">Xóa</th>
                            <th width="7.5%">Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dstintuc as $item)
                            <tr class="odd gradeX">
                                <td>{{$item->id}}</td>
                                <td>
                                    <p>{{$item->TieuDe}}</p>
                                    <img width="150px" src="upload/tintuc/{{$item->Hinh}}" alt="">
                                </td>
                                <td>{{$item->TomTat}}</td>
                                <td>{{$item->loaitin->theloai->Ten}}</td>
                                <td>{{$item->loaitin->Ten}}</td>
                                <td>@if($item->NoiBat==1) {{'Có'}} @else {{'Không'}} @endif</td>
                                <td>{{$item->SoLuotXem}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/xoa/{{$item->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/sua/{{$item->id}}">Edit</a></td>
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