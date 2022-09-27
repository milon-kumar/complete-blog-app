@extends('frontend.master')

@push('css')
    <style>
        .hero-banner {
            position: relative;
            background: url({{asset('/')}}assets/frontend/img/banner/hero-banner.png) left center no-repeat;
            background-size: cover;
            height: 200px;
            z-index: 1
        }
    </style>
@endpush

@section('content')
    <main class="site-main">
        <!--================ Hero sm Banner start =================-->
        <section class="mb-8px">
            <div class="container">
                <div class="hero-banner hero-banner--sm">
                    <div class="hero-banner__content">
                        <h1>Dashbaord</h1>
                        <nav aria-label="breadcrumb" class="banner-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!--================ Hero sm Banner end =================-->


        <!--================ Start Blog Post Area =================-->
        <section class="blog-post-area section-margin">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        @include('frontend.includes.dashboard_nav')
                    </div>
                    <div class="col-md-10">
                        <nav>
                            @include('frontend.includes.settingmennu')
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form id="deleteForm" action="{{route('frontend.delete-account')}}" class="form-contact contact_form" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="form-group">
                                                        <label for="">Email Address</label>
                                                        <input class="form-control border border-dark @error('email') border border-danger @enderror" name="email" id="email" type="email" placeholder="Enter Email Address">
                                                        @error('email')
                                                        <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Input Password</label>
                                                        <input class="form-control border border-dark @error('password') border border-danger @enderror" name="password" id="password" type="password" placeholder="Enter Correct Password">
                                                        @error('password')
                                                        <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group text-center text-md-right mt-3">
                                                        <button onclick="deleteAcount(this);" class="button button--active button-contactForm">Delete My Account</button>
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
        </section>
        <!--================ End Blog Post Area =================-->
    </main>
@endsection

@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteAcount(e) {
            event.preventDefault();
            $form = document.getElementById('deleteForm');
            Swal.fire({
                title: 'Are You Sure ? Your Wont To Delete Your Account !!! ',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {
                if (result.isConfirmed) {
                    $form.submit();
                } else if (result.isDenied) {
                    //Swal.fire('Changes are not saved', '', 'info')
                }
            })

        }
    </script>
@endpush
