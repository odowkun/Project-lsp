<script>
   document.getElementById("sidebar-lsp").classList.add("sidebar-active")
   document.getElementById("sidebar-lsp-prodi").classList.add("sidebar-active-list")

   function hapusProdi(idProdi, namaProdi) {
      if(confirm("Apakah yakin menghapus Prodi "+namaProdi+"?")) {
         load("controller_admin/hapusProdi"+idProdi,"#script")
      }
   }
   
   function editProdi(idProdi){
      load("Controller_Admin/editProdi/"+idProdi,"#script")
   }
</script>
<h5>Kelola Data Program Studi</h5>
<hr>
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
<form action="<?php echo base_url("controller_admin/submitprodi")?>" method="post" class="needs-validation">
   <div class="mb-3 row">
      <label for="idProdi" class="col-sm-2 col-form-label">ID Prodi</label>
      <div class="col-sm-10">
         <input type="number" class="form-control" id="idProdi" name="idProdi" required>
      </div>
      <div class="valid-tooltip invalid-tooltip"></div>
   </div>
   <div class="mb-3 row">
      <label for="tingkatProdi" class="col-sm-2 col-form-label">Tingkat Prodi</label>
      <div class="col-sm-10">
         <select name="tingkatProdi" id="tingkatProdi" class="form-select" required>
            <option value="">Pilih</option>
            <option value="D1">D1</option>
            <option value="D2">D2</option>
            <option value="D3">D3</option>
            <option value="D4">D4</option>
         </select>
      </div>
   </div>
   <div class="mb-3 row">
      <label for="namaProdi" class="col-sm-2 col-form-label">Nama Prodi</label>
      <div class="col-sm-10">
         <input type="text " class="form-control" id="namaProdi" name="namaProdi" required>
      </div>
      <div class="valid-tooltip invalid-tooltip"></div>
   </div>
   <div class="mb-3 row">
      <label for="idJurusan" class="col-sm-2 col-form-label">Jurusan</label>
      <div class="col-sm-10">
         <select name="idJurusan" id="idJurusan" class="form-select" required>
            <option value="">Pilih</option>
            <?php
               $query = $this->db->get("tbjurusan");
               foreach($query->result() as $data):
            ?>
               <option value="<?php echo $data->idJurusan ?>"><?php echo $data->namaJurusan?></option>
            <?php
               endforeach; 
            ?>
         </select>
      </div>
   </div>
   <div class="mb-3 row">
      <label for="" class="col-sm-2 col-form-label"></label>
      <div class="col-sm-10">
         <button class="btn btn-primary" type="submit">Submit</button>
      </div>
   </div>
</form>

<hr>

<div class="table-responsive">
<table class="table table-hover">
   <thead>
      <tr>
         <th>No</th>
         <th>ID</th>
         <th>Nama Prodi</th>
         <th>Jurusan</th>
         <th>Aksi</th>
      </tr>
   </thead>
   <tbody>
      <?php
         if (!empty($hasil)) {
            $i=1;
            foreach ($hasil as $data) : ?>
      <tr>
         <td>
            <?php echo $i?>
         </td>
         <td>
            <?php echo $data->idProdi?>
         </td>
         <td>
            <?php echo $data->tingkatProdi ." ". $data->namaProdi?>
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
            <button class="btn btn-success" onclick="editProdi(<?php echo $data->idProdi ?>)">Edit</button>
            <button class="btn btn-danger" onclick="hapusProdi(<?php echo $data->idProdi ?>, '<?php echo $data->tingkatProdi .' '. $data->namaProdi ?>')">Hapus</button>
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