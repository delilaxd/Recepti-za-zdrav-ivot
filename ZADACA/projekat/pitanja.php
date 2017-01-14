<!DOCTYPE html>
<html>
<head>
		<title>Pitanja</title>
		<link rel="stylesheet" type="text/css" href="stil5.css">
		<script type="text/javascript " src="funkcije.js"></script>
</head>
<body >
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

<?php
if(isset($_POST['submitPosalji'])){
	$pitanja=simplexml_load_file('pitanja.xml');
	$pitanje=$pitanja->addChild('pitanje');
	
	$pitanje->addChild('poruka',$_POST['poruka']);

	file_put_contents('pitanja.xml', $pitanja->asXML());
	header('location: pitanja.php');
}
?>
<div class="container" >

	<div class="zaglavlje">
	<img id="naslovna_slika" src="pit.jpg" alt="Slika pitanja">
	<h1>Pitanja i odgovori</h1>
	<a style="color:white"href="pfd.php">Pitanja[PDF]</a>
	</div>
	
	
	<div class="pitanje">
	<h4>Postavite pitanje koje zelite: </h4>
		<form method="post" id="fpitanje">
			<input  id="pit" type="text" name="poruka" onChange="validacijaPitanja()"><br></input><label id="labelaPitanja"></label>
			<br> <br>
			<input id="send" type="submit" name="submitPosalji" value="Posalji"></input>
		</form>
	</div>
	
	<div class="glavni">
	<p> Najnovija pitanja i odgovori</p>
	</div>
	
	<div class="sporedni">
	<p>Najpopularnija pitanja i odgovori</p>
	</div>
	
	
	
</div>
		
</body>
</html>