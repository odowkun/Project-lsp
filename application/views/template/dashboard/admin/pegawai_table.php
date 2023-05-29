<!-- submit -->
<script>
   document.getElementById("sidebar-pegawai").classList.add("sidebar-active")
   document.getElementById("sidebar-pegawai-data").classList.add("sidebar-active-list")

   function submit(kodeSkema) {
      if (document.getElementsByName("verifikasiSkema").values == null) {
         document.getElementsByName("verifikasiSkema").focus
         return false
      } else {
         if(confirm("Data akan disimpan")) {
            window.open("<?php echo base_url(); ?>Controller_Admin/updatePegawai/"+kodeSkema, "_self")
         } 
      }
   }
</script>

<!-- tabel -->
<h2>Data Pegawai</h2>
<hr class="mb-4">

<!-- <div class="table-responsive"> -->
   <table class="table table-striped table-bordered table-hover table-responsive">
      <thead class="bg-dark text-white">
         <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>No HP</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         <?php
         if (!empty($hasil)) {
            foreach ($hasil as $data):
               $date=date_create($data->tanggalLahir);
               ?>
               <form action="<?php echo base_url('Controller_Admin/updatePegawai/'.$data->nipPegawai)?>" method="post">
                  <tr>
                     <td class=""><?php echo $data->nipPegawai ?></td>
                     <td><?php echo $data->namaPegawai?></td>
                     <td><?php echo $data->jenisKelamin?></td>
                     <td><?php echo $data->noHP?></td>
                     <td><?php echo $data->tempatLahir?></td>
                     <td><?php echo date_format($date,"d M Y");?></td>
                     <td>
                        <button class="btn btn-secondary px-3 py-0" type="submit">Submit</button>
                     </td>
                  </tr>
               </form>
               
         <?php
            endforeach;
         }

         ?>
      </tbody>
   </table>