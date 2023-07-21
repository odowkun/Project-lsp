<script>
   document.getElementById("sidebar-user").classList.add("sidebar-active")
   document.getElementById("sidebar-user-berkas").classList.add("sidebar-active-list")

   function detail(id) {
      window.open("<?=base_url()?>controller_admin/detailberkas/"+id , "_self")
   }
</script>
<div>
   <h5>Data Berkas LSP PNB</h5>
   <hr>
   <div class="table-responsive">
      <table class="table table-hover">
         <tr>
            <th>No</th>
            <th>Nama Skema</th>
            <th>Nama Asesi</th>
            <th>NIM</th>
            <th>Status Kelengkapan</th>
            <th>Status Pembayaran</th>
            <th></th>
         </tr>
         <?php
         $i = 1;
         if(!empty($asesi)) {
            foreach ($asesi as $data) : ?>
         <tr ondblclick="detail('<?= $data->idUjian?>')">
            <td align="center"><?php echo $i ?></td>
            <td><?php echo $data->namaSkema?></td>
            <td><?php echo $data->namaAsesi?></td>
            <td><?php echo $data->nim?></td>
            <td align="center">
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
            <td align="center">
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
            <td>
            <?php
            if (empty($data->verifikasiBayar) || empty($data->verifikasiKelengkapan)) {
               echo "
               <svg xmlns='http://www.w3.org/2000/svg' height='1.3em' viewBox='0 0 512 512' fill='var(--bs-primary)'><path d='M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z'/></svg>
               ";
            } else if ($data->verifikasiBayar === "Tolak" || $data->verifikasiKelengkapan === "Tolak") {
               echo "
               <svg xmlns='http://www.w3.org/2000/svg' height='1.3em' viewBox='0 0 512 512' fill='var(--bs-danger)'><path d='M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z'/></svg>
               ";
            } else {
               echo "
               <svg xmlns='http://www.w3.org/2000/svg' height='1.3em' viewBox='0 0 512 512' fill='var(--bs-success)'><path d='M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 09.4 24.6 0 33.9z'/></svg>
               ";
            }
            ?>
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