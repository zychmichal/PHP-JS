function blok(){
	document.getElementsByName('komunikator')[0].disabled=true;
	document.getElementsByName('tresc')[0].disabled=true;
	document.getElementsByName('podpis')[0].disabled=true;
	document.getElementsByName('wyslij')[0].disabled=true;
}

function unblok(){
	document.getElementsByName('komunikator')[0].disabled=false;
	document.getElementsByName('tresc')[0].disabled=false;
	document.getElementsByName('podpis')[0].disabled=false;
	document.getElementsByName('wyslij')[0].disabled=false;
	czyt();
	/*var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "chat.txt", true);
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && this.status == 200) {
            document.getElementsByName('komunikator')[0].innerHTML =
                xhttp.responseText;
        }
    };
  
    xhttp.send(null);*/
}


function zmiana(){
	
	
	
	var flaga = document.getElementsByName('aktyw')[0].checked;
	if(flaga){
		unblok();
	}else{
		blok();
	}
	
}


function submitChat(){
	
	
	if(document.getElementsByName("podpis")[0].value=="" || document.getElementsByName("tresc")[0].value==""){
		alert("Uzupelnij wszystkie pola")
	}
	else{
		var podpis=document.getElementsByName("podpis")[0].value;
		var wiadomosc = document.getElementsByName("tresc")[0].value;
		var koncowe=podpis+": "+wiadomosc;
		var xmlhttp= new XMLHttpRequest();
		xmlhttp.open('POST','send.php',true);
		xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xmlhttp.send("koncowe=" + koncowe);
		document.getElementsByName("podpis")[0].value="";
		document.getElementsByName("tresc")[0].value="";
	}
	
}


function czyt(){
	pokaz();
	
	setTimeout(czyt, 1000);
}

function pokaz() {
	
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "chat.txt", true);
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementsByName('komunikator')[0].innerHTML =
                xhttp.responseText;
        }
    };
  
    xhttp.send(null);
}

