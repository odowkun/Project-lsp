<script>
   document.getElementById("sidebar-user").classList.add("sidebar-active")
   document.getElementById("sidebar-user-berkas").classList.add("sidebar-active-list")

   function submitberkas(id, value) {
      window.open("<?= base_url()?>controller_admin/submitberkas/"+id+"/"+value, "_self")
   }
   function submitbayar(id, value) {
      window.open("<?= base_url()?>controller_admin/submitbayar/"+id+"/"+value, "_self")
   }
</script>
<h5 class="d-flex justify-content-between align-items-center">
   <a href="javascript:history.go(-1)" class="link-dark link-underline-opacity-0 link-underline-opacity-75-hover d-flex align-items-center">
      <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
      <span class="ms-1">Kembali</span>
   </a>
   <a class="btn btn-sm btn-success d-flex align-items-center" href="<?= base_url()?>controller_admin/datadiri/<?= $konten[0]->nim?>">
      <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" fill="white"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
      <span class="ms-1 fw-semibold">Data Diri</span>
   </a>
</h5>
<hr>
<div class="row">
   <div class="col">
      <h5>Berkas Kelengkapan</h5>
      <div class="row">
         <div class="col my-4">
            <button class="btn btn-success" onclick="submitberkas('<?=$konten[0]->idUjian?>', 'Terima')">Terima</button>
            <button class="btn btn-danger" onclick="submitberkas('<?=$konten[0]->idUjian?>', 'Tolak')">Tolak</button>
         </div>
      </div>
   </div>
   <div class="col">
      <h5>Bukti Bayar</h5>
      <img src="" alt="bukti pembayaran">
      <div class="col my-4">
         <button class="btn btn-success" onclick="submitbayar('<?=$konten[0]->idUjian?>', 'Terima')">Terima</button>
         <button class="btn btn-danger" onclick="submitbayar('<?=$konten[0]->idUjian?>', 'Tolak')">Tolak</button>
      </div>
   </div>
</div>