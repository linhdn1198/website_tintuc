@extends('layout.index')

@section('content')
<div class="container">
    	<!-- slider -->
    <div class="row carousel-holder">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Thông tin tài khoản</div>
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
                    <form action="taikhoan/{{$user->id}}" method="POST">
                        @csrf
                        <div>
                            <label>Họ tên</label>
                            <input type="text" class="form-control" placeholder="Nhập họ tên" name="name" value="{{$user->name}}">
                        </div>
                        <br>
                        <div>
                            <label>E-mail</label>
                            <input type="email" class="form-control" placeholder="Nhập e-mail" name="email" value="{{$user->email}}" readonly>
                        </div>
                        <br>	
                        <div>
                            <input type="checkbox" class="" name="checkpassword" id="checkpassword">
                            <label>Đổi mật khẩu</label>
                            <input type="password" class="form-control" name="password" id="password" disabled>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Sửa
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

@section('script')
    <script>
        $(document).ready(function(){
            $('#checkpassword').change(function(){
                if($(this).is(":checked")){
                    $("#password").removeAttr('disabled');
                }else{
                    $("#password").attr('disabled','');
                }
            });
        });
    
    </script>
@endsection