<script>
   function detail(nim, id) {
      
   }
</script>
<div>
   <h6>Data Asesi</h6>
   <div class="table-responsive">
      <table class="table table-hover">
         <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Asesi</th>
            <th>Nama Skema</th>
            <th>Status FR.APL.01</th>
            <th>Status Pembayaran</th>
         </tr>
         <?php
         $i = 1;
         if(!empty($asesi)) {
            foreach ($asesi as $data) : ?>
         <tr ondblclick="detail()">
            <td><?php echo $i ?></td>
            <td><?php echo $data->nim?></td>
            <td><?php echo $data->namaAsesi?></td>
            <td><?php echo $data->namaSkema?></td>
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
            echo "<tr><td colspan='6'><center>Data Kosong</center></td></tr>";
         }
         ?>
      </table>
   </div>
</div>