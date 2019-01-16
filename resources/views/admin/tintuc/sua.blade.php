@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-primary">Tin tức
                    <small>{{$tintuc->TieuDe}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if (count($errors) > 0)
                @foreach ($errors->all() as $item)
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{$item}}</strong>
                    </div>
                @endforeach
                @endif

                @if (session('loi'))
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session('loi')}}</strong>
                </div>
                 @endif

                @if (session('thongbao'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{session('thongbao')}}</strong>
                    </div>
                @endif
                <form action="admin/tintuc/postSua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" name="idTheLoai" id="idTheLoai">
                            @foreach ($dstheloai as $item)
                                <option value="{{$item->id}}" @if($item->id==$tintuc->loaitin->theloai->id) {{'selected'}} @endif>{{$item->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại tin</label>
                        <select class="form-control" name="idLoaiTin" id="idLoaiTin">
                            @foreach ($dsloaitin as $item)
                                <option value="{{$item->id}}" @if($item->id==$tintuc->loaitin->id) {{'selected'}} @endif>{{$item->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" name="TieuDe" placeholder="Nhập tiêu đề" value="{{$tintuc->TieuDe}}"/>
                    </div>
                    <div class="form-group">
                        <label>Tóm tắt</label>
                        <textarea class="form-control ckeditor" name="TomTat">{{$tintuc->TomTat}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control ckeditor" name="NoiDung">{{$tintuc->NoiDung}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label> 
                        <input class="form-control" name="Hinh" type="file" />
                        <img class="img-fluid" src="upload/tintuc/{{$tintuc->Hinh}}" alt="" width="200px">
                    </div>
                    <div class="form-group">
                        <label>Nổi bật</label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="1" @if($tintuc->NoiBat==1) {{'checked'}} @endif type="radio">Có
                        </label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="2" @if($tintuc->NoiBat==2) {{'checked'}} @endif type="radio">Không
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $(document).on('change','#idTheLoai',function(){
                var idTheLoai = $(this).val();
                $.get('admin/ajax/loaitin/'+idTheLoai,function(data){
                    $('#idLoaiTin').html(data);
                });
            });
        });
    </script>
@endsection

