<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
	<title>Blog</title>
</head>
<body>

<h1> Przegląd bloga </h1>

<?php
	include("menu.php");
	$blogname= $_GET['nazwa'];
	if($blogname==NULL){
		header('Location: lista.php');
	}
	elseif(!file_exists("blogs/$blogname") && $blogname!=NULL){
		echo "<h1>Podany blog nie istnieje!</h1>";
	}elseif(file_exists("blogs/$blogname") && $blogname!=NULL){
		echo "<h2> $blogname </h2><br />";
	$lines = file("blogs/$blogname/info");
	$login=trim($lines[0]);
	$opisbloga="";
	for($i=2; $i<count($lines); $i++){
		$opisbloga.=$lines[$i];
	}
	echo "Autor: $login <br /><br /> Opis bloga: $opisbloga <br /><br />";
	$list = scandir("blogs/$blogname");
	for($i=2; $i<count($list); $i++){
		if(!is_dir("blogs/$blogname/$list[$i]") && $list[$i]!="info"){
			$wpis="";
			echo "<h2> Wpis $list[$i] </h2>";
			$wpisy = file("blogs/$blogname/$list[$i]");
			for($s=0; $s<count($wpisy); $s++){
				$wpis.=$wpisy[$s];
			}
			//$infofp = fopen("blogs/$nazwa/".date("Ymd").date("Hi").date("s")."0$number", "w");
			$data="Data wpisu: ".substr($list[$i],0,4)."-".substr($list[$i],4,2)."-".substr($list[$i],6,2)."<br />Godzina: ".substr($list[$i],8,2).":".substr($list[$i],10,2)."<br /><br />";
			echo "Tresc wpisu: $wpis <br /><br /> $data";
			if(!is_dir("blogs/$blogname/$list[$i].k")){
				$ilosckom=0;
			} else {
				$komentarze=scandir("blogs/$blogname/$list[$i].k");
				$ilosckom=count($komentarze)-2;
			}
			echo "<a href='koment.php?wpis=".$list[$i]."&blog=".$blogname."'>Dodaj komentarz</a><br/>";
			echo "Ilość dotychczasowych komentarzy: $ilosckom <br/>";
			echo "Pokaż dotychczasowe komentarze: <form action ='' method='post'><input type='submit' name='pokaz".$i."' value='Pokaż'></form> <br/>";
			if(isset($_POST["pokaz".$i])){
				if(is_dir("blogs/$blogname/$list[$i].k")){
				for($j=2; $j<count($komentarze); $j++){
					$tresckom="";
					$komm = file("blogs/$blogname/$list[$i].k/$komentarze[$j]");
					for($m=0; $m<count($komm); $m++){
						$tresckom.=$komm[$m];
						$tresckom.="<br />";
					}
					$numm=$j-1;
					echo "Tresc komentarza nr $numm: <br /> $tresckom <br />";
				}	
			}
		}
	}
	}
	}
	
	
	
	
?>











</body>