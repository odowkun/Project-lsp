<!-- submit -->
<script>
   document.getElementById("sidebar-skema").classList.add("sidebar-active")
   document.getElementById("sidebar-skema-verifikasi").classList.add("sidebar-active-list")

   function submit(kodeSkema) {
      if (document.getElementsByName("verifikasiSkema").values == null) {
         document.getElementsByName("verifikasiSkema").focus
         return false
      } else {
         if (confirm("Data akan disimpan")) {
            window.open("<?php echo base_url(); ?>
            use LDAP\Result;Controller_Admin/updateSkema/" + kodeSkema, "_self")
         }
      }
   }
</script>

<!-- tabel -->
<h2>Tabel Verifikasi Skema</h2>
<hr class="mb-4">

<!-- <div class="table-responsive"> -->
<table class="table table-striped table-bordered table-hover table-responsive">
   <thead class="bg-dark text-white">
      <tr>
         <th>Nama Skema</th>
         <th>Jurusan</th>
         <th>Biaya</th>
         <th>Kapasitas</th>
         <th>Keterangan</th>
         <th>Verifikasi</th>
         <th>Diverifikasi Oleh</th>
         <th>Action</th>
      </tr>
   </thead>
   <tbody>
      <?php
      if (!empty($hasil)) {
         foreach ($hasil as $data):
            ?>
            <form action="<?php echo base_url('Controller_Admin/updateSkema/' . $data->kodeSkema) ?>" method="post">
               <tr>
                  <td class="">
                     <?php echo $data->namaSkema ?>
                  </td>
                  <td>
                     <?php
                        $query = $this->db
                           ->select('namaJurusan')
                           ->from('tbjurusan')
                           ->where('idJurusan', $data->idJurusan)
                           ->get();
                        foreach($query->result() as $jjj):
                           echo $jjj->namaJurusan;
                        endforeach; 
                     ?>
                  </td>
                  <td>
                     <?php echo $data->biaya ?>
                  </td>
                  <td>
                     <?php echo $data->kapasitasPeserta ?>
                  </td>
                  <td>
                     <?php echo $data->keterangan ?>
                  </td>
                  <td class="">
                     <select class="form-select px-3 py-0" name="verifikasiSkema" required>
                        <option value=''>Pilih</option>
                        <option value='Terima' <?php echo (strcmp($data->verifikasiSkema, 'Terima')) ? '' : 'selected'; ?>>
                           Terima</option>
                        <option value='Tolak' <?php echo (strcmp($data->verifikasiSkema, 'Tolak')) ? '' : 'selected'; ?>>Tolak
                        </option>
                     </select>
                  </td>
                  <td class="">
                     <?php echo $data->nipAdmin ?>
                  </td>
                  <td>
                     <?php
                        if($this->session->Username == $data->nipAdmin || $data->nipAdmin == "") { 
                           echo "
                           <button class='btn btn-secondary px-3 py-0' type='submit'>Submit</button> 
                           ";
                        } else {
                           echo "
                           No Access
                           ";
                        }
                     ?>
                  </td>
               </tr>

            </form>

            <?php
         endforeach;
      }

      ?>
   </tbody>
</table>