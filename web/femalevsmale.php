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
        body {
            background-color: black;
            /* background-color: #181818; */
            /* background-image: url('back.jpg'); */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
    </style>
</head>
<?php
$or = 0;
$cr = 0;
$k = 0;
$intake = 0;
$fgender = "Female-only (including Supernumerary)";
$mgender = "Gender-Neutral";
?>

<body>
    <h1 style="color:#007AFF; text-align:center;">IIT Analytics <p style="font-size:80%; color: white;"><em>Female Reservation analysis of a College</em></p>
    </h1>
    <form class="styled_select" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="question" style="color:#F2F2F2;">Year:</label>
        <select id="question" name="yr">
            <option>2018</option>
            <option>2019</option>
            <option>2020</option>
            <option>2021</option>
            <option>2022</option>
        </select>
        <button type="submit">Submit</button>
    </form>

    <?php
    if (isset($_POST['yr'])) {
        $year = $_POST['yr'];
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

        $label = array();

        for ($i = 0; $i < 25; $i += 1) {
            $label[$i] = $i * 1000 . '-' . ($i + 1) * 1000;
        }

        $stmt = $conn->query("SELECT * FROM josaa.`female`  WHERE Gender='$fgender' AND Year='$year'");

        $data_f = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cr = $row['Closing_Rank'];
            $intake = $row['Intake'];
            $k = intdiv($cr, 1000);
            if ($k < 25) $data_f[$k] = $data_f[$k] + $intake;
            else $data_f[24] = $data_f[24] + $intake;
        }

        $stmt = $conn->query("SELECT * FROM josaa.`female`  WHERE Gender='$mgender' AND Year='$year'");

        $data_m = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cr = (int)$row['Closing_Rank'];
            $intake = $row['Intake'];
            $k = intdiv($cr, 1000);
            if ($k < 25) $data_m[$k] = $data_m[$k] + $intake;
            else $data_m[25] = $data_m[25] + $intake;
        }

        $dataPoints21 = array_map(function ($l, $y) {
            return array("label" => $l, "y" => $y);
        }, $label, $data_f);

        $dataPoints22 = array_map(function ($l, $y) {
            return array("label" => $l, "y" => $y);
        }, $label, $data_m);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>

    <div id="chartContainer" style="height: 800px; width: 100%; margin-top:5%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script type="text/javascript">
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                backgroundColor: "black",
                animationEnabled: true,
                title: {
                    text: "Number of Males vs Females in different ranges of Ranks",
                    fontSize: 40,
                    fontColor: "white",
                },
                axisY: {
                    title: "No of Seats obtained",
                    includeZero: true,
                    labelFontColor: "white",
                    titleFontColor: "white"
                },
                axisX: {
                    title: "Rank Range",
                    includeZero: true,
                    labelFontColor: "white",
                    titleFontColor: "white"
                },
                legend: {
                    cursor: "pointer",
                    itemclick: toggleDataSeries,
                    fontColor: "green",
                },
                toolTip: {
                    shared: true,
                    content: toolTipFormatter
                },
                data: [{
                        type: "bar",
                        showInLegend: true,
                        name: "Female",
                        color: "magenta",
                        dataPoints: <?php echo json_encode($dataPoints21, JSON_NUMERIC_CHECK); ?>
                    },
                    {
                        type: "bar",
                        showInLegend: true,
                        name: "Male",
                        color: "blue",
                        dataPoints: <?php echo json_encode($dataPoints22, JSON_NUMERIC_CHECK); ?>
                    },
                ]
            });
            chart.render();

            function toolTipFormatter(e) {
                var str = "";
                var total = 0;
                var str3;
                var str2;
                for (var i = 0; i < e.entries.length; i++) {
                    var str1 = "<span style= \"color:" + e.entries[i].dataSeries.color + "\">" + e.entries[i].dataSeries.name + "</span>: <strong>" + e.entries[i].dataPoint.y + "</strong> <br/>";
                    total = e.entries[i].dataPoint.y + total;
                    str = str.concat(str1);
                }
                str2 = "<strong>" + e.entries[0].dataPoint.label + "</strong> <br/>";
                str3 = "<span style = \"color:Tomato\">Total: </span><strong>" + total + "</strong><br/>";
                return (str2.concat(str)).concat(str3);
            }

            function toggleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }
        }
    </script>
</body>

</html>