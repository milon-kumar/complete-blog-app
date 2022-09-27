@extends('frontend.master')

@push('css')
    <style>
        .hero-banner {
            position: relative;
            background: url({{asset('/')}}assets/frontend/img/banner/hero-banner.png) left center no-repeat;
            background-size: cover;
            height: 400px;
            z-index: 1
        }
    </style>
@endpush

@section('content')
    <main class="site-main">

        <!--================ Hero sm banner start =================-->
        <section class="mb-30px">
            <div class="container">
                <div class="hero-banner hero-banner--sm">
                    <div class="hero-banner__content">
                        <h1>Contact Us</h1>
                        <nav aria-label="breadcrumb" class="banner-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!--================ Hero sm banner end =================-->


        <!-- ================ contact section start ================= -->
        <section class="section-margin--small section-margin">
            <div class="container">
                <div class="d-none d-sm-block mb-5 pb-4">
                    <div id="map" style="height: 420px;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58414.49673735609!2d90.394492522596!3d23.78635979184914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7b71894d7cb%3A0x725a1e9ba77a8744!2sBadda%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1661941179395!5m2!1sen!2sbd" height="400" style="border:0; width: 100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>
{{--                    <script>--}}
{{--                        function initMap() {--}}
{{--                            var uluru = {lat: -25.363, lng: 131.044};--}}
{{--                            var grayStyles = [--}}
{{--                                {--}}
{{--                                    featureType: "all",--}}
{{--                                    stylers: [--}}
{{--                                        { saturation: -90 },--}}
{{--                                        { lightness: 50 }--}}
{{--                                    ]--}}
{{--                                },--}}
{{--                                {elementType: 'labels.text.fill', stylers: [{color: '#A3A3A3'}]}--}}
{{--                            ];--}}
{{--                            var map = new google.maps.Map(document.getElementById('map'), {--}}
{{--                                center: {lat: -31.197, lng: 150.744},--}}
{{--                                zoom: 9,--}}
{{--                                styles: grayStyles,--}}
{{--                                scrollwheel:  false--}}
{{--                            });--}}
{{--                        }--}}

{{--                    </script>--}}
{{--                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script>--}}

                </div>


                <div class="row">
                    <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Address :-</h3>
                                <p>{{backendSetting('site_address')}}</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-headphone"></i></span>
                            <div class="media-body">
                                <h3><a href="tel:01784124291">Contract Number</a></h3>
                                <p>{{backendSetting('site_phone_number')}}</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3><a href="mailto:support@colorlib.com">Email Address:-</a></h3>
                                <p>{{backendSetting('site_email')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-9">
                        <form action="{{route('frontend.contract.store')}}" class="form-contact contact_form" method="post" id="contactForm">
                            @csrf
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <input class="form-control border border-dark @error('name') border border-danger @enderror" name="name" id="name" type="text" placeholder="Enter your name">
                                        @error('name')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control border border-dark @error('email') border border-danger @enderror" name="email" id="email" type="email" placeholder="Enter email address">
                                        @error('email')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control border border-dark @error('subject') border border-danger @enderror" name="subject" id="subject" type="text" placeholder="Enter Subject">
                                        @error('subject')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <textarea class="form-control border border-dark @error('message') border border-danger @enderror different-control w-100" name="message" id="message" cols="30" rows="5" placeholder="Enter Message"></textarea>
                                        @error('message')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center text-md-right mt-3">
                                <button type="submit" class="button button--active button-contactForm">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ contact section end ================= -->

    </main>

@endsection
