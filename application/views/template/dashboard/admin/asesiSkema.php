<h5>Skema Yang Didaftarkan</h5>
<hr>
<table class="table">
   <thead>
      <tr>
         <th>Nama Skema</th>
         <th>Periode</th>
         <th>Tempat</th>
         <th>Berkas Kelengkapan</th>
         <th>Bukti Pembayaran</th>
      </tr>
   </thead>
   <tbody>
      <?php
      if (!empty($skema)) {
         foreach($skema as $data) :
      ?>
      <tr>
         <td><?php echo $data->namaSkema?></td>
         <td><?php echo date_format(date_create($data->periodeMulai),"d M Y") . " - " . date_format(date_create($data->periodeSelesai), "d M Y")?></td>
         <td><?php echo $data->tempat?></td>
         <td>
            <?php 
            switch ($data->verifikasiKelengkapan) {
               case "Terima" : 
                  echo "<span class='badge bg-success fw-normal'>Diterima"; break;
               case "Tolak" : 
                  echo "<span class='badge bg-danger fw-normal'>Ditolak"; break;
               default : 
               echo "<span class='badge bg-secondary fw-normal'>Belum Dicek";
            } 
            ?>
               </span>
            </td>
            <td>
            <?php 
            switch ($data->verifikasiBayar) {
               case "Terima" : 
                  echo "<span class='badge bg-success fw-normal'>Diterima"; break;
               case "Tolak" : 
                  echo "<span class='badge bg-danger fw-normal'>Ditolak"; break;
               default : 
               echo "<span class='badge bg-secondary fw-normal'>Belum Dicek";
            } 
            ?>
               </span>
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