<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
  
  

  <title>Thesis Registration Form</title>


</style>

    <script src="js/prefixfree.min.js"></script>
	


</head>

<body>

  <div class="body"></div>
		<div class="grad"></div>
		<div class="bar">
			<ul>
			  <li><div>The<span>Ma</span></div><br><div style="font-size:16px">The Online <span><b>Thesis Manager</b></span></div></li>
			</ul>
			<ul>
			  <li style="margin-left:calc(35% - 90px);;margin-right:50px"><a class="active" href="#home">Αρχική</a></li>
			  <li style="margin: 0px 50px 0px 0px"><a href="#news">Νέα</a></li>
			  <li style="margin: 0px 50px 0px 0px"><a href="#contact">Επαφή</a></li>
			  <li style="margin: 0px 50px 0px 0px"><a href="#about">Σχετικά</a></li>
			</ul>
		</div>
		
		<br>
		<div class="register">
			<div  style="font-size:16px;text-align:center">
			<label>Εάν είσαι νέος χρήστης κάνε εγγραφή συμπληρώνοντας τα στοιχεία σου στη φόρμα εγγραφής που ακολουθεί.<label><br>
			</div>
				<h2>Φόρμα Εγγραφής</h2>
				<table style="width:100%">
				<form action="" name="registration" id="registration" method="POST">
				<tr>
				<th style="text-align:center;"><label for="firstname">Όνομα:</label></th>
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
