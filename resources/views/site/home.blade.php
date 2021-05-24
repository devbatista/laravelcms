@extends('site.layout')

@section('title', 'Titulo de teste')

@section('content')
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-md-6">
                        <div class="slider_text ">
                            <h3 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s">
                                {{ $front_config['title'] }}
                            </h3>
                            <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".1s">
                                {{ $front_config['subtitle'] }}
                            </p>
                            <div class="video_service_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".1s">
                                <a href="#" class="boxed-btn3">Get Start Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-6">
                        <div class="phone_thumb wow fadeInDown" data-wow-duration="1.1s" data-wow-delay=".2s">
                            <img src="{{ asset('assets/img/ilstrator/phone.png') }}" alt="phone">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
