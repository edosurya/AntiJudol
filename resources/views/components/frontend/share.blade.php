<div class="modal" id="share" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-md d-flex align-items-center justify-content-center">
    <div class="modal-content bg-red border-radius-lg">
        <div class="d-flex flex-row-reverse close">
            <button type="button" class="btn-close btn-close-white p-3" aria-label="Close" data-bs-dismiss="modal" id="btnCloseShare"></button>
        </div>
        <div class="modal-header">
            <div class="text-center">
                <h2 class="text-white indosat_bold"> KAMU BAGIAN<br/>#GENERASIANTIJUDOL</h2>
            </div>
        </div>

        <div class="text-black px-lg-5 px-sm-2 modal-body text-center bg-white">
            <div class="rounded-1 mb-1 indosat_regular">
                <p>Terima kasih sudah melapor! Ayo laporkan lebih banyak link Judi Online dan ajak sebanyak-banyaknya para generasi muda menjadi #GenerasiAntiJudol</p>
                <img src="{{ asset('frontend/images/webp/anak.webp') }}" alt="" width="80%" />
            </div>
        </div>

      <!-- Modal footer -->
      <div class="modal-footer justify-content-center text-center">
        <div class="d-flex flex-row gap-1 mb-3">
            <p class="text-white indosat_bold mt-2">Share:</p>
            <a type="button" class="icon" data-bs-toggle="modal" data-bs-target="#instagram"><img src="{{ asset('frontend/images/IG-WHITE.png') }}" alt="" width="40" /></a>
            <a type="button" class="icon" data-bs-toggle="modal" data-bs-target="#others" onClick="generateBtn('fb')"><img src="{{ asset('frontend/images/FB-WHITE.png') }}" alt="" width="40" /></a>
            <a type="button" class="icon" data-bs-toggle="modal" data-bs-target="#others" onClick="generateBtn('x')"><img src="{{ asset('frontend/images/X-WHITE.png') }}" alt="" width="40" /></a>
            <a type="button" class="icon" data-bs-toggle="modal" data-bs-target="#others" onClick="generateBtn('wa')"><img src="{{ asset('frontend/images/WA-WHITE.png') }}" alt="" width="40" /></a>

<!--             <a class="icon" href="#" onclick="sosmedShare('1')"><img src="{{ asset('frontend/images/FB-WHITE.png') }}" alt="" width="40" /></a>
            <a class="icon" href="#" onclick="sosmedShare('2')"><img src="{{ asset('frontend/images/X-WHITE.png') }}" alt="" width="40" /></a>
            <a class="icon" href="#" onclick="sosmedShare('4')"><img src="{{ asset('frontend/images/WA-WHITE.png') }}" alt="" width="40" /></a> -->

          </div>
      </div>

    </div>
  </div>
</div>


<div class="modal fade" id="instagram">
  <div class="modal-dialog modal-md d-flex align-items-center justify-content-center">
    <div class="modal-content bg-red">
        <div class="d-flex flex-row-reverse close">
            <button type="button" class="btn-close btn-close-white p-3" aria-label="Close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-header">
            <div class="text-center">
                <h2 class="text-white indosat_bold"> KAMU BAGIAN<br/>#GENERASIANTIJUDOL</h2>
            </div>
        </div>
        <div class="text-center bg-white py-2">
            <img src="{{ asset('frontend/images/webp/gerakanantijudol.webp') }}" alt="" width="50%" />
        </div>
       
      <!-- Modal footer -->
      <div class="modal-footer justify-content-center text-center">
            <a href="{{ asset('frontend/images/banner.png') }}" class="btn bg-white text-black text-btn-padding indosat_bold rounded-pill px-4 mr" onclick="sosmedShare('3')" download="gerakanantijudol"><img src="{{ asset('frontend/images/download-icon.png') }}" alt="" width="25" download /> Unduh Gambar </a>
             <p class="text-white indosat_regular mt-1">dan bagikan ke Instagram Story!</p>
      </div>

    </div>
  </div>
</div>


<div class="modal fade" id="others">
  <div class="modal-dialog modal-md d-flex align-items-center justify-content-center">
    <div class="modal-content bg-red">
        <div class="d-flex flex-row-reverse close">
            <button type="button" class="btn-close btn-close-white p-3" aria-label="Close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-header">
            <div class="text-center">
                <h2 class="text-white indosat_bold"> KAMU BAGIAN<br/>#GENERASIANTIJUDOL</h2>
            </div>
        </div>
        <div class="text-center bg-white py-2">
            <p class="px-4 text-black indosat_regular fs-share"> Berikan dukungan Anda dengan unduh gambar <span class="new-line"></span>dan salin <i>caption</i> di bawah untuk dibagikan <span class="new-line"></span>ke <i>social media</i> sebagai bentuk dukungan <span class="new-line"></span>#GenerasiAntiJudol</p>
            <img src="{{ asset('frontend/images/webp/gerakanantijudol.webp') }}" alt="" width="50%" />
            <div class="mt-3">
            <a href="{{ asset('frontend/images/banner.png') }}" class="btn btn-sm bg-red text-white text-btn-padding indosat_bold rounded-pill px-4 mr"  download="gerakanantijudol"><img src="{{ asset('frontend/images/download-icon-white.png') }}" alt="" width="15" download /> Unduh Gambar </a>
            </div>

            <div class="mt-5 px-4">
                <p class="text-black indosat_bold text-start"> Caption</p>
                <div style="padding: 5px; background-color: #e7e7e7; border-radius: 10px;text-align: left;">
                <p class="fbm-text py-2 px-2 indosat_regular fs-share">Jadilah #GenerasiAntiJudol. Bersama kita lawan Judi Online dengan Lihat, Lapor, Blokir di ioh.co.id/GenerasiAntiJudol
                </p>
                </div>
                <div class="mt-2 mb-2">
                    <button id="copy-btn" type="button" class="btn btn-sm bg-red text-white mb-3 text-btn-padding indosat_bold rounded-pill" data-bs-toggle="modal" data-bs-target="#share"> Salin Caption</button>
                    <div class="mt-n3">
                        <small class="fbm-copied-message"></small>
                    </div>
                </div>
            </div>

        </div>
       
      <!-- Modal footer -->
      <div class="modal-footer justify-content-center text-center">
            <div id="btnAction"></div>
      </div>

    </div>
  </div>
</div>





