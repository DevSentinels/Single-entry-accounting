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