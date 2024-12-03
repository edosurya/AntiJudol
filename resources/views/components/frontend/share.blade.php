<div class="modal" id="share">
  <div class="modal-dialog modal-md modal-dialog-scrollable d-flex align-items-center justify-content-center">
    <div class="modal-content bg-red">
        <div class="d-flex flex-row-reverse">
            <button type="button" class="btn-close btn-close-white p-3" aria-label="Close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-header">
            <div class="text-center">
                <h2 class="text-white indosat_bold"> KAMU BAGIAN<br/>#GENERASIANTIJUDOL</h2>
            </div>
        </div>

        <div class="text-black px-lg-5 px-sm-2 modal-body text-center bg-grey">
            <div class="rounded-1 mb-1 indosat_regular">
                <p>Terima kasih sudah melapor! Ayo laporkan lebih banyak link Judi Online dan ajak sebanyak-banyaknya para generasi muda menjadi #GenerasiAntiJudol</p>
            </div>
        </div>

      <!-- Modal footer -->
      <div class="modal-footer justify-content-center text-center">
        <div class="d-flex flex-row gap-1 mb-3">
            <p class="text-white indosat_bold mt-2">Share:</p>
            <a class="icon" href="#"  data-bs-toggle="modal" data-bs-target="#instagram" aria-label="Close" data-bs-dismiss="modal" ><img src="{{ asset('frontend/images/IG-WHITE.png') }}" alt="" width="40" /></a>
            <a class="icon" href="#" onclick="sosmedShare('1')"><img src="{{ asset('frontend/images/FB-WHITE.png') }}" alt="" width="40" /></a>
            <a class="icon" href="#" onclick="sosmedShare('2')"><img src="{{ asset('frontend/images/X-WHITE.png') }}" alt="" width="40" /></a>
            <a class="icon" href="#" onclick="sosmedShare('4')"><img src="{{ asset('frontend/images/WA-WHITE.png') }}" alt="" width="40" /></a>

          </div>
      </div>

    </div>
  </div>
</div>


<div class="modal" id="instagram">
  <div class="modal-dialog modal-sm modal-dialog-scrollable d-flex align-items-center justify-content-center">

    <div class="modal-content bg-red">

        <div class="d-flex flex-row-reverse">
            <button type="button" class="btn-close btn-close-white p-3" aria-label="Close" data-bs-dismiss="modal"></button>
        </div>
        <div class="text-center mt-2">
        <a href="#" class="btn bg-white text-black text-btn-padding indosat_bold rounded-pill px-4 mr" onclick="sosmedShare('3')"><img src="{{ asset('frontend/images/download-icon.png') }}" alt="" width="25" /> Unduh Hasil Di Sini </a>
        </div>

      <!-- Modal footer -->
      <div class="modal-footer justify-content-center text-center">
        <p class="text-white indosat_regular">dan bagikan ke Instagram Story!</p>
      </div>

    </div>
  </div>
</div>