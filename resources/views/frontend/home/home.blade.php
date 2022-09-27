@extends('frontend.master')

@push('css')
    <style>
        .hero-banner {
            position: relative;
            background: url({{asset('/uploads/'.$slider_blog->image)}}) left center no-repeat;
            background-size: cover;
            height: 400px;
            z-index: 1
        }
    </style>
@endpush

@section('content')
    <main class="site-main">
        <!--================Hero Banner start =================-->
        <section class="mb-30px">
            <div class="container">
                <div class="hero-banner">
                    <div class="hero-banner__content">
                        <h3>{{$slider_blog->title}}</h3>
                        <h1>{!! Str::limit($slider_blog->description,40) !!}</h1>
                        <h4>
                            {{$slider_blog->created_at->diffForHumans()}}
                        </h4>

                        <a class="button mt-2" href="{{route('frontend.blog.details',$slider_blog->slug)}}"> Read The Blog... <i class="ti-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <!--================Hero Banner end =================-->

        <!--================ Blog slider start =================-->

{{--    @include('frontend.includes.blog_slider')--}}

        <section>
            <div class="container">
                <div class="owl-carousel owl-theme blog-slider">
                    @foreach($blogs as $blog)
                        <div class="card blog__slide text-center">
                            <div class="blog__slide__img">
                                <img class="card-img rounded-0" src="{{asset('/uploads/'.$blog->image)}}" alt="">
                            </div>
                            <div class="blog__slide__content">
                                <a class="blog__slide__label" href="#">{{$blog->category->name}}</a>
                                <h3><a href="{{route('frontend.blog.details',$blog->slug)}}">{{$blog->title}}</a></h3>
                                <p>{{$blog->created_at->diffForHumans()}}</p>
                            </div>
                        </div>


                    @endforeach
                </div>
            </div>
        </section>

    <!--================ Blog slider end =================-->

        <!--================ Start Blog Post Area =================-->
        <section class="blog-post-area" style="margin-top: 0px; margin-bottom: 20px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">

                        @foreach($latest_blog as $l_blog)
                            <div class="single-recent-blog-post">
                                <div class="thumb">
                                    <img class="img-fluid" style="width: 100%;height: 430px;" src="{{asset('/uploads/'.$l_blog->image)}}" alt="">
                                    <ul class="thumb-info">
                                        <li><a href="#"><i class="ti-user"></i>{{$l_blog->user->name}}</a></li>
                                        <li><a href="#"><i class="ti-notepad"></i>{{$l_blog->created_at->format('d/m/Y')}}</a></li>
                                        <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                                    </ul>
                                </div>
                                <div class="details mt-20">
                                    <a href="">
                                        <h3>{{$l_blog->title}}</h3>
                                    </a>
                                    <p class="tag-list-inline">Tag: <a href="#">travel</a>, <a href="#">life style</a>, <a href="#">technology</a>, <a href="#">fashion</a></p>
                                    <p>{{Str::limit($l_blog->description,70)}}</p>
                                    <a class="button" href="{{route('frontend.blog.details',$l_blog->slug)}}">Read More <i class="ti-arrow-right"></i></a>
                                </div>
                            </div>
                        @endforeach




                        <div class="row">
                            <div class="col-lg-12">
                                <nav class="blog-pagination justify-content-center d-flex">
                                    <ul class="pagination">

                                        <li class="page-item active">{{$latest_blog->links()}}</li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Start Blog Post Siddebar -->
                    <div class="col-lg-4 sidebar-widgets">
                        <div class="widget-wrap">
                            <div class="single-sidebar-widget newsletter-widget">
                                <h4 class="single-sidebar-widget__title">Newsletter</h4>
                                <form action="{{route('frontend.subscribe.store')}}" method="post">
                                    @csrf
                                    <div class="form-group mt-30">
                                        <div class="col-autos">
                                            <input name="email" required type="text" class="form-control @error('email') border border-danger @enderror" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
                                                   onblur="this.placeholder = 'Enter email'">
                                            @error('email')<small class="text-danger"> {{$message}}</small> @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="bbtns d-block mt-20 w-100">Subcribe</button>
                                </form>
                            </div>


                            <div class="single-sidebar-widget post-category-widget">
                                <h4 class="single-sidebar-widget__title">Catgory</h4>
                                <ul class="cat-list mt-20">
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="{{route('frontend.category.blog',[$category->slug,($category->id)])}}" class="d-flex justify-content-between">
                                                <p>{{$category->name}}</p>
                                                 <p>({{$category->publishedBlogByCateghory->count()}})</p>
                                            </a>
                                        </li>

                                    @endforeach
                                </ul>
                            </div>

                            <div class="single-sidebar-widget popular-post-widget">
                                <h4 class="single-sidebar-widget__title">Popular Post</h4>
                                <div class="popular-post-list">
                                    @if($popular_blog->count() > 0)
                                        @foreach($popular_blog as $p_blog)
                                        <div class="single-post-list">
                                            <div class="thumb">
                                                <img class="card-img rounded-0" src="{{asset('/uploads/'.$p_blog->image)}}" alt="">
                                                <ul class="thumb-info">
                                                    <li><a href="#">{{Str::limit($p_blog->title,15)}}</a></li>
                                                    <li><a href="#">Dec 15</a></li>
                                                </ul>
                                            </div>
                                            <div class="details mt-20">
                                                <a href="{{route('frontend.blog.details',$p_blog->slug)}}">
                                                    <h6>{{Str::limit($p_blog->description,50)}}</h6>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                    @else
                                        <div class="p-5">
                                            <h1>No Blog Found</h1>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="single-sidebar-widget tag_cloud_widget">
                                <h4 class="single-sidebar-widget__title">Popular Tags</h4>
                                <ul class="list">
                                    <li>
                                        <a href="#">project</a>
                                    </li>
                                    <li>
                                        <a href="#">love</a>
                                    </li>
                                    <li>
                                        <a href="#">technology</a>
                                    </li>
                                    <li>
                                        <a href="#">travel</a>
                                    </li>
                                    <li>
                                        <a href="#">software</a>
                                    </li>
                                    <li>
                                        <a href="#">life style</a>
                                    </li>
                                    <li>
                                        <a href="#">design</a>
                                    </li>
                                    <li>
                                        <a href="#">illustration</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Blog Post Siddebar -->
            </div>
        </section>
        <!--================ End Blog Post Area =================-->
    </main>

@endsection
