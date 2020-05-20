<?php 
	session_start();	
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Form For Authorities</title>        <!--Webpage title-->
    <link rel="stylesheet" href="login_style.css">
  </head>
  
  <body>	
	   
	  <div class="login-box">        <!--Main div -->
        <h1>Login</h1>
        
		<?php
		$seskey = $_SESSION["key"];
		if( $seskey == '1'){
		  echo "You're already an admin. ";
		  echo '<a href="edit.php">Click here to Edit</a>';	
		}
        ?>
		  
		 
      <form action="process.php" method="POST" >             <!--Links file to process.php to evaluate-->
        
	  <div class="textbox">
          <i class="fa fa-user" aria-hidden="true"></i>
          <input type="text" placeholder ="Authoriser Id" name="uname">      <!--I/p Username-->
        </div>

        <div class="textbox">
          <i class="fa fa-lock" aria-hidden="true"></i>
          <input type="password" placeholder ="Password" name="paswd">       <!--I/p Password-->
        </div>
        
	<input class="btn"  type="submit" value="Proceed Ahead">             <!--Proceed to process-->
	 
      </form> 
	<br><br>       
      </div>                  <!--eof main div-->

  </body>
</html>
