<!DOCTYPE html>
<html>

<head>
    <title>Filter IIT Data</title>
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
    <h1>View Institute-wise Cut-offs</h1>
    <form action="Institutewise.php" method="post">
        <label for="Institute">Institute:</label>
        <select id="Institute" name="Institute">
            <option value="Indian Institute of Technology Bhubaneswar">IIT Bhubaneswar</option>
            <option value="Indian Institute of Technology Bombay">IIT Bombay</option>
            <option value="Indian Institute of Technology Mandi">IIT Mandi</option>
            <option value="Indian Institute of Technology Delhi">IIT Delhi</option>
            <option value="Indian Institute of Technology Indore">IIT Indore</option>
            <option value="Indian Institute of Technology Kharagpur">IIT Kharagpur</option>
            <option value="Indian Institute of Technology Hyderabad">IIT Hyderabad</option>
            <option value="Indian Institute of Technology Jodhpur">IIT Jodhpur</option>
            <option value="Indian Institute of Technology Kanpur">IIT Kanpur</option>
            <option value="Indian Institute of Technology Madras">IIT Madras</option>
            <option value="Indian Institute of Technology Gandhinagar">IIT Gandhinagar</option>
            <option value="Indian Institute of Technology Patna">IIT Patna</option>
            <option value="Indian Institute of Technology Roorkee">IIT Roorkee</option>
            <option value="Indian School of Mines Dhanbad">ISM Dhanbad</option>
            <option value="Indian Institute of Technology Ropar">IIT Ropar</option>
            <option value="Indian Institute of Technology (BHU) Varanasi">IIT BHU Varanasi</option>
            <option value="Indian Institute of Technology Guwahati">IIT Guwahati</option>
            <option value="Indian Institute of Technology Bhilai">IIT Bhilai</option>
            <option value="Indian Institute of Technology Goa">IIT Goa</option>
            <option value="Indian Institute of Technology Palakkad">IIT Palakkad</option>
            <option value="Indian Institute of Technology Tirupati">IIT Tirupati</option>
            <option value="Indian Institute of Technology Jammu">IIT Jammu</option>
            <option value="Indian Institute of Technology Dharwad">IIT Dharwad</option>
            <option value="Indian Institute of Technology (ISM) Dhanbad">ISM Dhanbad</option>
        </select>

        <br>


        <label for="category">Category:</label>
        <select name="category" id="category">
            <option value="OPEN">OPEN</option>
            <option value="OBC-NCL">OBC-NCL</option>
            <option value="SC">SC</option>
            <option value="ST">ST</option>
            <option value="OPEN (PwD)">OPEN (PwD)</option>
            <option value="OBC-NCL (PwD)">OBC-NCL (PwD)</option>
            <option value="SC (PwD)">SC (PwD)</option>
            <option value="ST (PwD)">ST (PwD)</option>
            <option value="EWS">EWS</option>
            <option value="EWS (PwD)">EWS (PwD)</option>
        </select>
        <br>


        <label for="gender">Gender:</label>
        <select name="gender" id="gender">
			<option value="Gender-Neutral">Male</option>
			<option value="Female-only (including Supernumerary)">Female</option>
		</select>
        <br>
        <label for="min-rank">Minimum Rank:</label>
        <input type="number" name="min-rank" id="min-rank" value = "0">
        <br>
        <label for="max-rank">Maximum Rank:</label>
        <input type="number" name="max-rank" id="max-rank" value = "0">
        <br>
        <input type="submit" value="Submit">
    </form>


    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 2%;
        }
        th, td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            border-right: 1px solid #ddd;
            
        }
        th {
            border-top: 1px solid #ddd;
            color: white;
            border-right: 1px solid #fff;
        }
        td:first-child ,th:first-child{
                border-left : 1px solid #fff;
        }
        tr:nth-child(even) {
            background-color: black;
        }
    </style>
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

    // check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        // output the results in a table
        echo "<table>";
        echo "<tr><th>Institute</th><th>Academic Program</th><th>Category</th><th>Gender</th><th>Year</th><th>Opening Rank</th><th>Closing Rank</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['COL 1'] . "</td><td>" . $row['COL 2'] . "</td><td>" . $row['COL 4'] . "</td><td>" . $row['COL 5'] . "</td><td>". $row['COL 8'] . "</td><td>" . $row['COL 6'] . "</td><td>" . $row['COL 7'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        // display a message if no rows were returned
        echo "No results found.";
    }

    // close the database connection
    mysqli_close($conn);
    }
    ?>


</body>

</html>

