<!-- submit -->
<script>
   document.getElementById("sidebar-user").classList.add("sidebar-active")
   document.getElementById("sidebar-user-asesi").classList.add("sidebar-active-list")

   function detail(nim) {
      window.open("<?php echo base_url(); ?>controller_admin/detailasesi/"+nim,"_self");
   }

   function hapusAsesi(nim, nama) {
      if(confirm("Anda Yakin Ingin Menghapus Asesi : "+ nama)) {

      }
   }
</script>

<!-- tabel -->
<h5>Data Asesi LSP Politeknik Negeri Bali</h5>
<hr>
<div class="table-responsive">
   <table class="table table-hover">
      <thead>
         <tr>
            <th>No</th>
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
            $i = 1;
            foreach ($hasil as $data):
         ?>
         <tr ondblclick="detail('<?php echo $data->nim?>')">
            <td><?php echo $i ?></td>
            <td><?php echo $data->nim ?></td>
            <td><?php echo $data->namaAsesi?></td>
            <td><?php echo $data->smester?></td>
            <td><?php echo $data->email?></td>
            <td><?php echo $data->jurusan?></td>
            <td><?php echo $data->prodi?></td>
            <td>
               <button class="btn btn-success" onclick="detail('<?php echo $data->nim?>')">Detail</button>
               <button class="btn btn-danger" onclick="hapusAsesi('<?php echo $data->nim?>', '<?php echo $data->namaAsesi?> ?')">Delete</button>
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