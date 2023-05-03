// Load the Visualization API and the corechart package
google.charts.load('current', {'packages':['corechart']});

// Set a callback to run when the Visualization API is loaded
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  // Send a POST request to the PHP file to retrieve the sales data
  $.ajax({
    url: 'getSalesData.php',
    type: 'POST',
    dataType: 'json',
    success: function(data) {
      // Create a new DataTable and add the data to it
      var dataTable = new google.visualization.DataTable();
      dataTable.addColumn('string', 'Product');
      dataTable.addColumn('number', 'Total Sales');
      dataTable.addRows(data);

      // Create the chart and set the options
      var options = {
       
        backgroundColor: 'transparent',
        width: "100%",
       
  
        
        chartArea:{height:'100%', width:'100%'},
    
        legend: {position: 'right', textStyle: {color: 'black', fontSize: 12}},
        pieSliceText: 'value',
 
      };
      var chart = new google.visualization.PieChart(document.getElementById('chart-div'));
      chart.draw(dataTable, options);
    },
    error: function() {
      alert('An error occurred while retrieving the sales data.');
    }
  });

   // Define the container element
   var container = document.getElementById('sales-line-chart');

   // Make an AJAX call to retrieve the data from the PHP script
   $.ajax({
     url: 'getLineChartData.php',
     type: 'POST',
     dataType: 'json',
     success: function(data) {
        
       // Create a new DataTable object and add the data
       var dataTable = new google.visualization.DataTable();
       dataTable.addColumn('date', 'Date');
       dataTable.addColumn('number', 'Sales');
       $.each(data, function(i, rowData) {
         dataTable.addRow([
           new Date(rowData.Date),
           parseFloat(rowData.sales_count)
         ]);
       });
       

       // Create a new LineChart object and draw it in the container element
       var chart = new google.visualization.LineChart(container);
       chart.draw(dataTable, {
     
         hAxis: {
           title: 'Date'
         },
         vAxis: {
           title: 'Sales'
         },
         legend: {
           position: 'none'
         }
       });
     },
     error: function() {
       alert('An error occurred while retrieving the sales data.');
     }
   });
 }

