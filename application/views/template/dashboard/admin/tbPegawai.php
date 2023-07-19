<!-- submit -->
<script>
   document.getElementById("sidebar-user").classList.add("sidebar-active")
   document.getElementById("sidebar-user-pegawai").classList.add("sidebar-active-list")

   function hapusPegawai(nipPegawai, nama) {
      if(confirm("Apakah yakin menghapus pegawai "+nama+"?")){
         window.open("<?php echo base_url(); ?>controller_admin/hapuspegawai/"+nipPegawai,"_self");
      }   }

   function editPegawai(nipPegawai) {
      $(window).scrollTop(0)
      load("controller_admin/editpegawai/"+nipPegawai, "#script")
   }
</script>
<h5>Kelola Data Pegawai LSP Politeknik Negeri Bali</h5>
<hr class="mb-4">
<?php
	$pesan=$this->session->flashdata('pesan');
   if (!empty($pesan)) {
      echo "
         <div class='alert alert-success alert-dismissable d-flex align-item-center justify-content-between'>
            <div class='text'>".$pesan."</div>
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
         </div>
         ";
   }
?>

<!-- form -->
<form action="<?php echo base_url("controller_admin/submitpegawai")?>" method="post" class="needs-validation">
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
   <div class="mb-3 row">
      <label for="" class="col-sm-2 col-form-label"></label>
      <div class="col-sm-10">
         <button class="btn btn-primary" type="submit">Submit</button>
      </div>
   </div>
</form>
<hr>
<!-- tabel -->
<div class="table-responsive">
   <table class="table table-hover">
      <thead>
         <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>No HP</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         <?php
         if (!empty($hasil)) {
            foreach ($hasil as $data):
               $date=date_create($data->tanggalLahir);
         ?>
            <tr ondblclick="editPegawai('<?php echo $data->nipPegawai ?>')">
               <td><?php echo $data->nipPegawai?></td>
               <td><?php echo $data->namaPegawai?></td>
               <td><?php echo $data->jenisKelamin?></td>
               <td><?php echo $data->noHP?></td>
               <td><?php echo $data->tempatLahir?></td>
               <td><?php echo date_format($date,"d M Y")?></td>
               <td>
                  <button class="btn btn-success" onclick="editPegawai('<?php echo $data->nipPegawai ?>')">Edit</button>
                  <button class="btn btn-danger" onclick="hapusPegawai('<?php echo $data->nipPegawai ?>', '<?php echo $data->namaPegawai ?>')">Hapus</button>
               </td>
            </tr>
         <?php
            endforeach;
         }

         ?>
      </tbody>
   </table>
</div>