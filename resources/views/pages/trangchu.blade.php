@extends('layout.index')

@section('content')
<div class="container">

    <!-- slider -->
    @include('layout.slide')
    <!-- end slide -->

    <div class="space20"></div>

    <div class="row main-left">
        @include('layout.menu')

        <div class="col-md-9">
            <div class="panel panel-primary">            
                <div class="panel-heading panel-primary" >
                    <h2 style="margin-top:0px; margin-bottom:0px;">Laravel Tin Tức</h2>
                </div>

                <div class="panel-body">
                    <!-- item -->
                    @foreach ($dstheloai as $tl)
                        @if (count($tl->loaitin) > 0)
                            <div class="row-item row">
                                <h3>
                                    <a href="">{{$tl->Ten}}</a> | 	
                                    @foreach ($tl->loaitin as $lt)
                                        @if (count($lt->tintuc) > 0)
                                            <small><a href="loaitin/{{$lt->id}}/{{$lt->TenKhongDau}}.html"><i>{{$lt->Ten}}</i></a> / </small>
                                        @endif
                                    @endforeach
                                </h3>
                                
                                <?php 
                                    $datas = $tl->tintuc->where('NoiBat',1)->take(5);
                                    $tin1 = $datas->shift();
                                ?>
                                <div class="col-md-8 border-right">
                                    <div class="col-md-5">
                                        <a href="chitiet/{{$tin1->id}}/{{$tin1->TieuDeKhongDau}}.html">
                                            <img class="img-responsive" src="upload/tintuc/{{$tin1['Hinh']}}" alt="">
                                        </a>
                                        
                                    </div>
        
                                    <div class="col-md-7">
                                        <a href="chitiet/{{$tin1->id}}/{{$tin1->TieuDeKhongDau}}.html"><h3>{{$tin1['TieuDe']}}</h3></a>
                                        <p>{{$tin1['TomTat']}}</p>
                                        <a class="btn btn-primary" href="chitiet/{{$tin1->id}}/{{$tin1->TieuDeKhongDau}}.html">Xem Thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    @foreach ($datas as $data)
                                        <a href="chitiet/{{$data->id}}/{{$data->TieuDeKhongDau}}.html">
                                            <h4>
                                                <span class="glyphicon glyphicon-list-alt"></span>
                                                {{$data->TieuDe}}
                                            </h4>
                                        </a>
                                    @endforeach
                                </div>
                                
                                <div class="break"></div>
                             </div>
                        @endif
                    @endforeach
                    <!-- end item -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection