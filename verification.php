 <?php
 
	include ('verify.php');
	
	<?php
         
            mysql_connect("localhost", "root", " ", "project_2017") or die(mysql_error()); // Connect to database server(localhost) with username and password.
            mysql_select_db("registrations") or die(mysql_error()); // Select registration database.
             
      

			if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
				// Verify data
				$email = mysql_escape_string($_GET['email']); // Set email variable
				$hash = mysql_escape_string($_GET['hash']); // Set hash variable
				
				$search = mysql_query("SELECT email, hash FROM user WHERE email='".$email."' AND hash='".$hash."'") or die(mysql_error()); 
				$match  = mysql_num_rows($search);
					 
				if($match > 0){
					header("Location: select_account.php");
				}else{
					// No match -> invalid url or account has already been activated.
					echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
				}
				 
			}
			else{
				header("Location: verify.php");
			}
		
	
?>

