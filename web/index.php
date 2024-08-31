<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - IITAnalytics</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/typed.js@2.0.15/dist/typed.umd.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <script src="https://d3js.org/d3.v6.min.js"></script>
    <script src="http://d3js.org/topojson.v3.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&family=DM+Serif+Display&family=Hurricane&family=Mukta:wght@200;800&family=Noto+Serif+Display&family=Parisienne&family=Tenor+Sans&display=swap" rel="stylesheet">
</head>
<style>
    @font-face {
        font-family: 'Avenir', sans-serif;
        src: url('./fonts/AvenirLTStd-Roman.otf');
    }

    @font-face {
        font-family: 'Poppins', sans-serif;
        src: url('./fonts/Poppins-Regular.ttf');
    }

    html {
        overflow-x: hidden;
        overflow-y: scroll;
    }


    html::-webkit-scrollbar {
        display: inline;
        padding: 1px;
    }

    html::-webkit-scrollbar-thumb {
        background-color: rgb(172, 172, 172);
        padding: 1px;
    }

    .content {
        color: black;
        background: transparent;
        border-radius: 10px;
        width: 45%;
        position: absolute;
        top: 25%;
        right: 1.5%;
        height: 60vh;
        font-size: 20px;
        padding: 10px;
        font-family: 'Avenir';
    }

    .outliercontent {
        height: fit-content;
        background: white;
        border-radius: 15px;
        width: 37%;
        margin-right: 5%;
        color: black;
        position: absolute;
        top: 18%;
        left: 55%;
        padding: 40px;
        font-family: 'Avenir', sans-serif;
    }

    #outlier label {
        font-family: 'Avenir', sans-serif;
        margin: 5px;

    }

    #outlier {
        margin: 50px 40%;
    }

    #myChart {
        margin: 0px 20px;
        position: absolute;
        bottom: 1%;
        left: 0px;


    }
</style>

