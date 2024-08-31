<!DOCTYPE html>
<html>

<head>
    <title>Choose Year</title>
    <script src="https://d3js.org/d3.v7.min.js"></script>
</head>
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


    svg {
        margin-left: 90px;
        border: 1px solid black;
    }
</style>

<body>

    <form method="post" action="flow.php" style="display : inline-block;">
        <label for="from">From:</label>
        <select id="from" name="from">
            <option value="">-- Select year --</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
        </select>
        <br>
        <label for="to">To:</label>
        <select id="to" name="to">
            <option value="" disabled selected>-- Select year --</option>
        </select>
        <br>
        <input type="submit" value="Submit">
        <button onclick="updatedata()">Run animation</button>
    </form>

    <script>
        var fromDropdown = document.getElementById("from");
        var toDropdown = document.getElementById("to");

        fromDropdown.addEventListener("change", function() {
            toDropdown.innerHTML = '<option value="" disabled selected>-- Select year --</option>';
            if (fromDropdown.value == "2019") {
                toDropdown.innerHTML += '<option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option>';
            } else if (fromDropdown.value == "2020") {
                toDropdown.innerHTML += '<option value="2021">2021</option><option value="2022">2022</option>';
            } else if (fromDropdown.value == "2021") {
                toDropdown.innerHTML += '<option value="2022">2022</option>';
            }
        });
    </script>


    <div id="flowshower"></div>


</body>

