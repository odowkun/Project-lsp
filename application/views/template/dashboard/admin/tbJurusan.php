<script>
   document.getElementById("sidebar-lsp").classList.add("sidebar-active")
   document.getElementById("sidebar-lsp-jurusan").classList.add("sidebar-active-list")

   function hapusJurusan(idJurusan, nama){
      if(confirm("Apakah yakin menghapus Jurusan "+nama+"?")){
         window.open("<?php echo base_url(); ?>controller_admin/hapusJurusan/"+idJurusan,"_self");
      }
   }

   function editJurusan(idJurusan){
      load("Controller_Admin/editJurusan/"+idJurusan,"#script");
   }
</script>

<h5>Tambah Data Jurusan</h5>
<hr>
<?php
$pesan = $this->session->userdata('pesan');
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
<form action="<?php echo base_url("controller_admin/submitjurusan")?>" method="post" class="needs-validation">
<div class="mb-3 row">
   <label for="nipAdmin" class="col-sm-2 col-form-label">NIP Admin</label>
   <div class="col-sm-10">
      <input type="number" class="form-control-plaintext" name="nipAdmin" id="nipAdmin" value="<?php echo $this->session->userdata('Username') ?>" readonly>
   </div>
</div>
<!-- <div class="mb-3 row">
   <label for="idJurusan" class="col-sm-2 col-form-label">ID Jurusan</label>
   <div class="col-sm-10"> -->
      <input type="hidden" class="form-control" id="idJurusan" name="idJurusan">
   <!-- </div>
</div> -->
<div class="mb-3 row">
   <label for="namaJurusan" class="col-sm-2 col-form-label">Nama Jurusan</label>
   <div class="col-sm-10">
      <input type="text" class="form-control" id="namaJurusan" name="namaJurusan" required>
   </div>
   <div class="valid-tooltip invalid-tooltip"></div>
</div>
   <div class="mb-3 row">
      <label for="" class="col-sm-2 col-form-label"></label>
      <div class="col-sm-10">
         <button class="btn btn-primary" type="submit">Submit</button>
      </div>
   </div>
</form>

<hr>

<div class="table-responsive">
<table class="table table-hover">
   <thead>
      <tr>
         <th>No</th>
         <th>Nama Jurusan</th>
         <th>Aksi</th>
      </tr>
   </thead> 
   <tbody>
   <?php
      if (!empty($hasil)) {
         $i = 1;
         foreach ($hasil as $data): ?>
      <tr>
         <td><?php echo $i?></td>
         <td><?php echo $data->namaJurusan?></td>
         <td>
            <button class="btn btn-success" onclick="editJurusan(<?php echo $data->idJurusan ?>)">Edit</button>
            <button class="btn btn-danger" onclick="hapusJurusan(<?php echo $data->idJurusan ?>, '<?php echo $data->namaJurusan ?>')">Hapus</button>
         </td>
      </tr>
   <?php
      $i++;
      endforeach;
   }
   ?>
   </tbody>
</table>
</div>