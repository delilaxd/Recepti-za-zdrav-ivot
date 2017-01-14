 <?php 
 $link=mysqli_connect("localhost","delilaxd","pas");
 mysqli_select_db($link,"receptizazdravzivot");
 ?>
<!DOCTYPE html>
<html>

<head>
		<title>Hrana</title>
		<link rel="stylesheet" type="text/css" href="stil2.css">
</head>
<div class="navigation">
				<h1>RECEPTI ZA ZDRAV ZIVOT</h1>
				<div id="menu">
				<ul>
					<li><a href="index.php">Pocetna</a></li>
					<li><a href="hrana.php">Hrana</a></li>
					<li><a href="fitness.php">Fitness</a></li>
					<li><a href="psiha.php">Psihicko zdravlje</a></li>
					<li><a href="pitanja.php">Pitanja i odgovori</a></li>
					<li><a href="galerijaa.php">Galerija</a></li>	
				</ul>
				</div>

				
</div>

<body >
<?php
/*


if(isset($_GET['action'])){
	$idx=0;
	$i=0;
	$recepti=simplexml_load_file('recepti.xml');
	$id=$_GET['id'];

	foreach($recepti->recept as $recept){
		if($recept['id']==$id){
			$idx=$i;
			break;
		}$i++;
	}
	unset($recepti->recept[$idx]);
	file_put_contents('recepti.xml', $recepti->asXML());
	}
    if (file_exists('recepti.xml')) { $recepti=simplexml_load_file('recepti.xml');
      $file = fopen('recepti.csv', 'w');
      createCsv($recepti, $file);
      fclose($file);
    }

    function createCsv($recepti,$file)
    {

        foreach ($recepti->children() as $item) 
        {
$hasChild = (count($item->children()) > 0)?true:false;
if( ! $hasChild){
         $put_arr = array($item->getName(),$item); 
         fputcsv($file, $put_arr ,',','"');
        }
        else createCsv($item, $file);
        
     }

    }*/
    //ucitavanje iz baze u csv
	// mysql database connection details
    $host = "localhost";
    $username = "delilaxd";
    $password = "pas";
    $dbname = "receptizazdravzivot";

    // open connection to mysql database
    $connection = mysqli_connect($host, $username, $password, $dbname) or die("Connection Error " . mysqli_error($connection));
    
    // fetch mysql table rows
    $sql = "select * from recepti";
    $result = mysqli_query($connection, $sql) or die("Selection Error " . mysqli_error($connection));

    $fp = fopen('recepti.csv', 'w');

    while($row = mysqli_fetch_assoc($result))
    {
        fputcsv($fp, $row);
    }
    
    fclose($fp);

    //close the db connection
    mysqli_close($connection);
?>


<div class="container" >

	<div class="zaglavlje">
	<img id="naslovna_slika" src="food.jpg" alt="Slika hrane">
	</div>

	<h1>Recepti</h1>
	

	<div class="glavni">
		



<?php


if(isset($_POST['submitSacuvaj'])){
	$host = "localhost";
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

$sql = "INSERT INTO recepti (id,ime,ocjena,admin)
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



<?php ;
echo '<br>Lista proizvoda: ';?>


<br>

<br><br>


<table cellpading="1" cellspacing="2" border="1">
<tr>
	       <th>Id</th>
		   <th>Ime</th>
		   <th>Ocjena</th>
		   <th>Opcije</th>
	   </tr>
	   <tr>
	   
	  

		   <?php
	   $res=mysqli_query($link,"select * from recepti");
	   while($row=mysqli_fetch_array($res))
	   {
		   echo "<tr>";
		      echo "<td>"; echo $row["id"]; echo "</td>";
		   echo "<td>"; echo $row["name"]; echo "</td>";
		   echo "<td>"; echo $row["ocjena"]; echo "</td>";
		   
		 echo "<td><a href='editovanje.php?id=".$row["id"]."' >Edit</a></td>";
         echo "<td><a href='delete.php?id=".$row["id"]."' >Delete</a></td>";
		   echo "</tr>";
	   }
	   ?>



	   </tr>
	   
	   
		   
</table>

<a href="dodavanje.php">Dodaj novi proizvod</a>

	
	
</div>
</body>
</html>