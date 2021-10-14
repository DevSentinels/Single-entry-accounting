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