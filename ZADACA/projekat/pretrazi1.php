<?php
$output='';
	if(isset($_POST['searchVal'])){
		$pretraga = htmlEntities($_POST['searchVal'], ENT_QUOTES);
		$xml=simplexml_load_file('recepti.xml');
		$brojac=1;
	foreach($xml->recept as $k){
		if($brojac>10) break;
		$o=$k->ocjena;
		$ime=$k->name;
		$fullName=$o.' '.$ime;
		if($pretraga=='')
		{
			$output.='<div>'.$o.' '.$ime.'<div>';
			$brojac=$brojac+1;
		}
		elseif(strpos(strtolower($o), strtolower($pretraga))!==false || strpos(strtolower($ime),strtolower($pretraga))!==false || strpos(strtolower($fullName),strtolower($pretraga))!==false)
		{
			$output.='<div>'.$o.' '.$ime.'<div>';
			$brojac=$brojac+1;
		}
		
	}
}
echo $output;
?>