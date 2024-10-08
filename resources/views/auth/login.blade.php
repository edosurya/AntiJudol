@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="card-body pt-0">

                        <h3 class="text-center mt-5 mb-4">
                            <a href="index.html" class="d-block auth-logo">
                                <!-- <img src="{{ asset('frontend/images/used/logo/favicon.png') }}" alt="" height="30" class="auth-logo-dark"> -->
                                <!-- <img src="{{ asset('frontend/images/used/logo/favicon.png') }}" alt="" height="30" class="auth-logo-light"> -->
                            </a>
                        </h3>

                        <div class="p-3">
                            <h4 class="text-muted font-size-18 mb-1 text-center">Welcome Back !</h4>
                            <p class="text-muted text-center">Sign in to continue.</p>
                            <form class="form-horizontal mt-4" action="{{ route('admin.login') }}" method="post" id="submitForm">
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                                </div>
                                <div class="mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                </div>
                                <div class="mb-3 row mt-4">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customControlInline">
                                            <label class="form-check-label" for="customControlInline">Remember me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </div>
                                {{-- <div class="form-group mb-0 row">
                                <div class="col-12 mt-4">
                                    <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                </div>
                            </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    {{-- <p>Don't have an account ? <a href="{{ route('register') }}" class="text-primary"> Signup Now </a></p> --}}
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> Copyright © 2024. All rights reserved.
                </div>
            </div>
        </div>
    </div>
@endsection
