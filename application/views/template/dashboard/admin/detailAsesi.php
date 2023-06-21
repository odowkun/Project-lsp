<script>
   document.getElementById("sidebar-user").classList.add("sidebar-active")
   document.getElementById("sidebar-user-asesi").classList.add("sidebar-active-list")

   function detail(kodeSkema) {
      window.open("<?php echo base_url("controller_admin/detail/")?>" + kodeSkema, "_self");
   }
</script>
<h5 class="d-flex">
   <a href="<?php echo base_url('controller_admin/asesi')?>" class="link-dark link-underline-opacity-0 link-underline-opacity-75-hover d-flex align-item-center">
      Kelola Data Asesi
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
<h5>Skema Yang Didaftar</h5>
<hr>
<table class="table table-hover">
   <thead>
      <tr>
         <th>Nama Skema</th>
         <th>Periode</th>
         <th>Tempat</th>
         <th></th>
      </tr>
   </thead>
   <tbody>
      <?php
      if (!empty($skema)) {
         foreach($skema as $data) :
      ?>
      <tr ondblclick="detail(<?php echo $data->kodeSkema?>)">
         <td><?php echo $data->namaSkema?></td>
         <td><?php echo date_format(date_create($data->periodeMulai),"d M Y") . " - " . date_format(date_create($data->periodeSelesai), "d M Y")?></td>
         <td><?php echo $data->tempat?></td>
         <td><?php 
            if (!empty($data->verifikasiDaftar)) {
               if ($data->verifikasiDaftar === "Daftar") {
                  echo "<span class='badge bg-success fw-normal'>Terdaftar</span>";
               } else {
                  echo "<span class='badge bg-success fw-normal'>Batal</span>";
               }
            } else {
               echo "<span class='badge bg-secondary fw-normal'>Belum Divalidasi</span>";
            }
         ?>
         </td>
      </tr>
         <?php
            endforeach;
         } else {
            echo "<td colspan='4'>Asesi Belum Mendaftar</td>";
         }
         ?>
   </tbody>
</table>