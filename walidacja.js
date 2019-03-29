function setDataHour(){
	setData();
	setHour();
}



function setData(){
	var dzisiaj= new Date;
	var dzien=dzisiaj.getDate();
	var miesiac=dzisiaj.getMonth()+1;
	if(miesiac<10){miesiac="0"+miesiac;}
	var rok=dzisiaj.getFullYear();
	document.getElementsByName("data")[0].value=rok+"-"+miesiac+"-"+dzien;
	
	
}


function setHour(){
	var dzisiaj= new Date;
	var hour=dzisiaj.getHours();
	if(hour<10){hour="0"+hour;}
	var min=dzisiaj.getMinutes();
	if(min<10){min="0"+min;}
	document.getElementsByName("godzina")[0].value=hour+":"+min;
}


function formatData(){
	var pattern=/^[1-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][1-9]$/;
	var data=document.getElementsByName("data")[0].value;
	if(!pattern.test(data)){
		alert("Podano date w błędnym formacie - ustawiona zostaje aktualna data!");
		setData();
	}
	
}

function checkData(){
	formatData();
	var flaga=0;
	var data = document.getElementsByName("data")[0].value;
	var monthstr=data.substr(5,2);
	var yearstr=data.substr(0,4);
	var daystr=data.substr(8,2);
	var year=parseInt(yearstr);
	if(monthstr.charAt(0)=="0"){
		monthstr=monthstr.charAt(1);
	}
	if(daystr.charAt(0)=="0"){
		daystr=daystr.charAt(1);
	}
	var x=parseInt(monthstr);
	var y=parseInt(daystr);
	//document.getElementsByName("godzina")[0].value=year;
	if (parseInt(monthstr) < 0 || parseInt(monthstr) >12){
		flaga=1;
	}
	if((year % 4==0 && year % 100 != 0) || year % 400==0)
	{
		if((x == 1 || x == 3 || x == 5 || x == 7 || x == 8 || x == 10 || x == 12) && y>31){
			flaga=1;
		}
		if((x == 4 || x == 6 || x == 9 || x == 11) && y>30){
			flaga=1;
		}
		if(x==2 && y> 29){
			flaga=1
		}
	
	}
	else{
		if((x == 1 || x == 3 || x == 5 || x == 7 || x == 8 || x == 10 || x == 12) && y>31){
			flaga=1;
		}
		if((x == 4 || x == 6 || x == 9 || x == 11) && y>30){
			flaga=1;
		}
		if(x==2 && y> 28){
			flaga=1
		}
	}
	
	
	
	
	if(flaga==1){
		alert("Podano błędną date - ustawiona zostaje aktualna godzina!");
		setData();	
	}
	
	
	
}

function formatHour(){
	var pattern=/^[0-9][0-9]:[0-9][0-9]$/;
	var hour=document.getElementsByName("godzina")[0].value;
	if(!pattern.test(hour)){
		alert("Podano godzine w błędnym formacie - ustawiona zostaje aktualna godzina!");
		setHour();
	}
	
}

function checkHour(){
	formatHour();
	var hour = document.getElementsByName("godzina")[0].value;
	var hstr=hour.substr(0,2);
	var secstr=hour.substr(3,2);
	if(secstr.charAt(0)=="0"){
		secstr=secstr.charAt(1);
	}
	
	if (parseInt(hstr) < 0 || parseInt(hstr) > 23 || parseInt(secstr) < 0 || parseInt(secstr) > 59) 
	{
		alert("Podano błędną godzine - ustawiona zostaje aktualna godzina!");
		setHour();	
	}
}

function addfiles(divname){
	var zalacznik = document.createElement('input');
	var br =  document.createElement('br');
	zalacznik.setAttribute('type', 'file');
	zalacznik.setAttribute('name', 'zalacznik');
	var div = document.getElementById(divname);
	div.appendChild(zalacznik);
	div.appendChild(br);
}




