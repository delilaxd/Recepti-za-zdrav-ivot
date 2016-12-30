<?php
$recepti=simplexml_load_file('recepti.xml');
if(isset($_POST['save'])){
	foreach($recepti->recept as $recept){
		if($recept['id']==$_POST['id']){
			$recept->name=$_POST['name'];
			$recept->ocjena=$_POST['ocjena'];
			break;
		}
	}
file_put_contents('recepti.xml', $recepti->asXML());
header('location: zaadmina.php');
}
foreach($recepti->recept as $recept){
if($recept['id']==$_GET['id']){
	$id=$recept['id'];
	$name=$recept->name;
	$ocjena=$recept->ocjena;
	break;
	}	
}
?>

<form method="post">
    <table cellpading="2" cellspacing="2">
	   <tr><td>Id</td><td><input type="text" name="id" value="<?php echo $id; ?>"></td></tr>
	   <tr><td>Ime</td><td><input type="text" name="name" value="<?php echo $name; ?>"></td></tr>
	   <tr><td>Ocjena</td><td><input type="text" name="ocjena" value="<?php echo $ocjena; ?>"></td></tr>
	   <tr><td>&nbsp;</td> <td><input type="submit" name="save" value="Spasi"></td></tr>
	</table>
