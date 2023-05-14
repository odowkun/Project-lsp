<!-- submit -->
<script>
   function submit(kodeSkema) {
      if (document.getElementsByName("verifikasiSkema").values == null) {
         document.getElementsByName("verifikasiSkema").focus
         return false
      } else {
         if(confirm("Data akan disimpan")) {
            window.open("<?php echo base_url(); ?>Controller_Admin/updateSkema/"+kodeSkema, "_self")
         } 
      }
   }
</script>

<!-- tabel -->
<h2>Tabel Verifikasi Skema</h2>
<hr class="mb-4">

<div class="table-responsive">
   <table class="table table-striped table-bordered table-hover">
      <thead class="bg-dark text-white">
         <tr>
            <th>Nama Skema</th>
            <th>Jurusan</th>
            <th>Biaya</th>
            <th>Kapasitas</th>
            <th>Keterangan</th>
            <th>Verifikasi</th>
            <th>Diverifikasi Oleh</th>
            <th >Action</th>
         </tr>
      </thead>
      <tbody>
         <?php
         if (!empty($hasil)) {
            foreach ($hasil as $data):
               ?>
               <form action="<?php echo base_url('Controller_Admin/updateSkema/'.$data->kodeSkema)?>" method="post">
                  <tr>
                     <td class=""><?php echo $data->namaSkema ?></td>
                     <td><?php echo $data->idJurusan?></td>
                     <td><?php echo $data->biaya?></td>
                     <td><?php echo $data->kapasitasPeserta?></td>
                     <td><?php echo $data->keterangan?></td>
                     <td class="">
                        <select class="form-select" name="verifikasiSkema">
                           <option value=''>Pilih</option>
                           <option value='Terima' <?php echo (strcmp($data->verifikasiSkema, 'Terima')) ? '' : 'selected'; ?> aria-required="true">Terima</option>
                           <option value='Tolak' <?php echo (strcmp($data->verifikasiSkema, 'Tolak')) ? '' : 'selected'; ?>>Tolak</option>
                        </select>
                     </td>
                     <td class=""><?php echo $data->nipAdmin ?></td>
                     <td>
                        <button class="btn btn-primary" type="submit">Submit</button>
                     </td>
                  </tr>

               </form>
               
         <?php
            endforeach;
         }

         ?>
      </tbody>
   </table>