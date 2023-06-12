<div class="table-responsive">
<table class="table table-hover">
   <thead>
      <tr>
         <th>No</th>
         <th>Nama Skema</th>
         <th>Periode Mulai</th>
         <th>Periode Selesai</th>
         <th>Tempat</th>
      </tr>
   </thead> 
   <tbody>
      <?php
            if (!empty($hasil)) {
               $i = 1;
               foreach ($hasil as $data): ?>
               <tr>
                  <td>
                     <?php echo $i?>
                  </td>
                  <td>
                     <?php echo $data->kodeSkema?>
                  </td>
                  <td>
                     <button class="btn btn-success">Edit</button>
                     <button class="btn btn-danger">Hapus</button>
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