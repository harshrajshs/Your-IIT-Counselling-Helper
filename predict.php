<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://d3js.org/d3.v4.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div id="my_dataviz"></div>
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
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";


    // Retrieve form inputs
    $rank = $_POST['rank'];
    $category = $_POST['category'];
    $gender = $_POST['gender'];

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("SELECT `Institute`,`Academic Program Name` FROM josaa WHERE Round = 6 AND `Year`=2022 AND `Seat Type` = :category AND Gender = :gender AND 0.9*`OR`<= :rank AND 1.1*`Closing Rank`>=:rank ORDER BY `Closing Rank`-`OR` LIMIT 10 ");
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':rank', $rank);
    $stmt->execute();
    $results = $stmt->fetchAll();
    $temp = 0;

    // print_r($results);


    $stats = array();
    $information = array();
    foreach ($results as $result) {
        $institute = $result['Institute'];
        $program = $result['Academic Program Name'];
        $stmt = $conn->prepare("SELECT `OR`,`Closing Rank`,`Year` FROM josaa WHERE `Institute` = :institute AND `Academic Program Name` = :program AND `Round` = 6  AND `Seat Type` = :category AND Gender =:gender");
        $stmt->bindParam(':institute', $institute);
        $stmt->bindParam(':program', $program);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':gender', $gender);
        $stmt->execute();
        $stat = $stmt->fetchALL();
        $info['institute'] = $institute;
        $info['program'] = $program;
        $information[] = $info;
        $stats[] = $stat;
    }


    print_r($stats);

    // Display the result to the user
    if ($results) {
        echo "<p>Congratulations! You have a chance of getting a seat </p>";
    } else {
        echo "<p>Sorry, you do not have a chance of getting a seat in any IIT.</p>";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>

<script type="text/javascript">
    function getRandomDarkColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';

        // Generate a random dark color
        for (var i = 0; i < 6; i++) {
            var index = Math.floor(Math.random() * 16); // Generate random index from 0 to 9
            color += letters[index];
        }

        return color;
    }



    var ors = [];
    var crs = [];
    var years = [0];
    var points = []
    var options = <?php echo json_encode($stats); ?>;


    for (let i = 0; i < options.length; i++) {

        var users = options[0];
        var maxx = users.length;
        var maxy = parseInt(users[users.length - 1][0]);
        for (let i = 0; i < users.length - 1; i++) {
            let js = {};
            js.x1 = i;
            js.y1 = users[i][0];
            js.x2 = i + 1;
            js.y2 = users[i + 1][0];
            points.push(js);
        }

        var margin = {
            top: 20,
            right: 20,
            bottom: 30,
            left: 40
        };

        // Calculate chart width and height based on the available space
        var width = 600 - margin.left - margin.right;
        var height = 600 - margin.top - margin.bottom;

        const xScale = d3.scaleLinear()
            .domain([0, maxx + 1]) // Adjust the domain based on your data
            .range([0, width]);


        const yScale = d3.scaleLinear()
            .domain([0, maxy + 80]) // Adjust the domain based on your data
            .range([height, 0]);


        for (let i = 0; i < users.length; i++) {
            ors.push(parseInt(users[i][0]));
            crs.push(parseInt(users[i][1]));
            years.push(parseInt(users[i][2]));
        }


        var svg = d3.select('body').append('svg').attr('width', 1000).attr('height', 1000);

        // const xAxis = d3.axisBottom(xScale);
        const yAxis = d3.axisLeft(yScale);

        var xdata = years

        var linear = d3.scaleLinear()
            .domain([0, maxx + 1])
            .range([0, width]);



        var xAxis = d3.axisBottom(xScale)
            .ticks(maxx)
            .tickFormat(function(d) {
                return xdata[d];
            });


        var lines = d3.select('svg').selectAll("liness").data(points).enter()
            .append("line")
            .attr('x1', function(d) {
                return (xScale(d.x1 + 1) + margin.left)
            })
            .attr('y1', function(d) {
                return yScale(d.y1 - margin.top)
            }).attr('x2', function(d) {
                return (xScale(d.x2 + 1) + margin.left)
            }).attr('y2', function(d) {
                return yScale(d.y2 - margin.top)
            }).attr('stroke-width', 2)
            .attr('stroke', getRandomDarkColor());


        var dots = d3.select('svg').selectAll('circles').data(ors).enter()
            .append("circle")
            .attr('cx', function(d, i) {
                return (xScale(i + 1) + margin.left)
            })
            .attr('cy', function(d) {
                return (yScale(d - margin.top))
            }).attr('r', 6)
            .attr('fill', getRandomDarkColor());


        const axisGroup = d3.select('svg').append("g")
            .attr("class", "axis-group")
            .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

        // Step 4: Call the axis generators
        axisGroup.append("g")
            .attr("class", "x-axis")
            .attr("transform", "translate(0," + height + ")")
            .call(xAxis);

        axisGroup.append("g")
            .attr("class", "y-axis")
            .call(yAxis);

    }
</script>