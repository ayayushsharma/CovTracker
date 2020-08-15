<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Making Updates to the Map</title>        <!--Webpage title-->
    <link rel="stylesheet" href="login_style.css">
  </head>
  
  <body>
      <div class="login-box">        <!--Main div -->
        <h1>DETAILS OF EDIT</h1>
        
      <form action="process_edit.php" method="POST" >             <!--Links file to process_edit.php to evaluate-->
        
	<div class="textbox">
          <i class="fa fa-user" aria-hidden="true"></i>
          <input type="number" placeholder="Square number" name="edit">      <!--I/p Square number to be edited-->
        </div>

        <div class="textbox">
          <i class="fa fa-lock" aria-hidden="true"></i>
          <input type="password" placeholder ="Password" name="paswd">       <!--I/p Password-->
        </div>
        
	<input class="btn"  type="submit" value="Proceed Ahead">             <!--Proceed to process-->
	 
      </form> 
	<br><br>       
      </div>               <!--eof main div-->

  </body>
</html>
