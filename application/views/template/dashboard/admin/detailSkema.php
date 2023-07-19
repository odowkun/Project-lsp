<script>
   document.getElementById("sidebar-lsp").classList.add("sidebar-active")
   document.getElementById("sidebar-lsp-skema").classList.add("sidebar-active-list")

   function submit(kodeSkema, pilih) {
      if (pilih == 1) {
         if (confirm("Apakah Yakin Untuk Terima Skema Ini?")) {
            window.open("<?php echo base_url("Controller_Admin/updateSkema/") ?>"+kodeSkema+"/Terima", "_self")
         }
      } else if (pilih == 0){
         if (confirm("Apakah Yakin Untuk Tolak Skema Ini?")) {
            window.open("<?php echo base_url(); ?>Controller_Admin/updateSkema/" + kodeSkema +"/Tolak", "_self")
         }
      }
   }

   function file(kodeSkema) {
      window.open("<?php echo base_url("controller_admin/fileskema")?>/" + kodeSkema)
   }
</script>
<h5 class="d-flex justify-content-between align-items-end">
   <div class="d-flex">
      <a href="<?php echo base_url('controller_admin/skema')?>" class="link-dark link-underline-opacity-0 link-underline-opacity-75-hover d-flex align-item-center">
         Kelola Data Skema
      </a>
      <div class="mx-2">/</div>
      <div class="me-2"><?php echo $skema[0]->namaSkema?></div>
      
         <?php
            if(!empty($skema[0]->verifikasiSkema)) {
                if($skema[0]->verifikasiSkema === "Terima") {
                  echo "<span class='badge bg-success fw-semibold'>Sudah Diverifikasi</span>";
               } else {
                  echo "<span class='badge bg-danger fw-semibold'>Ditolak</span>";
               }
            } else {
               echo "<span class='badge bg-primary fw-semibold'>Belum Diverifikasi!</span>";
            }
         ?>
      
   </div>
   <div>
   <?php
      if($skema[0]->verifikasiSkema == null) {
         echo "
         <button class='btn btn-success' onclick='submit(".$skema[0]->kodeSkema.", 1)'>Terima</button>
         <button class='btn btn-danger' onclick='submit(".$skema[0]->kodeSkema.", 0)'>Tolak</button>
         ";
      } else {
         echo "No Access";
      }
   ?>
   </div>
</h5>
<hr>
<div>
   <div class="mb-3 row">
      <label class="col-sm-2 col-form-label">Kode Skema</label>
      <div class="col-sm-10 col-form-label">
         <div><?php echo $skema[0]->kodeSkema?></div>
      </div>
   </div>
   <div class="mb-3 row">
      <label class="col-sm-2 col-form-label">Jurusan</label>
      <div class="col-sm-10 col-form-label">
         <div>
            <?php $query = $this->db
               ->select('namaJurusan')
               ->from('tbJurusan')
               ->where('idJurusan', $skema[0]->idJurusan)
               ->get()
               ->result();
            echo $query[0]->namaJurusan;?>
         </div>
      </div>
   </div>
   <div class="mb-3 row">
      <label class="col-sm-2 col-form-label">Biaya Skema</label>
      <div class="col-sm-10 col-form-label">
         <div>Rp. <?php echo $skema[0]->biaya?></div>
      </div>
   </div>
   <div class="mb-3 row">
      <label class="col-sm-2 col-form-label">Kapasitas Peserta</label>
      <div class="col-sm-10 col-form-label">
         <div><?php echo $skema[0]->kapasitasPeserta?> Peserta</div>
      </div>
   </div>
   <div class="mb-3 row">
      <label class="col-sm-2 col-form-label">Keterangan Skema</label>
      <div class="col-sm-10 col-form-label">
         <div><?php echo $skema[0]->keterangan?></div>
      </div>
   </div>
   <div class="mb-3 row">
      <label class="col-sm-2 col-form-label">Diinput Oleh</label>
      <div class="col-sm-10 col-form-label">
         <div><?php echo $skema[0]->nipPegawai?></div>
      </div>
   </div>
</div>
<hr>
<h5 class="d-flex justify-content-between align-items-end">
   <div>Data Unit</div>
   <button class="btn btn-primary" onclick="file(<?php echo $skema[0]->kodeSkema?>)">File Pendukung</button>
</h5>
<hr>
<div class="table-resposive">
   <table class="table table-hover">
      <thead>
         <tr>
            <th>No</th>
            <th>Kode Unit</th>
            <th>Judul Unit</th>
            <th>Jenis Standar</th>
            <th></th>
         </tr>
      </thead>
      <tbody>
         <?php
         $i = 1;
         if (!empty($unit)) {
            foreach ($unit as $data) :
         ?>
         <tr>
            <td><?php echo $i?></td>
            <td><?php echo $data->kodeUnit?></td>
            <td><?php echo $data->judulUnit?></td>
            <td><?php echo $data->jenisStandar?></td>
            <td>
               <button class="btn btn-danger">Hapus</button>
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

