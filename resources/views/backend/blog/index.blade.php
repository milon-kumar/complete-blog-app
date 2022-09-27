@extends('backend.master')

@section('content')

    <div class="app-main__outer">

       <!--  Main -->

        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                            </i>
                        </div>
                        <div>Blogs Tables
                            <div class="page-title-subheading">Show The All Blog
                            </div>
                        </div>
                    </div>
                    <div class="page-title-actions">
{{--                        <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">--}}
{{--                            <i class="fa fa-star"></i>--}}
{{--                        </button>--}}
                        <div class="d-inline-block dropdown">
                            <a href="{{route('backend.blog.create')}}" class="btn-shadow btn btn-info">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-plus-circle fa-w-20"></i>
                                </span>
                                Add blog
                            </a>
                        </div>
                    </div>    </div>
            </div>            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <table class="mb-0 table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>View Count</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blogs as $key => $blog)
                                    <tr>
                                        <th scope="row">{{$key + 1}}</th>
                                        <td>{{$blog->title}}</td>
                                        <td>{{$blog->category->name}}</td>
                                        <td>
                                            <img class="img-fluid" style="width: 65px; height: 65px; object-fit: cover; border-radius: 8px; overflow: hidden;" src="{{asset('uploads/'.$blog->image)}}" alt="{{Str::limit($blog->slug,2)}}">
                                        </td>
                                        <td>{{$blog->view_count}}</td>
                                        <td>
                                            @if($blog->status == 1)
                                                <span class="badge badge-info">Published</span>
                                            @else
                                                <span class="badge badge-danger">Unpublished</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('backend.blog.edit',$blog->id)}}" class="btn btn-info btn-sm">Edit</a>
                                            <form class="d-none" id="deleteBlog{{$blog->id}}" action="{{route("backend.blog.destroy",$blog->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a href="{{route('backend.blog.destroy',$blog->id)}}" onclick="event.preventDefault();document.getElementById('deleteBlog{{$blog->id}}').submit();" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                        <div class="card-footer">
                            {{$blogs->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>


       <!--  Main -->

        {{--            footer--}}
        @include('backend.includes.footer')
        {{--            footer--}}
    </div>

@endsection

