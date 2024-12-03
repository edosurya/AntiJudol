@extends('layouts.frontend')

@section('title', 'Homepage')
@section('meta_title', 'Generasi Anti Judol')
@section('meta_description','Generasi Anti Judol')

    @push('css-plugin')
        <link href="{{ asset('frontend/css/homepage2.css') }}" rel="stylesheet" type="text/css" id="bootstrap">
    @endpush

    @push('style')
    @endpush


@section('content')

      <section id="first" class="bg-100 section-has-bg" style="background-image: url({{ asset('frontend/images/webp/background.webp') }});" >
        <div class="mb-5 d-flex flex-row justify-content-between">
            <a class="logo" href="#"><img src="{{ asset('frontend/images/webp/kominfo.webp') }}" alt="" width="50" /></a>
            <a class="logo" href="#"><img src="{{ asset('frontend/images/webp/IOH-logo.webp') }}" alt="" width="120" /></a>
        </div>
        <div class="container-lg mb-5">
          <div class="row align-items-center">
              <div class="col-12 col-sm-7 mb-5 h-100">
                  <img class="mb-3" src="{{ asset('frontend/images/webp/generasi-anti-judol.webp') }}" alt="" width="100%" loading="lazy" /> 
                  <div class="fs-generasi-anti-judol mt-3">
                  <p class="text-grey indosat_medium"> Gerakan Generas Anti Judi Online hadir sebagal platform untuk melaporkan dan memberantas aktivitas judi online yang merusak generasi bangsa.
                  </p>
                  <p class="indosat_bold"> "Sampal Saat ini sudah sebanyak 8,8 juta masyarakat indonesia tercatat bermain judi Online, dan 80% diantaranya adalah anak-anak muda yang merupalan generasi harapan Indonesia. (Berdasarkan pernyataan dari Menko Polkam Budi Gunawan, Nov 2024). Dan didukung dengan pernyataan Menteri Komunikasi dan Digital RI Meutya Hafid mengatakan ada 80 ribu anak di bawah usia 10 tahun yang terpapar judi online."</p>

                  <p class="text-grey indosat_medium">Dengan itu, melalui gerakan ini kami mengajak semua lapisan masyarakat untuk berpartisipasi aktif dalam menjaga masa depan bebas judi online dan aman bagi anak-anak muda indonesia.</p>

                  <p class="text-red indosat_bold mt-4">Laporkan aktivitas Judol dengan mudah,<span class="new-line"></span> bersama kita bisa menghentikan <span class="new-line"></span> dampak negatif judi online!</p>
                  </div>

                <div class="d-flex flex-row gap-3">
                  <button type="button" class="btn bg-red text-white mb-3 text-btn-padding indosat_bold rounded-pill px-4 mr" data-bs-toggle="modal" data-bs-target="#tnc"> Aturan Pelaporan </button>
                  <button type="button" class="btn bg-red text-white mb-3 text-btn-padding indosat_bold rounded-pill" data-bs-toggle="modal" data-bs-target="#share"> Share </button>
                  <button id="btnthankyou" type="button" class="btn bg-red text-white mb-3 text-btn-padding indosat_bold" data-bs-toggle="modal" data-bs-target="#thankyou" style="display: none;"> Thank You
                  </button>
                </div>
           
              </div>
            
              <div class="col-12 col-sm-5 mb-3 position-relative">
                <img src="{{ asset('frontend/images/webp/koin1.webp') }}" class="coin1" alt="koin1" />
                <img src="{{ asset('frontend/images/webp/koin2.webp') }}" class="coin2" alt="koin1" />
                <div class="form">
                  <div class="line-border">
                    <p class="text-red indosat_bold mb-4 fs-title-registrasi_form" >Lihat, Lapor, <span class="new-line"></span>dan Blokir!</p>
                    <div class="alert alert-success invalid-feedback fw-bold mb-4 indosat_bold" id="successMessage" role="alert"></div>
                    <div class="alert alert-danger invalid-feedback fw-bold mb-4 indosat_bold" id="dzErrorMessage" role="alert"></div>

                    <form id="submitForm" enctype="multipart/form-data" class="position-relative text-grey">

                        <div class="row text-grey" id="theForm">
                            <div class="mb-3 col-md-12">
                                <label class="indosat_bold fs-label" for="fullname">
                                    Nama
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="fullname" id="fullname"
                                    placeholder="Nama Lengkap">
                                <label class="invalid-feedback fw-bold indosat_regular" id="fnErrorMessage"></label>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label class="indosat_bold fs-label" for="email">
                                    E-mail
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="email" id="email"
                                    placeholder="Email">
                                <label class="invalid-feedback fw-bold indosat_regular" id="mailErrorMessage"></label>
                            </div>


                            <div class="mb-3 col-md-12 mb-0 pb-0">
                                <label class="indosat_bold fs-label" for="url">
                                    Link Judol
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="url" id="url"placeholder="www.example.com" />
                                <label class="invalid-feedback fw-bold indosat_regular" id="urlErrorMessage"></label>
                            </div>

                            <div class="mb-3 mt-3 col-md-12 mb-0 pb-0">
                                <button class="btn rounded-pill text-white indosat_bold btn-register text-btn-padding py-1">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                </div>
          </div>
        </div>


        <div class="container-lg py-3 py-md-7" id="users">
          <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 text-center mb-4">
              <h2 class="text-grey indosat_bold fs-title-total-partisipan">Total Partisipan Gerakan</h2>
              <img class="mb-3" src="{{ asset('frontend/images/webp/generasi-anti-judol.webp') }}" alt="" width="70%" loading="lazy" /> 
            </div>
          </div>
          <div class="row justify-content-center text-white position-relative">
            <img src="{{ asset('frontend/images/webp/koin1.webp') }}" class="coin1" alt="koin1" />
            <img src="{{ asset('frontend/images/webp/koin2.webp') }}" class="coin2" alt="koin1" />
            <div class="col-sm-8 col-10 p-col-mobile-desktop">
              <div class="card h-60 bg-total-partisipan">
                <div class="card-body d-flex flex-column justify-content-around mx-auto text-center">
                    <div class="my-3 my-sm-1 d-flex flex-row bd-highlight" id="totalSubmission">
                      @foreach($numbers as $n)
                        <img class="number px-1" src="{{ asset('frontend/images/webp/'.$n.'.webp') }}" alt="" loading="lazy" />
                      @endforeach
                    </div>
                </div>
              </div>
              <!-- <p class="text-white fs-3 text-center mt-3" id="time"></p> -->
            </div>
          </div>
         </div>

        <div id="lakung" class="container-lg py-3">
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                  <div class="justify-content-center">
                    <div class="col-md-12 col-lg-12 text-center mb-4">
                      <h2 class="text-grey indosat_bold fs-title-total-lakung">Total Laporan</h2>
                    </div>
                  </div>
                  <div class="row justify-content-center text-white position-relative">
                    <img src="{{ asset('frontend/images/webp/koin1.webp') }}" class="coin1" alt="koin1" />
                    <img src="{{ asset('frontend/images/webp/koin2.webp') }}" class="coin2" alt="koin1" />
                    <div class="col-sm-8 col-10 p-col-mobile-desktop">
                      <div class="card h-60 bg-total-lakung">
                        <div class="card-body d-flex flex-column justify-content-around mx-auto text-center">
                            <div class="my-3 my-sm-1 d-flex flex-row bd-highlight" id="t_lapor">
                              @foreach($t_lapor as $l)
                                <img class="number px-1" src="{{ asset('frontend/images/webp/'.$l.'.webp') }}" alt="" loading="lazy" />
                              @endforeach
                            </div>
                        </div>
                      </div>
                      <!-- <p class="text-white fs-3 text-center mt-3" id="time"></p> -->
                    </div>
                  </div>
                </div>

                <div class="col-md-6 ">
                  <div class="justify-content-center">
                    <div class="col-md-12 col-lg-12 text-center mb-4">
                      <h2 class="text-grey indosat_bold fs-title-total-lakung">Total Dukungan</h2>
                    </div>
                  </div>
                  <div class="row justify-content-center text-white position-relative">
                    <img src="{{ asset('frontend/images/webp/koin1.webp') }}" class="coin1" alt="koin1" />
                    <img src="{{ asset('frontend/images/webp/koin2.webp') }}" class="coin2" alt="koin1" />
                    <div class="col-sm-8 col-10 p-col-mobile-desktop">
                      <div class="card h-60 bg-total-lakung">
                        <div class="card-body d-flex flex-column justify-content-around mx-auto text-center">
                            <div class="my-3 my-sm-1 d-flex flex-row bd-highlight" id="t_dukung">
                              @foreach($t_dukung as $d)
                                <img class="number px-1" src="{{ asset('frontend/images/webp/'.$d.'.webp') }}" alt="" loading="lazy" />
                              @endforeach
                            </div>
                        </div>
                      </div>
                      <!-- <p class="text-white fs-3 text-center mt-3" id="time"></p> -->
                    </div>
                  </div>
                </div>

            </div>
        </div>

         <!-- <div id="flockler-embed-19343bb7fbb007aab0f2329c6ae03ff7"></div> -->
            <!-- <script src="https://plugins.flockler.com/embed/19343b52fa00c477565a54d5fd8eb5d7/19343bb7fbb007aab0f2329c6ae03ff7" async></script> -->

      </section>

      <!-- <section> close ============================-->
      <!-- ============================================-->

      <!-- ============================================-->
      <!-- <section> Activity  ============================-->
