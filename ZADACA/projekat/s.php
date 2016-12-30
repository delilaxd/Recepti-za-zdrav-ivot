<?php
$output='';
	if(isset($_POST['searchVal'])){
		$searched = htmlEntities($_POST['searchVal'], ENT_QUOTES);
		$xml=simplexml_load_file('recepti.xml');
		$brojac=1;
	foreach($xml->recept as $k){
		if($brojac>10) break;

		$o=$k->ocjena;
		$ime=$k->name;
		$fullName=$o.' '.$ime;
		if($searched=='')
		{
			$output.='<div>'.$o.' '.$ime.'<div>';
			$brojac=$brojac+1;
		}
		elseif(strpos(strtolower($o), strtolower($searched))!==false || strpos(strtolower($ime),strtolower($searched))!==false || strpos(strtolower($fullName),strtolower($searched))!==false)
		{
			$output.='<div>'.$o.' '.$ime.'<div>';
			$brojac=$brojac+1;
		}
		
	}
}
echo $output;
?>