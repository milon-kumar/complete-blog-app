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
                        <div class="card shadow-md">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header bg-dark text-white">
                                            Your Total Comments
                                        </div>
                                        <div class="card-body">
                                            {{$totalComment}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header bg-dark text-white">
                                            Your Total Message
                                        </div>
                                        <div class="card-body">
                                            {{$totalMessage}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Recently Posted</h4>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#SL</th>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th>View Count</th>
                                                        <th>Created At</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($resentlyPostedBlog as $key => $r_blog)
                                                        <tr>
                                                            <td>{{$key +1}}</td>
                                                            <td>{{$r_blog->title}}</td>
                                                            <td>{!! Str::limit($r_blog->description,10) !!}</td>
                                                            <td>{{$r_blog->view_count}}</td>
                                                            <td>{{$r_blog->created_at->diffForHumans()}}</td>
                                                            <td>
                                                                <a href="{{route('frontend.blog.details',$r_blog->slug)}}" class="" style=" padding: 0 20px; box-shadow: 0 0 3px 1px #9b8585; background: orangered;border: none; text-decoration: none;color: whitesmoke;">View</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ End Blog Post Area =================-->

    </main>

@endsection
