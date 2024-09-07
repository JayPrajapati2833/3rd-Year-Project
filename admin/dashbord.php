<?php
include "navbar1.php";
 
$dataPoints = array( 
	array("y" => 3373.64, "label" => "Germany" ),
	array("y" => 2435.94, "label" => "France" ),
	array("y" => 1842.55, "label" => "China" ),
	array("y" => 1828.55, "label" => "Russia" ),
	array("y" => 1039.99, "label" => "Switzerland" ),
	array("y" => 765.215, "label" => "Japan" ),
	array("y" => 612.453, "label" => "Netherlands" )
);
 
include "config.php";
$query = "SELECT * FROM category WHERE totalNews>0";
$data = array();
$count=0;
$result = mysqli_query($conn,$query) or die("Query failed");
while($row = mysqli_fetch_array($result))
{
  $data[$count]['label'] = $row["categoryName"];
  $data[$count]['y'] = $row["totalNews"];
  $count = $count+1;
}
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "News"
	},
	axisY: {
		title: "News (in number)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,#### news",
		dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>            

<?php
include "navbar2.php";
?>