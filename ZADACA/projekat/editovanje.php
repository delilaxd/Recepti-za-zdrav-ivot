<?php 
$link=mysqli_connect("localhost","delilaxd","pas");
 mysqli_select_db($link,"receptizazdravzivot");
 ?>

<?php

if(isset($_GET['id']))
{
$id=$_GET['id'];}
if(isset($_POST['save'])){
	$name=$_POST['name'];
	$o=$_POST['ocjena'];

$query3=mysqli_query($link,"update recepti set name='$name', ocjena='$o', admin=0 where id='$id'");
	if($query3)
{
	header('location: zaadmina.php');
}
}
$query1=mysqli_query($link,"select * from recepti where id='$id'");
$query2=mysqli_fetch_array($query1);
?>

<form method="post">
    <table cellpading="2" cellspacing="2">
	   <!--<tr><td>Id</td><td><input type="text" name="id" value="<?php echo $query2["id"]; ?>"></td></tr>-->
	   <tr><td>Ime</td><td><input type="text" name="name" value="<?php echo $query2["name"]; ?>"></td></tr>
	   <tr><td>Ocjena</td><td><input type="text" name="ocjena" value="<?php echo $query2["ocjena"]; ?>"></td></tr>
	   <tr><td>&nbsp;</td> <td><input type="submit" name="save" value="Spasi"></td></tr>
	</table>
