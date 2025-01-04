@extends('layouts.admin')

@section('title', 'Dashboard')

@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css" rel="stylesheet" type="text/css" />

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
    <div class="col-sm-12 card" style="background: transparent;">
        <div class="card-body">
        <form action="{{ route('admin.dashboard.filter') }}" method="post" enctype="multipart/form-data">
            <div class="row d-flex justify-content-end gap-2 gap-sm-0">
                    <div class="col-12 col-sm-1 mt-2">
                        Date Filter
                    </div>
                    @csrf
                    <div class="col-lg-2 col-sm-5">
                        <input id="startDate" class="form-control" type="date" name="startDate" value="{{ @$startDate }}" required />
                    </div>
                    <div class="col-lg-2 col-sm-5">
                        <input id="endDate" class="form-control" type="date" name="endDate" value="{{ @$endDate }}" required />
                    </div>
                    <div class="col-2 mt-1 text-right d-flex justify-content-end gap-2 ms-n4">
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-sm">Reset</a>
                    </div>        
            </div>
        </form>

        </div>
    </div>
     <div class="col-xl-4 col-sm-4">
        <div class="card mini-stat bg-warning">
            <div class="card-body mini-stat-img">
                <div class="text-white">
                    <h6 class="text-uppercase mb-3 font-size-16 text-white">Participant</h6>
                    <h2 class="mb-4 text-white">{{ $participants }}</h2>
                </div>
            </div>
        </div>
    </div>
     <div class="col-xl-4 col-sm-4">
        <div class="card mini-stat bg-warning">
            <div class="card-body mini-stat-img">
                <div class="text-white">
                    <h6 class="text-uppercase mb-3 font-size-16 text-white">Hashtag</h6>
                    <h2 class="mb-4 text-white">@if (@$hashtags->total) {{$hashtags->total }} @else 0 @endif</h2>
                </div>
            </div>
        </div>
    </div>
     <div class="col-xl-4 col-sm-4">
        <div class="card mini-stat bg-warning">
            <div class="card-body mini-stat-img">
                <div class="text-white">
                    <h6 class="text-uppercase mb-3 font-size-16 text-white">Share</h6>
                    <h2 class="mb-4 text-white">{{ $shares }}</h2>
                </div>
            </div>
        </div>
    </div>
     <div class="col-xl-6 col-sm-6">
        <div class="card mini-stat bg-secondary">
            <div class="card-body mini-stat-img">
                <div class="text-white">
                    <h6 class="text-uppercase mb-3 font-size-16 text-white">Total Support</h6>
                    <h2 class="mb-4 text-white">{{ $support_total }}</h2>
                </div>
            </div>
        </div>
    </div>
     <div class="col-xl-6 col-sm-6">
        <div class="card mini-stat bg-secondary">
            <div class="card-body mini-stat-img">
                <div class="text-white">
                    <h6 class="text-uppercase mb-3 font-size-16 text-white">Total Participant</h6>
                    <h2 class="mb-4 text-white">{{ $participant_total }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="py-1">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-uppercase font-size-16">Total Partisipant By Day</h6>
                </div>
                <div class="card-body">
                    <canvas id="chLine"></canvas>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- end row -->

 

@endsection


@push('js-plugin')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
@endpush

@push('script')
<script>
 

var chLine = document.getElementById("chLine");
var chartData = {
  labels: {!! $label !!},
  datasets: [
    {
      data: {{ $data }},
      backgroundColor: "transparent",
      borderColor: "#007bff",
      borderWidth: 4,
      pointBackgroundColor: "#007bff"
    }
  ]
};
if (chLine) {
  new Chart(chLine, {
    type: "line",
    data: chartData,
    options: {
      scales: {
        xAxes: [
          {
            ticks: {
              beginAtZero: true
            }
          }
        ],
        yAxes: [
          {
            ticks: {
              beginAtZero: true
            }
          }
        ]
      },
      legend: {
        display: false
      },
      responsive: true
    }
  });
}


</script>
@endpush
