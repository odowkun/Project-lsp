<script>
   document.getElementById("sidebar-pegawai").classList.add("sidebar-active")
   document.getElementById("sidebar-pegawai-tambah").classList.add("sidebar-active-list")
   
   function submit() {
      load("Controller_Admin/simpanPegawai" ,"#script")
   }
</script>

<h2>Tambah Pegawai LSP</h2>
<hr class="mb-4">
<?php
	$pesan=$this->session->flashdata('pesan');
	// $pesan="Data sudah ada, <a href='' class='alert-link'>Edit Data?</a>";
	switch ($this->session->flashdata('mode')){
      case 'submit':
         $color = 'success';
         break;
      case 'eror' :
         $color = 'danger';
         break;
      default :
         $color = 'secondary';
   }


   if (!empty($pesan)) {
      echo "
         <div class='alert alert-success d-flex align-item-center justify-content-between'>
         <div class='text'>
            ".$pesan."
         </div>
            <a class='btn-close' href='". base_url('Controller_Admin/formPegawai')."'></a>
         </div>
         ";
   }
?>

<!-- form -->
<form action="<?php echo base_url("Controller_Admin/simpanPegawai")?>" method="post" class="needs-validation" novalidate>
   <div class="mb-3 row">
      <label for="nipPegawai" class="col-sm-2 col-form-label">NIP Pegawai</label>
      <div class="col-sm-10">
         <input type="number" class="form-control" id="nipPegawai" name="nipPegawai" required>
      </div>
      <div class="valid-tooltip invalid-tooltip"></div>
   </div>
   <div class="mb-3 row">
      <label for="namaPegawai" class="col-sm-2 col-form-label">Nama</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="namaPegawai" name="namaPegawai" required>
      </div>
   </div>
   <div class="mb-3 row">
      <label for="jenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
      <div class="col-sm-10">
         <select name="jenisKelamin" id="jenisKelamin" class="form-select" required>
            <option value="">Pilih</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
         </select>
      </div>
   </div>
   <div class="mb-3 row">
      <label for="noHP" class="col-sm-2 col-form-label">No HP</label>
      <div class="col-sm-10">
         <input type="number" class="form-control" id="noHP" name="noHP" required>
      </div>
   </div>
   <div class="mb-3 row">
      <label for="tempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="tempatLahir" name="tempatLahir" required>
      </div>
   </div>
   <div class="mb-3 row">
      <label for="tanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
      <div class="col-sm-10">
         <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" required>
      </div>
   </div>
   <div class="d-md-flex justify-content-md-end">
      <button class="btn btn-secondary me-md-2 ps-5 pe-5" type="submit">Submit</button>
   </div>
</form>