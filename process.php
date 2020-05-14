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
	 <h1 style="color: blue";>Login Processed</h1>   <!--Header-->
 
   
   <div id="textbox">
    <?php                                            
      $uname = $_POST["uname"];                      //Store username
	  $paswd = $_POST['paswd'];                      //Store password
	  
	  if( $uname == "admin" && $paswd == "123" )     //checks condition
		  echo "Hello admin. This functionality will be added." ;              //Change this to hyperlink -> editing page
	  else
		  echo "Incorrect credentials" ;
    ?> 
	 <br><br>
   </div> 
  
  </div>         <!--eof main div-->

  </body>
</html>
