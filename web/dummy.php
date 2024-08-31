<!DOCTYPE html>
<html>
<style>
    .tooltip {
        background: lightblue;
        fill-opacity: 0.8;
        font-size: 12px;
        min-width: 40px;
        min-height: 40px;
        height: 120px;
        width: 250px;
        padding: 10px;
        z-index: 1000;
        position: absolute;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        border-radius: 5px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .tooltip h1 {
        opacity: 1;
        color: black;
    }
</style>

<head>
    <script src="https://d3js.org/d3.v7.min.js"></script>
</head>

<body>
    <form action="flow.php" method="post">
        <button type="submit" name="year" value="2019">2019</button>
        <button type="submit" name="year" value="2020">2020</button>
        <button type="submit" name="year" value="2021">2021</button>
        <button type="submit" name="year" value="2022">2022</button>
    </form>


    <div id="flowshower"></div>
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


    // Retrieve form inputs
    if (isset($_POST['year'])) {
        $year = $_POST['year'];
    } else {
        $year = 2022;
    }

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("SELECT `Institute`,`Academic Program Name`,`Opening Rank`,`Closing Rank`,`Intake`
        FROM `seatmatrix`
        WHERE `Gender`='Gender-Neutral' AND`Seat Type`='OPEN' AND `Quota`='AI' AND `Year`= :yr AND `Closing Rank`<=1000");
    $stmt->bindParam(':yr', $year);
    $stmt->execute();
    $results = $stmt->fetchAll();


    $stmt = $conn->prepare("SELECT `Institute`,`Academic Program Name`,`Opening Rank`,`Closing Rank`,`Intake`
        FROM `seatmatrix`
        WHERE `Gender`='Gender-Neutral' AND`Seat Type`='OPEN' AND `Quota`='AI' AND `Year`= 2021 AND `Closing Rank`<=1000");
    // $stmt->bindParam(':yr', $year);
    $stmt->execute();
    $results1 = $stmt->fetchAll();


    $stmt = $conn->prepare("SELECT `Institute`,`Academic Program Name`,`Opening Rank`,`Closing Rank`,`Intake`
        FROM `seatmatrix`
        WHERE `Gender`='Gender-Neutral' AND`Seat Type`='OPEN' AND `Quota`='AI' AND `Year`= 2020 AND `Closing Rank`<=1000");
    // $stmt->bindParam(':yr', $year);
    $stmt->execute();
    $results2 = $stmt->fetchAll();




    $circles = array();
    $circle_tags = array();
    foreach ($results as $result) {
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>



<script>
    function getNumber(x) {
        return 1 + Math.floor(Math.random() * x);
    }

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

    function hexToRgba(hex, alpha) {
        // Remove '#' symbol if present
        hex = hex.replace('#', '');

        // Convert hex to RGB
        const r = parseInt(hex.substring(0, 2), 16);
        const g = parseInt(hex.substring(2, 4), 16);
        const b = parseInt(hex.substring(4, 6), 16);

        // Validate and adjust alpha value
        alpha = Math.max(0, Math.min(1, alpha));

        // Return RGBA value as a string
        return `rgba(${r}, ${g}, ${b}, ${alpha})`;
    }



    var res = <?php echo json_encode($results); ?>;

    var circles = <?php echo json_encode($circles); ?>;
    var circle_tag = <?php echo json_encode($circle_tags); ?>;
    var glob = Array();
    for (var i = 0; i < res.length; i++) {
        k = {}
        k['OR'] = res[i][2]
        k['CR'] = res[i][3]
        k['radius'] = res[i][4]
        k['institute'] = res[i][0]
        k['program'] = res[i][1]
        k['color'] = getColor();
        glob.push(k);
    }

    var res1 = <?php echo json_encode($results1); ?>;
    var res2 = <?php echo json_encode($results2); ?>;
    var glob1 = Array();
    for (var i = 0; i < res1.length; i++) {
        k = {}
        k['OR'] = res1[i][2]
        k['CR'] = res1[i][3]
        k['radius'] = res1[i][4]
        k['institute'] = res1[i][0]
        k['program'] = res1[i][1]
        k['color'] = getColor();
        glob1.push(k);
    }
    var glob2 = Array();
    for (var i = 0; i < res2.length; i++) {
        k = {}
        k['OR'] = res2[i][2]
        k['CR'] = res2[i][3]
        k['radius'] = res2[i][4]
        k['institute'] = res2[i][0]
        k['program'] = res2[i][1]
        k['color'] = getColor();
        glob2.push(k);
    }

    const margin = {
        top: 20,
        right: 20,
        bottom: 30,
        left: 40
    };


    const width = 1400 - margin.left - margin.right;
    const height = 700 - margin.top - margin.bottom;

    function animate(glob, globs2) {

        const svg = d3.select("#flowshower").append('svg')
            .attr("width", width + margin.left + margin.right)
            .attr("height", height + margin.top + margin.bottom)
            .append("g")
            .attr("transform", `translate(${margin.left}, ${margin.top})`)
            .style('background-color', 'white');


        // Create scales for x and y axes
        const xScale = d3.scaleLinear()
            .domain([0, d3.max(glob, d => (parseInt(d.OR) + parseInt(d.CR)) / 2)])
            .range([0, width]);

        const yScale = d3.scaleLinear()
            .domain([0, d3.max(glob, d => parseInt(d.CR))])
            .range([height - 100, 0]);

        var div = d3.select('body').append('h1').attr('class', 'tooltip tooltip-text').style('opacity', 0);

        var line = d3.select('svg').append('line').attr('x1', 140).attr('y1', 140).attr('x2', 141).attr('y2', 141).style('opacity', 0);

        svg.selectAll("circle").data(glob).enter().append("circle")
            .attr("cy", (d, i) => {
                return yScale(getNumber(600 - parseInt(d.radius)));
            })
            .attr("r", (d, i) => {
                return (parseInt(d.radius));
            })
            .attr("fill", (d, i) => {
                return d.color;
            })
            .attr("opacity", 0.5)
            .attr("cx", (d, i) => {
                return xScale((parseInt(d.OR) + parseInt(d.CR)) / 2);
            })
            .on('mouseover', function(d, i) {
                console.log(d);
                var name = i.institute;
                var program = i.program;
                var seats = i.radius;
                var or = i.OR;
                var cr = i.CR;
                var color = i.color;
                var center = (parseInt(or) + parseInt(cr)) / 2;
                var x = d3.select(this).attr("cx");
                div.transition()
                    .duration(50)
                    .style("opacity", 1).style('background-color', hexToRgba(color, 0.5));
                div.html(name + "<br>" + program + '<br>Seat Number : ' + seats + '<br>Opening Rank : ' + or + '<br>Closing Rank : ' + cr + '<br>Center : ' + center)
                    .style("left", x + "px")
                    .style('top', '100px');
                line.attr('cx', center).line('cy', 9);
            })
            .on('mouseleave', function(d, i) {
                div.transition()
                    .duration('50')
                    .style("opacity", 0);
            })
            .on('click', function(d, i) {
                d3.select(this).attr('opacity', 0.8).attr('stroke', 'black').attr('stroke-width', 1);
            })
            .on('dblclick', function(d, i) {
                d3.select(this).attr('opacity', 0.5).attr('stroke-width', 0);
            });

        const xAxis = d3.axisBottom(xScale);

        // Add x and y axes to the SVG container
        svg.append("g")
            .attr("transform", `translate(0, ${height})`)
            .call(xAxis);

        // d3.selectAll("circle").data(globs2).enter().transition().duration(3000).attr('cx', (d) => {
        //     return (parseInt(d.OR) + parseInt(d.CR)) / 2;
        // });
        var circles = d3.selectAll('circle');

        for (var i = 0; i < circles.length; i++) {
            d3.select(circles[i]).transition().delay(500).duration(1000).attr('cx', xScale((parseInt(globs2[i].OR) + parseInt(globs2[i].OR)) / 2));
        }

    }



    animate(glob1, glob2);
</script>