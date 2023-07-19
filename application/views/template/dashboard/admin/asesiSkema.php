<script>
   function detail(nim, id) {
      window.open("<?php echo base_url('controller_admin/fileasesi/')?>" + nim + "/" + id, "_self")
   }
</script>
<h5>Skema Yang Didaftar</h5>
<hr>
<table class="table table-hover">
   <thead>
      <tr>
         <th>Nama Skema</th>
         <th>Periode</th>
         <th>Tempat</th>
         <th></th>
      </tr>
   </thead>
   <tbody>
      <?php
      if (!empty($skema)) {
         foreach($skema as $data) :
      ?>
      <tr ondblclick="detail('<?php echo $data->nim?>', '<?php echo $data->idUjian?>')">
         <td><?php echo $data->namaSkema?></td>
         <td><?php echo date_format(date_create($data->periodeMulai),"d M Y") . " - " . date_format(date_create($data->periodeSelesai), "d M Y")?></td>
         <td><?php echo $data->tempat?></td>
         <td><?php 
            if (!empty($data->verifikasiBayar)) {
               if ($data->verifikasiBayar === "Daftar") {
                  echo "<span class='badge bg-success fw-normal'>Terdaftar</span>";
               } else {
                  echo "<span class='badge bg-success fw-normal'>Batal</span>";
               }
            } else {
               echo "<span class='badge bg-secondary fw-normal'>Belum Divalidasi</span>";
            }
         ?>
         </td>
      </tr>
         <?php
            endforeach;
         } else {
            echo "<td colspan='4'>Asesi Belum Mendaftar</td>";
         }
         ?>
   </tbody>
</table>