<?php
if(isset($_POST['submitSacuvaj'])){
	$recepti=simplexml_load_file('recepti.xml');
	$recept=$recepti->addChild('recept');
	$recept->addAttribute('id',$_POST['id']);
	$recept->addChild('name',$_POST['name']);
	$recept->addChild('ocjena',$_POST['ocjena']);
	file_put_contents('recepti.xml', $recepti->asXML());
	header('location: zaadmina.php');
}
?>

<form method="post">
    <table cellpading="2" cellspacing="2">
	   <tr>
	         <td>Id</td>
			 <td><input type="text" name="id"></td>
	   </tr>
	   <tr>
	         <td>Ime</td>
			 <td><input type="text" name="name"></td>
	   </tr>
	   <tr>
	         <td>Ocjena</td>
			 <td><input type="text" name="ocjena"></td>
	   </tr>
	    <tr>
	         <td>&nbsp;</td>
			 <td><input type="submit" name="submitSacuvaj" value="Sačuvaj"></td>
	   </tr>
	
	</table>