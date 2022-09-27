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
                        <div>Comments Tables
                            <div class="page-title-subheading">Show The All Comments
                            </div>
                        </div>
                    </div>
                    <div class="page-title-actions">
                        {{--                        <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">--}}
                        {{--                            <i class="fa fa-star"></i>--}}
                        {{--                        </button>--}}
{{--                        <div class="d-inline-block dropdown">--}}
{{--                            <a href="{{route('backend.comment.create')}}" class="btn-shadow btn btn-info">--}}
{{--                                <span class="btn-icon-wrapper pr-2 opacity-7">--}}
{{--                                    <i class="fa fa-plus-circle fa-w-20"></i>--}}
{{--                                </span>--}}
{{--                                Create Comment--}}
{{--                            </a>--}}
{{--                        </div>--}}
                    </div>    </div>
            </div>            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <table class="mb-0 table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>User</th>
                                    <th>Post Image</th>
                                    <th>Comment</th>
                                    <th>View Count</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $key => $comment)
                                    <tr>
                                        <th scope="row">{{$comment->iteration}}</th>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="widget-content-left">
                                                            <img width="40" height="40" class="rounded-circle" src="{{asset('/uploads/'.optional($comment->user)->image)}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">{{optional($comment->user)->name}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="widget-content-left">
                                                <img width="40" height="40" class="rounded-circle" src="{{asset('/uploads/'.optional($comment->blog)->image)}}" alt="">
                                            </div>
                                        </td>
                                        <td>{!! Str::limit($comment->comment,30) !!}</td>
                                        <td>{{ optional($comment->blog)->view_count }}</td>
                                        <td>
                                            @if($comment->status == 1)
                                                <span class="badge badge-info">Published</span>
                                            @else
                                                <span class="badge badge-danger">Unpublished</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('backend.comment.edit',$comment->id)}}" class="btn btn-info btn-sm">Edit</a>
                                            <form class="d-none" id="deleteBlog{{$comment->id}}" action="{{route("backend.comment.destroy",$comment->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a href="{{route('backend.comment.destroy',$comment->id)}}" onclick="event.preventDefault();document.getElementById('deleteBlog{{$comment->id}}').submit();" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                        <div class="card-footer">
                            {{$comments->links()}}
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

