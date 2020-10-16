<!DOCTYPE html>
<html> 
 <head>
   <meta charset="utf-8"> 
   <title>Login Form For Authorities</title>     <!--Head-->
   <link rel="stylesheet" type="text/css"  href="process_style.css" />
 </head>
 
 <body>
  <div id="lgnbox">                                  <!--Main div-->
    <br>
	 <h1 style="color: blue";>Status</h1>   <!--Header-->
 
   
   <div id="textbox">
    <?php                                            
      $edit = $_POST["edit"];                        //Storing the point of grid to be marked
	  $paswd = $_POST['paswd'];                      //Store password
	  
	  if( $edit>=1 && $edit<=100 && $paswd == "123" )     //checks condition
		  
		  { 
		  $connection = new mysqli("localhost", "admin", "1234", "grid");     //Connecting mysql databases to php
          if ($connection->connect_error) die($connection->connect_error); 

          $result = $connection->query("SELECT * FROM first");                // holding the table first in $result
 
          if (!$result) die($connection->error);
		
          $change="UPDATE first SET status=1 WHERE num=$edit";
          if(mysqli_query($connection,$change))
			  echo 'Update Successfull.<p><a href="map.php"> Reirect to the Map </a></p>';
		  else
			  echo "Update Unsuccessfull";
		  }
		  else
		  echo "Incorrect Value Inputs" ;
    ?> 
	 <br><br>
   </div> 
  
  </div>         <!--eof main div-->

  </body>
</html>