</html><?php


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
            if (isset($_POST['from'])) {
                $year1 = $_POST['from'];
            } else {
                $year1 = 2021;
            }
            if (isset($_POST['to'])) {
                $year2 = $_POST['to'];
            } else {
                $year2 = 2022;
            }
            // echo("<pre>\n");
            // print_r($year2);
            // echo("</pre>");
            // $year=$year2;
            // echo("<pre>\n");
            // print_r($year);
            // echo("</pre>");


            // Prepare and execute the SQL query
            $stmt = $conn->prepare("SELECT s1.`Institute`, s1.`Academic Program Name`, s1.`Opening Rank`, s1.`Closing Rank`, s1.`Intake`
        FROM `seatmatrix` s1
        INNER JOIN `seatmatrix` s2 ON s1.`Institute` = s2.`Institute`
            AND s1.`Academic Program Name` = s2.`Academic Program Name`
            AND s1.`Seat Type` = s2.`Seat Type`
            AND s1.`Gender` = s2.`Gender`
            AND s1.`Quota` = s2.`Quota`
        WHERE s1.`Gender` = 'Gender-Neutral' 
            AND s1.`Seat Type` = 'OPEN' 
            AND s1.`Quota` = 'AI' 
            AND s1.`Year` = :yr1 
            AND s1.`Closing Rank` <= 1000
            AND s2.`Year` = :yr2");
            $stmt->bindParam(':yr1', $year1);
            $stmt->bindParam(':yr2', $year2);
            $stmt->execute();
            $results1 = $stmt->fetchAll();



            // Performing Inner Join on the "TO" Year
            $stmt = $conn->prepare("SELECT s2.`Institute`, s2.`Academic Program Name`, s2.`Opening Rank`, s2.`Closing Rank`, s2.`Intake`
        FROM `seatmatrix` s1
        INNER JOIN `seatmatrix` s2 ON s1.`Institute` = s2.`Institute`
            AND s1.`Academic Program Name` = s2.`Academic Program Name`
            AND s1.`Seat Type` = s2.`Seat Type`
            AND s1.`Gender` = s2.`Gender`
            AND s1.`Quota` = s2.`Quota`
        WHERE s2.`Gender` = 'Gender-Neutral' 
            AND s2.`Seat Type` = 'OPEN' 
            AND s2.`Quota` = 'AI' 
            AND s2.`Year` = :yr2 
            AND s2.`Closing Rank` <= 1000
            AND s1.`Year` = :yr1");

            $stmt->bindParam(':yr1', $year1);
            $stmt->bindParam(':yr2', $year2);
            $stmt->execute();
            $results2 = $stmt->fetchAll();





            //Performing Left Outer Join to get any new branches if introduced
            $stmt = $conn->prepare("SELECT s2.`Institute`, s2.`Academic Program Name`, s2.`Opening Rank`, s2.`Closing Rank`, s2.`Intake`
        FROM `seatmatrix` s2
        LEFT OUTER JOIN `seatmatrix` s1 ON s1.`Institute` = s2.`Institute`
            AND s1.`Academic Program Name` = s2.`Academic Program Name`
            AND s1.`Seat Type` = s2.`Seat Type`
            AND s1.`Gender` = s2.`Gender`
            AND s1.`Quota` = s2.`Quota`
            AND s1.`Year` = :yr1
        WHERE s2.`Gender` = 'Gender-Neutral' 
            AND s2.`Seat Type` = 'OPEN' 
            AND s2.`Quota` = 'AI' 
            AND s2.`Year` = :yr2 
            AND s2.`Closing Rank` <= 1000
            AND s1.`Institute` IS NULL;
        ");

            $stmt->bindParam(':yr1', $year1);
            $stmt->bindParam(':yr2', $year2);
            $stmt->execute();
            $results_extra = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        ?>
<script>
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function getNumber(x) {
        return 1 + Math.floor(Math.random() * x);
    }

    function getColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';

        for (var i = 0; i < 6; i++) {
            var index = Math.floor(Math.random() * 16);
            color += letters[index];
        }

        return color;
    }

    function hexToRgba(hex, alpha) {

        hex = hex.replace('#', '');

        const r = parseInt(hex.substring(0, 2), 16);
        const g = parseInt(hex.substring(2, 4), 16);
        const b = parseInt(hex.substring(4, 6), 16);


        alpha = Math.max(0, Math.min(1, alpha));

        return `rgba(${r}, ${g}, ${b}, ${alpha})`;
    }


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //!SECTION : primary initialisations


    const margin = {
        top: 20,
        right: 90,
        bottom: 30,
        left: 90
    };


    const width = 1400 - margin.left - margin.right;
    const height = 700 - margin.top - margin.bottom;

    const svg = d3.select("#flowshower").append('svg')
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", `translate(${margin.left + 90}, ${margin.top})`)
        .style('background-color', 'white');

    const xScale = d3.scaleLinear()
        .domain([0, 1000])
        .range([0, width]);

    const yScale = d3.scaleLinear()
        .domain([0, 1000])
        .range([height - 100, 0]);

    const div = d3.select('body').append('h1').attr('class', 'tooltip tooltip-text').style('opacity', 0);

    const line = d3.select('svg').append('line').attr('x1', 140).attr('y1', 140).attr('x2', 141).attr('y2', 141).style('opacity', 0);



    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



    var res1 = <?php echo json_encode($results1); ?>;
    var res2 = <?php echo json_encode($results2); ?>;
    var resex = <?php echo json_encode($results_extra); ?>;

    const glob1 = Array();
    for (var i = 0; i < res1.length; i++) {
        k = {}
        k['OR'] = res1[i][2]
        k['CR'] = res1[i][3]
        k['radius'] = res1[i][4]
        k['cx'] = xScale((parseInt(res1[i][2]) + parseInt(res1[i][3])) / 2) + margin.left;
        k['cy'] = yScale(getNumber(600 - parseInt(res1[i][4])));
        k['institute'] = res1[i][0]
        k['program'] = res1[i][1]
        k['color'] = getColor();
        glob1.push(k);
    }

    const glob2 = Array();
    for (var i = 0; i < res2.length; i++) {
        k = {}
        k['OR'] = res2[i][2]
        k['CR'] = res2[i][3]
        k['cx'] = xScale((parseInt(res2[i][2]) + parseInt(res2[i][3])) / 2) + margin.left;
        k['cy'] = glob1[i].cy;
        k['radius'] = res2[i][4]
        k['institute'] = res2[i][0]
        k['program'] = res2[i][1]
        // k['color'] = glob1[i].color;
        k['color'] = getColor();
        glob2.push(k);
    }


    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////!SECTION/
    /////////


    d3.select('svg').selectAll("circle").data(glob1).join("circle")
        .attr("cy", (d, i) => {
            return d.cy;
        })
        .attr("r", (d, i) => {
            return (parseInt(d.radius));
        })
        .attr("fill", (d, i) => {
            return d.color;
        })
        .attr("opacity", 0.5)
        .attr("cx", (d, i) => {
            return d.cx;
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
            d3.select(this).attr('opacity', 0.8);
            div.transition()
                .duration(50)
                .style("opacity", 1).style('background-color', hexToRgba(color, 0.5));
            div.html(name + "<br>" + program + '<br>Seat Number : ' + seats + '<br>Opening Rank : ' + or + '<br>Closing Rank : ' + cr + '<br>Center : ' + center)
                .style("left", x + "px")
                .style('top', '50px');
            line.attr('cx', center).line('cy', 9);
        })
        .on('mouseleave', function(d, i) {
            div.transition()
                .duration('50')
                .style("opacity", 0);
            d3.select(this).attr('opacity', 0.5);
        })
        .on('click', function(d, i) {
            d3.select(this).attr('stroke', 'black').attr('stroke-width', 1);
        })
        .on('dblclick', function(d, i) {
            d3.select(this).attr('stroke-width', 0);
        });
    const xAxis = d3.axisBottom(xScale);
    svg.append("g")
        .attr("transform", `translate(-90, ${height})`)
        .call(xAxis);

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////!SECTION



    function update(glob) {

        const xScale = d3.scaleLinear()
            .domain([0, 1000])
            .range([0, width]);

        const yScale = d3.scaleLinear()
            .domain([0, d3.max(glob, d => parseInt(d.CR))])
            .range([height - 100, 0]);

        d3.select('svg').selectAll("circle").data(glob).join("circle")
            .attr("cy", (d, i) => {
                return d.cy;
            })
            .attr("opacity", 0.5)
            .transition().delay(1000).duration(1000)
            .attr("cx", (d, i) => {
                return d.cx;
            })
            .attr("r", (d, i) => {
                return (parseInt(d.radius));
            })
            .attr("fill", (d, i) => {
                return d.color;
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
                var y = d3.select(this).attr("cy")
                div.transition()
                    .duration(50)
                    .style("opacity", 1).style('background-color', hexToRgba(color, 0.5));
                div.html(name + "<br>" + program + '<br>Seat Number : ' + seats + '<br>Opening Rank : ' + or + '<br>Closing Rank : ' + cr + '<br>Center : ' + center)
                    .style("left", x + "px")
                    .style('top', '50px');
                line.attr('x1', x).line('y1', y).attr('x2', 0).attr('y2', 0).style('stroke-width', 1).style('stroke', 'grey').style('opacity', 1);
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


    }

    function updatedata() {
        update(glob2);
    }
</script>