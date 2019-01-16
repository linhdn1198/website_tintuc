@extends('layout.index')

@section('content')
<div class="container">
    <!-- slider -->
    <div class="row carousel-holder">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Đăng ký tài khoản</div>
                <div class="panel-body">
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

                    <form method="POST" action="dangki">
                        @csrf
                        <div>
                            <label>Họ tên</label>
                            <input type="text" class="form-control" placeholder="Username" name="name">
                        </div>
                        <br>
                        <div>
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email"
                            >
                        </div>
                        <br>	
                        <div>
                            <label>Nhập mật khẩu</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">Đăng ký
                        </button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <!-- end slide -->
</div>
@endsection