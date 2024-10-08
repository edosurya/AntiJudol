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

                    <div>
                        <h4 class="text-muted font-size-18 mb-1 text-center">Verification Email</h4>
                        <p class="text-muted text-center">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
                        <form class="form-horizontal mt-4" action="{{ route('verification.send') }}" method="post" id="submitForm">
                            <div class="mb-3">
                                <button class="btn w-100 btn-primary w-md waves-effect waves-light" type="submit">Resend Verification Email</button>
                            </div>
                        </form>
                    </div>

                    <form action="{{ route('logout') }}" method="POST" id="logout">@csrf
                        <button class="btn btn-danger w-100" type="submit">{{ __('Logout') }}</button><br>
                    </form>
                </div>
            </div>
            <div class="mt-5 text-center">
                © <script>document.write(new Date().getFullYear())</script> Lexa <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
            </div>
        </div>
    </div>
</div>
@endsection