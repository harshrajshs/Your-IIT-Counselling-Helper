<?php


// Connect to the database using PDO
$servername = "localhost";
$port_no = 3306;
$username = "harsh";
$password = "harsh@123";
$myDB = "josaa"; //Name of the database to access
try {
  $conn = new PDO("mysql:host=$servername;port=$port_no;dbname=$myDB", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";


  // Retrieve form inputs
  //$year=2022;
  if (isset($_POST['year'])) {
    $year = $_POST['year'];
  } else {
    $year = 2022;
  }
  // echo("<pre>\n");
  // print_r($year2);
  // echo("</pre>");
  // $year=$year2;


  // Prepare and execute the SQL query
  $stmt = $conn->prepare("SELECT `Institute`,`Academic Program Name`,`Opening Rank`,`Closing Rank`,`Intake` FROM `seatmatrix` WHERE `Gender`='Gender-Neutral' AND`Seat Type`='OPEN' AND `Quota`='AI' AND `Year` = 2022 AND `Closing Rank`<=1000");
  // $stmt->bindParam(':yr', $year);
  $stmt->execute();
  $results = $stmt->fetchAll();




  $circles1 = array();
  $circle_tags1 = array();
  foreach ($results as $result) {
    $institute = $result['Institute'];
    $program = $result['Academic Program Name'];
    $OR = $result['Opening Rank'];
    $CR = $result['Closing Rank'];
    $radius = $result['Intake'];

    $circle_tag['institute'] = $institute;
    $circle_tag['program'] = $program;
    $circle_tags1[] = $circle_tag;

    $circle['OR'] = $OR;
    $circle['CR'] = $CR;
    $circle['radius'] = $radius;

    $circles1[] = $circle;
  }



  $stmt = $conn->prepare("SELECT `Institute`,`Academic Program Name`,`Opening Rank`,`Closing Rank`,`Intake` FROM `seatmatrix` WHERE `Gender`='Gender-Neutral' AND`Seat Type`='OPEN' AND `Quota`='AI' AND `Year` = 2021 AND `Closing Rank`<=1000");
  // $stmt->bindParam(':yr', $year);
  $stmt->execute();
  $results = $stmt->fetchAll();




  $circles2 = array();
  $circle_tags2 = array();
  foreach ($results as $result) {
    $institute = $result['Institute'];
    $program = $result['Academic Program Name'];
    $OR = $result['Opening Rank'];
    $CR = $result['Closing Rank'];
    $radius = $result['Intake'];

    $circle_tag['institute'] = $institute;
    $circle_tag['program'] = $program;
    $circle_tags2[] = $circle_tag;

    $circle['OR'] = $OR;
    $circle['CR'] = $CR;
    $circle['radius'] = $radius;

    $circles2[] = $circle;
  }


  // echo("<pre>\n");
  // print_r($circles);
  // echo("</pre>");
  // echo("<pre>\n");
  // print_r($circle_tags);
  // echo("</pre>");


  // Display the result to the user
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>SVG Circle Animation</title>
  <style>
    svg {
      border: 1px solid black;
    }

    circle {
      opacity: 0.5;
    }
  </style>
</head>

<body>
  <svg width="1200" height="700">

  </svg>

  <script>
    var arrone = <?php echo json_encode($circles1); ?>;
    var arrtwo = <?php echo json_encode($circles2); ?>;
    var tagone = <?php echo json_encode($circle_tags1) ?>;
    var tagtwo = <?php echo json_encode($circle_tags2) ?>;

    function getNumber() {
      return 100 + Math.floor(Math.random() * 500);
    }


    var from_x = Array();
    var from_y = Array();
    var to_x = Array();
    var to_y = Array();
    var radius = Array();
    var tags = Array();

    for (var i = 0; i < 16; i++) {
      to_x.push(80 + (parseInt(arrone[i].OR) + parseInt(arrone[i].CR)) / 2);
      // to_y.push(getNumber());
      from_x.push(80 + (parseInt(arrtwo[i].OR) + parseInt(arrtwo[i].CR)) / 2);
      from_y.push(getNumber());
      radius.push(parseInt(arrone[i].radius));
      tags.push("IIT " + tagone[i].institute.slice(31) + ", " + tagone[i].program);

    }

    to_y = from_y

    function getColor() {
      var letters = '0123456789ABCDEF';
      var color = '#';

      // Generate a random dark color
      for (var i = 0; i < 6; i++) {
        var index = Math.floor(Math.random() * 16);
        color += letters[index];
      }

      return color;
    }


    var xMax = 1000

    const center_x = from_x;
    const center_y = from_y;
    const text_x = from_x;
    const text_y = from_y;
    for (var i = 0; i < 16; i++) {
      document.getElementsByTagName('svg')[0].innerHTML += '<circle id="circle' + String(i + 1) + '" cx="' + center_x[i] + '" cy="' + center_y[i] + '" r="' + String(radius[i] * 2) + '" fill="' + getColor() + '"/><text id="circle' + String(i + 1) + 'Name" x="' + text_x[i] + '" y="' + text_y[i] + '" font-size="10" text-anchor="middle" dominant-baseline="central">' + tags[i] + '</text>';
    }
  </script>

  <script>
    // const from_x = [0, 200, 400, 600, 800];
    // const from_y = [50, 50, 50, 50, 50];
    // const to_x = [500, 300, 700, 400, 800];
    // const to_y = [500, 300, 800, 700, 400];


    for (let i = 1; i <= 16; i++) {
      const circle = document.getElementById('circle' + i);
      const animateX = document.createElementNS('http://www.w3.org/2000/svg', 'animate');
      animateX.setAttribute('attributeName', 'cx');
      animateX.setAttribute('from', from_x[i - 1]);
      animateX.setAttribute('to', to_x[i - 1]);
      animateX.setAttribute('dur', '3s');
      animateX.setAttribute('fill', 'freeze');
      circle.appendChild(animateX);

      const animateY = document.createElementNS('http://www.w3.org/2000/svg', 'animate');
      animateY.setAttribute('attributeName', 'cy');
      animateY.setAttribute('from', from_y[i - 1]);
      animateY.setAttribute('to', to_y[i - 1]);
      animateY.setAttribute('dur', '3s');
      animateY.setAttribute('fill', 'freeze');
      circle.appendChild(animateY);

      const circleName = document.getElementById('circle' + i + 'Name');
      const animateNameX = document.createElementNS('http://www.w3.org/2000/svg', 'animate');
      animateNameX.setAttribute('attributeName', 'x');
      animateNameX.setAttribute('from', from_x[i - 1]);
      animateNameX.setAttribute('to', to_x[i - 1]);
      animateNameX.setAttribute('dur', '3s');
      animateNameX.setAttribute('fill', 'freeze');
      circleName.appendChild(animateNameX);

      const animateNameY = document.createElementNS('http://www.w3.org/2000/svg', 'animate');
      animateNameY.setAttribute('attributeName', 'y');
      animateNameY.setAttribute('from', from_y[i - 1]);
      animateNameY.setAttribute('to', to_y[i - 1]);
      animateNameY.setAttribute('dur', '3s');
      animateNameY.setAttribute('fill', 'freeze');
      circleName.appendChild(animateNameY);


      var svg = document.getElementsByTagName('svg')[0];
      svg.setAttribute('viewBox', '0 0 ' + (xMax + 100) + ' 700');
      svg.setAttribute('width', (xMax + 100));;
    }
  </script>
</body>

</html>