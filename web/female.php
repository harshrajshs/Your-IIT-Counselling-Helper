<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Description of the page">
    <meta name="keywords" content="Keyword1, Keyword2, Keyword3">
    <meta name="author" content="Author Name">
    <meta name="robots" content="index, follow">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"></script>
    <script src="myscript.js"></script>

    <title>Female-category analysis</title>
    <link rel="icon" type="image/x-icon" href="icon.jpg">
    <style>
        @font-face {
            font-family: 'Poppins';
            src: url('./fonts/Poppins-Medium.woff');
        }

        table {
            border-collapse: collapse;
            width: 90%;
            margin-left: 5%;
            margin-bottom: 4%;
            margin-top: 5%;
        }

        th,
        td {
            padding: 8px;
            /* text-align: left; */
            border-bottom: none;
            border-top: none;
            border-left: none;
        }

        th {
            /* background-color: antiquewhite; */
            background-image: url('tback.jpeg');
            color: antiquewhite;
            font-weight: bold;
            border-top: none;
        }

        tr:nth-child(even) {
            /* background-color: #f2f2f2; */
            background-color: black;
            color: white;
        }

        tr:nth-child(odd) {
            /* background-color: antiquewhite; */
            background-color: #181818;
            color: white;
        }

        body {
            background: #121927;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            /* margin: 2% 25%; */
        }

        form {
            background-color: #0d1619;
            border: 3px solid black;
            width: 40%;
            margin: 0 auto;
            border-radius: 5% 5% 5%;
            padding: 40px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333333;
            font-size: 16px;
            font-weight: bold;
        }

        select {
            display: block;
            width: 100%;
            padding: 12px 20px;
            margin-bottom: 20px;
            border: none;
            border-radius: 4px;
            background-color: #F2F2F2;
            color: #333333;
            font-size: 16px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url("data:image/svg+xml;utf8,<svg fill='black' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/><path d='M0 0h24v24H0z' fill='none'/></svg>");
            background-repeat: no-repeat;
            background-position: right 8px center;
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 12px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 4px;
            background-color: #007AFF;
            color: #FFFFFF;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #005CE6;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 0.5px;
            text-align: center;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
        }

        .insights {
            margin-left: 2%;
            margin-right: 2%;
            margin-bottom: 5%;
            font-size: 200%;
            display: block;
            padding: 3%;
            background-color: #484848;
            border-radius: 20%;
        }

        h4 {
            color: blue;
        }

        h5 {
            color: white;
        }

        #chartContainer {
            height: 370px;
            margin-top: 5%;
            margin-bottom: 5%;
            margin-left: 5%;
            margin-right: 5%;
            border-radius: 10px;
        }

        .chart {
            background-color: #121927;
            margin-top: 5%;
            margin-left: 2%;
            margin-right: 2%;
            padding: 5%;
            border-radius: 5%;
        }
    </style>

</head>

<?php
$year = "";
$institute = "";
$department = "";
$seat = "";
$round = "";
$gender = "";
$course = "";
?>

