@extends('backend.master')
@push('css')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <style>
        .bg-happy-fisher-active{
            background-image: linear-gradient(120deg, #ffa36d 0%, #a883ed 100%) !important;
        }
    </style>
@endpush
@section('content')

    <div class="app-main__outer">

        <!--  Main -->

        <div class="app-main__inner">
            <div class="app-page-title shadow">
                <div class="page-title-wrapper">
                    <div class="page-title-heading ">
                        <div class="page-title-icon">
                            <i class="fa fa-cog icon-gradient bg-mean-fruit"> </i>
                        </div>
                        <div>Site Settings
                            <div class="page-title-subheading">Your Site Setting
                            </div>
                        </div>
                    </div>
                    <div class="page-title-actions">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class=" col-md-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="main-card mb-3 card">
                                        @include('backend.includes.setting_menu')
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="card border border-dark">
                                        <div class="card-body">
                                            <div class="card-header">
                                                <h6 class="my-3">Logo Management Setting</h6>
                                            </div>
                                            <form action="{{route('backend.setting.published-logo')}}" method="post">
                                                @csrf
                                                <div class="row mb-3">
                                                    <div class="col-md-12 p-2">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" name="f_logo_image" {{ backendSetting('f_logo_image') == true ? 'checked' : ''}} class="custom-control-input form-control-lg" id="publishedFImageLogo">
                                                            <label class="custom-control-label" for="publishedFImageLogo">Frontend Image Logo Show For Check </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="row mb-3">
                                                    <div class="col-md-12 p-2">
                                                        <div class="custom-control custom-switch">
                                                            <input name="b_logo_image" type="checkbox" {{ backendSetting('f_logo_image') == true ? 'checked' : ''}} class="custom-control-input form-control-lg" id="publishedBImageLogo">
                                                            <label class="custom-control-label" for="publishedBImageLogo">Backend Image Logo Show For Check </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-12 p-2">
                                                        <button type="submit" class="btn btn-success">Update Change</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <hr/>

                                    <div class="card border border-dark">
                                        <div class="card-body">
                                            <div class="card-header">
                                                <h6 class="my-3">Backend Text Logo</h6>
                                            </div>
                                            <form action="{{route('backend.setting.appearancestore')}}" method="post">
                                                @csrf
                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <label for=""> Backend <code>Key  - (b_text_logo) </code></label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="b_text_logo" class="form-control" value="{{backendSetting('b_text_logo') ?backendSetting('b_text_logo'): old('b_text_logo')}}" placeholder="Backend Logo" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                            <div class="input-group-append">
                                                                <button type="submit" class="input-group-text btn" id="basic-addon2">Update Backend Text Logo</button>
                                                            </div>
                                                        </div>
                                                        @error('b_text_logo')
                                                        <small class="text-danger">
                                                            {{$message}}
                                                        </small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <hr/>

                                    <div class="card border border-dark">
                                        <div class="card-body">
                                            <div class="card-header">
                                                <h6 class="my-3">Frontend Text Logo</h6>
                                            </div>
                                            <form action="{{route('backend.setting.appearancestore-fotntend')}}" method="post">
                                                @csrf
                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <label for=""> Backend <code>Key  - (f_text_logo) </code></label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="f_text_logo" class="form-control" value="{{backendSetting('f_text_logo') ?backendSetting('f_text_logo'): old('f_text_logo')}}" placeholder="Frontend Text Logo" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                            <div class="input-group-append">
                                                                <button type="submit" class="input-group-text btn" id="basic-addon2">Update Frontend Text Logo</button>
                                                            </div>
                                                        </div>
                                                        @error('f_text_logo')
                                                        <small class="text-danger">
                                                            {{$message}}
                                                        </small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
@endpush
