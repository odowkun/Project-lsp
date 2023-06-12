<!-- submit -->
<script>
   document.getElementById("sidebar-user").classList.add("sidebar-active")
   document.getElementById("sidebar-user-asesi").classList.add("sidebar-active-list")

   function editAsesi(nim) {
      load("controller_admin/editasesi/"+nim, "#script")
   }
</script>

<!-- tabel -->
<h5>Kelola Data Asesi</h5>
<hr class="mb-4">

<form action="<?php echo base_url("Controller_Admin/simpanPegawai")?>" method="post" class="needs-validation" novalidate>
   <div class="mb-3 row">
      <label for="nim" class="col-sm-2 col-form-label">NIM</label>
      <div class="col-sm-10">
         <input type="number" class="form-control" id="nim" name="nim" required>
      </div>
      <div class="valid-tooltip invalid-tooltip"></div>
   </div>
   <div class="mb-3 row">
      <label for="namaAsesi" class="col-sm-2 col-form-label">Nama</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="namaAsesi" name="namaAsesi" required>
      </div>
   </div>
   <div class="mb-3 row">
      <label for="smester" class="col-sm-2 col-form-label">Semester</label>
      <div class="col-sm-10">
         <select name="smester" id="smester" class="form-select" required>
            <option value="">Pilih</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
         </select>
      </div>
   </div>
   <div class="mb-3 row">
      <label for="email" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
         <input type="email" class="form-control" id="email" name="email" required>
      </div>
   </div>
   <div class="mb-3 row">
      <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="jurusan" name="jurusan" required>
      </div>
   </div>
   <div class="mb-3 row">
      <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="prodi" name="prodi" required>
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
   <table class="table">
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
         <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $data->nim ?></td>
            <td><?php echo $data->namaAsesi?></td>
            <td><?php echo $data->smester?></td>
            <td><?php echo $data->email?></td>
            <td><?php echo $data->jurusan?></td>
            <td><?php echo $data->prodi?></td>
            <td>
               <button class="btn btn-success" onclick="editAsesi(<?php echo $data->nim?>)">Edit</button>
               <button class="btn btn-danger" onclick="hapusAsesi(<?php echo $data->nim?>)">Delete</button>
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