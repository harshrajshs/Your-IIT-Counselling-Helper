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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
	<script src="myscript.js"></script>

	<title>Female-category analysis</title>

	<style>
		body {
			background: black;
			/* background-color: #181818; */
			background-image: url('back.jpg');
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}

		.insights {
			border: 1px solid burlywood;
			padding: 2%;
			margin-left: 2%;
			margin-right: 2%;
			margin-top: 3%;
			margin-bottom: 5%;
			background-color: rgb(45, 45, 45);
		}
	</style>

</head>

<?php
$year = "";
$institute = "";
$department = "";
$seat = "";
$round = "";
$gender = "Female-only (including Supernumerary)";
$course = "";
?>

<body>

	<?php

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


		$stmt = $conn->query("SELECT * FROM josaa.`female`  WHERE  Gender='$gender' AND Round='6' AND Seat_Type='OPEN'");

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$years[] = $row['Year'];
			$institutes[] = $row['Institute'];
			$departments[] = $row['Academic_Program_Name'];
			$seats[] = $row['Seat_Type'];
			$genders[] = $row['Gender'];
			$opening_ranks[] = $row['Opening_Rank'];
			$closing_ranks[] = $row['Closing_Rank'];
			$rounds[] = $row['Round'];
		}


		$data = array();
		for ($i = 0; $i < count($opening_ranks); $i++) {
			$data[] = array('x' => $opening_ranks[$i], 'y' => $closing_ranks[$i], 'label1' => $institutes[$i], 'label2' => $departments[$i]);
		}
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
	?>

	<div style="background-color: black; padding: 2%; margin-top: 1%; margin-left:5%; margin-right:5%">
		<div class="title">
			<h4 style="color:aquamarine; text-align:center; font-size:150%">Closing Rank vs Opening Rank</h4>
		</div>
		<canvas id="scatterChart"></canvas>
	</div>
	<script>
		var ctx = document.getElementById("scatterChart").getContext("2d");
		var scatterChart = new Chart(ctx, {
			type: 'scatter',
			data: {
				datasets: [{
					label: 'Scatter Plot',
					data: <?php echo json_encode($data); ?>,
					pointBackgroundColor: function(context) {
						var index = context.dataIndex;
						var value = context.dataset.data[index].y;
						var comparison = context.dataset.data[index].x;
						return value > comparison * 1.12 + 932 ? 'green' : 'red';
					},
					pointBorderColor: function(context) {
						var index = context.dataIndex;
						var value = context.dataset.data[index].y;
						var comparison = context.dataset.data[index].x;
						return value <= comparison * 1.12 + 932 ? 'green' : 'red';
					},
					pointHoverBackgroundColor: 'black',
					pointHoverBorderColor: 'white',
					pointHoverBorderWidth: 2,
					pointHoverRadius: 7,
					pointStyle: function(context) {
						var index = context.dataIndex;
						var value = context.dataset.data[index].y;
						var comparison = context.dataset.data[index].x;
						return value > comparison * 1.12 + 932 ? 'circle' : 'triangle';
					}
				}]
			},
			options: {
				tooltips: {
					callbacks: {
						label: function(tooltipItem, data) {
							var label1 = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index].label1;
							var label2 = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index].label2;
							return ': (' + tooltipItem.xLabel + ', ' + tooltipItem.yLabel + '), ' + label1 + ', ' + label2;
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
						color: 'red' // set the font color of title
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

	<div class="insights">
		<h2 style="text-align: center; color: #24ace1;">Here are some insights what i got : </h2>
		<p style="color:white; font-size:20px; "> As can be seen, all points are above the y=x line, which is expected as opening rank is less than or equal to closing rank. However, some points are further away from the y=x line.
			<br><br>
			Possible Explanations :
			<br><br>
			One possible explanation for this is that the number of available seats in that particular branch of the institute is higher.
			<br><br>
			If this is not the case, then there may be outliers in the opening rank data, where some students with good ranks may have preferred that college or branch due to their interest.
		</p>
		<br>
		<p style="color:white; font-size: 20px; ">Additionally, it can be observed that core branches such as DSAI, CSE, MNC, and Electrical are often preferred over colleges, which explains why these points are closer to the y=x curve.</p>




	</div>
</body>

</html>