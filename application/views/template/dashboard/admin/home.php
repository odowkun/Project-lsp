<div class="bg-primary-subtle p-2 rounded mb-4 ps-3" style="margin-left: -15px;">
   Selamat Datang, Admin
</div>

<!-- title  -->
<div class="row overflow-x-scroll">
   <div style="padding-left: 0; min-width: 440px;" class="col"> 
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
         <h6>Grafik Pendaftaran Asesi / Jurusan-Tahun 2023</h6>
         <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
               <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
         </div>
      </div>
      <canvas id="myChart" style="max-width: 440px; max-height: 300px;"></canvas>
   </div>
   <div class="col">
      <h6>Jumlah Skema / Jurusan</h6>
      <table class="d-flex table table-hover">
         <tr>
            <td>No</td>
            <td>Nama Jurusan</td>
            <td>Jumlah Skema</td>
         </tr>
         <tr>
            <td>1</td>
            <td>Akutansi</td>
            <td>10 Skema</td>
         </tr>
      </table>
   </div>

</div>

<!-- Graphs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script>
   var ctx = document.getElementById("myChart");
   var myChart = new Chart(ctx, {
   type: 'bar',
   data: {
      labels: ["Skema1", "Skema2", "Skema3", "Skema4", "Skema5", "Skema6"],
      datasets: [{
         data: [10, 32, 17, 21, 12, 23],
         lineTension: 2,
         backgroundColor: '#007bff',
      }]
   },
   options: {
      scales: {
         yAxes: [{
         ticks: {
            beginAtZero: true
         }
         }]
      },
      legend: {
         display: false,
      },
      resposive: true
   }
   });
</script>

<div>
   <h6>Data Asesi</h6>
   <div class="table-responsive">
      <table class="table table-hover">
         <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Asesi</th>
            <th>Jurusan</th>
            <th>Nama Skema</th>
            <th>Status FR.APL.01</th>
         </tr>
         <tr>
         </tr>
         <tr>
            <td>1</td>
            <td>21123123123</td>
            <td>Anan</td>
            <td>Teknik Elektro</td>
            <td>Web Programming</td>
            <td>
               <span class="badge bg-success fw-semibold">Diterima</span>
            </td>
         </tr>
      </table>
   </div>
</div>



