<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
	<title>Blog</title>
</head>
<body>

<h1> Dodaj Bloga! </h1>

<?php
	include("menu.php");
?>

<form action ="" method="post">
	<br />
	Nazwa bloga: <br/> <input type="text" name="nazwa" /> <br />
	Nazwa użytkownika: <br/> <input type="text" name="login" /> <br />
	Hasło: <br/> <input type="password" name="haslo" /> <br /><br /><br />
	Opis bloga: <textarea name="opis"> </textarea><br /><br />
	<input type="submit" name="dodaj" value="Dodaj">
    <input type="reset" value="Wyczyść"/>
	<br />
	<br />
</form>


<?php
if(isset($_POST["dodaj"])){
	$nazwa=$_POST["nazwa"];
	$login=$_POST["login"];
	$haslo=$_POST["haslo"];
	$opis=$_POST['opis'];
	
	if($nazwa=="" || $login=="" || $haslo==""  || $opis==""){
		echo "Wypełnij wszystkie pola!";
	}else{
		if(!file_exists("blogs"))
		{
		mkdir("blogs");
		}
		
		
		if (!file_exists("blogs/$nazwa")){
			mkdir("blogs/$nazwa");
			$infofp = fopen("blogs/$nazwa/info", "w");
			fwrite($infofp,$login."\r\n");
			fwrite($infofp,md5($haslo)."\r\n");
			fwrite($infofp,$opis."\r\n");
			fclose($infofp);
			echo "Pomyślnie utworzono bloga.";
		} else{
			echo "Blog o podanej nazwie już istnieje!";
		}
		}
	}

?>







</body>