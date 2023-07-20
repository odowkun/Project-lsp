<script>
   document.getElementById("sidebar-user").classList.add("sidebar-active")
   document.getElementById("sidebar-user-asesi").classList.add("sidebar-active-list")
</script>
<h5>
   <a href="javascript:history.go(-1)" class="link-dark link-underline-opacity-0 link-underline-opacity-75-hover d-flex align-items-center">
      <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
      <span class="ms-1">Kembali</span>
   </a>
</h5>
<hr>
<div class="row">
   <div class="col-12 col-md-6 mb-4 me-3">
      <h5>A. Data Pribadi</h5>
      <div class="mb-1 row align-items-center border-bottom">
         <label class="col-5 col-form-label">Nama Lengkap</label>
         <div class="col col-form-label ">
            <div><?= $asesi[0]->namaAsesi?></div>
         </div>
      </div>
      <div class="mb-1 row align-items-center border-bottom">
         <label class="col-5 col-form-label">NIM</label>
         <div class="col col-form-label ">
            <div><?= $asesi[0]->nim?></div>
         </div>
      </div>
      <div class="mb-1 row align-items-center border-bottom">
         <label class="col-5 col-form-label">Email</label>
         <div class="col col-form-label ">
            <div><?= $asesi[0]->email?></div>
         </div>
      </div>
      <div class="mb-1 row align-items-center border-bottom">
         <label class="col-5 col-form-label">Jurusan</label>
         <div class="col col-form-label ">
            <div><?= $asesi[0]->jurusan?></div>
         </div>
      </div>
      <div class="mb-1 row align-items-center border-bottom">
         <label class="col-5 col-form-label">Prodi</label>
         <div class="col col-form-label ">
            <div><?= $asesi[0]->prodi?></div>
         </div>
      </div>
      <div class="mb-1 row align-items-center border-bottom">
         <label class="col-5 col-form-label">No. KTP / NIK / Paspor</label>
         <div class="col col-form-label ">
            <div><?= $asesi[0]->nomor?></div>
         </div>
      </div>
      <div class="mb-1 row align-items-center border-bottom">
         <label class="col-5 col-form-label">Tempat / Tanggal Lahir</label>
         <div class="col col-form-label ">
            <div><?= $asesi[0]->tempatLahir . " / "; echo (!empty($asesi[0]->tanggalLahir)) ? date_format(date_create($asesi[0]->tanggalLahir),"d F Y") : "";?></div>
         </div>
      </div>
      <div class="mb-1 row align-items-center border-bottom">
         <label class="col-5 col-form-label">Jenis Kelamin</label>
         <div class="col col-form-label ">
            <div><?= $asesi[0]->jenisKelamin?></div>
         </div>
      </div>
      <div class="mb-1 row align-items-center border-bottom">
         <label class="col-5 col-form-label">Kebangsaan</label>
         <div class="col col-form-label ">
            <div><?= $asesi[0]->kebangsaan?></div>
         </div>
      </div>
      <div class="mb-1 row align-items-center border-bottom">
         <label class="col-5 col-form-label">Alamat Rumah</label>
         <div class="col col-form-label ">
            <div><?= $asesi[0]->alamatRumah?></div>
         </div>
      </div>
      <div class="mb-1 row align-items-center border-bottom">
         <label class="col-5 col-form-label">Kode Pos</label>
         <div class="col col-form-label ">
            <div><?= $asesi[0]->kodePos?></div>
         </div>
      </div>
      <div class="mb-1 row align-items-center border-bottom">
         <label class="col-5 col-form-label">Kualifikasi Pendidikan</label>
         <div class="col col-form-label ">
            <div><?= $asesi[0]->kualifikasiPendidikan?></div>
         </div>
      </div>
   </div>

</div>