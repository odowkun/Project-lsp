<div>
   <h4>Detail Pendaftaran Skema</h4>
   <hr>
   <div class="card mb-3">
            <div class="d-flex align-items-end row">
               <div class="col-sm-12">
                        <div class="card-body">
                           <div class="d-flex">
                              <p class="col-sm-5">
                                 Nama Skema
                              </p>
                              <p class="col-sm-7">
                                : <?php echo $detailDaftar[0]->namaSkema ?>
                              </p>
                           </div>
                           <div class="d-flex">
                              <p class="col-sm-5">
                                 Periode Daftar
                              </p>
                              <p class="col-sm-7">
                                : <?php echo $detailDaftar[0]->periodeMulai." Sampai ".$detailDaftar[0]->periodeMulai?>
                              </p>
                           </div>
                           <div class="d-flex">
                              <p class="col-sm-5">
                                File Permohonan Sertifikasi Kompetensi
                              </p>
                              <p class="col-sm-7">
                                 : <a href="" target="_blank"></a>
                              </p>
                           </div>
                           <div class="d-flex">
                              <p class="col-sm-5">
                                File Kelengkapan
                              </p>
                              <p class="col-sm-7">
                                 : <a href="<?php echo base_url(); ?>Asset/file/dokumenKelengkapan/<?php echo $detailDaftar[0]->fileKelengkapan; ?>" target="_blank">Cek File Kelengkapan</a>
                              </p>
                           </div>
                           <div class="d-flex">
                              <p class="col-sm-5">
                                File Pembayaran
                              </p>
                              <p class="col-sm-7">
                                 : <a href="<?php echo base_url(); ?>Asset/file/dokumenPembayaran/<?php echo $detailDaftar[0]->fileBayar; ?>" target="_blank">Cek Bukti Pembayaran</a>
                              </p>
                           </div>
                        </div>
               </div>
            </div>
         </div>
   <h4>Upload File</h4>
   <hr>
   <form action="<?php echo base_url("controller_asesi/uploadFile")?>" method="post" class="needs-validation" target="_self" enctype="multipart/form-data" role="form" data-tonggle="validator" novalidate >
      <div class="mb-3 row">
         <label for="fileKelengkapan" class="col-sm-2 col-form-label">Upload Permohonan Sertifikasi Kompetensi</label>
         <div class="col-sm-10">
            <input type="file" class="form-control" name="fileKelengkapan" id="fileKelengkapan">
         </div>
      </div>
      <div class="mb-3 row">
         <label for="fileBayar" class="col-sm-2 col-form-label">Upload Bukti Pembayaran</label>
         <div class="col-sm-10">
            <input type="file" class="form-control" name="fileBayar" id="fileBayar">
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

<!-- 
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
</script> -->