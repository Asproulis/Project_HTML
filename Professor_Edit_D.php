<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
  
  

  <title>Thesis Registration Form</title>


</style>

    <script src="js/prefixfree.min.js"></script>
	
<!---------------------------------------------------------------------------------------------------->
<script>
function addRowToTable()
{
  var tbl = document.getElementById('tblSample');
  var lastRow = tbl.rows.length;
  // if there's no header row in the table, then iteration = lastRow + 1
  var iteration = lastRow;
  var row = tbl.insertRow(lastRow);
  
  // left cell
  var cellLeft = row.insertCell(0);
  var textNode = document.createTextNode(iteration);
  cellLeft.appendChild(textNode);
  
  // right cell
  var cellRight = row.insertCell(1);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'txtRow' + iteration;
  el.id = 'txtRow' + iteration;
  el.size = 40;
  
  el.onkeypress = keyPressTest;
  cellRight.appendChild(el);
  
  // select cell
  var cellRightSel = row.insertCell(2);
  var sel = document.createElement('select');
  sel.name = 'selRow' + iteration;
  sel.options[0] = new Option('text zero', 'value0');
  sel.options[1] = new Option('text one', 'value1');
  cellRightSel.appendChild(sel);
}
function keyPressTest(e, obj)
{
  var validateChkb = document.getElementById('chkValidateOnKeyPress');
  if (validateChkb.checked) {
    var displayObj = document.getElementById('spanOutput');
    var key;
    if(window.event) {
      key = window.event.keyCode; 
    }
    else if(e.which) {
      key = e.which;
    }
    var objId;
    if (obj != null) {
      objId = obj.id;
    } else {
      objId = this.id;
    }
    displayObj.innerHTML = objId + ' : ' + String.fromCharCode(key);
  }
}
function removeRowFromTable()
{
  var tbl = document.getElementById('tblSample');
  var lastRow = tbl.rows.length;
  if (lastRow > 2) tbl.deleteRow(lastRow - 1);
}
function openInNewWindow(frm)
{
  // open a blank window
  var aWindow = window.open('', 'TableAddRowNewWindow',
   'scrollbars=yes,menubar=yes,resizable=yes,toolbar=no,width=400,height=400');
   
  // set the target to the blank window
  frm.target = 'TableAddRowNewWindow';
  
  // submit
  frm.submit();
}
function validateRow(frm)
{
  var chkb = document.getElementById('chkValidate');
  if (chkb.checked) {
    var tbl = document.getElementById('tblSample');
    var lastRow = tbl.rows.length - 1;
    var i;
    for (i=1; i<=lastRow; i++) {
      var aRow = document.getElementById('txtRow' + i);
      if (aRow.value.length <= 0) {
        alert('Row ' + i + ' is empty');
        return;
      }
    }
  }
  openInNewWindow(frm);
}
</script>

<!---------------------------------------------------------------------------------------------------->

</head>

<body>

  <div class="body"></div>
		<div class="grad"></div>
		<div class="bar">
			<ul>
			  <li><div>The<span>Ma</span></div><br><div style="font-size:16px">The Online <span><b>Thesis Manager</b></span></div></li>
			</ul>
			<ul>
			  <li style="margin-left:calc(35% - 90px);margin-right:50px"><a class="active" href="#home">Αρχική</a></li>
			  <li style="margin: 0px 50px 0px 0px"><a href="#news">Νέα</a></li>
			  <li style="margin: 0px 50px 0px 0px"><a href="#contact">Επαφή</a></li>
			  <li style="margin: 0px 50px 0px 0px"><a href="#about">Σχετικά</a></li>
			</ul>
		</div>
		
		<br>
		<div class="register_t">
				<h2 style="text-align:center;font-size:24px">Φόρμα Δημιουργίας Διπλωματικής<br><br></h2>
				<table style="width:100%">
				<form action="" name="register_thesis" id="register_thesis" method="POST">
				<tr>
				<th style="text-align:left"><label for="Tname">Τίτλος Διπλωματικής:</label></th>
				<th><textarea rows="2" cols="70" name="Tname" id="Tname" placeholder="π.χ. Ηλεκτρονικό Έγκλημα και Δικαιοσύνη"></textarea></th>
				</tr>
				<tr>
				<th style="text-align:center"><label for="Profname">Επιβλέπων:</label></th>
				<th style="text-align:left"><label>
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

					$sql = "SELECT Firstname, Lastname FROM user";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
		   
						while($row = $result->fetch_assoc()) {
						echo  $row["Lastname Firstname"];
						}
					} 
					else {
						echo "0 results";
					} 
				?>
				</label></th>
				</tr>
				<tr>
				<th style="text-align:center"><label for="StudNum">Αριθμός Φοιτητών:</label></th>
				<th style="float:left">
					<form action="tableaddrow_nw.html" method="get">
					<p>
					<input type="button" value="Add" onclick="addRowToTable();" />
					<input type="button" value="Remove" onclick="removeRowFromTable();" />
					<input type="button" value="Submit" onclick="validateRow(this.form);" />
					
					</p>
					<p>
					
					<span id="spanOutput" style="border: 1px solid #000; padding: 3px;"> </span>
					</p>
					<table border="1" id="tblSample">
					  <tr>
						<th colspan="3" style="text-align:center">Στοιχεία Φοιτητών</th>
					  </tr>
					  <tr>
						<td>1</td>
						<td><input type="text" name="txtRow1"
						 id="txtRow1" size="40" onkeypress="keyPressTest(event, this);" /></td>
						<td>
						<select name="selRow0">
						<option value="value0">text zero</option>
						<option value="value1">text one</option>
						</select>
						</td>
					  </tr>
					</table>
					</form>
				</th>
				</tr>
				<tr>
				<th style="text-align:center"><label for="pass1">Password:</label></th>
				<th></th>
				</tr>
				<tr>
				<th style="text-align:center"><label for="pass2">Επιβεβαίωση Password:</label></th>
				<th></th>
				</tr>
				<tr>
				<th style="text-align:center"><label for="math">(3+12)/5 = :</label></th>
				<th></th>
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
