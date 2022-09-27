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
                        <div>Contracts Tables
                            <div class="page-title-subheading">Show The All Contracts And Messages
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
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Subjects</th>
                                    <th>Message</th>
                                    <th>Sanded At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contracts as $key => $contract)
                                    <tr>
                                        <th scope="row">{{$key + 1}}</th>
                                        <td>{{$contract->name}}</td>
                                        <td>{{$contract->email}}</td>
                                        <td>{{$contract->subject}}</td>
                                        <td>{!! Str::limit($contract->message,30) !!}</td>
                                        <td>{{$contract->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{route('backend.contract.show',$contract->id)}}" class="btn btn-info btn-sm">View</a>
                                            <form class="d-none" id="deleteBlog{{$contract->id}}" action="{{route("backend.comment.destroy",$contract->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a href="{{route('backend.contract.destroy',$contract->id)}}" onclick="event.preventDefault();document.getElementById('deleteBlog{{$contract->id}}').submit();" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                        <div class="card-footer">
                            {{$contracts->links()}}
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

