@extends('layout.index')

@section('content')
<div class="container">

    <!-- slider -->
    @include('layout.slide')
    <!-- end slide -->

    <div class="space20"></div>

    <div class="row main-left">
        @include('layout.menu')

        <div class="col-md-9 ">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4><b>{{$loaitin->Ten}}</b></h4>
                </div>

                @foreach ($dstintuc as $tintuc)
                    <div class="row-item row">
                        <div class="col-md-3">

                            <a href="chitiet/{{$tintuc->id}}/{{$tintuc->TieuDeKhongDau}}.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="upload/tintuc/{{$tintuc->Hinh}}" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <a href="chitiet/{{$tintuc->id}}/{{$tintuc->TieuDeKhongDau}}.html"><h3>{{$tintuc->TieuDe}}</h3></a>
                            <p>{{$tintuc->TomTat}}</p>
                            <a class="btn btn-primary" href="chitiet/{{$tintuc->id}}/{{$tintuc->TieuDeKhongDau}}.html">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                @endforeach

                <!-- Pagination -->
                <div class="row text-center">
                    <div class="col-lg-12">
                        {{$dstintuc->links()}}
                    </div>
                </div>
                <!-- /.row -->

            </div>
        </div> 
    </div>
    <!-- /.row -->
</div>
@endsection