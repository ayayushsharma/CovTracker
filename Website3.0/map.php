<?php
// Start the session
session_start();
?>

<html>
  <head>
    <title> AFFECTED AREAS </title>
        <link rel="stylesheet" href="style.css" type="text/css">     <!-- Adding css to the HTML page -->
  </head>
<body>
<br><br><br>


<?php
 
 $connection = new mysqli("localhost", "root", "123", "gridlayout");     //Connecting mysql databases to php
 if ($connection->connect_error) die($connection->connect_error); 

 $result = $connection->query("SELECT * FROM grid");                // holding the table first in $result
 
 if (!$result) die($connection->error); 
 
 echo "<table border =\"1\" style='border-collapse: collapse'>";     //creating a table with 10 rows and 10 columns
	for ($row=0; $row <= 9; $row++) { 
		echo "<tr> \n"; //printing rows
    		for ($col=1; $col <= 10; $col++) 
			{ 
	    	    $p = $col + 10 * $row; 
		       
    			$result->data_seek($p-1);                            //seeking the data the the point $p-1 in the grid
                $test=$result->fetch_assoc()['color'];              // fetching the status column value at $p-1 point in the grid 
		        if($test==1)
		            echo "<td>$p</td> \n";
		        else
			        echo "<td id='danger'>$p</td> \n";               //marking danger if the value is set to '1' 
		   	}
	  	    echo "</tr>";
		}
		echo "</table>";                                             // ending table
?>

<p><a href="login.php"> MAKE UPDATES TO THE MAP </a>
</body></html>



