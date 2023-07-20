

<div>
   <h4>Data Diri</h4>
   <hr>
   <form action="<?php echo base_url("controller_asesi/submitData")?>" method="post" class="needs-validation">
      <div class="mb-3 row">
         <label for="nim" class="col-sm-2 col-form-label">NIM</label>
         <div class="col-sm-10">
            <input type="number" class="form-control-plaintext" id="nim" value="<?php echo $this->session->userdata('Username') ?>" readonly>
         </div>
      </div>
      <div class="mb-3 row">
         <label for="nim" class="col-sm-2 col-form-label">Nama</label>
         <div class="col-sm-10">
            <input type="text" class="form-control-plaintext" name="namaAsesi" id="namaAsesi" value="<?php echo $dataDiri[0]->namaAsesi ?>" readonly>
         </div>
      </div>
      <div class="mb-3 row">
         <label for="Smester" class="col-sm-2 col-form-label">Smester</label>
         <div class="col-sm-10">
            <input type="number" class="form-control-plaintext" name="smester" id="smester" value="<?php echo $dataDiri[0]->smester ?>" readonly>
         </div>
      </div>
      <div class="mb-3 row">
         <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
         <div class="col-sm-10">
            <input type="text" class="form-control-plaintext" name="jurusan" id="jurusan" value="<?php echo $dataDiri[0]->jurusan ?>" readonly>
         </div>
      </div>
      <div class="mb-3 row">
         <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
         <div class="col-sm-10">
            <input type="text" class="form-control-plaintext" name="prodi" id="prodi" value="<?php echo $dataDiri[0]->prodi ?>" readonly>
         </div>
      </div>
      <div class="mb-3 row">
         <label for="email" class="col-sm-2 col-form-label">Email</label>
         <div class="col-sm-10">
            <input type="email" class="form-control" name="email" id="email" required>
         </div>
      </div>
      <div class="mb-3 row">
         <label for="nomor" class="col-sm-2 col-form-label">No. NIK</label>
         <div class="col-sm-10">
            <input type="number" class="form-control" name="nomor" id="nomor" required>
         </div>
      </div>
      <div class="mb-3 row">
         <label for="tempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
         <div class="col-sm-10">
            <input type="text" class="form-control" name="tempatLahir" id="tempatLahir" required>
         </div>
      </div>
      <div class="mb-3 row">
         <label for="tanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
         <div class="col-sm-10">
            <input type="date" class="form-control" name="tanggalLahir" id="tanggalLahir" required>
         </div>
      </div>
      <div class="mb-3 row">
         <label for="jenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
         <div class="col-sm-10">
            <input type="text" class="form-control" name="jenisKelamin" id="jenisKelamin" required>
         </div>
      </div>
      <div class="mb-3 row">
         <label for="kebangsaan" class="col-sm-2 col-form-label">Kebangsaan</label>
         <div class="col-sm-10">
            <input type="text" class="form-control" name="kebangsaan" id="kebangsaan" required>
         </div>
      </div>
      <div class="mb-3 row">
         <label for="alamatRumah" class="col-sm-2 col-form-label">Alamat</label>
         <div class="col-sm-10">
            <input type="text" class="form-control" name="alamatRumah" id="alamatRumah" required>
         </div>
      </div>
      <div class="mb-3 row">
         <label for="kodePos" class="col-sm-2 col-form-label">Kode Pos</label>
         <div class="col-sm-10">
            <input type="text" class="form-control" name="kodePos" id="kodePos" required>
         </div>
      </div>
      <div class="mb-3 row">
         <label for="noTelp" class="col-sm-2 col-form-label">No. Telepon</label>
         <div class="col-sm-10">
            <input type="text" class="form-control" name="noTelp" id="noTelp" required>
         </div>
      </div>
      <div class="mb-3 row">
         <label for="kualifikasiPendidikan" class="col-sm-2 col-form-label">Kualifikasi Pendidikan</label>
         <div class="col-sm-10">
            <input type="text" class="form-control" name="kualifikasiPendidikan" id="kualifikasiPendidikan" required>
         </div>
      </div>
      <!-- <input type="hidden" class="form-control" id="idJurusan" name="idJurusan"> -->
      <div class="mb-3 row">
         <label for="" class="col-sm-2 col-form-label"></label>
         <div class="col-sm-10">
            <button class="btn btn-primary" type="submit">Submit</button>
         </div>
      </div>
   </form>
</div>


<script type="text/javascript" >
   document.getElementById('email').value = "<?php echo $dataDiri[0]->email ?>";
   document.getElementById('nomor').value = "<?php echo $dataDiri[0]->nomor ?>";
   document.getElementById('tempatLahir').value = "<?php echo $dataDiri[0]->tempatLahir ?>";
   document.getElementById('tanggalLahir').value = "<?php echo $dataDiri[0]->tanggalLahir ?>";
   document.getElementById('jenisKelamin').value = "<?php echo $dataDiri[0]->jenisKelamin ?>";
   document.getElementById('kebangsaan').value = "<?php echo $dataDiri[0]->kebangsaan ?>";
   document.getElementById('alamatRumah').value = "<?php echo $dataDiri[0]->alamatRumah ?>";
   document.getElementById('kodePos').value = "<?php echo $dataDiri[0]->kodePos ?>";
   document.getElementById('noTelp').value = "<?php echo $dataDiri[0]->noTelp ?>";
   document.getElementById('kualifikasiPendidikan').value = "<?php echo $dataDiri[0]->kualifikasiPendidikan ?>";
</script>