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
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"></script>
    <script src="myscript.js"></script>

    <title>IIT Analytics</title>
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

        #menu-button {
            position: fixed;
            display: inline-block;
            left: 90%;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }



        #menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: none;
        }

        #menu li {
            padding: 10px 0;
        }

        #menu li a {
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: black;
        }

        #menu li a:hover {
            background-color: black;
        }

        /* Style the active menu button */
        #menu-button.active {
            background-color: #333;
        }

        /* Show the menu items when the menu button is clicked */
        #menu.active {
            display: flex;
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
?>



<body>
    <div class="tt">
        <button id="menu-button">Menu</button>
        <ul id="menu">
            <li><a href="female.php" style="color:#00BFFF;">Female Reservation Analysis of a Institute</a></li>
            <li><a href="female2.php" style="color:#00BFFF;">Female Reservation Analysis of a Academic Program</a></li>
            <!-- <li><a href="#">Option 3</a></li>
            <li><a href="#">Option 4</a></li> -->
        </ul>

        <!-- JavaScript code to toggle the menu items -->
        <script>
            // Get the menu button and menu items by their IDs
            const menuButton = document.getElementById('menu-button');
            const menu = document.getElementById('menu');

            // Add a click event listener to the menu button
            menuButton.addEventListener('click', function() {
                // Toggle the "active" class on the menu button
                menuButton.classList.toggle('active');

                // Toggle the "active" class on the menu items
                menu.classList.toggle('active');
            });
        </script>
        <div class="bd">


            <h1 style="color:#007AFF; text-align:center;">IIT Analytics <p style="font-size:80%"><em>We are here to help you</em></p>
            </h1>
            <form class="styled_select" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="question1" style="color:#F2F2F2;">Year:</label>
                <select id="question1" name="yr">
                    <option selected="selected" value="0">--Select--</option>
                    <option>ALL</option>
                    <option>2016</option>
                    <option>2017</option>
                    <option>2018</option>
                    <option>2019</option>
                    <option>2020</option>
                    <option>2021</option>
                    <option>2022</option>
                </select>
                <label for="question2" style="color:#F2F2F2;">Institute Name:</label>
                <select id="question2" name="institute">
                    <option selected="selected" value="0">--Select--</option>
                    <option>ALL</option>
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
                <label for="question2" style="color:#F2F2F2;">Academic Program Name:</label>
                <select name="department">
                    <option selected="selected" value="0">--Select--</option>
                    <option>ALL</option>
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
                </select>
                <label for="question4" style="color:#F2F2F2;">Seat type:</label>
                <select id="question4" name="seat">
                    <option selected="selected" value="0">--Select--</option>
                    <option>ALL</option>
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
                    <option>ALL</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                </select>
                <label for="question6" style="color:#F2F2F2;">Gender:</label>
                <select id="question6" name="gender">
                    <option selected="selected" value="0">--Select--</option>
                    <option>ALL</option>
                    <option>Gender-Neutral</option>
                    <option>Female-only (including Supernumerary)</option>
                </select>
                <button type="submit">Submit</button>
            </form>
        </div>
        <div>
            <?php

            if (isset($_POST['yr']) && isset($_POST['institute']) && isset($_POST['department']) && isset($_POST['seat']) && isset($_POST['round']) && isset($_POST['gender'])) {
                $year = $_POST['yr'];
                $institute = $_POST['institute'];
                $department = $_POST['department'];
                $seat = $_POST['seat'];
                $round = $_POST['round'];
                $gender = $_POST['gender'];
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
                $stmt = $conn->query("SELECT * FROM josaa.`josaa`");
                $opening_ranks = array();
                $closing_ranks = array();
                $years = array();
                $institutes = array();
                $genders = array();
                $seats = array();
                $rounds = array();
                $departments = array();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $check = true;
                    if ($year != "ALL") {
                        if ($row['Year'] != $year) $check = false;
                    }
                    if ($institute != "ALL") {
                        if ($row['Institute'] != $institute) $check = false;
                    }
                    if ($department != "ALL") {
                        if ($row['Academic Program Name'] != $department) $check = false;
                    }
                    if ($seat != "ALL") {
                        if ($row['Seat Type'] != $seat) $check = false;
                    }
                    if ($gender != "ALL") {
                        if ($row['Gender'] != $gender) $check = false;
                    }
                    if ($round != "ALL") {
                        if ($row['Round'] != $round) $check = false;
                    }
                    if ($check == true) {
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

            <div style="height:40%;margin-top:5%; margin-left:10%; margin-right: 10%; justify-content:space-around; margin-bottom:5%;">
                <?php if (!empty($years) && !empty($opening_ranks)) :
                    if ($year == "ALL") : ?>
                        <canvas id="myChart" class="barchart"></canvas>
                        <div style="width: 50%; margin-top:5%; margin-left: 5%; margin-right: 5%; ">
                            <canvas id="myPieChart" class="piechart"></canvas>
                        </div>
                        <div style="margin-top: 5%;">
                            <canvas id="myLineChart"></canvas>
                        </div>
                        <script>
                            var ctx = document.getElementById('myChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: <?= json_encode($years) ?>,
                                    datasets: [{
                                        label: '',
                                        data: <?= json_encode($opening_ranks) ?>,
                                        backgroundColor: ['rgba(255, 99, 132, 0.8)',
                                            'rgba(54, 162, 235, 0.8)',
                                            'rgba(255, 206, 86, 0.8)',
                                            'rgba(75, 192, 192, 0.8)',
                                            'rgba(153, 102, 255, 0.8)',
                                            'rgba(255, 159, 64, 0.8)'
                                        ],
                                        borderColor: 'rgba(0, 0, 255, 1)',
                                        borderWidth: 0,
                                        hoverBorderWidth: 1
                                    }]
                                },
                                options: {
                                    plugins: {
                                        legend: {
                                            display: false, // Set to true to show the legend
                                            labels: {
                                                display: false,
                                                font: {
                                                    size: 25 // Set the font size of the legend labels
                                                }
                                            }
                                        },
                                        title: {
                                            display: true,
                                            text: 'Opening Rank vs Year for choosen college and department',
                                            font: {
                                                size: 24,
                                                weight: 'bold',
                                            },
                                            color: 'blue' // set the font color of title
                                        }
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            title: {
                                                display: true,
                                                text: 'Opening Rank',
                                                font: {
                                                    size: 24,
                                                    weight: 'bold'
                                                },
                                                color: 'green'
                                            }
                                        },
                                        x: {
                                            title: {
                                                display: true,
                                                text: 'Year',
                                                font: {
                                                    size: 24,
                                                    weight: 'bold'
                                                },
                                                color: 'green'
                                            }
                                        },
                                        xAxes: [{
                                            ticks: {
                                                autoSkip: false,
                                                maxRotation: 90,
                                                minRotation: 90
                                            }
                                        }]
                                    }
                                }
                            });

                            // Chart.plugins.register(ChartDataLabels);

                            var ctx2 = document.getElementById('myPieChart').getContext('2d');
                            var myPieChart = new Chart(ctx2, {
                                type: 'pie',
                                data: {
                                    labels: <?= json_encode($years) ?>,
                                    datasets: [{
                                        label: 'Data Set',
                                        data: <?= json_encode($opening_ranks) ?>,
                                        backgroundColor: ['rgba(255, 99, 132, 0.8)',
                                            'rgba(54, 162, 235, 0.8)',
                                            'rgba(255, 206, 86, 0.8)',
                                            'rgba(75, 192, 192, 0.8)',
                                            'rgba(153, 102, 255, 0.8)',
                                            'rgba(255, 159, 64, 0.8)',
                                            'rgba(255, 206, 86, 0.8)',
                                            'rgba(75, 192, 192, 0.8)',
                                            'rgba(153, 102, 255, 0.8)',
                                            'rgba(255, 159, 64, 0.8)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    plugins: {
                                        legend: {
                                            display: false, // Set to true to show the legend
                                            labels: {
                                                display: false,
                                                font: {
                                                    size: 25 // Set the font size of the legend labels
                                                }
                                            }
                                        },
                                        datalabels: {
                                            formatter: (value, ctx2) => {
                                                let datasets = ctx2.chart.data.datasets;
                                                if (datasets.indexOf(ctx2.dataset) === datasets.length - 1) {
                                                    let sum = datasets[0].data.reduce((a, b) => a + b, 0);
                                                    let percentage = Math.round((value / sum) * 100) + '%';
                                                    return percentage;
                                                } else {
                                                    let sum = datasets[0].data.reduce((a, b) => a + b, 0);
                                                    let percentage = Math.round((value / sum) * 100) + '%';
                                                    return percentage;
                                                }
                                            },
                                            color: '#fff',
                                            display: true // set display option to true
                                        },
                                        title: {
                                            display: true,
                                            text: 'Opening Rank vs Year for chosen college and department',
                                            font: {
                                                size: 24,
                                                weight: 'bold'
                                            },
                                            color: 'blue' // set the font color of title
                                        }
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                            var ctx3 = document.getElementById('myLineChart').getContext('2d');
                            var myLineChart = new Chart(ctx3, {
                                type: 'line',
                                data: {
                                    labels: <?= json_encode($years) ?>,
                                    datasets: [{
                                        label: 'Data Set',
                                        data: <?= json_encode($opening_ranks) ?>,
                                        backgroundColor: 'rgba(0, 0, 255, 1)',
                                        borderWidth: 1,
                                        borderColor: 'rgba(255, 0, 0, 1)'
                                    }]
                                },
                                options: {
                                    plugins: {
                                        legend: {
                                            display: false, // Set to true to show the legend
                                            labels: {
                                                display: false,
                                                font: {
                                                    size: 25 // Set the font size of the legend labels
                                                }
                                            }
                                        },
                                        title: {
                                            display: true,
                                            text: 'Opening Rank vs Year for choosen college and department',
                                            font: {
                                                size: 24,
                                                weight: 'bold'
                                            },
                                            color: 'blue' // set the font color of title
                                        }
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            title: {
                                                display: true,
                                                text: 'Opening Rank',
                                                font: {
                                                    size: 24,
                                                    weight: 'bold'
                                                },
                                                color: 'green'
                                            }
                                        },
                                        x: {
                                            title: {
                                                display: true,
                                                text: 'Year',
                                                font: {
                                                    size: 24,
                                                    weight: 'bold'
                                                },
                                                color: 'green'
                                            }
                                        },
                                        xAxes: [{
                                            ticks: {
                                                autoSkip: false,
                                                maxRotation: 90,
                                                minRotation: 90
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>
                <?php endif;
                endif; ?>
            </div>

            <div style="height:40%; margin-left:10%; margin-right: 10%; justify-content:space-around; margin-bottom:5%">
                <?php if (!empty($years) && !empty($opening_ranks)) : ?>
                    <?php if ($institute == "ALL") : ?>
                        <canvas id="myChart" class="barchart"></canvas>
                        <div style="width: 50%; margin-top:5%;">
                            <canvas id="myPieChart" class="piechart"></canvas>
                        </div>
                        <div style="height:40%; justify-content:space-around; margin-bottom:5%; margin-top:5%;">
                            <canvas id="myLineChart" class="linechart"></canvas>
                        </div>
                        <script>
                            var ctx = document.getElementById('myChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: <?= json_encode($institutes) ?>,
                                    datasets: [{
                                        label: '',
                                        data: <?= json_encode($opening_ranks) ?>,
                                        backgroundColor: ['rgba(255, 99, 132, 0.8)',
                                            'rgba(54, 162, 235, 0.8)',
                                            'rgba(255, 206, 86, 0.8)',
                                            'rgba(75, 192, 192, 0.8)',
                                            'rgba(153, 102, 255, 0.8)',
                                            'rgba(255, 159, 64, 0.8)'
                                        ],
                                        borderColor: 'rgba(0, 0, 255, 1)',
                                        borderWidth: 0,
                                        hoverBorderWidth: 1
                                    }]
                                },
                                options: {
                                    plugins: {
                                        legend: {
                                            display: false, // Set to true to show the legend
                                            labels: {
                                                display: false,
                                                font: {
                                                    size: 25 // Set the font size of the legend labels
                                                }
                                            }
                                        },
                                        title: {
                                            display: true,
                                            text: 'Opening Rank vs Year for choosen college and department',
                                            font: {
                                                size: 24,
                                                weight: 'bold'
                                            },
                                            color: 'blue' // set the font color of title
                                        }
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            title: {
                                                display: true,
                                                text: 'Opening Rank',
                                                font: {
                                                    size: 24,
                                                    weight: 'bold'
                                                },
                                                color: 'green'
                                            }
                                        },
                                        x: {
                                            title: {
                                                display: true,
                                                text: 'Year',
                                                font: {
                                                    size: 24,
                                                    weight: 'bold'
                                                },
                                                color: 'green'
                                            }
                                        },
                                        xAxes: [{
                                            ticks: {
                                                autoSkip: false,
                                                maxRotation: 90,
                                                minRotation: 90
                                            }
                                        }]
                                    }
                                }
                            });

                            var ctx2 = document.getElementById('myPieChart').getContext('2d');
                            var myPieChart = new Chart(ctx2, {
                                type: 'pie',
                                data: {
                                    labels: <?= json_encode($institutes) ?>,
                                    datasets: [{
                                        label: 'Data Set',
                                        data: <?= json_encode($opening_ranks) ?>,
                                        backgroundColor: ['rgba(255, 99, 132, 0.8)',
                                            'rgba(54, 162, 235, 0.8)',
                                            'rgba(255, 206, 86, 0.8)',
                                            'rgba(75, 192, 192, 0.8)',
                                            'rgba(153, 102, 255, 0.8)',
                                            'rgba(255, 159, 64, 0.8)',
                                            'rgba(255, 206, 86, 0.8)',
                                            'rgba(75, 192, 192, 0.8)',
                                            'rgba(153, 102, 255, 0.8)',
                                            'rgba(255, 159, 64, 0.8)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    plugins: {
                                        legend: {
                                            display: false, // Set to true to show the legend
                                            labels: {
                                                display: false,
                                                font: {
                                                    size: 25 // Set the font size of the legend labels
                                                }
                                            }
                                        },
                                        title: {
                                            display: true,
                                            text: 'Opening Rank vs Year for choosen college and department',
                                            font: {
                                                size: 24,
                                                weight: 'bold'
                                            },
                                            color: 'blue' // set the font color of title
                                        }
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    },
                                }
                            });

                            var ctx3 = document.getElementById('myLineChart').getContext('2d');
                            var myLineChart = new Chart(ctx3, {
                                type: 'line',
                                data: {
                                    labels: <?= json_encode($institutes) ?>,
                                    datasets: [{
                                        label: 'Data Set',
                                        data: <?= json_encode($opening_ranks) ?>,
                                        backgroundColor: 'rgba(0, 0, 255, 1)',
                                        borderWidth: 1,

                                    }]
                                },
                                options: {
                                    plugins: {
                                        legend: {
                                            display: false, // Set to true to show the legend
                                            labels: {
                                                display: false,
                                                font: {
                                                    size: 25 // Set the font size of the legend labels
                                                }
                                            }
                                        },
                                        title: {
                                            display: true,
                                            text: 'Opening Rank vs Year for choosen college and department',
                                            font: {
                                                size: 24,
                                                weight: 'bold'
                                            },
                                            color: 'blue' // set the font color of title
                                        }
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            title: {
                                                display: true,
                                                text: 'Opening Rank',
                                                font: {
                                                    size: 24,
                                                    weight: 'bold'
                                                },
                                                color: 'green'
                                            }
                                        },
                                        x: {
                                            title: {
                                                display: true,
                                                text: 'Year',
                                                font: {
                                                    size: 24,
                                                    weight: 'bold'
                                                },
                                                color: 'green'
                                            }
                                        },
                                        xAxes: [{
                                            ticks: {
                                                autoSkip: false,
                                                maxRotation: 90,
                                                minRotation: 90
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <?php
            unset($year, $years, $department, $departments, $institute, $institutes, $check, $opening_ranks, $closing_ranks, $closing_ranks, $gender, $genders, $round, $rounds);
            ?>


            <footer>
                <p>&copy; 2023 Josaa previous year data analyser. All rights reserved.</p>
            </footer>

</body>

</html>