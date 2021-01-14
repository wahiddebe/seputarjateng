@extends('layouts.user.master')
@section('content')
<section id="mainContent">
    <div class="content_bottom">
        <div class="col-lg-8 col-md-8">
            <div class="content_bottom_left">
                <div class="single_page_area">
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li><a
                                href="/artikel/karesidenan/{{ $artikel->karesidenan->nama }}">{{ $artikel->karesidenan->nama }}</a>
                        </li>
                        <li><a href="/artikel/kota/{{ $artikel->kota->nama }}">{{ $artikel->kota->nama }}</a>
                        </li>
                        <li><a
                                href="/artikel/kategori/{{ $artikel->kategori->nama }}">{{ $artikel->kategori->nama }}</a>
                        </li>
                        <li class="active">{{ $artikel->judul }} </li>
                    </ol>
                    <h2 class="post_titile">{{ $artikel->judul }} </h2>
                    <div class="single_page_content">
                        <div class="post_commentbox">
                            <span>
                                <i class="fa fa-calendar"></i>{{$artikel->created_at->format('d M,y')}}
                            </span>
                            <a href="#">
                                <i class="fa fa-tags"></i>{{ $artikel->karesidenan->nama }}
                            </a>
                            <a href="#">
                                <i class="fa fa-tags"></i>{{ $artikel->kota->nama }}
                            </a>
                            <a href="#">
                                <i class="fa fa-tags"></i>{{ $artikel->kategori->nama }}
                            </a>
                        </div>
                        <img class="img-center" src="{{ asset('images/artikel/foto_judul/'.$artikel->foto_judul) }}"
                            alt="">
                        {!! $artikel->deskripsi !!}
                    </div>
                </div>
            </div>
            <div class="share_post">
                <a class="facebook"
                    href="https://www.facebook.com/share.php?u=http://seputarjateng.com/artikel/{{ $artikel->slug }}"
                    target="_blank"><i class="fa fa-facebook"></i>Facebook
                </a>
                <a class="twitter" target="_blank"
                    href="http://twitter.com/intent/tweet?url=http://seputarjateng.com/artikel/{{ $artikel->slug }}&amp;text={{ $artikel->judul }}+{{ '@'.$twitter->twitter }}&amp;hashtags=seputarjateng"><i
                        class="fa fa-twitter"></i>Twitter
                </a>
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
