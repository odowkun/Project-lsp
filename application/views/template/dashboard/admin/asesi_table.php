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
<h2>Tabel Verifikasi Asesi</h2>
<hr class="mb-4">

<!-- <div class="table-responsive"> -->
   <table class="table table-striped table-bordered table-hover table-responsive">
      <thead class="bg-dark text-white">
         <tr>
            <th>NIM</th>
            <th>Nama Asesi</th>
            <th>Semester</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Prodi</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         <?php
         if (!empty($hasil)) {
            foreach ($hasil as $data):
               ?>
               <form action="<?php echo base_url('Controller_Admin/updateSkema/'.$data->nim)?>" method="post">
                  <tr>
                     <td class=""><?php echo $data->nim ?></td>
                     <td><?php echo $data->namaAsesi?></td>
                     <td><?php echo $data->smester?></td>
                     <td><?php echo $data->email?></td>
                     <td><?php echo $data->jurusan?></td>
                     <td><?php echo $data->prodi?></td>
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