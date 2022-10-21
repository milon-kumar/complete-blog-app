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
                        <div>Tag Tables
                            <div class="page-title-subheading">Show The All Tag
                            </div>
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <div class="d-inline-block dropdown">
                            <a href="{{route('backend.tags.create')}}" class="btn-shadow btn btn-info">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-plus-circle fa-w-20"></i>
                                </span>
                                Add Tag
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <table class="mb-0 table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Name</th>
                                    <th>Has Blog</th>
                                    <th>Added By</th>
                                    <th>Body</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $key => $tag)
                                    <tr>
                                        <th scope="row">{{$key + 1}}</th>
                                        <td>{{Str::limit($tag->name,20)}}</td>
                                        <td class="text-center"> {{$tag->blogs->count()}}</td>
                                        <td>{{$tag->user->name}}</td>
                                        <td>{!! Str::limit( $tag->body,10) !!}</td>
                                        <td class="text-center">
                                            @if($tag->status == 1)
                                                <span class="badge badge-info">Published</span>
                                            @else
                                                <span class="badge badge-danger">Unpublished</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('backend.tags.edit',$tag->id)}}" class="btn btn-info btn-sm">Edit</a>
                                            <form class="d-none" id="deleteBlog{{$tag->id}}" action="{{route("backend.tags.destroy",$tag->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a href="{{route('backend.tags.destroy',$tag->id)}}" onclick="event.preventDefault();document.getElementById('deleteBlog{{$tag->id}}').submit();" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                        <div class="card-footer">
                            {{$tags->links()}}
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

