<?php 
 $link=mysqli_connect("localhost","delilaxd","pas");
 mysqli_select_db($link,"receptizadobarzivot");
 ?>
<html>
<body>
<?php

if(isset($_GET['id']))
{
$id=$_GET['id'];
$query1=mysqli_query($link,"delete from recepti where id='$id'");
if($query1)
{
header('location:zaadmina.php');
}
}
?>

</body>
</html>