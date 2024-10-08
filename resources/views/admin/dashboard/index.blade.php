@extends('layouts.admin')

@section('title', 'Dashboard')

@section('style')
@endsection


@section('breadcrumb')
    <h4>Dashboard</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
        <li class="breadcrumb-item active">Index</li>
    </ol>
@endsection


@section('content')
<div class="row">
    <div class="col-sm-12 card">
        <div class="card-body">
            <h3>Hello, Admin</h3>
        </div>
    </div>
     <div class="col-xl-12 col-sm-12">
        <div class="card mini-stat bg-secondary">
            <div class="card-body mini-stat-img">
                <div class="text-white">
                    <h6 class="text-uppercase mb-3 font-size-16 text-white">Total Participant</h6>
                    <h2 class="mb-4 text-white">{{ $participant_total }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->



@endsection


@push('js-plugin')
@endpush

@push('script')
<script>
</script>
@endpush
