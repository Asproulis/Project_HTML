<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
  
  
  
  <!-------------------------------------------Arxikh-------------------------------------------------->
  

		

  <title>Thesis Manager</title>


</style>

    <script src="js/prefixfree.min.js"></script>

</head>

<body>

  <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>The<span>Ma</span></div><br><br><br>
			<div style="font-size:16px">The Online <span><b>Thesis Manager</b></span></div>
		</div>
		<br>
		
		<br>
		<div class="register">
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

				$sql = "SELECT  User.Firstname, User.Lastname, Diplwmatikes.Titlos_Diplwmatikhs, Diplwmatikes.Arithmos_Foithtwn, Diplwmatikes.Status FROM User, Diplwmatikes, Diplwmatikes_User WHERE User.Email=Diplwmatikes_User.Email AND Diplwmatikes.Titlos_Diplwmatikhs=Diplwmatikes_User.Titlos_Diplwmatikhs ";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						
						echo "Καθηγητής: " .$row["Firstname"]. "  " . $row["Lastname"]. "<br>" . "Τίτλος Διπλωματικής: ". $row["Titlos_Diplwmatikhs"]. "<br>" . "Αριθμός Φοιτητών: ".$row["Arithmos_Foithtwn"]. "<br>"."<br>";

					

					}
				}
				else {
					echo "0 results";
				}
				
				$conn->close();
			?>
		</div>

  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

</body>

</html>