<body>
    <div>
        <!-- <img class="bg" src="skybluebg.png" alt=""> -->
        <!-- header -->
        <header class="header"><img src="./analytics.png"></img>
            <h1>IITAnalytics</h1>
        </header>

        <!-- computer image -->
        <img class="computer" src="./computer.png" alt="" data-tilt data-tilt-max="15" data-tilt-reverse="true">
        <!-- background svg -->
        <svg class="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <defs>
                <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" stop-color="#cbbdf7"></stop>
                    <stop offset="100%" stop-color="rgb(150, 199, 249)"></stop>
                </linearGradient>
            </defs>
            <path class="path" fill-opacity="1" d="M0,64L80,74.7C160,85,320,107,480,144C640,181,800,235,960,234.7C1120,235,1280,181,1360,154.7L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z" fill="url(#gradient)"></path>
        </svg>

        <!-- Typing animation content -->
        <div>
            <p id="para"></p>
        </div>




        <!--  icon stash -->
        <div class="icons">
            <img class="iconimg" src="./icons/analysis.png"></img>
            <img class="iconimg" src="./icons/analytic.png"></img>
            <img class="iconimg" src="./icons/analytics (1).png"></img>
            <img class="iconimg" src="./icons/dashboard.png"></img>
            <img class="iconimg" src="./icons/data-analytics.png"></img>
            <img class="iconimg" src="./icons/presentation.png"></img>
        </div>
        <!-- JS to expel random icon out of the corner -->
        <script>
            const icons = document.querySelectorAll('.iconimg');
            const box = document.querySelector('.computer');


            function getRandomIcon() {
                return icons[Math.floor(Math.random() * icons.length)];
            }


            box.addEventListener('mouseover', (e) => {
                const {
                    left,
                    top,
                    width,
                    height
                } = box.getBoundingClientRect();
                const x = e.clientX - left;
                const y = e.clientY - top;

                if (x < width / 2 && y >= height / 2) {
                    const icon = getRandomIcon();
                    icon.style.transform = 'translate(300px, -450px)';
                    icon.style.opacity = 0;
                    setTimeout(() => {
                        icon.style.transform = 'translate(0,0)';
                        icon.style.opacity = 1;
                    }, 3000);
                } else {
                    const icon = getRandomIcon();
                    icon.style.transform = 'translate(-560px, -250px)';
                    icon.style.opacity = 0;
                    setTimeout(() => {
                        icon.style.transform = 'translate(0,0)';
                    }, 3000);
                    setTimeout(() => {
                        icon.style.opacity = 1;
                    }, 8000);
                }
            });
        </script>


        <!-- Dot svg -->
        <svg class="dot" height="100" width="100">
            <circle cx="50" cy="50" r="10" fill="#0065b3" />
        </svg>

        <svg class="dottwo" height="100" width="100">
            <circle cx="50" cy="50" r="10" fill="skyblue" />
        </svg>


        <h3 class="subheading" data-aos="zoom-in-left">Everyone knows IITs are<br> best institutes in whole Indian
            Nation.<br> Why not find out the perfect one that suits you ?</h3>
    </div>

    <!-- Topic one   -->
    <div class="topicone">
        <h1 data-aos="fade-right" class="lineone">Let them compete against themselves first.</h1>
        <h1 data-aos="fade-left" class="linetwo">The statistics of NIRF and QS World Rankings of Top 10 Institutes.</h1>
        <br><br>
        <div id="rankings">
            <table>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>NIRF Ranking</th>
                    <th>NIRF Score</th>
                    <th>QS World Ranking</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>IIT Madras</td>
                    <td>1</td>
                    <td>90.04</td>
                    <td>250</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>IIT Delhi</td>
                    <td>2</td>
                    <td>88.12</td>
                    <td>174</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>IIT Bombay</td>
                    <td>3</td>
                    <td>83.96</td>
                    <td>172</td>
                </tr>

                <tr>
                    <td>4</td>
                    <td>IIT Kanpur</td>
                    <td>4</td>
                    <td>82.56</td>
                    <td>264</td>
                </tr>

                <tr>
                    <td>5</td>
                    <td>IIT Kharagpur</td>
                    <td>5</td>
                    <td>78.89</td>
                    <td>270</td>
                </tr>

                <tr>
                    <td>6</td>
                    <td>IIT Roorkee</td>
                    <td>6</td>
                    <td>76.70</td>
                    <td>369</td>
                </tr>

                <tr>
                    <td>7</td>
                    <td>IIT Guwahati</td>
                    <td>7</td>
                    <td>72.98</td>
                    <td>384</td>
                </tr>

                <tr>
                    <td>8</td>
                    <td>IIT Hyderabad</td>
                    <td>9</td>
                    <td>68.03</td>
                    <td>581-590</td>
                </tr>

                <tr>
                    <td>9</td>
                    <td>IIT Varanasi(BHU)</td>
                    <td>13</td>
                    <td>63.51</td>
                    <td>651-700</td>
                </tr>

                <tr>
                    <td>10</td>
                    <td>IISM Dhanbad</td>
                    <td>14</td>
                    <td>63.50</td>
                    <td>1001-1200</td>
                </tr>
            </table>

            <svg id="india" width="550" height="542"></svg>
            <script>
                // Define the map projection
                const projection = d3.geoMercator().center([82, 22]).scale(900).translate([250, 300]);

                // Define the path generator
                const path = d3.geoPath().projection(projection);

                // Create an SVG element
                const indiasvg = d3.select("#india");

                // Load the GeoJSON data for India
                d3.json("states_india.json").then(function(india) {



                    // Draw the map
                    indiasvg
                        .append("g")
                        .attr("class", "states")
                        .selectAll("path")
                        .data(india.features)
                        .enter()
                        .append("path")
                        .attr("d", path)
                        .style("fill", "#a2dea3;")
                        .style("stroke", "#222222")
                        .style("stroke-width", 0.5);

                    // Define the IIT locations
                    const iits = [{
                            name: "IIT Bombay",
                            lon: 72.9049,
                            lat: 19.076,
                            nirf: 3
                        },
                        {
                            name: "IIT Delhi",
                            lon: 77.2197,
                            lat: 28.6328,
                            nirf: 2
                        },
                        {
                            name: "IIT Madras",
                            lon: 80.2314,
                            lat: 12.9908,
                            nirf: 1
                        },
                        {
                            name: "IIT Kanpur",
                            lon: 80.2329,
                            lat: 26.5095,
                            nirf: 4
                        },
                        {
                            name: "IIT Kharagpur",
                            lon: 87.3215,
                            lat: 22.3140,
                            nirf: 5
                        },
                        {
                            name: "IIT Guwahati",
                            lon: 91.7529,
                            lat: 26.1445,
                            nirf: 7
                        },
                        {
                            name: "IIT Roorkee",
                            lon: 77.8910,
                            lat: 29.8668,
                            nirf: 6
                        },
                        {
                            name: "IIT Hyderabad",
                            lon: 78.3405,
                            lat: 17.4947,
                            nirf: 8
                        },
                        {
                            name: "IIT Gandhinagar",
                            lon: 72.5142,
                            lat: 23.2156,
                            nirf: 16
                        },
                        {
                            name: "IIT Ropar",
                            lon: 76.5862,
                            lat: 30.9785,
                            nirf: 9
                        },
                        {
                            name: "IIT Patna",
                            lon: 85.1499,
                            lat: 25.5941,
                            nirf: 23
                        },
                        {
                            name: "IIT Bhubaneswar",
                            lon: 85.8130,
                            lat: 20.2961,
                            nirf: 22
                        },
                        {
                            name: "IIT Mandi",
                            lon: 77.3149,
                            lat: 31.7055,
                            nirf: 12
                        },
                        {
                            name: "IIT Jodhpur",
                            lon: 73.0209,
                            lat: 26.2389,
                            nirf: 50
                        },
                        {
                            name: "IIT Indore",
                            lon: 75.8538,
                            lat: 22.4991,
                            nirf: 10
                        },
                        {
                            name: "IIT Varanasi",
                            lon: 83.0040,
                            lat: 25.2677,
                            nirf: 11
                        },
                        {
                            name: "IIT Palakkad",
                            lon: 76.6557,
                            lat: 10.8327,
                            nirf: 54
                        },
                        {
                            name: "IIT Tirupati",
                            lon: 79.1605,
                            lat: 13.6311,
                            nirf: 56
                        },
                        {
                            name: "IIT Dhanbad",
                            lon: 86.4220,
                            lat: 23.8143,
                            nirf: 15
                        },
                        {
                            name: "IIT Bhilai",
                            lon: 81.6882,
                            lat: 21.1924,
                            nirf: 51
                        },
                        {
                            name: "IIT Goa",
                            lon: 73.9224,
                            lat: 15.2993,
                            nirf: 30
                        },
                        {
                            name: "IIT Jammu",
                            lon: 74.8570,
                            lat: 32.6782,
                            nirf: 80
                        },
                        {
                            name: "IIT Dharwad",
                            lon: 75.0247,
                            lat: 15.4775,
                            nirf: 31
                        }
                    ];



                    // Draw markers for IIT locations
                    const markers = indiasvg
                        .append("g")
                        .attr("class", "iits")
                        .selectAll("circle")
                        .data(iits)
                        .enter()
                        .append("circle")
                        .attr("class", "iit-marker")
                        .attr("cx", function(d) {
                            return projection([d.lon, d.lat])[0];
                        })
                        .attr("cy", function(d) {
                            return projection([d.lon, d.lat])[1];
                        })
                        .attr("r", 4)
                        .on("mouseover", function(d) {

                            // Transition the marker size on hover
                            d3.select(this)
                                .transition()
                                .duration(0.001)
                                .attr("r", 6);
                        })
                        .on("mouseout", function() {

                            // Transition the marker size on mouseout
                            d3.select(this)
                                .transition()
                                .duration(0.001)
                                .attr("r", 4);
                        })
                        .append("title")
                        .html(function(d) {
                            return '<div style=" color: black; background-color: white;">' + d.name + '\n' + '<br>NIRF : ' + d.nirf + '</div>';
                        });



                });
            </script>

            <div style="font-family: Helvetica, sans-serif;">
                <p style="color : black; position : absolute; bottom : 12%; left : 5%; margin: 0px;">Bump into more insights
                    here
                    :
                </p>
                <a style="color : rgb(33, 103, 216); position : absolute; bottom : 9%; left : 5%; text-decoration: none; font-size: 1rem;" href=""><img style="width : 16px;" src="./link.png"></img>
                    NIRF Rankings</a>
                <a style="color : rgb(33, 103, 216); position : absolute; bottom : 6%; left : 5%; text-decoration: none; font-size: 1rem;" href=""><img style="width : 16px;" src="./link.png"></img>QS
                    World Rankings</a>
            </div>
        </div>

    </div>

    <!-- Topic 2 : -->
    <div class="topictwo">
        <div>
            <p>Want to check possible branches optable for a rank ?</p>
            <a href="./rankanalyser.html">CHECK OUT OUR RANK ANALYSER</a>
        </div>
    </div>





    <!-- Topic 3 : Female Category Analysis-->
    <div class="topicthree">
        <div style="border: 5px solid rgb(172, 172, 172); height : 90%; width : 95%; position: absolute; right: 2.5%; top : 2%;">
            <h1>Women in Focus: A Comprehensive Look at Female Participation</h1>
            <p style="font-size : 16px;">A Bar Graph Depiction of Gender Disparities in Different Rank Categories.</p>
            <a href="femalescatter.php">Explore</a>
            <br>
            <img src="./barplot.jpeg" style="position : absolute; top : 25%; left : 2%; width : 45%; " alt="">
            <div class="content">The bar graph presents the percentage of females and males in different rank categories ranging from 0-2000, 2000-4000, and so on. The data shows that the percentage of females is lower in the smaller rank categories, around 9-12% in the 0-2000 and 2000-4000 ranks. However, there is a significant increase in the percentage of females in the higher rank categories, reaching 20-30% in the ranks of range 10,000 - 12,000.
                <br><br><br>
                This suggests that there is a gender gap in the lower rank categories, but it narrows down as the rank increases. The bar graph provides a visual representation of this trend and helps in understanding the gender distribution across different rank categories. It is important to note that this analysis is based on the available data and may not represent the complete picture.
            </div>
            <br>
            <a class="linker" href="female2.php" style="position : absolute; top : 85%; left : 10%; font-weight: 900; text-align : center;">
                <div style="position: absolute; top : 40%; left : 12%; font-size : 14px;">Branch-wise cutoff analysis for females</div>
            </a>
            <a class="linker" href="female.php" style="position : absolute; top : 85%; right : 10%; font-weight: 900; text-align : center;">
                <div style="position: absolute; top : 40%; font-size : 14px; left : 12%;">Institute-wise cutoff analysis for females </div>
            </a>
        </div>
    </div>

    <!-- Topic 4 ( Parallax ) -->
    <div class="topicfour">
        <h1>Everything, everywhere, all at once !</h1>
        <p>Slide in to check out how OR and CR vary as per your desire.</p>
        <a href="cutoff.html">Take me there</a>
    </div>

    <!-- Topic 5 :  -->
    <div class="topicfive">
        <h1>Competition here , New v/s Old</h1>
        <p>Check out how New and Old IITs vary with each other</p>
        <a href="new_vs_old.html" target="_blank">Let's Go !</a>
    </div>

    <div class="topicsix" id="flow">
        <h1 style="font-size : 40px">The flow</h1>
        <div id="flowshower">
            <form method="post" action="index.php#flow" style="display : inline-block;">
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
                <button type="submit" value="Submit"><a onclick="updatedata()">Submit</a></button>
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
        </div>
    </div>


    <!-- Topic : Outliers-->
    <div class="outliers">
        <p>The Outliers</p>

        <img src="./god.png" style="display : inline; width : 45%; margin-left : 5%; border-radius : 10px; margin-bottom : 45px;" alt="">
        <div class="outliercontent">
            The line a slope of 1.1214 and an intercept of 932.54. The correlation coefficient between the opening and closing ranks is 0.96, indicating a strong positive correlation between the two variables. These values provide valuable information about the relationship between the opening and closing ranks and can help in understanding the overall trend and pattern in the data.
            <br><br>
            They can be seen as mavericks who choose to go against the general pattern and trend of the dataset. Like these mavericks, outliers can be unique and exceptional, and may have characteristics or circumstances that set them apart from the rest of the data.
            <br><br>
            These outliers can be thought of as individuals who value their interests more than the general trend and choose to deviate from the normal.
        </div>

        <form id="#outlier" method="post" action="index.php#myChart" style="text-align : center; font-size : 20px;">
            <label style="font-family: 'Avenir', sans-serif; margin-top : 100px;" for="min_rank">Minimum Opening Rank:</label>
            <input type="number" name="min_rank" id="min_rank"><br><br>

            <label style="font-family: 'Avenir', sans-serif; margin : 10px;" for="max_rank">Maximum Opening Rank:</label>
            <input type="number" name="max_rank" id="max_rank"><br><br>

            <input style="background-color : black; color : white; padding : 15px 25px; border : 2px solid grey;
            font-size : 14px; border-radius : 50px; cursor : pointer;" type="submit" value="Submit">
        </form>

        <canvas id="myChart" style="background-color : white;"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?php


    // Connect to the database using PDO
    $servername = "localhost";
    $port_no = 3306;
    $username = "harsh";
    $password = "harsh@123";
    $myDB = "josaa"; //Name of the database to access

    try {
        $conn = new PDO("mysql:host=$servername;port=$port_no;dbname=$myDB", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_POST['min_rank'])) {
            $min_rank = $_POST['min_rank'];
        } else {
            $min_rank = 1000;
        }
        if (isset($_POST['max_rank'])) {
            $max_rank = $_POST['max_rank'];
        } else {
            $max_rank = 10000;
        }


        $stmt = $conn->prepare(" SELECT `Institute`, `Academic Program Name`, `OR`, `Closing Rank`, `Year`
  FROM `josaa`
  WHERE 1*`OR` <=:max_rank AND 1*`OR`>=:min_rank AND `Round` = 6 AND `Seat Type`='OPEN' AND  `Gender`='Gender-Neutral'");
        $stmt->bindParam(':min_rank', $min_rank);
        $stmt->bindParam(':max_rank', $max_rank);
        $stmt->execute();

        $result = $stmt->fetchAll();


        $data = array();
        for ($i = 0; $i < count($result); $i++) {
            $data[] = array('x' => $result[$i][2], 'y' => $result[$i][3], 'label1' => $result[$i][0], 'label2' => $result[$i][1]);
        }


        //   echo("<pre>\n");
        //   print_r($min);
        //   echo gettype($min);
        //   echo("</pre>");
        //   echo("<pre>\n");
        //   print_r($max);
        //   echo gettype($max);
        //   echo("</pre>");
        // echo ("<pre>\n");
        // print_r($data);
        // echo ("</pre>");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
    <script>
        var ctx = document.getElementById("myChart").getContext("2d");
        var scatterChart = new Chart(ctx, {
            type: 'scatter',
            data: {
                datasets: [{
                    label: 'Scatter Plot',
                    data: <?php echo json_encode($data); ?>,
                    // pointBackgroundColor: function(context) {
                    //     var index = context.dataIndex;
                    //     var value = context.dataset.data[index].y;
                    //     var comparison = context.dataset.data[index].x;
                    //     return value > comparison + 2000 ? 'green' : 'red';
                    // },
                    // pointBorderColor: function(context) {
                    //     var index = context.dataIndex;
                    //     var value = context.dataset.data[index].y;
                    //     var comparison = context.dataset.data[index].x;
                    //     return value <= comparison + 2000 ? 'green' : 'red';
                    // },
                    // pointHoverBackgroundColor: 'black',
                    // pointHoverBorderColor: 'white',
                    // pointHoverBorderWidth: 2,
                    // pointHoverRadius: 7,
                    // pointStyle: function(context) {
                    //     var index = context.dataIndex;
                    //     var value = context.dataset.data[index].y;
                    //     var comparison = context.dataset.data[index].x;
                    //     return value >= comparison ? 'triangle' : 'circle';
                    // }
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var label1 = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index].label1;
                            var label2 = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index].label2;
                            return label1 + ': (' + tooltipItem.xLabel + ', ' + tooltipItem.yLabel + '), ' + label2;
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Closing Rank vs Opening Rank',
                        font: {
                            size: 36,
                            weight: 'bold',
                        },
                        padding: {
                            top: 1,
                            bottom: 15
                        },
                        color: 'black' // set the font color of title
                    }
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontColor: 'white'
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Opening Rank',
                            fontSize: 30,
                            fontColor: 'white',
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            fontColor: 'white'
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Closing Rank',
                            fontSize: 30,
                            fontColor: 'white',
                        },
                    }]
                },
            }
        });
    </script>


    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();

        var typed = new Typed('#para', {
            strings: ['We are here to help you choose.', 'We are here to help you excel.', 'We are here to provide you insights.'],
            smartBackspace: true,
            backDelay: 1000,
            typeSpeed: 20,
            backSpeed: 20,
            loop: true,
            loopCount: Infinity,
            showCursor: false
        });
    </script>

    <script src="./js/vanilla-tilt.js" type="text/javascript"></script>

