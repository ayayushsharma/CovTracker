<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Login Form For Authorities</title>
  <!--Head-->
  <link rel="stylesheet" type="text/css" href="process_style.css" />
</head>

<body>
  <div id="lgnbox">
    <!--Main div-->
    <br>
    <h1 style="color: blue" ;>Status</h1>
    <!--Header-->


    <div id="textbox">
      <?php
      $edit = $_POST["edit"];                        //Storing the point of grid to be marked

      $edit_in_database = 0;


      if ($edit >= 1 && $edit <= 100)     //checks condition

      {
        $connection = new mysqli("localhost", "admin", "1234", "grid");     //Connecting mysql databases to php
        if ($connection->connect_error) die($connection->connect_error);

        $result = $connection->query("SELECT * FROM first");                // holding the table first in $result

        if (!$result) die($connection->error);

        $result2 = $connection->query("SELECT * FROM input");                // holding the user input city in $result2

        if (!$result2) die($connection->error);

        $result2->data_seek(0);
        $start = $result2->fetch_assoc()['start'];

        $edit_in_database = $start + $edit - 1;

        $change = "UPDATE first SET status=1 WHERE id=$edit_in_database";
        if (mysqli_query($connection, $change))
          echo 'Update Successfull.<p><a href="map.php"> Redirect to the Map </a><br><a href="home.php"> Redirect to City Search </a></p>';
        else
          echo "Update Unsuccessfull";
      } else
        echo "Incorrect Value Inputs";
      ?>
      <br><br>
    </div>

  </div>
  <!--eof main div-->

</body>

</html>