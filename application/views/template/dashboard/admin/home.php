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
      <table class="d-flex table">
         <tr>
            <th>No</th>
            <th>Nama Jurusan</th>
            <th>Jumlah Skema</th>
         </tr>
         <?php
         $total = 0;
         if (!empty($skema)) {
            $i = 1;
            foreach ($skema as $data): ?>
            <tr>
               <td><?php echo $i ?></td>
               <td><?php echo $data->namaJurusan ?></td>
               <td><?php echo $data->jumlah?> Skema</td>
            </tr>
         <?php
            $total = $data->jumlah + $total;
            $i++;
            endforeach;
         }
         ?>

         <tr>
            <td colspan="2" align="right"><b>Total : </b></td>
            <td><?= $total?> Skema Aktif<td>
         </tr>
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
      <table class="table">
         <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Asesi</th>
            <th>Nama Skema</th>
            <th>Status</th>
         </tr>
         <?php
         $i = 1;
         if(!empty($asesi)) {
            foreach ($asesi as $data) : ?>
         <tr >
            <td><?php echo $i ?></td>
            <td><?php echo $data->nim?></td>
            <td><?php echo $data->namaAsesi?></td>
            <td><?php echo $data->namaSkema?></td>
            <td></td>
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



