<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li class="list-group-item menu1 active">
            <h2 style="margin-top:0px; margin-bottom:0px;">Menu</h2>
        </li>

        @foreach ($dstheloai as $tl)
            @if (count($tl->loaitin) > 0)
                <li class="list-group-item menu1">
                    {{$tl->Ten}}
                </li>
                <ul>
                    @foreach ($tl->loaitin as $lt)
                        @if (count($lt->tintuc) > 0)
                            <li class="list-group-item">
                                <a href="loaitin/{{$lt->id}}/{{$lt->TenKhongDau}}.html">{{$lt->Ten}}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endif
        @endforeach
    </ul>
</div>