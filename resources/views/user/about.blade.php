@extends('layouts.user.master')
@section('content')
<section id="mainContent">
    <div class="content_bottom">
        <div class="col-lg-8 col-md-8">
            <div class="content_bottom_left">
                <div class="single_page_area">
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li class="active">About</li>
                    </ol>
                    <h2 class="post_titile">About us </h2>
                    <div class="single_page_content">
                        <blockquote> Seputar Jateng merupakan portal berita online yang menghadirkan berita-berita
                            terbaru,
                            Faktual , mencerahkan dan
                            mencerdaskan ummat</blockquote>

                    </div>
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
