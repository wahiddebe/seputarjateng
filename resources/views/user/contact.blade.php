@extends('layouts.user.master')
@section('content')
<section id="ContactContent">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="contact_area">
                <div class="contact_bottom">
                    <div class="contact_us wow fadeInRightBig">
                        <h2>Contact Us</h2>
                        <form action="/contact/store" method="POST" enctype="multipart/form-data" class="contact_form">
                            @csrf
                            <input class="form-control" name="name" type="text" placeholder="Name(required)">
                            <input class="form-control" name="email" type="email" placeholder="E-mail(required)">
                            <input class="form-control" name="subject" type="text" placeholder="Subject">
                            <textarea class="form-control" name="message" cols="30" rows="10"
                                placeholder="Message(required)"></textarea>
                            <input type="submit" value="Send">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
