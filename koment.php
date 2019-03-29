<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
	<title>Blog</title>
</head>
<body>

<h1> Dodaj komentarz! </h1>

<?php
	include("menu.php");
?>


<form action ="" method="post">
	<br />
	Rodzaj komentarza: <br/><select name='rodzaj'><option value='pozytywny'>Pozytywny</option><option value='neutralny'>Neutralny</negatywny><option value='negatywny'>Negatywny</negatywny></select> <br />
	Nazwa: <br/> <input type="text" name="autor" /> <br /><br /><br />
	Tresc komentarza: <textarea name="opis"> </textarea><br /><br />
	<input type="submit" name="dodaj" value="Dodaj">
    <input type="reset" value="Wyczyść"/>
	<br />
	<br />
</form>



<?php
if(isset($_POST["dodaj"])){
	$autor=$_POST["autor"];
	$rodzaj=$_POST["rodzaj"];
	$opis=$_POST['opis'];
	$wpis=$_GET['wpis'];
	$blogname=$_GET['blog'];
	if($autor=="" || $rodzaj==""|| $opis==""){
		echo "Wypełnij wszystkie pola!";
	}else{
		if(!is_dir("blogs/$blogname/$wpis.k")){
			mkdir("blogs/$blogname/$wpis.k");
		}
		$list = scandir("blogs/$blogname/$wpis.k");
		$liczbakom=count($list)-2;
		$infofp = fopen("blogs/$blogname/$wpis.k/$liczbakom", "w");
			fwrite($infofp,"Autor komentarza: $autor\r\n");
			fwrite($infofp,"Rodzaj komentarza: $rodzaj \r\n");
			fwrite($infofp,"Tresc komentarza:$opis\r\n");
			fclose($infofp);
		echo "Pomyślnie utworzono komentarz.";
		}
		}
		
		


?>
</body>