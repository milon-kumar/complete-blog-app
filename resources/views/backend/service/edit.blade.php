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
                        <div>Services Update Form
                            <div class="page-title-subheading">Update {{$service->name}} Service Here
                            </div>
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <div class="d-inline-block dropdown">
                            <a href="{{route('backend.service.index')}}" class="btn-shadow btn btn-danger">
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
                            <form action="{{route('backend.service.update',$service->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="title">Service Name</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" value="{{$service->name}}"  name="name" class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="title">Service Description</label>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea name="body"
                                                  id="description"
                                                  rows="10"
                                                  style="width: 100%;height: 100%;"
                                                  placeholder="Blog Description"
                                                  class="form-control border border-dark @error('body') is-invalid @enderror">
                                            {!! $service->body !!}
                                        </textarea>
                                        @error('body')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="title">Service Image</label>
                                    </div>
                                    <div class="col-md-9">
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
                                    <div class="col-md-1">
                                        <img style="width: 65px;height: 65px;border-radius: 8px; box-shadow: 0 0 5px 2px;" src="{{$service->image}}" alt="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="title">Status</label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-check form-check-inline text-success font-weight-bold">
                                            <label class="form-check-label">
                                                <input {{$service->status == 1 ? 'checked' : ''}}   type="radio" name="status" value="1" class="bg-success form-check-input @error('status') is-invalid @enderror">
                                                Published
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline text-danger font-weight-bold">
                                            <label class="form-check-label">
                                                <input {{$service->status == 0 ? 'checked' : ''}} type="radio"  name="status" value="0" class="bg-danger form-check-input  @error('status') is-invalid @enderror">
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
                                        <button class="btn btn-success btn-lg" type="submit" value="">Update Service</button>
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
