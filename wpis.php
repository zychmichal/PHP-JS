<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
	<script type="text/javascript" src="walidacja.js"></script>
	<title>Blog</title>
</head>
<body onload="setDataHour()">

<h1> Dodaj wpis! </h1>

<?php
	include("menu.php");
?>


<form action ="" method="post" enctype=”multipart/form-data”>
	<br />
	Nazwa użytkownika: <br/> <input type="text" name="login" /> <br />
	Hasło: <br/> <input type="password" name="haslo" /> <br /><br /><br />
	Wpis: <textarea name="opis"> </textarea><br /><br />
	Data:<input type="text" name="data" onchange="checkData()"> <br />
	Godzina:<input type="text" name="godzina" onchange="checkHour()"><br /><br />
	<div id="zal"></div>
	
	<input type="button" value="Dodaj kolejny załącznik" onclick="addfiles('zal')" /><br/>
	
	<input type="submit" name="dodaj" value="Dodaj">
    <input type="reset" value="Wyczyść"/><br /><br />
	
	
</form>


<?php

	

if(isset($_POST["dodaj"])){
	//var_dump($_POST);
	$data_wpisu=$_POST["data"];
	$godzina=$_POST["godzina"];
	$login=$_POST["login"];
	$haslo=$_POST["haslo"];
	$opis=$_POST["opis"];
	$plik1nazwa=$_POST["plik1"];
	$plik2nazwa=$_POST["plik2"];
	$plik3nazwa=$_POST["plik3"];
	$list = scandir("blogs/");
	$nazwa = "";
	$checkhaslo="";
	
	if($login=="" || $haslo==""|| $opis==""){
		echo "Wypełnij wszystkie pola!";
	}else{
		if(!file_exists("blogs"))
		{
			echo "Nie ma takiego bloga. Jeśli chcesz dodać bloga przejdź do zakładki: Dodaj nowy blog.";
		}
		
		for($i=2; $i<count($list) ;$i++){
			$lines=file("blogs/".$list[$i]."/info");
			if(trim($lines[0]) == $login){
				$nazwa = $list[$i];
				$checkhaslo = trim($lines[1]);
				//echo "$list[$i] <br />";
		
		}
		//echo "$checkhaslo<br />";
		$tmp=md5($haslo);
		//echo "$tmp<br />";
		if($nazwa!="" && md5($haslo)==$checkhaslo){
			//echo "blogs/$nazwa/".date("Ymd").date("Hi").date("s").rand(10,99)."<br />";
			$number=0;
			$infofp = fopen("blogs/$nazwa/".substr($data_wpisu,0,4).substr($data_wpisu,5,2).substr($data_wpisu,8,2).substr($godzina,0,2).substr($godzina,3,2).date("s")."0$number", "w");
			fwrite($infofp,$opis."\r\n");
			fclose($infofp);
			$number++;
			/*var_dump($_FILES);
			if(move_uploaded_file($_FILES['plik1']['tmp_name'],"blogs/$nazwa/".substr($data_wpisu,0,4).substr($data_wpisu,5,2).substr($data_wpisu,8,2).date("Hi").date("s")."0$number".substr($plik1nazwa,-4))){
				echo "ok";
			} else{
				echo "err";
			}*/
			
			echo "Pomyślnie utworzono wpis.";
			break;
		}
		}
		
		
		
	}
}
	

?>




</body>