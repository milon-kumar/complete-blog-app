@extends('frontend.master')

@push('css')
    <style>
        .hero-banner {
            position: relative;
            background: url({{asset('/')}}assets/frontend/img/banner/hero-banner.png) left center no-repeat;
            background-size: cover;
            height: 200px;
            z-index: 1
        }
    </style>
@endpush

@section('content')
    <main class="site-main">

        <!--================ Hero sm Banner start =================-->
        <section class="mb-15px">
            <div class="container">
                <div class="hero-banner hero-banner--sm">
                    <div class="hero-banner__content">
                        <h1>Login</h1>
                        <nav aria-label="breadcrumb" class="banner-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Login Page</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!--================ Hero sm Banner end =================-->


        <!--================ Start Blog Post Area =================-->
        <section class="blog-post-area section-margin">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                Login Form
                            </div>
                            <div class="card-body">
                                <form action="{{route('login')}}" class="form-contact contact_form" method="post" id="contactForm">
                                    @csrf
                                    <div class="form-group">
                                        <input class="form-control border border-dark @error('email') border border-danger @enderror" name="email" id="email" type="email" placeholder="Enter email address">
                                        @error('email')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control border border-dark @error('password') border border-danger @enderror" name="password" id="password" type="password" placeholder="Enter Password">
                                        @error('password')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group text-center text-md-right mt-3">
                                        <button type="submit" class="button button--active button-contactForm">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ End Blog Post Area =================-->

    </main>

@endsection
