<html>

<body>

	<?php

	$dbname = 'db_esp32';
	$dbuser = 'root';
	$dbpass = '';
	$dbhost = 'localhost';

	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (!$connect) {
		echo "Error: " . mysqli_connect_error();
		exit();
	}

	$temperature = "";
	$humidity = "";
	$amonia = "";

	if (
		isset($_GET['temperature']) && $_GET['temperature'] != 0 &&
		isset($_GET['humidity']) && $_GET['humidity'] != 0 &&
		isset($_GET['amonia']) && $_GET['amonia'] != 0
	) {

		$temperature = $_GET["temperature"];
		$humidity = $_GET["humidity"];
		$amonia = $_GET["amonia"];
		$query = "INSERT INTO tbl_temp (temp_value, temp_humd, temp_amonia) 
			VALUES ('$temperature', '$humidity', '$amonia') ";
		$result = mysqli_query($connect, $query);
	}

	?>
</body>

</html>