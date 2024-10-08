@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card overflow-hidden">
                <div class="card-body pt-0">

                    <h3 class="text-center mt-5 mb-4">
                        <a href="index.html" class="d-block auth-logo">
                            <img src="{{asset('admin/assets/images/logo-dark.png')}}" alt="" height="30" class="auth-logo-dark">
                            <img src="{{asset('admin/assets/images/logo-light.png')}}" alt="" height="30" class="auth-logo-light">
                        </a>
                    </h3>

                    <div class="p-3">
                        <h4 class="text-muted font-size-18 mb-1 text-center">Reset Password</h4>
                        <p class="text-muted text-center">Please insert yout new password</p>
                        <form class="form-horizontal mt-4" action="{{ route('password.store') }}" method="post" id="submitForm">
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{ $request->email }}">
                            </div>

                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your new password">
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation">Password Confirmation</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter your new password">
                            </div>

                            <div class="mb-3 row mt-4">
                                <div class="col-12 text-end">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Send Password Reset Link</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="mt-5 text-center">
                © <script>document.write(new Date().getFullYear())</script> Lexa <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
            </div>
        </div>
    </div>
</div>
@endsection