@extends('layouts.master-without-nav')
@section('title')
    @lang('translation.Login')
@endsection
@section('content')
    <div class="home-btn d-none d-sm-block">
        <a href="{{ url('index') }}" class="text-dark"><i class="mdi mdi-home-variant h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">

                        <a href="{{ route('login') }}" class="mb-5 d-block auth-logo">
                            <span class="logo logo-dark">
                            <img src="{{ URL::asset('/assets/images/mgm.png') }}" alt="" height="150">
                        </span> 
                        <span class="logo logo-light">
                            <img src="{{ URL::asset('/assets/images/mgm.png') }}" alt="" height="150">
                        </span>  
                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                         @if(session()->has('success'))
                            <div class= "alert alert-success alert-dismissible fade show" role="alert">
                            {{session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                            @if(session()->has('loginError'))
                            <div class= "alert alert-danger alert-dismissible fade show" role="alert">
                            {{session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Sistem Manajemen IT MGM</h5>
                                <p class="text-muted">Sign in to continue.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form action="{{ route('login-auth') }}" method="post">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email address</label>
                                        <input type="email" name= email class="form-control @error ('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{old ('email')}}"> 
                                        @error('email')
                                    </div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                    @enderror
                                    </div>

                                    {{-- <div class="mb-3">
                                        <div class="float-end">
                                            <a href="auth-recoverpw" class="text-muted">Forgot password?</a>
                                        </div> --}}

                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" name= "password"class="form-control" id="password"
                                            placeholder="Enter password" required>
                                    </div>

                                    {{-- <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="auth-remember-check">
                                        <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                    </div> --}}

                                    <div class="mt-3 text-end">
                                        <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Log
                                            In</button>
                                    </div>



                                    {{-- <div class="mt-4 text-center">
                                        <div class="signin-other-title">
                                            <h5 class="font-size-14 mb-3 title">Sign in with</h5>
                                        </div>


                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="javascript:void()"
                                                    class="social-list-item bg-primary text-white border-primary">
                                                    <i class="mdi mdi-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript:void()"
                                                    class="social-list-item bg-info text-white border-info">
                                                    <i class="mdi mdi-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript:void()"
                                                    class="social-list-item bg-danger text-white border-danger">
                                                    <i class="mdi mdi-google"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div> --}}

                                    <div class="mt-4 text-center">
                                        <p class="mb-0">Don't have an account ? <a href="{{ route('register') }}">
                                            Register</a></p>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <p>© <script>
                                document.write(new Date().getFullYear())

                            </script> ITMGM. Created with <i class="mdi mdi-heart text-danger"></i> by Bagus Setyawan</p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection
