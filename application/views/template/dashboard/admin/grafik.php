<!-- title  -->
<div style="padding-left: 0; max-width: 700px;" class=""> 
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">Grafik Skema</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
         <div class="btn-group mr-2">
            <button class="btn btn-sm btn-outline-secondary">Export</button>
         </div>
      </div>
   </div>
   <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
</div>

<!-- Graphs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script>
   document.getElementById("sidebar-skema").classList.add("sidebar-active")
   document.getElementById("sidebar-skema-grafik").classList.add("sidebar-active-list")
   
   var ctx = document.getElementById("myChart");
   var myChart = new Chart(ctx, {
   type: 'bar',
   data: {
      labels: ["Skema1", "Skema2", "Skema3", "Skema4", "Skema5", "Skema6", "Skema7"],
      datasets: [{
         data: [12, 32, 12, 64, 12, 23, 32],
         lineTension: 0,
         backgroundColor: '#007bff',
      }]
   },
   options: {
      scales: {
         yAxes: [{
         ticks: {
            beginAtZero: false
         }
         }]
      },
      legend: {
         display: false,
      }
   }
   });
</script>
