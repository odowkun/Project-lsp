<script>
   document.getElementById("sidebar-user").classList.add("sidebar-active")
   document.getElementById("sidebar-user-asesi").classList.add("sidebar-active-list")
</script>
<h5 class="d-flex justify-content-between align-items-end">
   <div class="d-flex">
      <a href="<?php echo base_url('controller_admin/asesi')?>" class="link-dark link-underline-opacity-0 link-underline-opacity-75-hover d-flex align-item-center">
         Data Asesi LSP PNB
      </a>
      <div class="mx-2">/</div>
      <?php echo $asesi[0]->namaAsesi?>
   </div>
   <div>
      <a class="btn btn-sm btn-success d-flex align-items-center" href="<?= base_url()?>controller_admin/datadiri/<?= $asesi[0]->nim?>">
         <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" fill="white"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
         <span class="ms-1 fw-semibold">Data Diri</span>
      </a>
   </div>
</h5>
<hr>
<div class="mb-1 row">
   <label class="col-sm-2 col-form-label">NIM</label>
   <div class="col-sm-10 col-form-label">
      <div><?php echo $asesi[0]->nim?></div>
   </div>
</div>
<div class="mb-1 row">
   <label class="col-sm-2 col-form-label">Email</label>
   <div class="col-sm-10 col-form-label">
      <div><?php echo $asesi[0]->email?></div>
   </div>
</div>
<div class="mb-1 row">
   <label class="col-sm-2 col-form-label">Jurusan</label>
   <div class="col-sm-10 col-form-label">
      <div><?php echo $asesi[0]->jurusan?></div>
   </div>
</div>
<div class="mb-1 row">
   <label class="col-sm-2 col-form-label">Prodi</label>
   <div class="col-sm-10 col-form-label">
      <div><?php echo $asesi[0]->prodi?></div>
   </div>
</div>
<hr>
