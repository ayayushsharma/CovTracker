<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Searching Database</title>
	<!--Head-->
	<link rel="stylesheet" type="text/css" href="process_style.css" />
</head>

<body>
	<div id="lgnbox">
		<!--Main div-->
		<br>
		<h1 style="color: blue" ;>Searching Database</h1>
		<!--Header-->
		<div id="textbox">
			<?php
			$cname = $_POST["cname"];                      //Store city name entered by user
			$lat = 0;
			$lon = 0;
			$start = 0;
			$old_lat = 0;
			$old_lon = 0;
			$old_start = 0;
			$ascii = ' ';
			$country = ' ';
			$j = 1;
			$connection = new mysqli("localhost", "admin", "1234", "grid");     //Connecting mysql databases to php
			if ($connection->connect_error) die($connection->connect_error);

			$result = $connection->query("SELECT * FROM saved_coordinates");            // holding the table saved_coordinates in $result
			$result2 = $connection->query("SELECT * FROM input");                       // holding the table input in $result2

			if (!$result) die($connection->error);
			if (!$result2) die($connection->error);

			$result2->data_seek(0);                             //seeking the data the the point 0 in the input
			$test = $result2->fetch_assoc()['city'];              // finding the name of the city which was last searched on the website

			$a = "UPDATE input SET city='$cname' WHERE city='$test'";
			$connection->query($a);

			$result2 = $connection->query("SELECT * FROM input");
			$result2->data_seek(0);
			$test = $result2->fetch_assoc()['city'];

			$rows = $result->num_rows;
			$counter = 0;
			$counter2 = 0;

			for ($i = 0; $i < $rows; $i++) {
				$result->data_seek($i);                            //seeking the data the the point i in the saved_coordinates table
				$test = $result->fetch_assoc()['city'];              // fetching the status column value at point i at the same table
				$result->data_seek($i);
				$lat = $result->fetch_assoc()['lat'];
				$result->data_seek($i);
				$lon = $result->fetch_assoc()['lon'];
				$result->data_seek($i);
				$start = $result->fetch_assoc()['start'];
				if ($cname == $test) {
					$counter++;
					break;
				}
			}
			if ($counter == 1) {
				echo " FOUND ";

				$result2->data_seek(0);
				$old_lat = $result2->fetch_assoc()['lat'];
				$result2->data_seek(0);
				$old_lon = $result2->fetch_assoc()['lon'];
				$result2->data_seek(0);
				$old_start = $result2->fetch_assoc()['start'];
			} else {
				$connection2 = new mysqli("localhost", "admin", "1234", "coordinates");     //Connecting mysql bigger databases of coordinates to php
				if ($connection2->connect_error) die($connection->connect_error);

				$result3 = $connection2->query("SELECT * FROM city");                // holding the table city in $result3
				$rows2 = $result3->num_rows;

				if (!$result3) die($connection->error);

				for ($i = 0; $i < $rows2; $i++) {
					$result3->data_seek($i);
					$lat = $result3->fetch_assoc()['lat'];
					$result3->data_seek($i);
					$lon = $result3->fetch_assoc()['lon'];
					$result3->data_seek($i);
					$ascii = $result3->fetch_assoc()['ascii'];
					$result3->data_seek($i);
					$country = $result3->fetch_assoc()['country'];
					if ($ascii == $cname) {
						$counter2 = 1;
						break;
					}
				}
				if ($counter2 == 0) {
					echo "City is not currently supported";
					$lat = $old_lat;
					$lon = $old_lon;
				} else {
					$rows = $result->num_rows;
					$result->data_seek($rows - 1);
					$start = $result->fetch_assoc()['start'];
					$start = $start + 100;
					$connection->query("INSERT INTO saved_coordinates(city,lat,lon,country,start) VALUES('$ascii',$lat,$lon,'$country',$start);");
				}
			}

			$connection->query("UPDATE input SET lat=$lat WHERE lat=$old_lat");
			$connection->query("UPDATE input SET lon=$lon WHERE lon=$old_lon");
			$connection->query("UPDATE input SET start=$start WHERE start=$old_start");
			?>

			<br><br>
		</div>


		<h1><br><br><a href="map.php">TO THE MAP........ </a>
	</div>
	<!--eof main div-->
</body>

</html>