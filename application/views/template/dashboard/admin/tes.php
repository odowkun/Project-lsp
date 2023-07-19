<html>
   <head>

   </head>
   <body>
      
      <!-- <div id="script"></div>
          <script src="http://localhost/LSP/jquery/app.js"></script>
          <script language="javascript">
              var site = "http://localhost/LSP/index.php/";
              var loading_image_large = "http://localhost/LSP/gambar/loading_large.gif";
          </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
      
      <div id="grafiks" style="width: 100%; max-width: 600px; max-height: 500px;"></div>
      
      <script src="https://www.gstatic.com/charts/loader.js"></script>
      <script>
      
         google.charts.load('1', {'packages':['corechart']});
         google.charts.setOnLoadCallback(drawChart);
      
         function drawChart() {
            const data = google.visualization.arrayToDataTable([
               ['Contry', 'Mhl'],
               ['Italy',55],
               ['France',49],
               ['Spain',44],
               ['USA',24],
               ['Argentina',15]
            ]);
            
            const options = {
               title:'World Wide Wine Production'
            };
            
            const chart = new google.visualization.BarChart(document.getElementById('grafiks'));
            chart.draw(data);
            
         }
      </script>
         
      
   </body>
</html>