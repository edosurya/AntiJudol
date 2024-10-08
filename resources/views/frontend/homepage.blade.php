@extends('layouts.frontend')

@section('title', 'Homepage')
@section('meta_title', 'Indosat')
@section('meta_description','Indosat')

    @push('css-plugin')
        @vite(['resources/js/app.js'])
        <link href="{{ asset('frontend/css/homepage.css') }}" rel="stylesheet" type="text/css" id="bootstrap">\
    @endpush

    @push('style')
    @endpush


@section('content')

      <section class="bg-100 py-7 section-has-bg" style="background-image: url({{ asset('frontend/images/webp/bg-section-category.webp') }});" id="form">
        <div class="container-lg mb-5">
          <div class="row">
            <div class="col-12 col-md-7 mb-5">
              <p class="text-white vivo_heavy text-uppercase fs-term-condition" >SYARAT & KETENTUAN</p>
                <div class="fs-term-condition-other">
                <p class="text-white"> Untuk informasi lebih lanjut, silakan klik tautan berikut ini:</p>
                </div>
            </div>
            <div class="col-12 col-md-5 mb-3">
              <p class="text-white vivo_heavy text-uppercase mb-3 fs-title-registrasi_form" >REGISTRASI SEKARANG</p>
              
                <div class="alert alert-success invalid-feedback fw-bold mb-4" id="successMessage" role="alert"></div>
                <div class="alert alert-danger invalid-feedback fw-bold mb-4" id="dzErrorMessage" role="alert">
                </div>

                <form id="submitForm" enctype="multipart/form-data" class="position-relative">

                    <div class="row text-white">
                        <div class="mb-3 col-md-12">
                            <label class="vivo_bold fs-label" for="fullname">
                                Nama
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="fullname" id="fullname"
                                placeholder="Nama Lengkap">
                            <label class="invalid-feedback fw-bold mb-3" id="fnErrorMessage"></label>
                        </div>

                        <div class="mb-3 col-md-12">
                            <label class="vivo_bold fs-label" for="email">
                                Email
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="email" id="email"
                                placeholder="Email">
                            <label class="invalid-feedback fw-bold mb-3" id="mailErrorMessage"></label>
                        </div>


                        <div class="mb-3 col-md-12 mb-0 pb-0">
                            <label class="vivo_bold fs-label" for="url">
                                URL
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="url" id="url"placeholder="www.example.com" />
                            <label class="invalid-feedback fw-bold mb-3" id="urlErrorMessage"></label>
                        </div>

                        <div class="mb-3 col-md-12 mb-0 pb-0 d-grid">
                            <button class="btn rounded-3 text-black vivo_heavy btn-register text-btn-padding text-btn-padding">SUBMIT</button>
                        </div>
                    </div>

                </form>

            </div>
          </div>
        </div>

      </section>


      <!-- ============================================-->
      <!-- <section> Periode ============================-->
      <section class="pb-6 bg-black period" >

        <div class="container-lg">
          <div class="row justify-content-center" data-aos="fade-down" data-aos-duration="1500">
            <div class="col-md-12 col-lg-12 text-center mb-4">
              <h2 class="text-white vivo_heavy text-uppercase">Total</h2>
            </div>
          </div>
          <div class="row justify-content-center text-white" data-aos="fade-up" data-aos-duration="2500" data-aos-once="true">
            <div class="col-md-3 col-4 p-col-mobile-desktop mt-4">
              <div class="card h-100 bg-period">
                <div class="inner">&nbsp;</div>
                <div class="card-body d-flex flex-column justify-content-around mx-auto text-center">
                    <p class="my-4 text-white vivo_bold fs-period-date lh-1 fs-4" id="totalSubmission">{{ $totalSubmission }}</p>
                </div>
              </div>
            </div>
          </div>

         </div>

      </section>


      <!-- <section> close ============================-->
      <!-- ============================================-->


@endsection

@push('js-plugin')
<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
@endpush

@push('script')
<script type="text/javascript">
   $(function() {
    $('.scroll-down').click (function() {

      var windowHeight = window.innerHeight;
      var percent = 80;
      var percentPixel = windowHeight * (percent / 100);

      $('html, body').animate({scrollTop: percentPixel }, 'slow');
      return false;
    });
  });
</script>
@endpush
