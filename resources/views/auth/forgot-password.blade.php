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
                        <h4 class="text-muted font-size-18 mb-1 text-center">Forgot Password</h4>
                        <p class="text-muted text-center">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                        
                        <div class="alert alert-success alert-message" style="display:none"></div>

                        <form class="form-horizontal mt-4" action="{{ route('password.email') }}" method="post" id="resetPasswordForm">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
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

@push('script')
<script>
    $(document).ready(function() {
        $('#resetPasswordForm').submit(function(event) {
            event.preventDefault();
            $(document).find('.alert-message').hide();
            let form = $(this);
            submitForm({
                form: form,
                modal: null,
                datatable: null,
                customArray: []
            }).then ((res) => {
                //to handle reset password alert
                if(res.success && res.alert_text){
                    $(document).find('.alert-message').html(res.alert_text).show();
                }
            });
        });
    });
</script>
    
@endpush
