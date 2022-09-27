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

        <!--================ Hero sm Banner start =================-->
        <section class="mb-30px">
            <div class="container">
                <div class="hero-banner hero-banner--sm">
                    <div class="hero-banner__content">
                        <h1>Category Page</h1>
                        <nav aria-label="breadcrumb" class="banner-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Category Page</li>
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
                    <div class="col-lg-8">
                        <div class="row">
                            @if($blogs->count() > 0)
                                @foreach($blogs as $blog)
                                <div class="col-md-6">
                                    <div class="single-recent-blog-post card-view">
                                        <div class="thumb">
                                            <img class="card-img rounded-0" src="{{asset('/uploads/'.$blog->image)}}" alt="">
                                            <ul class="thumb-info">
                                                <li><a href="#"><i class="ti-user"></i>{{$blog->user->name}}</a></li>
                                                <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                                            </ul>
                                        </div>
                                        <div class="details mt-20">
                                            <a href="">
                                                <h3>{{$blog->title}}</h3>
                                            </a>
                                            <p>{!! Str::limit($blog->description,50) !!}</p>
                                            <a class="button" href="{{route('frontend.blog.details',$blog->slug)}}">Read More <i class="ti-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @else
                                <div class="p-5">
                                    <h1>No Blog Found</h1>
                                </div>
                            @endif
                        </div>

                        <!--<div class="single-recent-blog-post">
                          <div class="thumb">
                            <img class="img-fluid" src="img/blog/blog2.png" alt="">
                            <ul class="thumb-info">
                              <li><a href="#"><i class="ti-user"></i>Admin</a></li>
                              <li><a href="#"><i class="ti-notepad"></i>January 12,2019</a></li>
                              <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                            </ul>
                          </div>
                          <div class="details mt-20">
                            <a href="blog-single.html">
                              <h3>Woman claims husband wants to name baby girl
                                after his ex-lover sparking.</h3>
                            </a>
                            <p class="tag-list-inline">Tag: <a href="#">travel</a>, <a href="#">life style</a>, <a href="#">technology</a>, <a href="#">fashion</a></p>
                            <p>Over yielding doesn't so moved green saw meat hath fish he him from given yielding lesser cattle were fruitful lights. Given let have, lesser their made him above gathered dominion sixth. Creeping deep said can't called second. Air created seed heaven sixth created living</p>
                            <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
                          </div>
                        </div>

                        <div class="single-recent-blog-post">
                          <div class="thumb">
                            <img class="img-fluid" src="img/blog/blog3.png" alt="">
                            <ul class="thumb-info">
                              <li><a href="#"><i class="ti-user"></i>Admin</a></li>
                              <li><a href="#"><i class="ti-notepad"></i>January 12,2019</a></li>
                              <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                            </ul>
                          </div>
                          <div class="details mt-20">
                            <a href="blog-single.html">
                              <h3>Tourist deaths in Costa Rica jeopardize safe dest
                                ination reputation all time. </h3>
                            </a>
                            <p class="tag-list-inline">Tag: <a href="#">travel</a>, <a href="#">life style</a>, <a href="#">technology</a>, <a href="#">fashion</a></p>
                            <p>Over yielding doesn't so moved green saw meat hath fish he him from given yielding lesser cattle were fruitful lights. Given let have, lesser their made him above gathered dominion sixth. Creeping deep said can't called second. Air created seed heaven sixth created living</p>
                            <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
                          </div>
                        </div>

                        <div class="single-recent-blog-post">
                          <div class="thumb">
                            <img class="img-fluid" src="img/blog/blog4.png" alt="">
                            <ul class="thumb-info">
                              <li><a href="#"><i class="ti-user"></i>Admin</a></li>
                              <li><a href="#"><i class="ti-notepad"></i>January 12,2019</a></li>
                              <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                            </ul>
                          </div>
                          <div class="details mt-20">
                            <a href="blog-single.html">
                              <h3>Tourist deaths in Costa Rica jeopardize safe dest
                                ination reputation all time.  </h3>
                            </a>
                            <p class="tag-list-inline">Tag: <a href="#">travel</a>, <a href="#">life style</a>, <a href="#">technology</a>, <a href="#">fashion</a></p>
                            <p>Over yielding doesn't so moved green saw meat hath fish he him from given yielding lesser cattle were fruitful lights. Given let have, lesser their made him above gathered dominion sixth. Creeping deep said can't called second. Air created seed heaven sixth created living</p>
                            <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
                          </div>
                        </div>-->

                        <div class="row">
                            <div class="col-lg-12">
                                <nav class="blog-pagination justify-content-center d-flex">
                                    <ul class="pagination">
                                        <li class="page-item active">
                                            {{$blogs->links()}}
                                        </li>
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
                                        <li class="active">
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
                                    @foreach($popular_blog as $p_blog)
                                        <div class="single-post-list">
                                            <div class="thumb">
                                                <img class="card-img rounded-0" src="{{asset('/uploads/'.$p_blog->image)}}" alt="">
                                                <ul class="thumb-info">
                                                    <li><a href="#">{{$p_blog->user->name}}</a></li>
                                                    <li><a href="#">{{$p_blog->created_at->diffForHumans()}}</a></li>
                                                </ul>
                                            </div>
                                            <div class="details mt-20">
                                                <a href="{{route('frontend.blog.details',$p_blog->slug)}}">
                                                    <h6>{{$p_blog->title}}</h6>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
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
