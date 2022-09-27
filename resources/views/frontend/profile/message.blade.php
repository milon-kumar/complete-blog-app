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
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="card shadow">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#SL</th>
                                                <th>Subjects</th>
                                                <th>Messages</th>
                                                <th>Seended At</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                                @foreach($messages as $key => $message)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{!! $message->subject !!}</td>
                                                        <td>{!! $message->message !!}</td>
                                                        <td>{{$message->created_at->diffForHumans()}}</td>
                                                        <td class="text-center">
                                                            <a href="" class="" style=" padding: 0 20px; box-shadow: 0 0 3px 1px #9b8585; background: orangered;border: none; text-decoration: none;color: whitesmoke;">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                            {{$messages->links()}}
                                            </tfoot>
                                        </table>
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
