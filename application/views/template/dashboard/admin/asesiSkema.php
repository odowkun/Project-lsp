<script>
   function detail(id) {
      window.open("<?=base_url()?>controller_admin/detailberkas/"+id, "_self")
   }
</script>
<h5>Skema Yang Didaftarkan</h5>
<hr>
<table class="table table-hover">
   <thead>
      <tr>
         <th>No</th>
         <th>Nama Skema</th>
         <th>Tempat</th>
         <th>Berkas Kelengkapan</th>
         <th>Bukti Pembayaran</th>
      </tr>
   </thead>
   <tbody>
      <?php
      $i = 1;
      if (!empty($skema)) {
         foreach($skema as $data) :
      ?>
      <tr ondblclick="detail('<?=$data->idUjian?>')">
         <td><?=$i?></td>
         <td><?php echo $data->namaSkema?></td>
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
            $i++;
            endforeach;
         } else {
            echo "<td colspan='4'>Asesi Belum Mendaftar</td>";
         }
         ?>
   </tbody>
</table>