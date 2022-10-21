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
                        <div>Blogs Create Form
                            <div class="page-title-subheading">Create A New Blog Here
                            </div>
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <div class="d-inline-block dropdown">
                            <a href="{{route('backend.blog.index')}}" class="btn-shadow btn btn-danger">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-arrow-left fa-w-20"></i>
                                    Go Back
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('backend.blog.store')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="title">Blog Title</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text"  name="title" class="form-control @error('title') is-invalid @enderror">
                                        @error('title')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="title">Select Category</label>
                                    </div>
                                    <div class="col-md-10">
                                       <select class="multi-select form-control @error('category_id[]') is-invalid @enderror" multiple min="5" name="category_id[]">
                                           @if($categories->count() > 0)
                                               <option>Select Category</option>
                                               @foreach($categories as $category)
                                                   <option value="{{$category->id}}">{{$category->name}}</option>
                                               @endforeach
                                           @else
                                           No Category Found
                                           @endif

                                           @error('category_id[]')
                                           <small class="text-danger">{{$message}}</small>
                                           @enderror
                                       </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="title">Select Tags</label>
                                    </div>
                                    <div class="col-md-10">
                                       <select class="multi-select form-control @error('tag_id[]') is-invalid @enderror" multiple min="5" name="tag_id[]">
                                           @if($tags->count() > 0)
                                               <option>Select Category</option>
                                               @foreach($tags as $tag)
                                                   <option value="{{$tag->id}}">{{$tag->name}}</option>
                                               @endforeach
                                           @else
                                           No Tags Found
                                           @endif

                                           @error('tag_id[]')
                                           <small class="text-danger">{{$message}}</small>
                                           @enderror
                                       </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="title">Blog Description</label>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea name="description"
                                                  id="description"
                                                  rows="10"
                                                  style="width: 100%;height: 100%;"
                                                  placeholder="Blog Description"
                                                  class="form-control border border-dark @error('description') is-invalid @enderror">
                                        </textarea>
                                        @error('description')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="title">Blog Image</label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror">
                                                <label class="custom-file-label">Choose file</label>

                                                @error('image')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="title">Status</label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-check form-check-inline text-success font-weight-bold">
                                            <label class="form-check-label">
                                                <input  type="radio" name="status" value="1" class="bg-success form-check-input @error('status') is-invalid @enderror">
                                                Published
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline text-danger font-weight-bold">
                                            <label class="form-check-label">
                                                <input type="radio"  name="status" value="0" class="bg-danger form-check-input  @error('status') is-invalid @enderror">
                                                Unpublished
                                            </label>
                                        </div>
                                        @error('status')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-2">

                                    </div>
                                    <div class="col-md-10">
                                        <button class="btn btn-success btn-lg" type="submit" value="">Save Blog</button>
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.multi-select').select2();
        });

        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush
