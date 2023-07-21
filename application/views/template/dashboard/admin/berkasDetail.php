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
   <a href="javascript:history.go(-1)" class="link-dark link-underline-opacity-0 link-underline-opacity-75-hover d-flex align-items-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
      Kembali
   </a>
   <a class="btn btn-sm btn-success d-flex align-items-center gap-2" href="<?= base_url()?>controller_admin/datadiri/<?= $konten[0]->nim?>">
      <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" fill="white"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
      <span class="fw-semibold">Data Diri</span>
   </a>
</h5>
<hr>
<div class="row">
   <div class="col-6 h-100">
      <div class="d-flex align-items-top gap-2">
         <h5>Berkas Kelengkapan</h5>
         <?php 
            switch ($konten[0]->verifikasiKelengkapan) {
               case "Terima" : 
                  echo "
                  <svg xmlns='http://www.w3.org/2000/svg' height='1.5em' viewBox='0 0 512 512' fill='var(--bs-success)'><path d='M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 09.4 24.6 0 33.9z'/></svg>
                  ";break;
                  case "Tolak" : 
                  echo "
                  <svg xmlns='http://www.w3.org/2000/svg' height='1.5em' viewBox='0 0 512 512' fill='var(--bs-danger)'><path d='M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z'/></svg>
                  ";break;
               default : 
                  echo "
                  <svg xmlns='http://www.w3.org/2000/svg' height='1.5em' viewBox='0 0 512 512' fill='var(--bs-secondary)'><path d='M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z'/></svg>
                  ";
            } 
            ?>
      </div>
      <button class="btn btn-primary align-items-center d-flex gap-2">
         <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512" fill="white"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M320 464c8.8 0 16-7.2 16-16V160H256c-17.7 0-32-14.3-32-32V48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320zM0 64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z"/></svg>
         Lihat File
      </button>
      <div class="row">
         <div class="col my-4">
            <button class="btn btn-success" onclick="submitberkas('<?=$konten[0]->idUjian?>', 'Terima')" <?= (!empty($konten[0]->verifikasiKelengkapan) ? "disabled" : "")?>>Terima</button>
            <button class="btn btn-danger" onclick="submitberkas('<?=$konten[0]->idUjian?>', 'Tolak')" <?= (!empty($konten[0]->verifikasiKelengkapan) ? "disabled" : "")?>>Tolak</button>
         </div>
      </div>
   </div>
   <div class="col-6">
      <div class="d-flex align-items-top gap-2">
         <h5>Bukti Bayar</h5>
         <?php 
            switch ($konten[0]->verifikasiBayar) {
               case "Terima" : 
                  echo "
                  <svg xmlns='http://www.w3.org/2000/svg' height='1.5em' viewBox='0 0 512 512' fill='var(--bs-success)'><path d='M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 09.4 24.6 0 33.9z'/></svg>
                  ";break;
                  case "Tolak" : 
                  echo "
                  <svg xmlns='http://www.w3.org/2000/svg' height='1.5em' viewBox='0 0 512 512' fill='var(--bs-danger)'><path d='M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z'/></svg>
                  ";break;
               default : 
                  echo "
                  <svg xmlns='http://www.w3.org/2000/svg' height='1.5em' viewBox='0 0 512 512' fill='var(--bs-secondary)'><path d='M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z'/></svg>
                  ";
            } 
            ?>
      </div>
      <button class="btn btn-primary align-items-center d-flex gap-2">
         <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512" fill="white"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M320 464c8.8 0 16-7.2 16-16V160H256c-17.7 0-32-14.3-32-32V48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320zM0 64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z"/></svg>
         Lihat File
      </button>
      <div class="col my-4">
         <button class="btn btn-success" onclick="submitbayar('<?=$konten[0]->idUjian?>', 'Terima')" <?= (!empty($konten[0]->verifikasiBayar) ? "disabled" : "")?>>Terima</button>
         <button class="btn btn-danger" onclick="submitbayar('<?=$konten[0]->idUjian?>', 'Tolak')" <?= (!empty($konten[0]->verifikasiBayar) ? "disabled" : "")?>>Tolak</button>
      </div>
   </div>
</div>