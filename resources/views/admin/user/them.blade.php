@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-primary">User
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
                

                @if (session('thongbao'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{session('thongbao')}}</strong>
                    </div>
                @endif
                <form action="admin/user/postThem" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tên thành viên</label>
                        <input class="form-control" name="name" placeholder="Nhập tên thành viên." />
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" class="form-control" name="email" placeholder="Nhập E-mail." />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Nhập password." />
                    </div>
                    <div class="form-group">
                        <label>Quyền</label>
                        <div class="form-control">
                            <label class="radio-inline">
                                <input name="quyen" value="0" checked type="radio">Thành viên
                            </label>
                            <label class="radio-inline">
                                <input name="quyen" value="1" type="radio">Quản lý
                            </label>
                        </div>
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