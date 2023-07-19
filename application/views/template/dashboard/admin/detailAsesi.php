<script>
   document.getElementById("sidebar-user").classList.add("sidebar-active")
   document.getElementById("sidebar-user-asesi").classList.add("sidebar-active-list")

</script>
<h5 class="d-flex">
   <a href="<?php echo base_url('controller_admin/asesi')?>" class="link-dark link-underline-opacity-0 link-underline-opacity-75-hover d-flex align-item-center">
      Data Asesi LSP PNB
   </a>
   <div class="mx-2">/</div>
   <?php echo $asesi[0]->nim?>
</h5>
<hr>
<div class="mb-3 row">
   <label class="col-sm-2 col-form-label">NIM</label>
   <div class="col-sm-10 col-form-label">
      <div><?php echo $asesi[0]->nim?></div>
   </div>
</div>
<div class="mb-3 row">
   <label class="col-sm-2 col-form-label">Nama</label>
   <div class="col-sm-10 col-form-label">
      <div><?php echo $asesi[0]->namaAsesi?></div>
   </div>
</div>
<div class="mb-3 row">
   <label class="col-sm-2 col-form-label">Email</label>
   <div class="col-sm-10 col-form-label">
      <div><?php echo $asesi[0]->email?></div>
   </div>
</div>
<div class="mb-3 row">
   <label class="col-sm-2 col-form-label">Jurusan</label>
   <div class="col-sm-10 col-form-label">
      <div><?php echo $asesi[0]->jurusan?></div>
   </div>
</div>
<div class="mb-3 row">
   <label class="col-sm-2 col-form-label">Prodi</label>
   <div class="col-sm-10 col-form-label">
      <div><?php echo $asesi[0]->prodi?></div>
   </div>
</div>
<hr>
