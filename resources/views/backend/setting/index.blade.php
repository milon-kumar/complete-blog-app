@extends('backend.master')
@push('css')
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
                   <div class="card">
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
                                              <h6 class="my-3">Site About Settings</h6>
                                          </div>
                                           <form action="{{route('backend.setting.generalstore')}}" method="post">
                                              @csrf
                                               <div class="row mb-3">
                                                   <div class="col-md-2">
                                                       <label for="title">Site Title </label>
                                                   </div>
                                                   <div class="col-md-10">
                                                       <label for=""><code>Key - (site_title) </code></label>
                                                       <input type="text" name="site_title" value="{{backendSetting('site_title') ?backendSetting('site_title'): old('site_title')}}" class="form-control @error('site_title') is-invalid @enderror">
                                                       @error('site_title')
                                                       <small class="text-danger">
                                                           {{$message}}
                                                       </small>
                                                       @enderror
                                                   </div>
                                               </div>

                                               <div class="row mb-3">
                                                   <div class="col-md-2">
                                                       <label for="title">Site Description</label>
                                                   </div>
                                                   <div class="col-md-10">
                                                       <label for=""><code>key - (site_description)</code></label>
                                                       <textarea class="form-control @error('site_description') is-invalid @enderror" name="site_description" id="" cols="30" rows="4">
                                                           {!! backendSetting('site_description') ?backendSetting('site_description'): old('site_description') !!}
                                                       </textarea>
                                                       @error('site_description')
                                                       <small class="text-danger">
                                                           {{$message}}
                                                       </small>
                                                       @enderror
                                                   </div>
                                               </div>

                                               <div class="row mb-3">
                                                   <div class="col-md-2">
                                                       <label for="title">Site Address</label>
                                                   </div>
                                                   <div class="col-md-10">
                                                       <label for=""><code>key - (site_address)</code></label>
                                                       <textarea class="form-control @error('site_address') is-invalid @enderror" name="site_address" id="" cols="30" rows="4">
                                                            {!! backendSetting('site_address') ?backendSetting('site_address'): old('site_address') !!}
                                                       </textarea>
                                                       @error('site_address')
                                                       <small class="text-danger">
                                                           {{$message}}
                                                       </small>
                                                       @enderror
                                                   </div>
                                               </div>

                                               <div class="row mb-3">
                                                   <div class="col-md-2">
                                                       <label for="title">Site Email</label>
                                                   </div>
                                                   <div class="col-md-10">
                                                       <label for=""><code>Key - (site_email) </code></label>
                                                       <input type="text" value="{!! backendSetting('site_email') ?backendSetting('site_email'): old('site_email') !!}" name="site_email" class="form-control @error('site_email') is-invalid @enderror">
                                                       @error('site_email')
                                                       <small class="text-danger">
                                                           {{$message}}
                                                       </small>
                                                       @enderror
                                                   </div>
                                               </div>

                                               <div class="row mb-3">
                                                   <div class="col-md-2">
                                                       <label for="title">Site Phone Number</label>
                                                   </div>
                                                   <div class="col-md-10">
                                                       <label for=""><code>Key - (site_phone_number) </code></label>
                                                       <input type="text" value="{!! backendSetting('site_phone_number') ?backendSetting('site_phone_number'): old('site_phone_number') !!}" name="site_phone_number" class="form-control @error('site_phone_number') is-invalid @enderror">

                                                       @error('site_phone_number')
                                                       <small class="text-danger">
                                                           {{$message}}
                                                       </small>
                                                       @enderror
                                                   </div>
                                               </div>

                                               <div class="row mb-3">
                                                   <div class="col-md-2">
                                                       <label for="title">Site Others Description</label>
                                                   </div>
                                                   <div class="col-md-10">
                                                       <label for=""><code>Key - (site_other_description) </code></label>
                                                       <input type="text" value="{!! backendSetting('site_other_description') ?backendSetting('site_other_description'): old('site_other_description') !!}" name="site_other_description" class="form-control @error('site_other_description') is-invalid @enderror">

                                                           @error('site_other_description')
                                                               <small class="text-danger">
                                                                   {{$message}}
                                                               </small>
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
    <script src="{{asset('assets/backend/dropify.js')}}"></script>
    <script src="{{asset('assets/backend/jquery-3.6.1.min.js')}}"></script>

    <script>
        $('.dropify').dropify();
    </script>
@endpush
