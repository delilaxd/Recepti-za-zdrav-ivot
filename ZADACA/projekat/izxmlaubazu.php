<?php
 $baza=mysqli_connect("localhost","delilaxd","pas","receptizazdravzivot");
if (!$baza) {
    die("Connection failed: " . mysqli_connect_error());
}
//dodavanje u tabelu administrator

$xml=simplexml_load_file('admin.xml');
	
		foreach($xml->admin as $a){
		$username=$a->username;
		$password=$a->password;

if ($baza->query("SELECT * FROM administrator where username='$username' and password='$password'")->num_rows < 1)
{
	$upit = "INSERT INTO administrator (username, password)
VALUES ('$username','$password')";
	if (mysqli_query($baza, $upit)) 
	{
	    echo "New record created successfully";
	} else 
	{
	    echo "Error: " . $upit . "<br>" . mysqli_error($baza);
	}
}
}

//dodavanje u tabelu recepti

$xml=simplexml_load_file('recepti.xml');
	
		foreach($xml->recept as $a){
		$name=$a->name;
		$o=$a->ocjena;
$id=$baza->query("SELECT * FROM recepti" )-> num_rows;
if ($baza->query("SELECT * FROM recepti where name='$name' and ocjena='$o'")->num_rows < 1)
{
	$id++;
	$upit = "INSERT INTO recepti (id, name, ocjena,admin)
VALUES ('$id','$name','$o',0)";
	if (mysqli_query($baza, $upit)) 
	{
	    echo "New record created successfully";
	} else 
	{
	    echo "Error: " . $upit . "<br>" . mysqli_error($baza);
	}
}
}

//dodavanje u tabelu pitanja

$xml=simplexml_load_file('pitanja.xml');
	
		foreach($xml->pitanje as $a){
		$p=$a->poruka;
		
#$id=$baza->query("SELECT * FROM pitanja" )-> num_rows;
if ($baza->query("SELECT * FROM pitanja where poruka='$p'")->num_rows < 1)
{
	#$id++;
	$upit = "INSERT INTO pitanja (poruka,recept)
VALUES ('$p', 0)";
	if (mysqli_query($baza, $upit)) 
	{
	    echo "New record created successfully";
	} else 
	{
	    echo "Error: " . $upit . "<br>" . mysqli_error($baza);
	}
}
}
header('Location:zaadmina.php') 
?>
