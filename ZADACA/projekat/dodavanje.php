<?php


if(isset($_POST['submitSacuvaj'])){
	$servername = "localhost";
$username = "delilaxd";
$password = "pas";
$dbname = "receptizazdravzivot";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 $name = $_POST['name'];
  $o = $_POST['ocjena'];

$sql = "INSERT INTO recepti (id,name,ocjena,admin)
VALUES (1,'$name', '$o', 0)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
	header('location: zaadmina.php');
	
	
}
 

?>

<form method="post">
<table cellpading="1" cellspacing="3">
<tr>
    <td>Id</td> <td><input type="text" name="id"></td>
</tr>
<tr>
	 <td>Ime</td><td><input type="text" name="name"></td>
</tr>
<tr>
	 <td>Ocjena</td><td><input type="text" name="ocjena"></td>
</tr>
<tr>
	<td>&nbsp;</td><td><input type="submit" name="submitSacuvaj" value="Sačuvaj"></td>
</tr>	
</table>