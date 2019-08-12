<?php 

    $hn = 'localhost'; //hostname
    $db = 'malik11y_pbl'; //database
    $un = 'malik11y_pbl'; //username
    $pw = '!Hasanhamza123'; 

$connect=new mysqli($hn,$un,$pw,$db);

if($connect->connect_error)die($connect->connect_error);


$query="select category,count(*) as cnt from classics group by category";
$result =$connect->query($query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Book', 'Count'],
      <?php
      if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "['".$row['category']."', ".$row['cnt']."],";
          }
      }
      ?>
    ]);
    
    var options = {
        title: 'Book By Category',
        width: 900,
        height: 500,
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    
    chart.draw(data, options);
}
</script>
</head>
<body>
    <!-- Display the pie chart -->
    <div id="piechart"></div>
</body>
</html>