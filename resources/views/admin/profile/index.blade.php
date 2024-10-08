@extends('layouts.admin')

@section('title', 'Dashboard')

@push('css-plugin')
{{-- Form assets css --}}
<link rel="stylesheet" href="{{ asset('admin/assets/libs/toastr/toastr.min.css') }}" />
<link href="{{ asset('admin/assets/css/loading.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/assets/css/validation.css') }}" rel="stylesheet" type="text/css" />
{{-- end form assets css --}}
@endpush

@push('style')
@endpush


@section('breadcrumb')
    <h4>Dashboard</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Lexa</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
@endsection


@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Profile Information</h4>
            <p class="text-muted">Update your account's profile information and email address.</p>
        
            <div class="row">
                <div class="col-md-6">
                    <form action="{{route('admin.profile.update')}}" id="profileForm" method="POST">
                        @method('patch')
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{$user->name}}" autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email" value="{{$user->email}}">
                        </div>
                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    Save <i class="far fa-dot-circle"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Update Password</h4>
            <p class="text-muted">Ensure your account is using a long, random password to stay secure.</p>
        
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('password.update') }}" id="passwordForm" method="POST">
                        @method('put')
                        <div class="form-group mb-3">
                            <label for="current_password">Current Password</label>
                            <input type="text" class="form-control" name="current_password" id="current_password" placeholder="Enter Current Password" value="">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">New Password</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="Enter New Password" value="">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="text" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Enter Confirm Password" value="">
                        </div>
                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    Save <i class="far fa-dot-circle"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection

@push('js-plugin')
    {{-- // form ajax resource --}}
    <script src="{{ asset('admin/assets/js/helpers/submitForm.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/toastr/toastr.min.js') }}"></script>
    {{-- form ajax resource --}}
@endpush

@push('script')
<script>
    $(document).ready(function() {
        $('#profileForm').submit(function(event) {
            event.preventDefault();
            let form = $(this);
            submitForm({
                form: form,
                modal: null,
                datatable: null,
                customArray: []
            });
        });

        $('#passwordForm').submit(function(event) {
            event.preventDefault();
            let form = $(this);
            submitForm({
                form: form,
                modal: null,
                datatable: null,
                customArray: []
            });
        });
    });
</script>
@endpush
