<!-- submit -->
<script>
   document.getElementById("sidebar-lsp").classList.add("sidebar-active")
   document.getElementById("sidebar-lsp-skema").classList.add("sidebar-active-list")

   function submit(kodeSkema) {
      if (document.getElementsByName("verifikasiSkema").values == null) {
         document.getElementsByName("verifikasiSkema").focus
         return false
      } else {
         if (confirm("Data akan disimpan")) {
            window.open("<?php echo base_url(); ?>Controller_Admin/updateSkema/" + kodeSkema, "_self")
         }
      }
   }
</script>

<h5>Kelola Data Skema</h5>
<hr>

<div class="table-responsive">
<table class="table">
   <thead>
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
                  <td>
                     <?php echo $data->namaSkema ?>
                  </td>
                  <td>
                     <?php
                        $query = $this->db
                           ->select('namaJurusan')
                           ->from('tbJurusan')
                           ->where('idJurusan', $data->idJurusan)
                           ->get();
                        foreach($query->result() as $namaJurusan):
                           echo $namaJurusan->namaJurusan;
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
                  <td>
                     <select class="form-select" name="verifikasiSkema" required>
                        <option value=''>Pilih</option>
                        <option value='Terima' <?php echo ($data->verifikasiSkema === 'Terima') ?  'selected' : ''; ?>>
                           Terima</option>
                        <option value='Tolak' <?php echo ($data->verifikasiSkema === 'Tolak') ? 'selected': ''; ?>>Tolak
                        </option>
                     </select>
                  </td>
                  <td>
                     <?php echo $data->nipAdmin ?>
                  </td>
                  <td>
                     <?php
                        if($this->session->Username == $data->nipAdmin || $data->nipAdmin == "") { 
                           echo "
                           <button class='btn btn-secondary' type='submit'>Submit</button> 
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
               <tr>
                  <td colspan="8">
                     <button class="btn btn-success">Tambah Skema Unit</button>
                     <button class="btn btn-primary">Lampiran</button>
                     <button class="btn btn-info">Detail Skema</button>
                  </td>
               </tr>


            <?php
         endforeach;
      }

      ?>
   </tbody>
</table>
</div>