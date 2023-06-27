<script>
   document.getElementById("sidebar-lsp").classList.add("sidebar-active")
   document.getElementById("sidebar-lsp-jurusan").classList.add("sidebar-active-list")

   function hapusJurusan(idJurusan, nama){
      if(confirm("Apakah yakin menghapus Jurusan "+nama+"?")){
         window.open("<?php echo base_url(); ?>controller_admin/hapusJurusan/"+idJurusan,"_self");
      }
   }

   function editJurusan(idJurusan){
      $(window).scrollTop(0)
      load("Controller_Admin/editJurusan/"+idJurusan,"#script");
   }
</script>

<h5>Verifikasi Data Asesi</h5>
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
<?php
foreach ($dataAsesi as $data) :  
    ?>
<div class="mb-3 row">
   <label for="namaJurusan" class="col-sm-2 col-form-label">Nama</label>
   <div class="col-sm-10">
      <input type="text" class="form-control" id="namaJurusan" name="namaJurusan" placeholder="<?php echo $data->namaAsesi?>">
   </div>
   <div class="valid-tooltip invalid-tooltip"></div>
<?php
endforeach;
?>
</div>
   <div class="mb-3 row">
      <label for="" class="col-sm-2 col-form-label"></label>
      <div class="col-sm-10">
         <button class="btn btn-primary" type="submit">Submit</button>
      </div>
   </div>
</form>

<hr>
