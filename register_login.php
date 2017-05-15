<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
  
  <!-----------------------------------------LogIn---------------------------------------------------->
  <?php
			
			include ('DBconnection.php');
			
			if ($_SERVER['REQUEST_METHOD'] == "POST" && (isset($_POST['register'])) ) {
				header("Location: home.php");
			}
			if ($_SERVER['REQUEST_METHOD'] == "POST" && (isset($_POST['signIn']))) {
				$email = $_POST['email'];
				$pass = $_POST['password'];
				$pass = sha1($pass);
				
				$sql = "SELECT id, email FROM user WHERE email='$email' AND password='$pass'";
				$result = $linkDB->query($sql);
				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$_SESSION["id"] = $row["id"];
					$user_id = $_SESSION["id"];
					$_SESSION["email"] = $email;
				}  
				else{
					echo "<script> alert('Λάθος email adrress ή password!!!') </script>";
				}
				
			}
		?>
  <!-------------------------------------------Register-------------------------------------------------->
  <?php
			//session_start();
			//include ('DBconnection.php');
			
			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				
				$con=mysqli_connect("localhost", "root", "","project_2017");

				// Check connection
				if (mysqli_connect_errno()) {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				
				
				$firstname= mysqli_real_escape_string($con, $_POST['firstname']);
				$lastname= mysqli_real_escape_string($con, $_POST['lastname']);
				$email = mysqli_real_escape_string($con, $_POST['mail']);
				$pass1 = mysqli_real_escape_string($con, $_POST['pass1']);
				$pass2 = mysqli_real_escape_string($con, $_POST['pass2']);
				$hash=mysqli_real_escape_string($con, md5(rand(0, 1000)));
				//mysqli_close($con);
				
				$filter = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/";
				//check password:
				if (strlen($pass1) < 8 || preg_match($filter, $pass1)) {
					//header("Location: register_login.php");
					return;
				}
				
				//check for unique email:
				$sql1 = "SELECT * FROM user WHERE email = '$email'";
				$result1 = $con->query($sql1);
				//echo $result->num_rows;
						
				if ($result1->num_rows> 0) {
					echo "<script> alert('Αυτό το  email υπάρχει ήδη!!!') </script>";
				}  
				if($pass1 != $pass2){
					echo "<script> alert('Λάθος password') </script>";
				}
				if(isset($_POST['math'])!= "3"){
					echo "<script> alert('Λάθος Απάντηση!') </script>";
				}
				else{
					$pass1 = sha1($pass1);
					$pass2 = sha1($pass2);
					$_SESSION['firstname'] = $firstname;
					$_SESSION['lastname'] = $lastname;
					$_SESSION['email'] = $email;
					$_SESSION['pass1'] = $pass1;
					$_SESSION['hash'] = $hash;
					$sqli="INSERT INTO user (firstname, lastname, email, password, hash)VALUES ('$firstname', '$lastname', '$email', '$pass1', '$hash')";

					if (!mysqli_query($con, $sqli)) {
					  die('Error: ' . mysqli_error($con));
					}
					echo "1 record added";	
					
					header("Location: verify.php");
				}	
			}
		?>
		<!---------------------------------------LogIn---------------------------------------------------------->
		<script>
			function ValidateEmail(mail1){
			  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					
			  if (!filter.test(mail1)) {
				  alert('παρακαλώ εισάγεται μια διαθέσιμη email address');
				  mail1.focus;
				  return false;
			  }
			  return true;
			}  
			function SumbitValidation(){
			  var password = document.getElementById('password');
			  var email = document.getElementById('email');
			  var mailCheck = ValidateEmail(email.value);
			  if(mailCheck != true && email.value && password.value == ""){
				alert("Δώσε την email address και το password.")
			  }
			}
		</script>
		<!---------------------------------------Register---------------------------------------------------------->
		<script>
				function checkMail(){
					//Store the password field objects into variables ...
					var mail = document.getElementById('mail');
					//Set the colors we will be using ...
					var correctColor = "#66cc66";
					var wrongColor = "#ff6666";
					//Compare the values in the password field 
					//and the confirmation field
					
				}  
				function checkPass(){
					//Store the password field objects into variables ...
					var pass1 = document.getElementById('pass1');
					var pass2 = document.getElementById('pass2');
					//Set the colors we will be using ...
					var correctColor = "#66cc66";
					var wrongColor = "#ff6666";
					//Compare the values in the password field 
					//and the confirmation field
					if(pass1.value == pass2.value){
						//The passwords match. 
						//Set the color to the good color and inform
						//the user that they have entered the correct password 
						pass2.style.backgroundColor = correctColor;
					}
					else{
						//The passwords do not match.
						//Set the color to the bad color and
						//notify the user.
						pass2.style.backgroundColor = wrongColor;
					}
				}  

				function SubmitValidation(){
					 var pass1 = document.getElementById('pass1');
					 var pass2 = document.getElementById('pass2');
					 var mail = document.getElementById('mail');
					 var mailCheck = ValidateEmail(mail.value);
					 var checkPass = ValidatePassword(pass1.value);
					 if(checkPass == true && mailCheck == true && pass1.value == pass2.value  && pass1.value != "" && mail.value != ""){
						 return true;
					 }
					 return false;
				 }
				function ValidateEmail(mail){
					var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
					if (!filter.test(mail)) {
						alert('Please provide a valid email address');
						mail.focus;
						return false;
					}
					return true;
				} 
				
				function ValidatePassword(pass1){
					var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,}$/;
					
					if (!regex.test(pass1)) {
						alert("Τουλάχιστον 8 χαρακτήρες, τουλάχιστον 1 κεφαλαίο αλφάβητο, 1 πεζό Αλφάβητο, 1 Αριθμός και 1 Ειδικός χαρακτήρας");
						pass1.focus;
						return false;
					} 
					else {
						return true;
					}
				}
		</script>
  <!------------------------------------------------------------------------------------------------->

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
		<div class="login">
				<input type="email" placeholder="Όνομα Χρήστη (email)" name="email" id="email"><br>
				<input type="password" placeholder="Συνθηματικό" name="password_log" id="password"><br>
				<button name="signIn" type="submit" onclick="SumbitValidation()">Sign in</button>
					
		</div>
		<br>
		<div class="register">
			<div  style="font-size:16px;text-align:center;margin-top:30px">
			<label>Εάν είσαι νέος χρήστης κάνε εγγραφή συμπληρώνοντας τα στοιχεία σου στη φόρμα εγγραφής που ακολουθεί.<label><br>
			</div>
				<h2>Φόρμα Εγγραφής</h2>
				<table style="width:100%">
				<form action="" name="registration" id="registration" method="POST">
				<!--
				<tr>
				<th style="text-align:center">Καθηγητής<br><input type="radio" name="role" value="professor"></th>
				<th style="text-align:center">Φοιτητής<br><input type="radio" name="role" value="student"></th>
				</tr>
				-->
				<tr>
				<th style="text-align:center"><label for="firstname">Όνομα:</label></th>
				<th><input type="text" name="firstname" id="firstname" placeholder="π.χ. Μαρία"></th>
				</tr>
				<tr>
				<th style="text-align:center"><label for="lastname">Επώνυμο:</label></th>
				<th><input type="text" name="lastname" id="lastname" placeholder="π.χ. Πενταγιώτισσα"></th>
				</tr>
				<tr>
				<th style="text-align:center"><label for="mail">Email:</label></th>
				<th><input type="email" name="mail" id="mail" placeholder="π.χ. Maria@gmail.com"></th>
				</tr>
				<tr>
				<th style="text-align:center"><label for="pass1">Password:</label></th>
				<th><input type="password" name="pass1" id="pass1" placeholder="***********"></th>
				</tr>
				<tr>
				<th style="text-align:center"><label for="pass2">Επιβεβαίωση Password:</label></th>
				<th><input type="password" name="pass2" id="pass2" placeholder="***********"></th>
				</tr>
				<tr>
				<th style="text-align:center"><label for="math">(3+12)/5 = :</label></th>
				<th><input type="text" name="math" id="math" placeholder="Το αποτέλεσμα της πράξης"></th>
				</tr>
				<tr>
				<th></th>
				<th><input type="submit" value="Register" name="submit"></th>
				</tr>
				<!-- <button type="submit">Register</button> -->


			  </form>
			  </table>
		</div>

  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

</body>

</html>