</body>

</html>


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
        z-index: 10000000000;
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
            AND s2.`Closing Rank` <= 1000
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
            AND s1.`Closing Rank` <= 1000
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


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //!SECTION : primary initialisations


    const margin = {
        top: 20,
        right: 90,
        bottom: 30,
        left: 70
    };


    const width = 1400 - margin.left - margin.right;
    const height = 550 - margin.top - margin.bottom;

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

    const div = d3.select("#flowshower").append('h1').attr('class', 'tooltip tooltip-text').style('opacity', 0);

    const line = svg.append('line').attr('x1', 140).attr('y1', 140).attr('x2', 141).attr('y2', 141).style('opacity', 0);



    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    const res1 = <?php echo json_encode($results1); ?>;
    const res2 = <?php echo json_encode($results2); ?>;
    const resex = <?php echo json_encode($results_extra); ?>;
    const glob1 = Array(); // 2021 data
    for (var i = 0; i < res1.length; i++) {
        k = {}
        k['OR'] = res1[i][2]
        k['CR'] = res1[i][3]
        k['radius'] = res1[i][4]
        k['cx'] = xScale((parseInt(res1[i][2]) + parseInt(res1[i][3])) / 2 - margin.left);
        k['cy'] = yScale(getNumber(600 - parseInt(res1[i][4])));
        k['institute'] = res1[i][0]
        k['program'] = res1[i][1]
        k['color'] = getColor();
        glob1.push(k);
    }

    const glob2 = Array(); // 2020 data
    for (var i = 0; i < res1.length; i++) {
        k = {}
        k['OR'] = res2[i][2]
        k['CR'] = res2[i][3]
        k['cx'] = xScale((parseInt(res2[i][2]) + parseInt(res2[i][3])) / 2 - margin.left);
        k['cy'] = glob1[i].cy;
        k['radius'] = res2[i][4]
        k['institute'] = res2[i][0]
        k['program'] = res2[i][1]
        k['color'] = glob1[i].color;
        glob2.push(k);
    }

    const globextra = Array(); // 2020 data
    for (var i = 0; i < resex.length; i++) {
        k = {}
        k['OR'] = resex[i][2]
        k['CR'] = resex[i][3]
        k['cx'] = xScale((parseInt(resex[i][2]) + parseInt(resex[i][3])) / 2) + margin.left;
        k['cy'] = yScale(getNumber(600 - parseInt(res1[i][4])));
        k['radius'] = resex[i][4]
        k['institute'] = resex[i][0]
        k['program'] = resex[i][1]
        k['color'] = getColor();
        glob2.push(k);
        //globextra.push(k);
    }



    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    svg.selectAll("circle").data(glob1).join("circle")
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
            div.html(name + "<br>" + program + '<br>Seat Number : ' + seats + '<br>Opening Rank : ' + or + '<br>Closing Rank : ' + cr + '<br>')
                .style("left", x + "px")
                .style('top', '125px');
            line.attr('cx', center).line('cy', 9);
        })
        .on('mouseleave', function(d, i) {
            div.transition()
                .duration('50')
                .style('top', '-1000px')
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

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function update(glob) {

        const xScale = d3.scaleLinear()
            .domain([0, 1000])
            .range([0, width]);

        const yScale = d3.scaleLinear()
            .domain([0, d3.max(glob, d => parseInt(d.CR))])
            .range([height - 100, 0]);




        svg.selectAll("circle").data(glob).join("circle")
            .attr("cy", (d, i) => {
                return d.cy;
            })
            .attr("opacity", 0.5)
            .transition().delay(1000).duration(1500)
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
                    .style('top', '4000px');
                line.attr('x1', x).line('y1', y).attr('x2', 0).attr('y2', 0).style('stroke-width', 1).style('stroke', 'grey').style('opacity', 1);
            })
            .on('mouseleave', function(d, i) {
                div.transition()
                    .duration('50')
                    .style('top', '-1000px')
                    .style("opacity", 0);
            })
            .on('click', function(d, i) {
                d3.select(this).attr('opacity', 0.8).attr('stroke', 'black').attr('stroke-width', 1);
            })
            .on('dblclick', function(d, i) {
                d3.select(this).attr('opacity', 0.5).attr('stroke-width', 0);
            });



        svg.selectAll("circle").data(glob).enter()
            .append('circle')
            .attr("cy", (d, i) => {
                return d.cy;
            })
            .attr("opacity", 0.5)
            .transition().delay(1000).duration(1500)
            .attr("cy", (d, i) => {
                return d.cx;
            })
            .attr("r", (d, i) => {
                return (parseInt(d.radius));
            })
            .attr("fill", (d, i) => {
                return d.color;
            })
            .style('z-index', 1000)
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
                    .style('top', '200px');
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






    update(glob2);




    console.log(extra);

    function updatedata2() {
        update(glob2);
    }
</script>