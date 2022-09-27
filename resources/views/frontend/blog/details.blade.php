@extends('frontend.master')

@section('title')
    Details -{{$blog->slug}}
@endsection
@push('css')
    <style>
        .hero-banner {
            position: relative;
            background: url({{asset('/uploads/'.$blog->image)}}) left center no-repeat;
            background-size: cover;
            height: 400px;
            z-index: 1
        }

        .main_blog_details{
            max-width: 685px;
            width: 688px;
        }
        .main_blog_details .img-fluid{
            width: 100%;
        }

        .comment_image{
            width: 60px;
            height: 60px;
            overflow: hidden;
            border-radius: 50%;
            margin-right: 10px;
        }
    </style>
@endpush
@section('content')

    <!--================ Hero sm Banner start =================-->
    <section class="mb-30px">
        <div class="container">
            <div class="hero-banner hero-banner--sm">
                <div class="hero-banner__content">
                    <h1>Blog details</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
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
{{--            {{$blog}}--}}
            <div class="row">
                <div class="col-lg-8">
                    <div class="main_blog_details">
                        <img class="img-fluid" src="{{asset('/uploads/'.$blog->image)}}" alt="">

                        <a href="{{route('frontend.blog.details',$blog->slug)}}"><h4>{{$blog->title}}</h4></a>
                        <div class="user_details">
                            <div class="float-left">
                                <a href="#">Lifestyle</a>
                                <a href="#">Gadget</a>
                            </div>
                            <div class="float-right mt-sm-0 mt-3">
                                <div class="media">
                                    <div class="media-body">
                                        <h5>{{$blog->user->name}}</h5>
                                        <p>{{$blog->creatd_at}}</p>
                                    </div>
                                    <div class="d-flex">
                                        <img width="42" height="42" src="{{asset('/')}}assets/frontend/img/blog/user-img.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            {!! $blog->description !!}
                        </div>
                        <div class="news_d_footer flex-column flex-sm-row">

                            <form class="d-none" id="likeFrom" action="{{route('frontend.like')}}" method="post">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{$blog->id}}">
                            </form>
                            <a class="{{$blog->is_like == true ? 'text-success' : ''}}" href="{{route('frontend.like')}}" onclick="event.preventDefault();document.getElementById('likeFrom').submit();"><span class="align-middle mr-2"> <i class="ti-heart"></i></span>Lily and people {{$likes->count()}} like this</a>

                            <a class="javascript:void(0)" href=""><span class="align-middle mr-2"> <i class="ti-heart"></i></span> Total View ( {{$blog->view_count}} )</a>

                            <a class="justify-content-sm-center ml-sm-auto mt-sm-0 mt-2" href="#"><span class="align-middle mr-2"><i class="ti-themify-favicon"></i></span>{{$comments->count() }} Comments</a>
                            <div class="news_socail ml-sm-auto mt-sm-0 mt-2">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-dribbble"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="navigation-area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                <div class="thumb">
                                    <a href="#"><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
                                </div>
                                <div class="arrow">
                                    <a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
                                </div>
                                <div class="detials">
                                    <p>Prev Post</p>
                                    <a href="#"><h4>A Discount Toner</h4></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                <div class="detials">
                                    <p>Next Post</p>
                                    <a href="#"><h4>Cartridge Is Better</h4></a>
                                </div>
                                <div class="arrow">
                                    <a href="#"><span class="lnr text-white lnr-arrow-right"></span></a>
                                </div>
                                <div class="thumb">
                                    <a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comments-area">
                        <h4>{{$comments->count()}} Comments</h4>
                        @foreach($comments as $comment)
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user">
                                        <div class="comment_image float-left">
                                            <img style="width: 100%;height: 100%;" src="{{asset('/uploads/'.$comment->image)}}" alt="{{$comment->name}}">
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#">{{$comment->name}}</a></h5>
                                            <p class="date">{{$comment->created_at->diffForHumans()}} </p>
                                            <p class="comment pl-5">{!! $comment->comment !!} </p>
                                        </div>
                                    </div>
                                    <div class="reply-btn">
                                        <a href="" class="btn-reply text-uppercase">reply</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

