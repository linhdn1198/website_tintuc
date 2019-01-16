@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-primary">Trang chủ
                </h1>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-4">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h3>THỂ LOẠI</h3></div>
                    <div class="panel-body"><h2>{{$theloai}}</h2></div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="panel panel-success">
                    <div class="panel-heading"><h3>LOẠI TIN</h3></div>
                    <div class="panel-body"><h2>{{$loaitin}}</h2></div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="panel panel-info">
                    <div class="panel-heading"><h3>TIN TỨC</h3></div>
                    <div class="panel-body"><h2>{{$tintuc}}</h2></div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="panel panel-danger">
                    <div class="panel-heading"><h3>COMMENTS</h3></div>
                    <div class="panel-body"><h2>{{$comment}}</h2></div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="panel panel-warning">
                    <div class="panel-heading"><h3>SLIDES</h3></div>
                    <div class="panel-body"><h2>{{$slide}}</h2></div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading "><h3>NGƯỜI DÙNG</h3></div>
                    <div class="panel-body"><h2>{{$user}}</h2></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection