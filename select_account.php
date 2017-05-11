<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
  
  <!--------------------------------------------------------------------------------------------->
  
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
		<div class="register">
				<h2>Παρακαλώ επιλέξτε τον τύπο λογαριασμού που θέλετε να δημιουργήσετε.</h2>
				<br>
				<table style="width:100%">
				<form action="" name="registration" id="registration" method="POST">
				<tr>
				<th style="text-align:center">Καθηγητής<br><input type="radio" name="role" value="professor"></th>
				<th style="text-align:center">Φοιτητής<br><input type="radio" name="role" value="student"></th>
				</tr>
				<tr>
				<th><input type="submit" name="submit" value="Υποβολή" style="position: absolute;left: calc(50% - 130px);z-index: 2;margin-top:20px"></th>
				</tr>
				</form>
			  </table>
		</div>
		
  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

</body>

</html>
