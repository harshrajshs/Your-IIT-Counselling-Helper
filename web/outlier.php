<!DOCTYPE html>
<html>

<head>
  <title>Outlier Analysis</title>
</head>
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script> -->

<body>
  <form id="#outlier" method="post" action="outlier.php">
    <label for="min_rank">Minimum Opening Rank:</label>
    <input type="number" name="min_rank" id="min_rank"><br><br>

    <label for="max_rank">Maximum Opening Rank:</label>
    <input type="number" name="max_rank" id="max_rank"><br><br>

    <input type="submit" value="Submit">
    <canvas id="myChart" style="background-color : white;"></canvas>
  </form>
</body>

</html>



<?php


// Connect to the database using PDO
$servername = "localhost";
$port_no = 3306;
$username = "harsh";
$password = "harsh@123";
$myDB = "josaa"; //Name of the database to access

try {
  $conn = new PDO("mysql:host=$servername;port=$port_no;dbname=$myDB", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if (isset($_POST['min_rank'])) {
    $min_rank = $_POST['min_rank'];
  } else {
    $min_rank = 1000;
  }
  if (isset($_POST['max_rank'])) {
    $max_rank = $_POST['max_rank'];
  } else {
    $max_rank = 10000;
  }


  $stmt = $conn->prepare(" SELECT `Institute`, `Academic Program Name`, `OR`, `Closing Rank`, `Year`
  FROM `josaa`
  WHERE 1*`OR` <=:max_rank AND 1*`OR`>=:min_rank AND `Round` = 6 AND `Seat Type`='OPEN' AND  `Gender`='Gender-Neutral'");
  $stmt->bindParam(':min_rank', $min_rank);
  $stmt->bindParam(':max_rank', $max_rank);
  $stmt->execute();

  $result = $stmt->fetchAll();


  $data = array();
  for ($i = 0; $i < count($result); $i++) {
    $data[] = array('x' => $result[$i][2], 'y' => $result[$i][3], 'label1' => $result[$i][0], 'label2' => $result[$i][1]);
  }


  //   echo("<pre>\n");
  //   print_r($min);
  //   echo gettype($min);
  //   echo("</pre>");
  //   echo("<pre>\n");
  //   print_r($max);
  //   echo gettype($max);
  //   echo("</pre>");
  // echo ("<pre>\n");
  // print_r($data);
  // echo ("</pre>");
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>


<html>

<head>
  <title>Scatter Plot</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
  <canvas id="scatterChart" width="800" height="400"></canvas>
  <script>
    var ctx = document.getElementById("scatterChart").getContext("2d");
    var scatterChart = new Chart(ctx, {
      type: 'scatter',
      data: {
        datasets: [{
          label: 'Scatter Plot',
          data: <?php echo json_encode($data); ?>,
          pointBackgroundColor: function(context) {
            var index = context.dataIndex;
            var value = context.dataset.data[index].y;
            var comparison = context.dataset.data[index].x;
            return value > comparison + 2000 ? 'green' : 'red';
          },
          pointBorderColor: function(context) {
            var index = context.dataIndex;
            var value = context.dataset.data[index].y;
            var comparison = context.dataset.data[index].x;
            return value <= comparison + 2000 ? 'green' : 'red';
          },
          pointHoverBackgroundColor: 'black',
          pointHoverBorderColor: 'white',
          pointHoverBorderWidth: 2,
          pointHoverRadius: 7,
          pointStyle: function(context) {
            var index = context.dataIndex;
            var value = context.dataset.data[index].y;
            var comparison = context.dataset.data[index].x;
            return value >= comparison ? 'triangle' : 'circle';
          }
        }]
      },
      options: {
        tooltips: {
          callbacks: {
            label: function(tooltipItem, data) {
              console.log(tooltipItem.datasetIndex);
              var label1 = String(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index].label1);
              var label2 = String(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index].label2);
              return label1 + ': (' + tooltipItem.xLabel + ', ' + tooltipItem.yLabel + '), ' + label2;
            }
          }
        },
        plugins: {
          title: {
            display: true,
            text: 'Closing Rank vs Opening Rank',
            font: {
              size: 36,
              weight: 'bold',
            },
            padding: {
              top: 1,
              bottom: 15
            },
            color: 'red' // set the font color of title
          }
        },
        scales: {
          xAxes: [{
            ticks: {
              fontColor: 'white'
            },
            scaleLabel: {
              display: true,
              labelString: 'Opening Rank',
              fontSize: 30,
              fontColor: 'white',
            }
          }],
          yAxes: [{
            ticks: {
              fontColor: 'white'
            },
            scaleLabel: {
              display: true,
              labelString: 'Closing Rank',
              fontSize: 30,
              fontColor: 'white',
            },
          }]
        },
      }
    });
  </script>
</body>

</html>