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
					<li><a href="home.php">Pocetna</a></li>
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
	$recepti=simplexml_load_file('recepti.xml');
	$id=$_GET['id'];
	$index=0;
	$i=0;
	foreach($recepti->recept as $recept){
		if($recept['id']==$id){
			$index=$i;
			break;
		}
		$i++;
	}
	unset($recepti->recept[$index]);
	file_put_contents('recepti.xml', $recepti->asXML());
	}
?>
<div class="container" >

	<div class="zaglavlje">
	<img id="naslovna_slika" src="food.jpg" alt="Slika hrane">
	</div>

	<h1>Hrana</h1>
	

	<div class="glavni">
		<h3> Recepti za hranu, preporuke o dijetama, te najnovija istrazivanja o zdravoj hrani.</h3>
		<h4>Monte torta</h4>
		<img id="slikamonte" src="monte.jpg" alt="slika monte">
		<p>Priprema
			
		<br><br><br>1.LJEŠNJAKE popecite u rerni da potamne, ohladite ih pa ih kroz ruke trljajte da im otpadne korica. u malo boljim trgovinama imate za kupiti već oguljene i popečene.( ja kupim gotove.) stavite ih u čvršću krpu i malo ih stucite batom za meso, ali tako da ostanu i malo krupniji komadići.
		<br><br>2.
		 BISKVIT
		bjelanjke tucite u čvrsti snijeg, dodajte šećer i na kraju lagano ubatite brašno najmanjom brzinom miksera.
		kalup za torte promjera 26 cm namažite maslom, pobrašnite a na dno stavite masni papir.
		na masni papir rasporedite istučene lješnjake i na njih oprezno rasporedite bjelanjke.
		pecite 10-ak minuta na 180 °c. dok dobije malo boju. ohladite.
		ohlađeni biskvit prevrnite na pladanj da vam biskvit bude dolje a lješnjaci na vrhu. lagano dignite masni papir. vratite obruč od forme za tortu.
		<br><br>3.KREMA
		uvrite 8 dcl mlijeka sa vanil šećerom.
		batite žumanjke sa šećerom. dodajte 2 vanil pudinga, 2 žlice brašna i dva dcl mlijeka. to ukuhajte u uvrelo mlijeko kao puding.ohlaadite uz povremeno miješanje da se ne stvori kožica.( ja stavim kremu s posudom u kojoj se kuhala u sudoper s hladnom vodom ide puno brže i miješam povremeno mikserom )
			<br><br>4.
		margarin za kreme (ili maslo) izradite dobro sa šećerom u prahu pa dodajte u skroz hladnu kremu.
		<br><br>5.
		ČOKOLADU otopite na pari, malo prohladite, pa dodajte u POLOVICU kreme. druga ostaje žuta.
		<br><br>6.
		NUTELU malo isto zagrijte (da se lakše da mazat) pa je oprezno namažite na lješnjake.
		<br><br>7.
		KEKSE izlomite na nepravilne komadiće ( 1 keks na 4-5 komada) i poredajte po nuteli. Keksa potrošite koliko vam treba da prekrijete cijelu površinu.
		Bilo je upita da li staviti svih 25 dkg, ali to nije potrebno.
		<br><br>8.
		SADA stavite na kekse žutu kremu, pa čokoladnu i stavite tortu da se hladi preko noći u hladnjak.
		kada se ohladila dignite oprezno obruč i obilato namažite šlagom.
		ukrasite po želji, ja pospem malo lješnjacima.
		<br><br> <i>Izvor: www.coolinarka.com</i>
		
		</p>
	</div>
	
	<div class="sporedni">
	<h3><i>"Ne preziri kruh da jednoga dana ne bi skupljao mrvice." -William Shakespeare</i></h3>
	<br>

<?php $recepti=simplexml_load_file('recepti.xml');
echo 'Broj proizvoda: '.count($recepti);
echo '<br>Lista proizvoda: ';?>


<br>
<form action="hrana.php"  method="post">
<table cellpading="2" cellspacing="2" border="1">


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
			   <a href="hrana.php?action=delete&id=<?php echo $recept['id'];?>"
				 onclick="return confirm('Jeste li sigurni?')">Delete</a></td>
			   
		   </tr>
		   <?php } ?>



	   </tr>
	   
	   
		   
</table>
</form>
<a href="dodavanje.php">Dodaj novi proizvod</a>
	</div>
	
</div>
</body>
</html>