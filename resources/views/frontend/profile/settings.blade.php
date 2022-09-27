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
    @php
        $auth = Auth::user();
    @endphp
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
                                                <form action="{{route('frontend.change-password')}}" class="form-contact contact_form" method="post" id="contactForm">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="">Input Current Password</label>
                                                        <input class="form-control border border-dark @error('current_password') border border-danger @enderror" name="current_password" id="current_password" type="password" placeholder="Enter Current Password">
                                                        @error('current_password')
                                                        <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Input New Password</label>
                                                        <input class="form-control border border-dark @error('new_password') border border-danger @enderror" name="new_password" id="new_password" type="password" placeholder="Enter New Password">
                                                        @error('new_password')
                                                        <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Input New Password Again</label>
                                                        <input class="form-control border border-dark @error('confirm_password') border border-danger @enderror" name="confirm_password" id="confirm_password" type="password" placeholder="Enter Confirm Password">
                                                        @error('confirm_password')
                                                        <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group text-center text-md-right mt-3">
                                                        <button type="submit" class="button button--active button-contactForm">Update Password</button>
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
