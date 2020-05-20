<?php 
	session_start();	
	$seskey= $_SESSION['key'];
?>

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
     $seskey = $_SESSION['key'];
	 
	 if( $seskey == '0' ){
      $uname = $_POST["uname"];                      //Store username
	  $paswd = $_POST["paswd"];                      //Store password
	  
	  $conn = new mysqli('localhost', 'admin', '1234', 'grid' );
	  if($conn->connect_error){
		  die("Failed to connect");
	  }
	  else{
		if($content = $conn->query("SELECT * FROM login")){
		  $flag=0;
		  
		  while($element = $content->fetch_assoc()){ 
		    if( $uname == $element['user_id'] && $paswd == $element['paswd'] ){     //checks condition
		    $flag=1;
			$seskey='1';
			}
	    }		
	      
		if($flag==1){
		  echo "Hello admin. " ;                                           //lets you edit
		  echo '<a href="edit.php">Click here to Continue</a>';
	    }
	    else{
		  echo "Incorrect credentials" ;
	    }
        }
	  }
	 }
     
	 else{
		echo "Hello admin. " ;                                           //lets you edit
		echo '<a href="edit.php">Click here to Continue</a>';
     }
     
	 $_SESSION["key"] = $seskey;	 
    
	?> 
	 <br><br>
   </div> 
  
  </div>         <!--eof main div-->

  </body>
</html>
  
  </div>         <!--eof main div-->

  </body>
</html>
