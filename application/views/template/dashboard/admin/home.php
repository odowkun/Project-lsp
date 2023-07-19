<script>
   function cek(nim, id) {
      window.open("<?php echo base_url(); ?>controller_admin/fileasesi/"+nim+"/"+id,"_self");
   }
</script>

<div class="bg-primary-subtle p-2 rounded mb-4 ps-3" style="margin-left: -15px;">
   Selamat Datang, Admin
</div>
<!-- title  -->
<div class="row">
   <div class="col-8 ps-0" style="max-height: 400px"> 
      <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
         <h6>Grafik Pendaftaran Asesi / Jurusan-Tahun 2023</h6>
         <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
               <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
         </div>
      </div> -->
      <div id="grafiks" style="width: 100%; max-width: 600px; max-height: 400px;"></div>
   </div>
   <div class="col-4">
      <h6>Jumlah Skema / Jurusan</h6>
      <table class="d-flex table table-hover">
         <tr>
            <td>No</td>
            <td>Nama Jurusan</td>
            <td>Jumlah Skema</td>
         </tr>
         <?php
         if (!empty($skema)) {
            $i = 1;
            foreach ($skema as $data): ?>
            <tr>
               <td><?php echo $i ?></td>
               <td><?php echo $data->namaJurusan ?></td>
               <td><?php echo $data->jumlah ?></td>
            </tr>
         <?php
            $i++;
            endforeach;
         }
         ?>
      </table>
   </div>

</div>

<!-- Graphs -->
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
   google.charts.load('1', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);

   function drawChart() {
   const data = google.visualization.arrayToDataTable([
      ['Jurusan', 'Asesi'],
      <?php echo $grafik?>
   ]);

   const options = {
   title: "Grafik Pendaftaran Asesi / Jurusan-Tahun 2023"
   };

   const chart = new google.visualization.BarChart(document.getElementById('grafiks'));
   chart.draw(data, options);
}
</script>

<div>
   <h6>Data Asesi</h6>
   <div class="table-responsive">
      <table class="table table-hover">
         <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Asesi</th>
            <th>Nama Skema</th>
            <th>Status FR.APL.01</th>
         </tr>
         <?php
         $i = 1;
         if(!empty($asesi)) {
            foreach ($asesi as $data) : ?>
         <tr ondblclick="cek(<?php echo $data->nim . ', ' . $data->idUjian?>)">
            <td><?php echo $i ?></td>
            <td><?php echo $data->nim?></td>
            <td><?php echo $data->namaAsesi?></td>
            <td><?php echo $data->namaSkema?></td>
            <td>
               
            <?php 
            switch ($data->verifikasiKelengkapan) {
               case "Terima" : 
                  echo "<span class='badge bg-success fw-normal'>Diterima"; break;
               case "Tolak" : 
                  echo "<span class='badge bg-danger fw-normal'>Ditolak"; break;
               default : 
               echo "<span class='badge bg-secondary fw-normal'>Belum Dicek";
            } 
            ?>
               </span>
            </td>
         </tr>
         <?php
         $i++;
            endforeach;
         } else {
            echo "<tr><td colspan='6'><center>Data Kosong</center></td></tr>";
         }
         ?>
      </table>
   </div>
</div>



