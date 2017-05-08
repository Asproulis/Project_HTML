<html>
	<head>
		<link rel="stylesheet" href="styles/basic/style.css" type="text/css" media="screen" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Είσοδος</title><!--Titlos istoselidas otan anigetai to site-->
		<style>
			body {
				background-color: #CCFF33;<!--Χρώμα του background-->
			}
		
		</style>
	
	</head>
	
	<body>
		<?php
			include ("functions.php");
			
			$servername_db = "localhost";
			$username_db = "root";
			$password_db = "";
			$dbname = "project_2017";
			
			// Create connection
				$conn = new mysqli($servername_db, $username_db, $password_db, $dbname);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				$conn->set_charset("utf8"); //gia na pairnei ta ellhnika sthn vash
				
			//check for a form submission
			
			
			$thesh=$_POST['thesh'];
				$username=$_POST['username'];
				$fname_lname1=$_POST['fname_lname1'];
				$fname_lname2=$_POST['fname_lname2'];
				$fname_lname3=$_POST['fname_lname3'];
				$hmeromhnia_lhxhs=$_POST['hmeromhnia_lhxhs'];
				$bathmos=$_POST['bathmos'];
				
				$userquery=mysql_query("SELECT thesh, username, fname_lname1, fname_lname2, fname_lname3, hmeromhnia_lhxhs, bathmos FROM teacher WHERE thesh='$thesh' AND username='$username' AND fname_lname1='$fname_lname1' AND fname_lname2='$fname_lname2' AND fname_lname3='$fname_lname3' AND hmeromhnia_lhxhs='$hmeromhnia_lhxhs' AND bathmos='$bathmos'")or die("The query couldn't be completed. Please try again later");
				$result = $conn->query($userquery);
				$row = $result->fetch_assoc();

				
				
			
		
        ?>

				 <table style="width:100%" border="1px" align="center">
				  <tr>
					<td>Ανάθεση Διπλωματικής</td>
					<td>Έγκριση</td>
					<td>Παρουσίαση</td>
					<td>Βαθμλογία</td>
				  </tr>
				  <tr>
					<td><input type="text" name="<?php $_POST['thesh']  ?>" /><br></td>
					<td><input type="text" name=<?php $_POST['fname_lname1']  ?>" /><br><input type="text" name="fname_lname2" value="<?php $_POST['fname_lname2']  ?>" /><br><input type="text" name="fname_lname3" value="<?php $_POST['fname_lname3'] ?>" /><br></td>
					<td><input type="text" name="<?php $_POST['hmeromhnia_lhxhs']  ?>" /><br></td>
					<td><input type="text" name="<?php $_POST['bathmos']  ?>" /><br></td>
				  </tr>
				</table> 
	</body>
</html>