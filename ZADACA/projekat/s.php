<?php $izlaz='';
	if(isset($_POST['searchVal']))
	{
	$brojac=0;
	$xml=simplexml_load_file('recepti.xml');

	$searched = htmlEntities($_POST['searchVal'], ENT_QUOTES);
	foreach($xml->recept as $k){
	if($brojac>9) break;
	$o=$k->ocjena;
	$ime=$k->name;
	if($searched=='')
	{
		$brojac++;
		$izlaz.='<div>'.$o.' '.$ime.'<div>';
		
	}
	elseif(strpos(($o), ($searched))!==false || strpos(($ime),($searched))!==false || strpos(($o.' '.$ime),($searched))!==false)
	{
		$brojac++;
		$izlaz.='<div>'.$o.' '.$ime.'<div>';
		
		}
		
	}
} echo $izlaz; ?>