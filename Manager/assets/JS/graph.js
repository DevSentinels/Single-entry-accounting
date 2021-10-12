
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
  