{{--                        <div class="comment-list left-padding">--}}
{{--                            <div class="single-comment justify-content-between d-flex">--}}
{{--                                <div class="user justify-content-between d-flex">--}}
{{--                                    <div class="thumb">--}}
{{--                                        <img src="img/blog/c2.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="desc">--}}
{{--                                        <h5><a href="#">Elsie Cunningham</a></h5>--}}
{{--                                        <p class="date">December 4, 2017 at 3:12 pm </p>--}}
{{--                                        <p class="comment">--}}
{{--                                            Never say goodbye till the end comes!--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="reply-btn">--}}
{{--                                    <a href="" class="btn-reply text-uppercase">reply</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="comment-list left-padding">--}}
{{--                            <div class="single-comment justify-content-between d-flex">--}}
{{--                                <div class="user justify-content-between d-flex">--}}
{{--                                    <div class="thumb">--}}
{{--                                        <img src="img/blog/c3.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="desc">--}}
{{--                                        <h5><a href="#">Annie Stephens</a></h5>--}}
{{--                                        <p class="date">December 4, 2017 at 3:12 pm </p>--}}
{{--                                        <p class="comment">--}}
{{--                                            Never say goodbye till the end comes!--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="reply-btn">--}}
{{--                                    <a href="" class="btn-reply text-uppercase">reply</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="comment-list">--}}
{{--                            <div class="single-comment justify-content-between d-flex">--}}
{{--                                <div class="user justify-content-between d-flex">--}}
{{--                                    <div class="thumb">--}}
{{--                                        <img src="img/blog/c4.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="desc">--}}
{{--                                        <h5><a href="#">Maria Luna</a></h5>--}}
{{--                                        <p class="date">December 4, 2017 at 3:12 pm </p>--}}
{{--                                        <p class="comment">--}}
{{--                                            Never say goodbye till the end comes!--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="reply-btn">--}}
{{--                                    <a href="" class="btn-reply text-uppercase">reply</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="comment-list">--}}
{{--                            <div class="single-comment justify-content-between d-flex">--}}
{{--                                <div class="user justify-content-between d-flex">--}}
{{--                                    <div class="thumb">--}}
{{--                                        <img src="img/blog/c5.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="desc">--}}
{{--                                        <h5><a href="#">Ina Hayes</a></h5>--}}
{{--                                        <p class="date">December 4, 2017 at 3:12 pm </p>--}}
{{--                                        <p class="comment">--}}
{{--                                            Never say goodbye till the end comes!--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="reply-btn">--}}
{{--                                    <a href="" class="btn-reply text-uppercase">reply</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                    <div class="comment-form">
                        <h4>Leave a Reply</h4>
                        @guest
                            <h4 class="">
                                Please   <a href="{{route('login')}}">Login</a> First For The Comment . If You Have No Acoutn Then <a
                                    href="{{route('register')}}">Register</a> Now
                            </h4>
                        @endguest
                        @auth
                            <form action="{{route('frontend.comment.store')}}" method="post">
                                @csrf
                                <div class="form-group form-inline">
                                    <div class="form-group col-lg-6 col-md-6 name">
                                        <input type="text" name="name" class="form-control @error('name') border border-danger @enderror" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 email">
                                        <input type="email" name="email" class="form-control @error('email') border border-danger @enderror" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control mb-10 @error('comment') border border-danger @enderror" rows="5" name="comment" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                                </div>
                                <button type="submit" class="button submit_btn">Post Comment</button>
                            </form>
                        @endauth
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
                            <h4 class="single-sidebar-widget__title">Popular Post</h4>
                            <ul class="list">

                                <li>
                                    <a href="#">project</a>
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

@endsection