<body>
    <h1 style="color:white; text-align:center;">IIT Analytics <p style="font-size:80%; color: white; font-family:'Poppins',
    sans-serif; ">Female Reservation analysis of a College</p>
    </h1>
    <form class="styled_select" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="question2" style="color:#F2F2F2;">Institute Name:</label>
        <select id="question2" name="institute">
            <option selected="selected" value="0">--Select--</option>
            <option>Indian Institute of Technology Guwahati</option>
            <option>Indian Institute of Technology Bhubaneswar</option>
            <option>Indian Institute of Technology Bombay</option>
            <option>Indian Institute of Technology Mandi</option>
            <option>Indian Institute of Technology Delhi</option>
            <option>Indian Institute of Technology Indore</option>
            <option>Indian Institute of Technology Kharagpur</option>
            <option>Indian Institute of Technology Hyderabad</option>
            <option>Indian Institute of Technology Jodhpur</option>
            <option>Indian Institute of Technology Kanpur</option>
            <option>Indian Institute of Technology Madras</option>
            <option>Indian Institute of Technology Gandhinagar</option>
            <option>Indian Institute of Technology Patna</option>
            <option>Indian Institute of Technology Roorkee</option>
            <option>Indian Institute of Technology (ISM) Dhanbad</option>
            <option>Indian Institute of Technology Ropar</option>
            <option>Indian Institute of Technology (BHU) Varanasi</option>
            <option>Indian Institute of Technology Bhilai</option>
            <option>Indian Institute of Technology Goa</option>
            <option>Indian Institute of Technology Palakkad</option>
            <option>Indian Institute of Technology Tirupati</option>
            <option>Indian Institute of Technology Jammu</option>
            <option>Indian Institute of Technology Dharwad</option>
        </select>
        <label for="question4" style="color:#F2F2F2;">Seat type:</label>
        <select id="question4" name="seat">
            <option selected="selected" value="0">--Select--</option>
            <option>OPEN</option>
            <option>OPEN (PwD)</option>
            <option>OBC-NCL</option>
            <option>OBC-NCL (PwD)</option>
            <option>EWS</option>
            <option>EWS (PwD)</option>
            <option>ST</option>
            <option>SC</option>
            <option>ST (PwD)</option>
            <option>SC (PwD)</option>
        </select>
        <label for="question" style="color:#F2F2F2;">Course:</label>
        <select id="question4" name="course">
            <option selected="selected" value="0">--Select--</option>
            <option>ALL</option>
            <option>4 Years</option>
            <option>5 Years</option>
        </select>
        <label for="question5" style="color:#F2F2F2;">Round:</label>
        <select id="question5" name="round">
            <option selected="selected" value="0">--Select--</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
        </select>
        <button type="submit">Submit</button>
    </form>

    <?php

    if (isset($_POST['institute']) && isset($_POST['seat']) && isset($_POST['round'])) {
        $institute = $_POST['institute'];
        $seat = $_POST['seat'];
        $round = $_POST['round'];
        $gender = "Female-only (including Supernumerary)";
        $course = $_POST['course'];
        echo "<table border='1'>";
        echo "<tr><th>Year</th><th>Institute</th><th>Academic Program Name</th><th>Seat Type</th><th>Gender</th><th>Opening Rank</th><th>Closing Rank</th><th>Round</th></tr>";
    }

    $servername = "localhost";
    $port_no = 3306;
    $username = "harsh";
    $password = "harsh@123";
    $myDB = "josaa";

    try {
        $conn = new PDO("mysql:host=$servername;port=$port_no;dbname = $myDB", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "connected successfully";
        $opening_ranks = array();
        $closing_ranks = array();
        $years = array();
        $institutes = array();
        $genders = array();
        $seats = array();
        $rounds = array();
        $departments = array();


        $stmt = $conn->query("SELECT * FROM josaa.`josaa`  WHERE Institute='$institute' AND Gender='$gender' AND Round='$round' AND `Seat Type`='$seat'");

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($course == "ALL" || (strpos($row['Academic Program Name'], $course) !== false)) {
                $years[] = $row['Year'];
                $institutes[] = $row['Institute'];
                $departments[] = $row['Academic Program Name'];
                $seats[] = $row['Seat Type'];
                $genders[] = $row['Gender'];
                $opening_ranks[] = $row['OR'];
                $closing_ranks[] = $row['Closing Rank'];
                $rounds[] = $row['Round'];
            }
        }

        $unique_branches = array_unique($departments);

        // print_r($unique_branches);

        $data = array();


        foreach ($unique_branches as $branch) {
            $yrs[] = array();
            $opr[] = array();
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($row['Academic Program Name'] == $branch) {
                    $yrs[] = $row['Year'];
                    array_push($opr, $row['OR']);
                }
            }
            array_shift($yrs);
            array_shift($opr);
            array_push($data, array($branch, $yrs, $opr));
            unset($yrs);
            unset($opr);
        }

        // print_r($data[0][1]);

        for ($i = 0; $i < count($years); $i++) {
            echo "<tr>";
            echo "<td>" . $years[$i] . "</td>";
            echo "<td>" . $institutes[$i] . "</td>";
            echo "<td>" . $departments[$i] . "</td>";
            echo "<td>" . $seats[$i] . "</td>";
            echo "<td>" . $genders[$i] . "</td>";
            echo "<td>" . $opening_ranks[$i] . "</td>";
            echo "<td>" . $closing_ranks[$i] . "</td>";
            echo "<td>" . $rounds[$i] . "</td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>
    <?php $colors = array(
        '#E74C3C', // bright red
        '#2980B9', // bright blue
        '#2ECC71', // bright green
        '#F1C40F', // bright yellow
        '#9B59B6', // bright purple
        '#1ABC9C', // turquoise
        '#D35400', // bright orange
        '#3498DB', // sky blue
        '#27AE60', // dark green
        '#F39C12', // orange
        '#8E44AD', // dark purple
        '#16A085', // green-blue
        '#E67E22', // dark orange
        '#00feff',
        '#0000ff',
        '#ff5be2',
    );
    ?>

    <div class="chart">
        <?php if (!empty($data) && isset($_POST['institute'])) : ?>
            <canvas id="myChart" height="300"></canvas>
            <script>
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
                // Define the data
                var data = <?php echo json_encode($data); ?>;
                var colors = <?php echo json_encode($colors); ?>;

                // Get the chart context
                var ctx = document.getElementById('myChart').getContext('2d');

                // Create the chart
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['2018', '2019', '2020', '2021', '2022'], // X-axis labels
                        datasets: []
                    },
                    options: {
                        elements: {
                            point: {
                                backgroundColor: getRandomDarkColor(),
                                hoverRadius: 10,
                                pointStyle: 'rectRounded',
                                hitRadius: 7
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
                            },
                            title: {
                                display: true,
                                text: '<?php echo $institute ?>',
                                font: {
                                    size: 24,
                                    weight: 'bold',
                                },
                                padding: {
                                    top: 1,
                                    bottom: 15
                                },
                                color: 'white' // set the font color of title
                            },

                        },
                        scales: {
                            x: {
                                grid: {
                                    display: true,
                                    color: "#595959",
                                    lineWidth: 1
                                },
                                ticks: {
                                    color: "white", // Set label text color to white
                                    maxRotation: 45, // Rotate labels by 45 degrees
                                    minRotation: 45
                                }
                            },
                            y: {
                                grid: {
                                    display: true,
                                    color: "#595959"
                                },
                                ticks: {
                                    color: "white" // Set label text color to white
                                }
                            },
                            yAxes: [{
                                ticks: {
                                    stepSize: 0,
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

                // Add data to the chart
                for (var i = 0; i < data.length; i++) {
                    var branch = data[i][0];
                    var yrs = data[i][1];
                    var opr = data[i][2];
                    var clr = colors[i];
                    var p = 0;
                    var new_opr = [];
                    if (!yrs.includes(2018)) {
                        new_opr.push(null);
                    } else {
                        new_opr.push(opr[p]);
                        p = p + 1;
                    }
                    if (!yrs.includes(2019)) {
                        new_opr.push(null);
                    } else {
                        new_opr.push(opr[p]);
                        p = p + 1;
                    }
                    if (!yrs.includes(2020)) {
                        new_opr.push(null);
                    } else {
                        new_opr.push(opr[p]);
                        p = p + 1;
                    }
                    if (!yrs.includes(2021)) {
                        new_opr.push(null);
                    } else {
                        new_opr.push(opr[p]);
                        p = p + 1;
                    }
                    if (!yrs.includes(2022)) {
                        new_opr.push(null);
                    } else {
                        new_opr.push(opr[p]);
                        p = p + 1;
                    }


                    myChart.data.datasets.push({
                        label: branch,
                        data: new_opr,
                        borderColor: clr,
                        fill: false,
                        cubicInterpolationMode: 'monotone'
                    });


                    myChart.update();
                }
            </script>
        <?php endif; ?>
    </div>


    <?php
    unset($year, $years, $department, $departments, $institute, $institutes, $check, $opening_ranks, $closing_ranks, $closing_ranks, $gender, $genders, $round, $rounds);
    ?>

</body>

</html>