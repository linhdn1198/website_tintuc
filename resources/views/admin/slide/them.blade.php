@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-primary">Slide
                    <small>Thêm</small>
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
                <form action="admin/slide/postThem" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên Slide</label>
                        <input class="form-control" name="Ten" placeholder="Nhập tên slide" />
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input class="form-control" name="Hinh" type="file" />
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control ckeditor" name="NoiDung"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm mới</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection