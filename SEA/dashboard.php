
<?php 

include_once '../includes/dbprocess.php';

if(isset($_SESSION['isLoggedin'])){
  
}else{
  header("Location: ../index.php");
}


include 'includes/header.php'; 

include 'includes/menu.php'; 


?>


     <div class="title-top">

            <div class="title-wrapper">
                <h2><?php echo $_SESSION['business_name']?></h2>
            </div>
            <div class="title-wrapper">
                <h2>Annual Report</h2>
            </div>
    </div>
          <form action="" method="POST">
                    <div id="Quarterly" class="filter-wrapper">

                        <span class="custom-dropdown big">
                        <select name="year" required>    
                        <option >2021</option>
                        <option >2021</option>
                        <option >2021</option>
                        <option >2021</option>
                        <option >2021</option>
                        <option >2021</option>
                        <option >2021</option>
                        <option >2021</option>
                       
                        </select>


                        </span>
              
                        <div class="input-container cta">
                                        <button class="signup-btn continue" type="submit" name="generate-quarterly">RUN REPORT</button>
                                </div>
                                
                        </div>
             </form>


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


     
            <?php 
            if (isset($_SESSION['response']) && $_SESSION['response'] !='') { ?>

            <script>
            swal({
                title: "<?php echo $_SESSION['response']?>",
                icon: "<?php echo $_SESSION['res_type']?>",
                button: "Done",
            });
            </script>
        
            <?php
                unset($_SESSION['response']); }
            ?>


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
          ['JAN', 15000, 30000],
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
    


    // DONUT CHART

google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['INCOME', 'EXPENSES'],
    ['OPERATING',     23000],
    ['FINANCING',     5000],
    ['INVESTING',     30000]
    
  ]);

  var options = {
    title: 'CASH FLOW FOR THE YEAR ENDED 2021',
    pieHole: 0.4,
  };

  var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
  chart.draw(data, options);
}





</script>




//
<script>

  google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["cash", "amount", { role: "style" } ],
        ["JAN", 30000, "#17b978"],
        ["FEB", 10200, "#17b978"],
        ["MAR", 10610, "#17b978"],
        ["APR", 50000, "#17b978"],
        ["MAY", 60000, "#17b978"],
        ["JUN", 40000, "#17b978"],
        ["JUL", 50000, "#17b978"],
        ["AUG", 60000, "#17b978"],
        ["SEP", 20000, "#17b978"],
        ["OCT", 20000, "#17b978"],
        ["NOV", 32000, "#17b978"],
        ["DEC", 20000, "#17b978"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Cashflow of the year ended 2021",
        width: 600,
        height: 300,
        bar: {groupWidth: "70%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  
      </script>

      <script>

        
  google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["cash", "amount", { role: "style" } ],
        ["JAN", 30000, "#17b978"],
        ["FEB", 10200, "#17b978"],
        ["MAR", 10610, "#17b978"],
        ["APR", 50000, "#17b978"],
        ["MAY", 60000, "#17b978"],
        ["JUN", 40000, "#17b978"],
        ["JUL", 50000, "#17b978"],
        ["AUG", 60000, "#17b978"],
        ["SEP", 20000, "#17b978"],
        ["OCT", 20000, "#17b978"],
        ["NOV", 32000, "#17b978"],
        ["DEC", 20000, "#17b978"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Cashflow of the year ended 2021",
        width: 600,
        height: 300,
        bar: {groupWidth: "70%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  
      </script>

      <script>

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

  var data = google.visualization.arrayToDataTable([
    ['INCOME', 'AMOUNT'],
    ['INCOME',     30000],
    ['EXPENSES',     20000],
    
  ]);

  var options = {
    title:'INCOME STATEMENT FOR THE YEAR ENDED 2021'
  };

  var chart = new google.visualization.PieChart(document.getElementById('piechart'));

  chart.draw(data, options);
}
      </script>