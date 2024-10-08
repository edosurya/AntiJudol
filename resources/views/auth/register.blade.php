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
                        <h4 class="text-muted font-size-18 mb-1 text-center">Free Register</h4>
                        <p class="text-muted text-center">Get your free Lexa account now.</p>
                        <form class="form-horizontal mt-4" action="{{route('register')}}" id="submitForm">

                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                            </div>

                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                            </div>

                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation">Password Confirmation</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Enter password confirmation">
                            </div>

                            <div class="mb-3 row mt-4">
                                <div class="col-12 text-end">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="mt-5 text-center">
                <p>Already have an account ? <a href="{{route('login')}}" class="text-primary"> Login </a> </p>
                © <script>document.write(new Date().getFullYear())</script> Lexa <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
            </div>
        </div>
    </div>
</div>
@endsection