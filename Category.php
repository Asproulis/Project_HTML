<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_2017";
z
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT firstname, lastname FROM user_verify";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "firstname: " . $row["firstname"]. " - lastname: " . $row["lastname"];
    }
} else {
    echo "0 results";
}
$conn->close();
?>