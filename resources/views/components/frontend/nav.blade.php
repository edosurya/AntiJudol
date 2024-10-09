
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 indosat_bold" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container-lg d-flex justify-content-between">
          <div>
          <a class="navbar-brand" href="#"><img src="{{ asset('frontend/images/webp/IOH-logo.webp') }}" alt="" width="120" /></a>
          <span style="border-left: 1px solid black;"></span>
          <a class="navbar-brand" href="#"><img src="{{ asset('frontend/images/webp/kominfo.webp') }}" alt="" width="50" /></a>
          </div>
          
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto border-bottom border-lg-bottom-0 pt-2 pt-lg-0">
              <li class="nav-item"><a class="nav-link {{ Route::is('home') ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">Home</a></li>
            </ul>
          </div>

        </div>
      </nav>