<!DOCTYPE html>
<html>

<head>
	<title>IIT Seat Predictor</title>
</head>

<body>
	<h1>IIT Seat Predictor</h1>
	<form method="post" action="predicttwo.php">
		<label for="rank">Enter your Rank:</label>
		<input type="number" id="rank" name="rank" required>
		<br>
		<label for="category">Select your Category:</label>
		<select id="category" name="category" required>
			<option value="">--Select Category--</option>
			<option value="OPEN">OPEN</option>
			<option value="EWS">EWS</option>
			<option value="OPEN(PwD)">OPEN(PwD)</option>
			<option value="OBC-NCL">OBC-NCL</option>
			<option value="SC">SC</option>
			<option value="ST">ST</option>
		</select>
		<br>
		<label for="gender">Select your Gender:</label>
		<input type="radio" id="Gender-Neutral" name="gender" value="Gender-Neutral" required>
		<label for="male">Gender-Neutral</label>
		<input type="radio" id="Female-only (including Supernumerary)" name="gender" value="Female-only (including Supernumerary)">
		<label for="female">Female-only (including Supernumerary)</label>
		<br>
		<input type="submit" value="Predict Seats">
	</form>
</body>


</html>