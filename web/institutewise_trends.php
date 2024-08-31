<!DOCTYPE html>
<html>

<head>
    <title>Filter IIT Data</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <canvas id="myChart" style="width:10%; height: 10%;"></canvas>
    <style>
        body {
            background-color: #222;
            color: #fff;
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
        }

        h1 {
            margin-top: 0;
        }

        label {
            display: inline-block;
            width: 27%;
            margin-bottom: 5px;
        }

        select,
        input[type="number"] {
            width: 70%;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            background-color: #fff;
            color: #222;
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #008CBA;
            color: #fff;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #006D9C;
        }
    </style>
</head>

<body>
    <canvas id="myChart"></canvas>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // set database credentials
        $host = "localhost"; // change this to the host name of your MySQL server
        $username = "harsh"; // change this to your MySQL username
        $password = "harsh@123"; // change this to your MySQL password
        $database = "josaa"; // change this to the name of your MySQL database

        // create a connection to the database
        $conn = mysqli_connect($host, $username, $password, $database);

        // check if the connection was successful
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // retrieve the form data using the $_POST superglobal
        $Institute = $_POST['Institute'];
        $category = $_POST['category'];
        $gender = $_POST['gender'];
        $minRank = $_POST['min-rank'];
        $maxRank = $_POST['max-rank'];

        // prepare a SQL query to retrieve the filtered results
        $sql = "SELECT * FROM josaa2 WHERE `COL 1` = '$Institute' AND `COL 4` = '$category' AND `COL 5` = '$gender' AND `COL 7` >= $minRank AND `COL 7` <= $maxRank AND `COL 9` = 6";

        // execute the query and store the result in a variable
        $result = mysqli_query($conn, $sql);

        // create an array to hold the data for each academic program
        $programs = array();

        // loop through each row in the result set and store the data for each program
        while ($row = mysqli_fetch_assoc($result)) {
            $program_name = $row['COL 2'];
            $closing_rank = $row['COL 7'];
            $year = $row['COL 8'];

            // if the program doesn't exist in the array yet, add it
            if (!isset($programs[$program_name])) {
                $programs[$program_name] = array();
            }

            // add the closing rank for this year to the program's array
            $programs[$program_name][$year] = $closing_rank;
        }

        // close the database connection
        mysqli_close($conn);
    }

    ?>
    <script>
        // get the data from PHP and convert it to the format needed for Chart.js
        var data = {
            labels: <?php echo json_encode(range(2016, 2022)); ?>,
            datasets: [
                <?php foreach ($programs as $program_name => $closing_ranks) { ?> {
                        label: '<?php echo $program_name; ?>',
                        data: <?php echo json_encode(array_values($closing_ranks)); ?>,
                        fill: false,
                        borderColor: '<?php echo '#' . substr(md5(rand()), 0, 6); ?>',
                        tension: 0.1
                    },
                <?php } ?>
            ]
        };


        var res = <?php echo json_encode($programs); ?>;

        // generate a random color for each dataset
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }




        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.labels,
                datasets: data.datasets
            },
            options: {
                bezierCurve: 50, // Corrected typo: 'beizerCurve' to 'bezierCurve'
                title: {
                    display: true,
                    text: 'Rank Analysis'
                },
                elements: {
                    point: {
                        backgroundColor: getRandomColor(),
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

                                size: 12,
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
    </script>