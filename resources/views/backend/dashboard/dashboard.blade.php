@extends('backend.master')

@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="row">
                <div class="col-md-4 col-xl-3">
                    <div class="card mb-3 widget-content bg-midnight-bloom">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Total User</div>
                                <div class="widget-subheading"><i class="fa fa-user-friends"></i></div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>{{$user}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="card mb-3 widget-content bg-midnight-bloom">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Active User</div>
                                <div class="widget-subheading"><i class="fa fa-user-friends"></i></div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white">
                                    <span>
                                        @if(session()->has('activeUsers') && session()->has('activeUserCount'))
                                            {{session()->get('activeUserCount') > 0 ? session()->get('activeUserCount') : '0' }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="card mb-3 widget-content bg-midnight-bloom">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Total Category</div>
                                <div class="widget-subheading"><i class="fa fa-user-friends"></i></div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>{{$totalCategory}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="card mb-3 widget-content bg-midnight-bloom">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Total Tags</div>
                                <div class="widget-subheading"><i class="fa fa-tags"></i></div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>{{$totalTags}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="card mb-3 widget-content bg-midnight-bloom">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Total Subscribers</div>
                                <div class="widget-subheading"><i class="fa fa-tags"></i></div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>{{$totalSubscriber}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="card mb-3 widget-content bg-arielle-smile">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Total Blog</div>
                                <div class="widget-subheading"><i class="fa fa-blog"></i></div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>{{$totalBlog}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="card mb-3 widget-content bg-arielle-smile">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Total Published Blog</div>
                                <div class="widget-subheading"><i class="fa fa-arrow-up"></i></div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>{{$totalPublishedBlog}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="card mb-3 widget-content bg-arielle-smile">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Total Unpublished Blog</div>
                                <div class="widget-subheading"><i class="fa fa-arrow-down"></i></div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>{{$totalUnpublishedBlog}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="card mb-3 widget-content bg-arielle-smile">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Total Comments</div>
                                <div class="widget-subheading"><i class="fa fa-comment"></i></div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>{{$totalConnents}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="mb-3 card">
                        <div class="card-header-tab card-header-tab-animation card-header">
                            <div class="card-header-title">
                                <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                Latest Comments
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tabs-eg-77">
                                    <div class="scroll-area-sm">
                                        <div class="scrollbar-container">
                                            <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                                @forelse($latestComments as $comment)
                                                    <li class="list-group-item">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <img width="42" class="rounded-circle"
                                                                         src="{{asset('/')}}assets/backend/assets/images/avatars/9.jpg" alt="">
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">{{optional($comment->user)->name}}</div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="font-size-xlg text-muted">
                                                                        <small>{!! Str::limit($comment->comment,25) !!}</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <h6>No Comment Found</h6>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title">
                                <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                                Latest Category
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="tab-eg-55">
                                <div class="pt-2 card-body">
                                    <div class="row">
                                        <div class="col">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#SL</th>
                                                        <th>Name</th>
                                                        <th>Has Blog</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($latestCategory as $key => $category)
                                                    <tr>
                                                        <td>{{$key + 1}}</td>
                                                        <td>{{$category->name}}</td>
{{--                                                        <td>{{$category->blogs->count()}}</td>--}}
                                                        <td>
                                                            @if($category->status == 1)
                                                                <div class="mb-2 mr-2 badge badge-pill badge-info">Published</div>
                                                            @else
                                                                <div class="mb-2 mr-2 badge badge-pill badge-danger">Unpublished</div>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @empty
                                                        <h6>No Category Found</h6>
                                                    @endforelse
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
{{--            <div class="row">--}}
{{--                <div class="col-md-6 col-xl-4">--}}
{{--                    <div class="card mb-3 widget-content">--}}
{{--                        <div class="widget-content-outer">--}}
{{--                            <div class="widget-content-wrapper">--}}
{{--                                <div class="widget-content-left">--}}
{{--                                    <div class="widget-heading">Total Orders</div>--}}
{{--                                    <div class="widget-subheading">Last year expenses</div>--}}
{{--                                </div>--}}
{{--                                <div class="widget-content-right">--}}
{{--                                    <div class="widget-numbers text-success">1896</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-6 col-xl-4">--}}
{{--                    <div class="card mb-3 widget-content">--}}
{{--                        <div class="widget-content-outer">--}}
{{--                            <div class="widget-content-wrapper">--}}
{{--                                <div class="widget-content-left">--}}
{{--                                    <div class="widget-heading">Products Sold</div>--}}
{{--                                    <div class="widget-subheading">Revenue streams</div>--}}
{{--                                </div>--}}
{{--                                <div class="widget-content-right">--}}
{{--                                    <div class="widget-numbers text-warning">$3M</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-6 col-xl-4">--}}
{{--                    <div class="card mb-3 widget-content">--}}
{{--                        <div class="widget-content-outer">--}}
{{--                            <div class="widget-content-wrapper">--}}
{{--                                <div class="widget-content-left">--}}
{{--                                    <div class="widget-heading">Followers</div>--}}
{{--                                    <div class="widget-subheading">People Interested</div>--}}
{{--                                </div>--}}
{{--                                <div class="widget-content-right">--}}
{{--                                    <div class="widget-numbers text-danger">45,9%</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="d-xl-none d-lg-block col-md-6 col-xl-4">--}}
{{--                    <div class="card mb-3 widget-content">--}}
{{--                        <div class="widget-content-outer">--}}
{{--                            <div class="widget-content-wrapper">--}}
{{--                                <div class="widget-content-left">--}}
{{--                                    <div class="widget-heading">Income</div>--}}
{{--                                    <div class="widget-subheading">Expected totals</div>--}}
{{--                                </div>--}}
{{--                                <div class="widget-content-right">--}}
{{--                                    <div class="widget-numbers text-focus">$147</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="widget-progress-wrapper">--}}
{{--                                <div class="progress-bar-sm progress-bar-animated-alt progress">--}}
{{--                                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="54"--}}
{{--                                         aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>--}}
{{--                                </div>--}}
{{--                                <div class="progress-sub-label">--}}
{{--                                    <div class="sub-label-left">Expenses</div>--}}
{{--                                    <div class="sub-label-right">100%</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">Most View And Popular Blog</div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#SL</th>
                                    <th>Image</th>
                                    <th>Blog Title</th>
                                    <th>Simple Description </th>
                                    <th class="text-center">View Count</th>
                                    <th class="text-center">Comment Count</th>

                                </tr>
                                </thead>
                                <tbody>
                                @forelse($mostViewBlog as $key => $blog)
                                    <tr>
                                        <td class="text-center text-muted">{{$key+1}}</td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="widget-content-left">
                                                            <img width="40" height="40" class="rounded-circle"
                                                                 src="{{asset('/uploads/'.$blog->image)}}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">{{$blog->title}}</td>
                                        <td class="text-center">{{Str::limit($blog->description,15)}}</td>
                                        <td class="text-center">{{$blog->view_count}}</td>
                                        <td class="text-center">{{optional($blog->comments)->count()}}</td>
                                        <td class="text-center">
                                            <button type="button" id="PopoverCustomT-1"
                                                    class="btn btn-primary btn-sm">Details</button>
                                        </td>
                                    </tr>
                                @empty
                                    <h6>No Blog Found ...!!!</h6>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--            footer--}}
        @include('backend.includes.footer')
        {{--            footer--}}
    </div>
@endsection
