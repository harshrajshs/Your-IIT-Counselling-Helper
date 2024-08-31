<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View - IITAnalytics</title>
    <script src="https://d3js.org/d3.v4.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<style>
    @font-face {
        font-family: 'Avenir';
        src: url('./fonts/AvenirLTStd-Roman.otf');
    }

    * {
        margin: 0;
    }


    html {
        overflow: hidden;
        overflow-y: scroll;
        overflow-x: hidden;
    }

    #line-chart {
        background-color: #121927;
        padding: 40px;
        /* background-color: #dfdfdf; */
    }

    #Radio-Buttons {
        display: block;
        width: 100%;
        color: white;
        background: #121927;
    }

    h1 {
        font-family: 'Avenir', sans-serif;
        font-weight: 300;
        font-size: 20px;
        position: absolute;
        left: 5vw;
        top: 3vh;
        display: block;
    }

    label {
        position: absolute;
        left: 5%;
        color: white;
        font-size: 0.85rem;
        margin: 5px 0px;
        font-family: 'Avenir', sans-serif;
        display: block;
        line-break: normal;
    }

    input[type=checkbox] {
        margin: 6px;
        align-self: center;
    }

    .container {
        display: block;
        position: relative;
        padding-left: 20px;
        cursor: pointer;
        font-size: 16px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
</style>

<body>
    <div id="Radio-Buttons">

    </div>
    <canvas id="line-chart" width="50" height="50"></canvas>
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


    // Display the result to the user
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


    var names = <?php echo json_encode($information); ?>;


    var options = <?php echo json_encode($stats); ?>;
    var datasets = Array();


    document.getElementById('Radio-Buttons').innerHTML += '<h1> Here are your possible options: </h1><br><br><br>';


    for (let i = 0; i < options.length; i++) {

        var ors = [];
        var crs = [];
        var years = [];


        for (let j = 0; j < options[i].length; j++) {
            ors.push(parseInt(options[i][j][0]));
            crs.push(parseInt(options[i][j][1]));
            years.push(parseInt(options[i][j][2]));
        }


        var name = 'IIT ' + names[i].institute.slice(31) + "," + names[i].program;
        // document.getElementById('Radio-Buttons').innerHTML += '<label class="container">' +
        //     '<span class = "checkmark" ></span>' + name + '</label >';
        let k = {};
        k['data'] = ([null].concat(Array(7 - ors.length).fill(null).concat(ors))).concat([null]);
        k['label'] = name;
        k['borderColor'] = getRandomDarkColor();
        k['fill'] = false;
        k['cubicInterpolationMode'] = 'monotone';
        datasets.push(k);

    }

    document.getElementById('Radio-Buttons').innerHTML += '<label>⚠️Click on the checkbox before a label in legend to make its plot disappear</label><br><br><br>';


    function plot(datasets) {
        var chart = new Chart(document.getElementById("line-chart"), {
            type: 'line',
            data: {
                labels: [null, 2016, 2017, 2018, 2019, 2020, 2021, 2022, null],
                datasets: datasets
            },
            options: {
                bezierCurve: 50, // Corrected typo: 'beizerCurve' to 'bezierCurve'
                title: {
                    display: true,
                    text: 'Rank Analysis'
                },
                elements: {
                    point: {
                        backgroundColor: getRandomDarkColor(),
                        hoverRadius: 10,
                        pointStyle: 'rectRounded',
                        hitRadius: 7
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: true,
                            color: "#595959",
                            lineWidth: 1
                        },
                        ticks: {
                            color: "white",
                            maxRotation: 45,
                            minRotation: 45
                        }
                    },
                    y: {
                        grid: {
                            display: true,
                            color: "#595959"
                        },
                        ticks: {
                            color: "white"
                        }
                    }
                },
                plugins: {
                    legend: {
                        rtl: false,
                        position: 'top',
                        labels: {
                            textAlign: 'left',
                            // usePointStyle: true,
                            // pointStyle: 'circle',
                            color: 'white',
                            boxWidth: 16,
                            font: {

                                size: 16,
                                family: "'Avenir', sans-serif",
                                lineHeight: 2
                            }
                        }
                    }
                },
                onHover: function(event, chartElement) {
                    if (chartElement && chartElement[0]) {
                        var datasetIndex = chartElement[0].datasetIndex;
                        var dataIndex = chartElement[0].index;
                        var dataset = chart.data.datasets[datasetIndex];
                        var meta = chart.getDatasetMeta(datasetIndex);
                        var lineStyle = meta.dataset.options;
                        lineStyle.borderWidth = 10; // Increase stroke width on hover
                        chart.update();
                    }
                },
                onLeave: function(event, chartElement) {
                    if (chartElement && chartElement[0]) {
                        var datasetIndex = chartElement[0].datasetIndex;
                        var dataIndex = chartElement[0].index;
                        var dataset = chart.data.datasets[datasetIndex];
                        var meta = chart.getDatasetMeta(datasetIndex);
                        var lineStyle = meta.dataset.options;
                        lineStyle.borderWidth = 1; // Reset stroke width on leave
                        chart.update();
                    }
                }
            }
        });
    }

    plot(datasets);
</script>