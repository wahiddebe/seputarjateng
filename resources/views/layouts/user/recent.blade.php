<div class="single_bottom_rightbar">
    <h2>Recent Post</h2>
    <ul class="small_catg popular_catg wow fadeInDown">
        @foreach ($recent as $item)

        <li>
            <div class="media wow fadeInDown"> <a href="/artikel/{{ $item->slug }}" class="media-left"><img alt=""
                        src="{{ asset('images/artikel/foto_judul/'.$item->foto_judul) }}"> </a>
                <div class="media-body">
                    <h4 class="media-heading"><a href="/artikel/{{ $item->slug }}">{{ $item->judul }}</a></h4>
                    <p>{!! Str::limit($item->deskripsi, 100, '').'...' !!}</p>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
