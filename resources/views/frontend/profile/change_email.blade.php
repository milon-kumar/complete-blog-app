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
        <section class="mb-8px">
            <div class="container">
                <div class="hero-banner hero-banner--sm">
                    <div class="hero-banner__content">
                        <h1>Dashbaord</h1>
                        <nav aria-label="breadcrumb" class="banner-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                    <div class="col-md-2">
                        @include('frontend.includes.dashboard_nav')
                    </div>
                    <div class="col-md-10">
                        <nav>
                            @include('frontend.includes.settingmennu')
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form action="{{route('frontend.update-email')}}" class="form-contact contact_form" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="">Input Current Email Address</label>
                                                        <input class="form-control border border-dark @error('current_email') border border-danger @enderror" name="current_email" id="current_email" type="email" placeholder="Enter Current Email Address">
                                                        @error('current_email')
                                                        <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Input New Email Address</label>
                                                        <input class="form-control border border-dark @error('new_email') border border-danger @enderror" name="new_email" id="new_email" type="email" placeholder="Enter New Email address">
                                                        @error('new_email')
                                                        <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group text-center text-md-right mt-3">
                                                        <button type="submit" class="button button--active button-contactForm">Update Email Address</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ End Blog Post Area =================-->

    </main>

@endsection
