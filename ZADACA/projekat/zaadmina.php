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

    }
?>
<div class="container" >

	<div class="zaglavlje">
	<img id="naslovna_slika" src="food.jpg" alt="Slika hrane">
	</div>

	<h1>Recepti</h1>
	

	<div class="glavni">
		
<?php $recepti=simplexml_load_file('recepti.xml');



echo 'Broj proizvoda: '.count($recepti);
echo '<br>Lista proizvoda: ';?>


<br>
<a href="recepti.csv" style="color:#DE7C7C" download><b>Spisak recepata[download]</b></a>
<br><br>
<form action="zaadmina.php"  method="post">
<table cellpading="1" cellspacing="2" border="1">
<tr>
	       <th>Id</th>
		   <th>Ime</th>
		   <th>Ocjena</th>
		   <th>Opcije</th>
	   </tr>
	   <tr>
	   
	   <?php
	foreach ($recepti->recept as $recept){ ?>
		   <tr>
		       <td><?php echo $recept['id'];?></td>
			   <td><?php echo $recept->name;?></td>
			   <td><?php echo $recept->ocjena;?></td>
			   <td align="center">
			   <a href="editovanje.php?id=<?php echo $recept['id']; ?>">Edit</a> | 
			   <a href="zaadmina.php?action=delete&id=<?php echo $recept['id'];?>"
				 onclick="return confirm('Jeste li sigurni?')">Delete</a></td>
			   
		   </tr>
		   <?php } ?>



	   </tr>
	   
	   
		   
</table>
</form>
<a href="dodavanje.php">Dodaj novi proizvod</a>
	
	
</div>
</body>
</html>