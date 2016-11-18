//globalna varijabla
var valid = false;

function validacijaRegistracije()
{
	/*var username = document.forms["fregistracija"]["user"].value;
	var	labela;
	if (isNaN(username) || username.length<5 || username.length>10) {labela = "Username nije validan!";}
	else { labela = "Username je prihvacen!";}
	document.forms["fregistracija"]["labelaUsername"].innerHTML = labela;*/
	 
	var username, labelatxt;
    username = document.getElementById("user").value;
    if (username.length < 6 || username.length> 12) { labelatxt = "Username nije vazeci! Unesi vise od 5-12 karaktera!"; valid=false;}
    else {labelatxt = "Username je odobren!"; valid=true;}
    document.getElementById("labelaUsername").innerHTML = labelatxt;
    disableButton();
}

function validacijaLogin()
{
	var username, labelatxt;
    username = document.getElementById("user2").value;
    if (username.length < 6 || username.length> 12) {labelatxt = "Username nije vazeci! Unesi vise od 5-12 karaktera!"; valid=false;}
    else {labelatxt = "Username je odobren!"; valid=true;}
    document.getElementById("labelaUsername2").innerHTML = labelatxt;
    disableButton();
}

function validacijaEmail() 
{
    var email = document.getElementById("email").value;
    var re = /\S+@\S+\.\S+/;
    var labelatxt;
    if (re.test(email)) {labelatxt = "Email je odobren!"; valid=true;}
    else {labelatxt = "Email nije vazeci! Format emaila treba biti: nesto@nesto.com"; valid=false;}
    document.getElementById("labelaEmail").innerHTML = labelatxt;
    disableButton();
}

function validacijaPassword()   
{   
	var pas = document.getElementById("pass").value;
	var labelatxt;

	if (pas.length < 6)  {labelatxt="Sifra prekratka! Unesi vise od 5 karaktera!"; valid=false;}
    else if (pas.length > 50) {labelatxt="Sifra preduga! Unesi manje od 51 karakter!"; valid=false;}
    else if (pas.search(/\d/) == -1) {labelatxt="Nema nijedne cifre! Unesi cifru!"; valid=false;}
    else if (pas.search(/[a-zA-Z]/) == -1){ labelatxt="Nema nijednog slova! Unesi slovo!"; valid=false;}
    else if (pas.search(/[^a-zA-Z0-9\!\@\#\$\%\^\&\*\(\)\_\+]/) != -1){ labelatxt="Pogresan znak unesen!"; valid=false;}
    else {labelatxt="Password je odobren!"; valid=true;}
    document.getElementById("labelaPassword").innerHTML = labelatxt;
    disableButton();
	
}

function validacijaPassword2()   
{   
	var pas = document.getElementById("pass2").value;
	var labelatxt;

	if (pas.length < 6)  {labelatxt="Sifra prekratka! Unesi vise od 5 karaktera!"; valid=false;}
    else if (pas.length > 50) {labelatxt="Sifra preduga! Unesi manje od 51 karakter!"; valid=false;}
    else if (pas.search(/\d/) == -1) {labelatxt="Nema nijedne cifre! Unesi cifru!"; valid=false;}
    else if (pas.search(/[a-zA-Z]/) == -1) {labelatxt="Nema nijednog slova! Unesi slovo!"; valid=false;}
    else if (pas.search(/[^a-zA-Z0-9\!\@\#\$\%\^\&\*\(\)\_\+]/) != -1) {labelatxt="Pogresan znak unesen!"; valid=false;}
    else {labelatxt="Password je odobren!"; valid=true;}
    document.getElementById("labelaPassword2").innerHTML = labelatxt;
    disableButton();
}

function validacijaPitanja()   
{   
	var pitanje = document.getElementById("pit").value;
	var labelatxt;

	if (pitanje.length < 6)  {labelatxt="Pitanje prekratko! Molimo vas unesite vise do 5 karaktera za ispravnost!"; valid=false;}
    else if (pitanje.length > 150) {labelatxt="Pitanje predugo! Molimo vas unesite manje od 150 karaktera za ispravnost!"; valid=false;}
    else {labelatxt = "Ispravno uneseno!";valid=true;}
    document.getElementById("labelaPitanja").innerHTML = labelatxt;
    disableButton();
}


function disableButton()
{
    if(valid==false) document.getElementById("log").disabled="disable";
    else document.getElementById("log").disabled="";
}