 <?php
 
	include ('verify.php');
	
	<?php
         
            mysql_connect("localhost", "root", " ", "project_2017") or die(mysql_error()); // Connect to database server(localhost) with username and password.
            mysql_select_db("registrations") or die(mysql_error()); // Select registration database.
             
      

			if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
			// Verify data
			$email = mysql_escape_string($_GET['email']); // Set email variable
			$hash = mysql_escape_string($_GET['hash']); // Set hash variable
						 
			$search = mysql_query("SELECT email, hash, active FROM user WHERE email='".$email."' AND hash='".$hash."'") or die(mysql_error()); 
			header("Location: select_account.php");
						 
		}else{
			header("Location: verify.php");
		}
		
	
?>

