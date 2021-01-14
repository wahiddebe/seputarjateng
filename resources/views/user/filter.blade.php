@extends('layouts.user.master')
@section('content')
<section id="mainContent">
    <div class="content_bottom">
        <div class="col-lg-8 col-md-8">
            <div class="content_bottom_left">
                <div class="single_category wow fadeInDown">
                    <div class="archive_style_1">
                        <div style="margin-top: 15px">
                            <ol class="breadcrumb">
                                <li><a href="/">Home</a></li>
                                <li class="active">{{ $filter }} </li>
                            </ol>
                        </div>
                        <h2>
                            <span class="bold_line"><span></span></span>
                            <span class="solid_line"></span>
                            <span class="title_text">{{ $filter}}</span>
                        </h2>
                        @foreach ($artikel as $item)
                        <div class="business_category_left wow fadeInDown">
                            <ul class="fashion_catgna">
                                <li style="padding: 5px">
                                    <div class="catgimg2_container"> <a href="/artikel/{{ $item->slug }}"><img alt=""
                                                src="{{ asset('images/artikel/foto_judul/'.$item->foto_judul) }}"></a>
                                    </div>
                                    <h2 class="catg_titile"><a href="/artikel/{{ $item->slug }}">{{ $item->judul }}</a>
                                    </h2>
                                    <div class="comments_box">
                                        <p>{!! Str::limit($item->deskripsi, 100, '').'...' !!}</p>
                                    </div>

                                </li>
                            </ul>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="pagination_area">
                <div class="pagination_area">
                    {{$artikel->links()}}
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="content_bottom_right">
                @include('layouts.user.recent')
                <div class="single_bottom_rightbar">
                    <h2>Blog Archive</h2>
                    <div class="blog_archive wow fadeInDown">
                        <form action="#">
                            <select>
                                <option value="">Blog Archive</option>
                                <option value="">October(20)</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