<!-- 
      <section class="bg-100 py-3 section-has-bg" style="background-image: url({{ asset('frontend/images/webp/background1.webp') }});">

        <div class="container-lg mt-2 py-7">
          <div class="row text-center justify-content-center text-white p-2">
            <div class="col-md-4 p-col-mobile" >
              <img class="img-fluid rounded-img mb-3" src="{{ asset('frontend/images/webp/img1.webp') }}" alt="" loading="lazy" />
            </div>
            <div class="col-md-4 p-col-mobile">
              <img class="img-fluid rounded-img mb-3" src="{{ asset('frontend/images/webp/img2.webp') }}" alt="" loading="lazy" />
            </div>
            <div class="col-md-4 p-col-mobile">
              <img class="img-fluid rounded-img mb-3" src="{{ asset('frontend/images/webp/img3.webp') }}" alt="" loading="lazy" />
            </div>
            <div class="col-12">
              <p class="text-grey indosat_bold fs-desc-activity">Sosialisasi seru bersama pemuda tentang bahaya judi online! <span class="new-line"></span>Edukasi interaktif ini diharapkan dapat meningkatkan kesadaran masyarakat untuk menjaga generasi muda dari dampak negatif judi.</p>
            </div>
          </div>

        </div>

      </section> -->

      <!-- <section> close ============================-->
      <!-- ============================================-->


    <script id="dzLoadingOverlay" type="text/template">
        <div class="dz-loading-div">
            <div class="position-absolute w-100 h-100 start-0 top-0 d-flex align-items-center justify-content-center rounded-3 z-3">
                <div class="spinner-border text-red" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </script>

    @include('components.frontend.term-condition')
    @include('components.frontend.share')

@endsection

@push('js-plugin')
<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
@endpush

@push('script')

<script type="text/javascript">
    
    function sosmedShare(channel) {

        let formData = {
            channel: channel,
            _token: $('meta[name="csrf-token"]').attr('content') // Get CSRF token
        };

        const url = 'https://generasiantijudol.id/';

        // Perform AJAX POST request
        $.ajax({
            url: "{{ route('share') }}", // Laravel route URL
            method: 'POST',
            data: formData,
            success: function (response) {
                console.log(response);
                if(channel == 1) {
                    window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(url),'sharer','toolbar=0,status=0,width=626,height=436');
                    return false;
                } else if(channel == 2) {
                    window.open('https://twitter.com/intent/tweet?text=Cek%20this%20out%20https%3A//generasiantijudol.id/');
                    return false;
                } else if(channel == 4) {
                    window.open('https://wa.me/?text=Cek%20this%20out%20https%3A//generasiantijudol.id/');
                    return false;
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', xhr.responseText);
            }
        });
    }

</script>
@endpush
