
<?php include 'includes/header.php'; 

include 'includes/menu.php'; ?>


     <div class="heading">
          <h2>
          Chart and Graph Report

          </h2>

          <form action="">
         
          </form>
     </div>

     <span class="custom-dropdown big">
               <select>    
                    <option>2021</option>
                    <option>2021</option>
                    <option>2021</option>
                    <option>2021</option>
                    <option>2021</option>
                      <option>2021</option>
                    
               </select>
               </span>
  <div class="main-content">
                <div class="info-card">
                  
                <div class="card1">
                <div id="piechart" class="cards" style="width: 600px; height: 400px;"></div>
                </div>
                <div class="card1">
                <div id="chart_div" class="cards" style="width: 500px; height: 300px;"></div>
                </div>
                
            </div>

     </div>
     

     <div class="main-content">
                <div class="info-card">
                  
                <div class="card1">
                <div id="donutchart" class="cards" style="width: 600px; height: 400px;"></div>
                </div>
                <div class="card1">
                <div id="columnchart_values" class="cards" style="width: 500px; height: 300px;"></div>
                </div>
                
            </div>

     </div>

         <?php include 'includes/footer.php' ?>

         
  <!-- <
       
<div class="dashboard">
          <div class="wrapper">

               <div id="piechart" class="piechart cards"></div>
               <div id="columnchart_values" class="bar cards"></div>

           </div>
   </div>

   
  -->
  <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {

        var button = document.getElementById('change-chart');
        var chartDiv = document.getElementById('chart_div');

        var data = google.visualization.arrayToDataTable([
          ['INCOME STATEMENT', 'INCOME', 'EXPENSES'],
          ['JAN', 8000, 30000],
          ['FEB', 8000, 30000],
          ['MAR', 8000, 30000],
          ['APR', 8000, 30000],
          ['MAY', 8000, 30000],
          ['JUN', 8000, 30000],
          ['JUL', 8000, 30000],
          ['AUG', 24000, 30000],
          ['SEP', 30000, 30000],
          ['OCT', 50000, 30000],
          ['NOV', 60000, 30000],
          ['DEC', 60000,30000]
        ]);

        var materialOptions = {
          width: 600,
          chart: {
            title: 'INCOME STATEMENT YEAR END 2021',
            subtitle: ''
          },
          series: {
            0: { axis: 'INCOME' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'EXPENSES' } // Bind series 1 to an axis named 'brightness'.
          },
          axes: {
            y: {
              distance: {label: 'parsecs'}, // Left y-axis.
              brightness: {side: 'right', label: 'apparent magnitude'} // Right y-axis.
            }
          }
        };

        

        function drawMaterialChart() {
          var materialChart = new google.charts.Bar(chartDiv);
          materialChart.draw(data, google.charts.Bar.convertOptions(materialOptions));
          button.innerText = 'Change to Classic';
          button.onclick = drawClassicChart;
        }

        function drawClassicChart() {
          var classicChart = new google.visualization.ColumnChart(chartDiv);
          classicChart.draw(data, classicOptions);
          button.innerText = 'Change to Material';
          button.onclick = drawMaterialChart;
        }

        drawMaterialChart();
    };
    </script>