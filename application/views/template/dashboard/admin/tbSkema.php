<!-- submit -->
<script>
   document.getElementById("sidebar-lsp").classList.add("sidebar-active")
   document.getElementById("sidebar-lsp-skema").classList.add("sidebar-active-list")

   function detail(kodeSkema) {
      window.open("<?php echo base_url("controller_admin/detail/")?>" + kodeSkema, "_self");
   }
</script>

<?php
$pesan = $this->session->userdata('pesan');
if (!empty($pesan)) {
   echo "
      <div class='alert alert-success alert-dismissable d-flex align-item-center justify-content-between'>
         <div class='text'>".$pesan."</div>
         <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
      </div>
      ";
}
?>

<h5>Kelola Data Skema</h5>
<hr>

<div class="table-responsive">
<table class="table table-hover">
   <thead>
      <tr>
         <th>Nama Skema</th>
         <th>Jurusan</th>
         <th>Verifikasi</th>
         <th></th>
      </tr>
   </thead>
   <tbody>
      <?php
      if (!empty($hasil)) {
         foreach ($hasil as $data):
      ?>
      <tr ondblclick="detail(<?php echo $data->kodeSkema?>)">
         <td>
            <?php echo $data->namaSkema ?>
         </td>
         <td>
            <?php
               $query = $this->db
                  ->select('namaJurusan')
                  ->from('tbJurusan')
                  ->where('idJurusan', $data->idJurusan)
                  ->get()
                  ->result();
               echo $query[0]->namaJurusan;
            ?>
         </td>
         <td>
            <?php
               if(!empty($data->nipAdmin)) { 
                  if ($data->verifikasiSkema === "Terima") {
                     echo "
                     <span class='badge bg-success fw-normal'>Diterima ($data->nipAdmin)</span>
                     ";
                  } else if ($data->verifikasiSkema === "Tolak") {
                     echo "
                     <span class='badge bg-danger fw-normal '>Ditolak ($data->nipAdmin)</span>
                     ";
                  } 
               } else {
                  echo "
                  <span class='badge bg-primary fw-normal'>Belum Diverifikasi!</span>
                  ";
               }
            ?>
         </td>
         <td>
            <button class="btn btn-info" onclick="detail(<?php echo $data->kodeSkema?>)" href="">Detail Skema</button>
         </td>
      </tr>
      <?php
         endforeach;
      }

      ?>
   </tbody>
</table>
</div>