@extends('layout.index')

@section('content')
<div class="container">
    <div class="row">
        <!-- Blog Post Content Column -->
        <div class="col-lg-9">
            <div class="panel panel-primary">
                <div class="panel-heading"> 
                    <!-- Blog Post -->
                    <!-- Title -->
                    <h1>{{$tintuc->TieuDe}}</h1>
                </div>
                
                <div class="panel-body">
                    <!-- Preview Image -->
                    <img class="img-responsive" src="upload/tintuc/{{$tintuc->Hinh}}" alt="">
                    <!-- Author -->
                    <p class="lead">
                        by <a href="#">Admin</a>
                    </p>
                    <!-- Date/Time -->
                    <p><span class="glyphicon glyphicon-time"></span> Ngày đăng: {{$tintuc->create_at}}</p>
                    <hr>

                    <!-- Post Content -->
                    <p class="lead">{!!$tintuc->NoiDung!!}</p>
                    
                    <hr>
                    <!-- Blog Comments -->

                    <!-- Comments Form -->

                    @if (Auth::check())
                        <div class="well">
                            <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                            @if (session('thongbao'))
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>{{session('thongbao')}}</strong>
                                </div>
                            @endif
                            <form role="form" method="POST" action="comment/{{$tintuc->id}}">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" name="NoiDung"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Gửi</button>
                            </form>
                        </div>
                        <hr>
                    @endif
                        
                    <!-- Posted Comments -->

                    <!-- Comment -->
                    @foreach ($comments as $comment)
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$comment->user->name}}
                                    <small>{{$comment->created_at}}</small>
                                </h4>
                                {{$comment->NoiDung}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>   
      
        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">

            <div class="panel panel-primary">
                <div class="panel-heading"><b>Tin liên quan</b></div>
                <div class="panel-body">

                    <!-- item -->
                    @foreach ($tinlienquan as $tinlq)
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="chitiet/{{$tinlq->id}}/{{$tinlq->TieuDeKhongDau}}.html">
                                    <img class="img-responsive" src="upload/tintuc/{{$tinlq->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="chitiet/{{$tinlq->id}}/{{$tinlq->TieuDeKhongDau}}.html"><b>{{$tinlq->TieuDe}}</b></a>
                            </div>
                            {{-- <p >{{$tinlq->TomTat}}</p> --}}
                            <div class="break"></div>
                        </div>
                    @endforeach
                    <!-- end item -->

                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading"><b >Tin nổi bật</b></div>
                <div class="panel-body">
                    <!-- item -->
                    @foreach ($tinnoibat as $tinnb)
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="chitiet/{{$tinnb->id}}/{{$tinnb->TieuDeKhongDau}}.html">
                                    <img class="img-responsive" src="upload/tintuc/{{$tinnb->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="chitiet/{{$tinnb->id}}/{{$tinnb->TieuDeKhongDau}}.html"><b>{{$tinnb->TieuDe}}</b></a>
                            </div>
                            {{-- <p>{{$tinnb->TomTat}}</p> --}}
                            <div class="break"></div>
                        </div>
                    @endforeach
                    <!-- end item -->
                </div>
            </div>
            
        </div>

    </div>
    <!-- /.row -->
</div>
@endsection