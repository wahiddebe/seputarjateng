@include('layouts.user.header')
@yield('content')
</div>
<footer id="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single_footer_top wow fadeInDown">
                        <h2>Follow Us On</h2>
                        <div class="footer-social-icons">
                            <ul class="social-icons">
                                @foreach ($medsos as $item)
                                @php
                                $facebook = $item->facebook;
                                $instagram = $item->instagram;
                                $twitter = $item->twitter;
                                @endphp
                                @endforeach
                                <li><a href="{{ 'https://www.facebook.com/'.$facebook ?? '' }}" target=" _blank"
                                        class="social-icon"> <i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="{{ 'https://twitter.com/'.$twitter }}" target=" _blank"
                                        class="social-icon"> <i class="fa fa-twitter"></i></a>
                                </li>
                                <li><a href="{{  'https://www.instagram.com/'.$instagram }}" target=" _blank"
                                        class="social-icon"> <i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="single_footer_top wow fadeInRight">
                        <h2>About Us</h2>
                        <p>Kaffah News merupakan portal berita online yang menghadirkan berita-berita terbaru,
                            Faktual , mencerahkan dan
                            mencerdaskan ummat</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="footer_bottom_left">
                        <p>Copyright &copy; 2021 <a class="a-footer" href="/">Kaffah News</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="footer_bottom_right">
                        <p>Developed by <a class="a-footer" href="http://aksantara.com/">Aksantara Digital</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('user/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('user/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('user/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('user/assets/js/slick.min.js') }}"></script>
<script src="{{ asset('user/assets/js/custom.js') }}"></script>
</body>

</html>
