

var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function() {// Anonimna funkcija
		if (ajax.readyState == 4 && ajax.status == 200)
			document.getElementById("polje").innerHTML = ajax.responseText;
		var script = document.createElement('script');
script.src = 'javaGalerija.js';
script.onload = function()
{};
document.head.appendChild(script);
		if (ajax.readyState == 4 && ajax.status == 404)
			document.getElementById("polje").innerHTML = "Greska: nepoznat URL";
	}
	function ucitaj(naziv){
	ajax.open("GET", naziv, true);
	ajax.send();
	return false;
	}


	

