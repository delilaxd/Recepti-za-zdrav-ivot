<?php
$output='';
	if(isset($_POST['submitSearch'])){
		$pretraga = htmlEntities($_POST['search'], ENT_QUOTES);
		//ovdje nešto
		//ovo dodaje u autput u vajl
		//ovo vadi sve registrovane
		$files=simplexml_load_file('recepti/*.xml');
	foreach($files as $file){
		$xml=new SimpleXMLElement($file,0,true);
		$fname=$xml->id;
		$lname=$xml->name;
		//ovdje if se nalazi u imenu ili prezimenu
		//dodaj u autput
		if($pretraga=='')
		{
			$output.='<div>'.$fname.' '.$lname.'<div>';
		}
		elseif(strpos(strtolower($fname), strtolower($pretraga))!==false || strpos(strtolower($lname),strtolower($pretraga))!==false)
		{
			$output.='<div>'.$fname.' '.$lname.'<div>';
		}
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset=utf-8>
	<title>Arsenal FC</title>
	
  </head>

  <body>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript">
	function searchq(){
		var searchTxt = $("input[name='search']").val();
	$.post("pretrazi.php",{searchVal: searchTxt},function(output){
		$("#output").html(output);
	}
	);
	}
	</script>
	<script type="text/javascript">
	function prikaziSve(){
		var searchTxt = $("input[name='search']").val();
	$.post("pretrazi1.php",{searchVal: searchTxt},function(output){
		$("#output").html(output);
	}
	);
	}
	</script>
	</script>
  
    <form action="search.php" method="post" >
	<input type="text" name="search" onkeyup="searchq();" ;">
	<input type="button" name="submitSearch" value="&gt;&gt;" onclick="prikaziSve();">
		</form>
		<div id="output">
		</div>
  </body>
</html>