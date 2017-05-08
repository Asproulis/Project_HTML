<?php

				
				

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project_2017";

	// Create connection
	$con = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($con->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$con->set_charset("utf8"); //gia na pairnei ta ellhnika sthn vash

	$sql = "SELECT firstname, lastname FROM user";
	$result = $con->query($sql);
	
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$titlos_diplwmatikhs= mysqli_real_escape_string($con, $_POST['titlos_diplwmatikhs']);
		$number= mysqli_real_escape_string($con, $_POST['number']);
		$stoxos = mysqli_real_escape_string($con, $_POST['stoxos']);
		$perigrafh = mysqli_real_escape_string($con, $_POST['perigrafh']);
		$gnwseis = mysqli_real_escape_string($con, $_POST['gnwseis']);
		$hmeromhnia_dhmosiopoihshs = mysqli_real_escape_string($con, $_POST['hmeromhnia_dhmosiopoihshs']);
		$hmeromhnia_enarxhs = mysqli_real_escape_string($con, $_POST['hmeromhnia_enarxhs']);
		$hmeromhnia_lhxhs = mysqli_real_escape_string($con, $_POST['hmeromhnia_lhxhs']);
		$bathmos = mysqli_real_escape_string($con, $_POST['bathmos']);
		

		$_SESSION['titlos_diplwmatikhs'] = $titlos_diplwmatikhs;
		$_SESSION['number'] = $number;
		$_SESSION['stoxos'] = $stoxos;
		$_SESSION['perigrafh'] = $perigrafh;
		$_SESSION['gnwseis'] = $gnwseis;
		$_SESSION['hmeromhnia_dhmosiopoihshs'] = $hmeromhnia_dhmosiopoihshs;
		$_SESSION['hmeromhnia_enarxhs'] = $hmeromhnia_enarxhs;
		$_SESSION['hmeromhnia_lhxhs'] = $hmeromhnia_lhxhs;
		$_SESSION['bathmos'] = $bathmos;
		
		$sqli="INSERT INTO professor (titlos_diplwmatikhs, number, stoxos, perigrafh, gnwseis, hmeromhnia_dhmosiopoihshs, hmeromhnia_enarxhs, hmeromhnia_lhxhs, bathmos)
			  VALUES ('$titlos_diplwmatikhs', '$number', '$stoxos', '$perigrafh', '$gnwseis', '$hmeromhnia_dhmosiopoihshs', '$hmeromhnia_enarxhs', '$hmeromhnia_lhxhs', '$bathmos')";
		
		if (!mysqli_query($con, $sqli)) {
			die('Error: ' . mysqli_error($con));
		}
		echo "1 record added";	
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Profile teacher</title>
		<script type="text/javascript" src="https://gc.kis.scr.kaspersky-labs.com/1B74BD89-2A22-4B93-B451-1C9E1052A0EC/main.js" charset="UTF-8"></script>

		
		<body>
		
           
			
			<br><br>
			<font><center>
				<h1>Registration Form Teacher</h1></center>
			</font>
			
			<div id="site_content" align=center>
					<form action="teacher_form_registration.php" method="POST">
						<fieldset>
							
							<div id="title">
								<p><b>Τίτλος Προτεινόμενης Διπλωματικής Εργασίας:</b></p>
								<textarea type="text" name="titlos_diplwmatikhs" rows="10" cols="30" value="<?php if (isset($_POST['titlos_diplwmatikhs']) && $success == false) echo $_POST['titlos_diplwmatikhs']; ?>" required/></textarea><!--Xwros gia grapsimo-->
							</div>
							
							<br><br>
							
							<div id="professor">
								<?php if ($result->num_rows > 0) {
									// output data of each row
										while($row = $result->fetch_assoc()) {
											echo "<b>Professor: " . $row["firstname"]. " " . $row["lastname"];
										}
									} 
									else {
										echo "0 results";
									} 
								?>
							</div>
							
							<br><br>
							
							<div id="number">
								<p><b>Αριθμός Φοιτητών: 1-3</b></p>
								<input type="radio" name="number" value="1" <?php if (isset($_POST['number']) && $success == false) if ($_POST['number'] == "1") echo 'checked'; ?> required>1<br>		
								<input type="radio" name="number" value="2" <?php if (isset($_POST['number']) && $success == false) if ($_POST['number'] == "2") echo 'checked'; ?> required>2<br>
								<input type="radio" name="number" value="3" <?php if (isset($_POST['number']) && $success == false) if ($_POST['number'] == "3") echo 'checked'; ?> required>3<br>		
							</div>
							
							<br><br>
							
							<div id="goal">
								<p><b>Στόχος Διπλωματικής Εργασίας:</b></p>
								<textarea type="text" name="stoxos" rows="10" cols="30" value="<?php if (isset($_POST['stoxos']) && $success == false) echo $_POST['stoxos']; ?>" required/></textarea><!--Xwros gia grapsimo-->
							</div>
							
							<br><br>
							
							<div id="description">
								<p><b>Συνοπτική Περιγραφή Διπλωματικής Εργασίας:</b></p>
								<textarea type="text" name="perigrafh" rows="10" cols="30" value="<?php if (isset($_POST['perigrafh']) && $success == false) echo $_POST['perigrafh']; ?>" required/></textarea><!--Xwros gia grapsimo-->
							</div>
							
							<br><br>
							
							Προαπαιτούμενα Μαθήματα
							
							<div id="gnwseis">
								<p><b>Προαπαιτούμενες γνώσεις:</b></p>
								<textarea type="text" name="gnwseis" rows="10" cols="30" value="<?php if (isset($_POST['gnwseis']) && $success == false) echo $_POST['gnwseis']; ?>" required/></textarea><!--Xwros gia grapsimo-->
							</div>
							
							<br><br>
							
							<div id="foithtes">
								<p><b>Στοιχεία Φοιτητών:</b></p>
								<br><br>
								
								<div id="stud_1">
									<p><b>Φοιτητής 1</p></b>
									<p><div class="required"> Ονοματεπώνυμο:<br>
										<input type="text" name="fname_lname" placeholder="Ονοματεπώνυμο" value="<?php if (isset($_POST['fname_lname']) && $success == false) echo $_POST['fname_lname']; ?>" /></div><br>
									</p>
									<p><div class="required"> AM:<br>
										<input type="text" name="am" placeholder="AM" value="<?php if (isset($_POST['am']) && $success == false) echo $_POST['am']; ?>" /></div><br>
									</p>
									<p><div class="required"> Υπογραφή:<br>
										<input type="text" name="signature" placeholder="Υπογραφή" value="<?php if (isset($_POST['signature']) && $success == false) echo $_POST['signature']; ?>" /></div><br>
									</p>
								</div>
								<br>
								
								
							
							<br><br>
							
							<div id="curent">
								<p><div class="required"> Ημερομηνία δημοσιοποίησης θέματος:                            
								<input type="date" name="hmeromhnia_dhmosiopoihshs" placeholder="Ημερομηνία Έναρξης (YYYY/MM/DD)" value="<?php if (isset($_POST['hmeromhnia_dhmosiopoihshs']) && $success == false) echo $_POST['hmeromhnia_dhmosiopoihshs']; ?>" required/></div>
								</p>
							</div>
							
							<br><br>
							
							<div id="start">
								<p><div class="required"> Ημερομηνία ανάληψης θέματος:                            
								<input type="date" name="hmeromhnia_enarxhs" placeholder="Ημερομηνία Έναρξης (YYYY/MM/DD)" value="<?php if (isset($_POST['hmeromhnia_enarxhs']) && $success == false) echo $_POST['hmeromhnia_enarxhs']; ?>" required/></div>
								</p>
							</div>
							
							<br><br>
						
							<div id="stop">
								<p><div class="required"> Ημερομηνία ολοκλήρωσης:                            
									<input type="date" name="hmeromhnia_lhxhs" placeholder="Ημερομηνία Λήξης (YYYY/MM/DD)" value="<?php if (isset($_POST['hmeromhnia_lhxhs']) && $success == false) echo $_POST['hmeromhnia_lhxhs']; ?>"/></div>
								</p>
							</div>
							
							<br><br>	
							
							<div id="bathmos">
								<p><b>Βαθμός:5-10:</b></p>
								<textarea type="text" name="bathmos" value="<?php if (isset($_POST['bathmos']) && $success == false) echo $_POST['bathmos']; ?>" required/></textarea><!--Xwros gia grapsimo-->
							</div>
							
							<input type="submit" value="Save" name="submit">
							<br><br>
							
							<div id="logout" >
								<a href="logout.php"><button style="width: 7em;  height: 2em;" type="submit">Log out</button>
							</div>
							<br><br>
							
						</fieldset>
					</form>
				
                <br>
            </div>
		</body>
		<br><br>
	</head>
</html>
