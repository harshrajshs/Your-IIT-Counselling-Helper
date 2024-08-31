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
        table {
            border-collapse: collapse;
            width: 100%;
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
            /* background-color: white; */
            /* background-color: #181818; */
            background-image: url('back.jpg');
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            /* margin: 2% 25%; */
        }

        form {
            background-color: black;
            width: 60%;
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
            background-color: black;
            margin-top: 5%;
            margin-left: 2%;
            margin-right: 2%;
            padding: 5%;
            border-radius: 5%;
        }


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
$department = "";
$seat = "";
$round = "";
$gender = "";
$course = "";
?>

<body>
    <h1 style="color:#007AFF; text-align:center;">IIT Analytics <p style="font-size:80%"><em>Female Reservation analysis of a Branch</em></p>
    </h1>
    <form class="styled_select" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="question2" style="color:#F2F2F2;">Academic Program Name:</label>
        <select name="department">
            <option selected="selected" value="0">--Select--</option>
            <option>Aerospace Engineering (4 Years, Bachelor of Technology)</option>
            <option>Agricultural and Food Engineering (4 Years, Bachelor of Technology)</option>
            <option>Biological Sciences and Bioengineering (4 Years, Bachelor of Technology)</option>
            <option>Biotechnology and Biochemical Engineering (4 Years, Bachelor of Technology)</option>
            <option>Ceramic Engineering (4 Years, Bachelor of Technology)</option>
            <option>Chemical Engineering (4 Years, Bachelor of Technology)</option>
            <option>Chemical Science and Technology (4 Years, Bachelor of Technology)</option>
            <option>Civil Engineering (4 Years, Bachelor of Technology)</option>
            <option>Computational Engineering (4 Years, Bachelor of Technology)</option>
            <option>Industrial Chemistry (4 Years, Bachelor of Technology)</option>
            <option>Chemical and Biochemical Engineering (4 Years, Bachelor of Technology)</option>
            <option>Electrical Engineering (IC Design and Technology) (4 Years, Bachelor of Technology)</option>
            <option>Computer Science and Engineering (4 Years, Bachelor of Technology)</option>
            <option>Electrical Engineering (4 Years, Bachelor of Technology)</option>
            <option>Electrical Engineering (Power and Automation) (4 Years, Bachelor of Technology)</option>
            <option>Electronics Engineering (4 Years, Bachelor of Technology)</option>
            <option>Electronics and Communication Engineering (4 Years, Bachelor of Technology)</option>
            <option>Electronics and Electrical Communication Engineering (4 Years, Bachelor of Technology)</option>
            <option>Electronics and Electrical Engineering (4 Years, Bachelor of Technology)</option>
            <option>Engineering Physics (4 Years, Bachelor of Technology)</option>
            <option>Engineering Science (4 Years, Bachelor of Technology)</option>
            <option>Environmental Engineering (4 Years, Bachelor of Technology)</option>
            <option>Instrumentation Engineering (4 Years, Bachelor of Technology)</option>
            <option>Manufacturing Science and Engineering (4 Years, Bachelor of Technology)</option>
            <option>Materials Science and Engineering (4 Years, Bachelor of Technology)</option>
            <option>Mathematics and Computing (4 Years, Bachelor of Technology)</option>
            <option>Mechanical Engineering (4 Years, Bachelor of Technology)</option>
            <option>Metallurgical Engineering (4 Years, Bachelor of Technology)</option>
            <option>Metallurgical and Materials Engineering (4 Years, Bachelor of Technology)</option>
            <option>Metallurgical Engineering and Materials Science (4 Years, Bachelor of Technology)</option>
            <option>Mining Engineering (4 Years, Bachelor of Technology)</option>
            <option>Mining Machinery Engineering (4 Years, Bachelor of Technology)</option>
            <option>Naval Architecture and Ocean Engineering (4 Years, Bachelor of Technology)</option>
            <option>Ocean Engineering and Naval Architecture (4 Years, Bachelor of Technology)</option>
            <option>Petroleum Engineering (4 Years, Bachelor of Technology)</option>
            <option>Production and Industrial Engineering (4 Years, Bachelor of Technology)</option>
            <option>Textile Technology (4 Years, Bachelor of Technology)</option>
            <option>Civil and Infrastructure Engineering (4 Years, Bachelor of Technology)</option>
            <option>Bio Engineering (4 Years, Bachelor of Technology)</option>
            <option>Electrical and Electronics Engineering (4 Years, Bachelor of Technology)</option>
            <option>Materials Science and Metallurgical Engineering (4 Years, Bachelor of Technology)</option>
            <option>Industrial and Systems Engineering (4 Years, Bachelor of Technology)</option>
            <option>Pharmaceutical Engineering &amp; Technology (4 Years, Bachelor of Technology)</option>
            <option>Mechatronics Engineering (4 Years, Bachelor of Technology)</option>
            <option>Data Science and Artificial Intelligence (4 Years, Bachelor of Technology)</option>
            <option>Artificial Intelligence (4 Years, Bachelor of Technology)</option>
            <option>Data Science and Engineering (4 Years, Bachelor of Technology)</option>
            <option>Artificial Intelligence and Data Science (4 Years, Bachelor of Technology)</option>
            <option>Mineral and Metallurgical Engineering (4 Years, Bachelor of Technology)</option>
            <option>Biomedical Engineering (4 Years, Bachelor of Technology)</option>
            <option>Engineering and Computational Mechanics (4 Years, Bachelor of Technology)</option>
            <option>Materials Engineering (4 Years, Bachelor of Technology)</option>
            <option>Biosciences and Bioengineering (4 Years, Bachelor of Technology)</option>
            <option>Energy Engineering (4 Years, Bachelor of Technology)</option>
            <option>Biotechnology and Bioinformatics (4 Years, Bachelor of Technology)</option>
            <option>Chemistry (4 Years, Bachelor of Science)</option>
            <option>Economics (4 Years, Bachelor of Science)</option>
            <option>Mathematics and Scientific Computing (4 Years, Bachelor of Science)</option>
            <option>Physics (4 Years, Bachelor of Science)</option>
            <option>Earth Sciences (4 Years, Bachelor of Science)</option>
            <option>BS in Mathematics (4 Years, Bachelor of Science)</option>
            <option>Statistics and Data Science (4 Years, Bachelor of Science)</option>
            <option>Mathematics and Computing (4 Years, Bachelor of Science)</option>
            <option>Applied Geology (4 Years, Bachelor of Science)</option>
            <option>Exploration Geophysics (4 Years, Bachelor of Science)</option>
            <option>Physics with Specialization (4 Years, Bachelor of Science)</option>
            <option>Chemistry with Specialization (4 Years, Bachelor of Science)</option>
            <option>Architecture (5 Years, Bachelor of Architecture)</option>
            <option>Aerospace Engineering (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Agricultural and Food Engineering with M.Tech. in any of the listed specializations (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Biochemical Engineering with M.Tech. in Biochemical Engineering and Biotechnology (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Bioengineering with M.Tech in Biomedical Technology (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Biological Engineering (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Biotechnology and Biochemical Engineering (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Ceramic Engineering (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Environmental Science and Engineering (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Bio Engineering (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Chemical Engineering (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Civil Engineering (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Civil Engineering with any of the listed specialization (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Computer Science and Engineering (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Electrical Engineering (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Electrical Engineering with M.Tech. in any of the listed specializations (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Electrical Engineering with M.Tech. in Power Electronics (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Electronics and Electrical Communication Engineering with M.Tech. in any of the listed specializations (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Engineering Design (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Materials Science and Technology (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Mechanical Engineering (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Mechanical Engineering and M.Tech. in Computer Integrated Manufacturing (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Mechanical Engineering with M.Tech. in any of the listed specializations (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Metallurgical Engineering (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Industrial and Systems Engineering with M.Tech. in Industrial and Systems Engineering and Management (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Metallurgical and Materials Engineering (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Mining Engineering (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Mining Safety Engineering (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Ocean Engineering and Naval Architecture (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Mathematics and Computing (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Electrical Engineering and M.Tech Power Electronics and Drives (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Civil Engineering and M.Tech in Transportation Engineering (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Engineering Physics (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Manufacturing Science and Engineering with M.Tech. in Industrial and Systems Engineering and Management (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Mechanical Engineering and M. Tech. in Mechanical System Design (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Mechanical Engineering and M. Tech. in Thermal Science &amp; Engineering (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Civil Engineering and M. Tech. in Structural Engineering (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Mechanical Engineering with M.Tech. in Manufacturing Engineering (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Civil Engineering and M.Tech. in Environmental Engineering (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Industrial Chemistry (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Pharmaceutical Engineering &amp; Technology (5 Years, Bachelor and Master of Technology (Dual Degree))</option>
            <option>Geological Technology (5 Years, Integrated Master of Technology)</option>
            <option>Geophysical Technology (5 Years, Integrated Master of Technology)</option>
            <option>Mathematics and Computing (5 Years, Integrated Master of Technology)</option>
            <option>Applied Geology (5 Years, Integrated Master of Technology)</option>
            <option>Applied Geophysics (5 Years, Integrated Master of Technology)</option>
            <option>Biological Sciences (5 Years, Bachelor of Science and Master of Science (Dual Degree))</option>
            <option>Physics (5 Years, Bachelor of Science and Master of Science (Dual Degree))</option>
            <option>Mathematics &amp; Computing (5 Years, Bachelor of Science and Master of Science (Dual Degree))</option>
            <option>Chemical Sciences (5 Years, Bachelor of Science and Master of Science (Dual Degree))</option>
            <option>Economics (5 Years, Bachelor of Science and Master of Science (Dual Degree))</option>
            <option>Interdisciplinary Sciences (5 Years, Bachelor of Science and Master of Science (Dual Degree))</option>
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

    if (isset($_POST['department']) && isset($_POST['seat']) && isset($_POST['round'])) {
        $department = $_POST['department'];
        $seat = $_POST['seat'];
        $round = $_POST['round'];
        $gender = "Female-only (including Supernumerary)";
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


        $stmt = $conn->query("SELECT * FROM josaa.`josaa`  WHERE `Academic Program Name`='$department' AND Gender='$gender' AND Round='$round' AND `Seat Type`='$seat'");

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $years[] = $row['Year'];
            $institutes[] = $row['Institute'];
            $departments[] = $row['Academic Program Name'];
            $seats[] = $row['Seat Type'];
            $genders[] = $row['Gender'];
            $opening_ranks[] = $row['OR'];
            $closing_ranks[] = $row['Closing Rank'];
            $rounds[] = $row['Round'];
        }

        $unique_colleges = array_unique($institutes);

        // print_r($unique_branches);

        $data = array();


        foreach ($unique_colleges as $college) {
            $yrs[] = array();
            $opr[] = array();
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($row['Institute'] == $college) {
                    $yrs[] = $row['Year'];
                    array_push($opr, $row['OR']);
                }
            }
            array_shift($yrs);
            array_shift($opr);
            array_push($data, array($college, $yrs, $opr));
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
        'white',
        'deeppink',
        'maroon',
        'saddlebrown',
        'slateblue',
        'violet',
        'teal',
        'tan',
    );
    ?>

    <div class="chart">
        <?php if (!empty($data) && isset($_POST['department']) && isset($_POST['seat']) && isset($_POST['round'])) : ?>
            <canvas id="myChart" height="400"></canvas>
            <script>
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
                                text: '<?php echo $department ?>',
                                font: {
                                    size: 24,
                                    weight: 'bold',
                                },
                                padding: {
                                    top: 1,
                                    bottom: 15
                                },
                                color: 'white' // set the font color of title
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
                                    beginAtZero: true,
                                }
                            }]
                        }
                    }
                });

                // Add data to the chart
                for (var i = 0; i < data.length; i++) {
                    var college = data[i][0];
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
                        label: college,
                        data: new_opr,
                        borderColor: clr,
                        fill: false
                    });


                    myChart.update();
                }
            </script>
        <?php endif; ?>
    </div>


    <?php
    unset($_POST['$department'], $years, $departments, $institute, $institutes, $check, $opening_ranks, $closing_ranks, $closing_ranks, $gender, $genders, $round, $rounds);
    ?>


</body>

</html>