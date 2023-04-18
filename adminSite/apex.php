<?php
// Retrieve or generate the chart data
$data = array(
  array('January', 10),
  array('February', 20),
  array('March', 30),
  array('April', 40),
  array('May', 50),
  array('June', 60),
  array('July', 70),
  array('August', 80),
  array('September', 90),
  array('October', 100),
  array('November', 110),
  array('December', 120)
);

// Set the content type header to JSON
header('Content-Type: application/json');

// Return the data as a JSON-encoded string
echo json_encode($data);
?>

<!-- Include jQuery and ApexCharts libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.28.3/dist/apexcharts.min.js"></script>

<!-- Create a container for the chart -->
<div id="chart"></div>

<script>
// Define options for the chart
var options = {
  chart: {
    type: 'bar'
  },
  series: []
}

// Create the chart
var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();

// Make an AJAX request to data.php to get the chart data
$.ajax({
  url: 'data.php',
  method: 'GET',
  dataType: 'json',
  success: function(data) {
    // Update the chart with the new data
    chart.updateSeries([{ data: data }]);
  }
});
</script>
