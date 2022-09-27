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
                        <div>Comment Edit
                            <div class="page-title-subheading">Edit Comment Here
                            </div>
                        </div>
                    </div>
{{--                    <div class="page-title-actions">--}}
{{--                        <div class="d-inline-block dropdown">--}}
{{--                            <a href="{{route('backend.comment.create')}}" class="btn-shadow btn btn-info">--}}
{{--                                <span class="btn-icon-wrapper pr-2 opacity-7">--}}
{{--                                    <i class="fa fa-plus-circle fa-w-20"></i>--}}
{{--                                </span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('backend.comment.update',$comment->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="title">Name</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" value="{{$comment->name}}" name="name" class="form-control">
                                        <input type="hidden"  value="{{$comment->user_id}}" name="user_id" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="title">Comment</label>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea name="comment"
                                                  id="description"
                                                  rows="10"
                                                  style="width: 100%;height: 100%;"
                                                  placeholder="Blog Description"
                                                  class="form-control border border-dark @error('description') is-invalid @enderror">
                                            {!! $comment->comment !!}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">

                                    </div>
                                    <div class="col-md-10">
                                        <button class="btn btn-success btn-lg" type="submit" value="">Update Comment</button>
                                    </div>
                                </div>


                            </form>
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

@push('js')
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush
