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
                        <div>Category Tables
                            <div class="page-title-subheading"><code>Show The All Category</code>
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
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $key => $category)
                                    <tr>
                                        <th scope="row">{{$key + 1}}</th>
                                        <td>{{$category->name}}</td>
                                        <td>{{Str::limit($category->body,10)}}</td>
                                        <td>
                                            @if($category->status == 1)
                                                <span class="badge badge-info">Published</span>
                                            @else
                                                <span class="badge badge-danger">Unpublished</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-info btn-sm">Edit</a>
                                            <a href="" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                        <div class="card-footer">
                            {{$categories->links()}}
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

