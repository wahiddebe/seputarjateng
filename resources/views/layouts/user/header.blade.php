<!DOCTYPE html>
<html>

<head>
    <title>{{ config('app.name','Laravel') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('user/images/logo.png') }}" type="image/gif" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/style.css') }}">
    <!--[if lt IE 9]>
<script src="user/assets/js/html5shiv.min.js"></script>
<script src="user/assets/js/respond.min.js"></script>
<![endif]-->
</head>


<body>
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    <div class="container">
        <header id="header">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="header_top">
                        <div class="header_top_left">
                            <ul class="top_nav">
                                <li>
                                    <p>{{ $today }}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="header_top_left">
                            <ul class="top_nav">
                                <li><a href="/about">About</a></li>
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                        </div>
                        <div class="header_top_right">
                            <form action="{{ route('artikels-lists') }}" method="GET" class="search_form">
                                <input type="text" name="titlesearch" placeholder="Text to Search">
                                <input type="submit" value="">
                            </form>
                        </div>
                    </div>
                    <div class="header_bottom">
                        <div class="header_bottom_left"><a class="logo" href="/"><img
                                    src="{{ asset('user/images/logo.png') }}" alt=""></a></div>
                        <div class="header_bottom_right"><a href="/"><img src="user/images/addbanner_728x90_V1.jpg"
                                    alt=""></a></div>
                    </div>
                </div>
            </div>
        </header>
        <div id="navarea">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span
                                class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav custom_nav">
                            <li class=""><a href="/">Home</a></li>
                            <li class="dropdown"> <a href="#" class="" data-toggle="dropdown" role="button"
                                    aria-expanded="false">Kategori</a>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach ($kategoris as $item)
                                    <li><a href="/artikel/kategori/{{ $item->nama }}">{{ $item->nama }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown"> <a href="#" class="" data-toggle="dropdown" role="button"
                                    aria-expanded="false">Seputar Semarang</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/artikel/karesidenan/Semarang">Seputar Semarang</a></li>
                                    @foreach ($semarang as $item)
                                    <li><a href="/artikel/kota/{{ $item->nama }}">{{ $item->nama }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown"> <a href="#" class="" data-toggle="dropdown" role="button"
                                    aria-expanded="false">Seputar Pekalongan</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/artikel/karesidenan/Pekalongan">Seputar Pekalongan</a></li>
                                    @foreach ($pekalongan as $item)
                                    <li><a href="/artikel/kota/{{ $item->nama }}">{{ $item->nama }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown"> <a href="#" class="" data-toggle="dropdown" role="button"
                                    aria-expanded="false">Seputar Banyumas</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/artikel/karesidenan/Banyumas">Seputar Banyumas</a></li>
                                    @foreach ($banyumas as $item)
                                    <li><a href="/artikel/kota/{{ $item->nama }}">{{ $item->nama }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown"> <a href="#" class="" data-toggle="dropdown" role="button"
                                    aria-expanded="false">Seputar Kedu</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/artikel/karesidenan/Kedu">Seputar Kedu</a></li>
                                    @foreach ($kedu as $item)
                                    <li><a href="/artikel/kota/{{ $item->nama }}">{{ $item->nama }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown"> <a href="#" class="" data-toggle="dropdown" role="button"
                                    aria-expanded="false">Seputar Pati</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/artikel/karesidenan/Pati">Seputar Pati</a></li>
                                    @foreach ($pati as $item)
                                    <li><a href="/artikel/kota/{{ $item->nama }}">{{ $item->nama }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown"> <a href="#" class="" data-toggle="dropdown" role="button"
                                    aria-expanded="false">Seputar Solo</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/artikel/karesidenan/Solo">Seputar Solo</a></li>
                                    @foreach ($solo as $item)
                                    <li><a href="/artikel/kota/{{ $item->nama }}">{{ $item->nama }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
