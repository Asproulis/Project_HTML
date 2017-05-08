<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
  
  <!--------------------------------------------------------------------------------------------->
  <?php
  
	//include ('DBconnection.php');
	//include ('verify.php');
  
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project_2017";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

	$sql = "SELECT email, hash FROM user";
	$result = $conn->query($sql);
	
	
	if ($result->num_rows > 0) {
   
				while($row = $result->fetch_assoc()) {
					
					$to      = $row["email"];
					$subject = 'Signup | Verification'; 
					$message = 'Ευχαριστούμε για την εγγραφή στη σελίδα μας! Ο λογαριασμός σας έχει δημιουργηθεί, μπορείτε να συνδεθείτε με τα στοιχεία σας εφόσον ενεργοποιήσετε το λογαριασμό σας.
								Παρακαλούμε ακολουθήστε τον παρακάτω σύνδεσμο για να ενεργοποιήσετε το λογαριασμό σας:
								http://localhost:82/New_project_2017/verification.php?email='.$to.'&hash='.$row["hash"].'';
                     
					$headers = 'From:noreply@thema.com' . "\r\n";
					mail($to, $subject, $message, $headers);					
				}
			} 
			else {
				echo "0 results";
			}

  ?>
  <!------------------------------------------------------------------------------------------------->

  <title>Thesis Manager</title>


</style>

    <script src="js/prefixfree.min.js"></script>

</head>

<body>

  <div class="body"></div>
		<div class="grad"></div>
		
		<div class="header" style="position: absolute;left: calc(50% - 110px);z-index: 2;">
			<div style="font-size:60px">The<span style="font-size:60px">Ma</span></div><br>
		</div>
		<br>
		<div class="verif">
			<label style="color:white">Σας έχουμε στείλει ένα email στη διεύθυνση ηλεκτρονικού ταχυδρομείου 
			
			<?php
			
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "project_2017";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 

			$sql = "SELECT email FROM user";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
   
				while($row = $result->fetch_assoc()) {
				echo  $row["email"];
				}
			} 
			else {
				echo "0 results";
			} 
			?>
			<br><br>Θα πρέπει να επιβεβαιώσετε το email σας για να συνεχίσετε.<br><br>Αν δεν βρείτε το μήνυμα στα εισερχόμενα ελέγξτε το φάκελο ανεπιθύμητα.<br><br>Μπορείτε επίσης να πατήσετε το παρακάτω κουμπί για να σας σταλεί ένα νέο email επιβεβαίωσης λογαριασμού.</label>
			<div><br><input type="submit" value="Αποστολή" name="resend"></div>
		</div>
		

  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

</body>

</html>