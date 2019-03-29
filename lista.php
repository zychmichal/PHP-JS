<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
	<title>Blog</title>
</head>
<body>

<h1> Lista blogów! </h1>

<?php
	include("menu.php");
?>



<?php
$list = scandir("blogs/");
$indeks = 0;


for($i=2; $i<count($list) ;$i++){
	$lines=file("blogs/".$list[$i]."/info");
	$blog[$indeks] = $list[$i];
    $blog[$indeks+1] = trim($lines[0]);
	$indeks=$indeks+2;
}

    
echo '<br />Lista blogów: <br />';
echo '<ul>';
for($i=0; $i<count($blog) ;$i=$i+2){
    echo "<li> Autor: ".$blog[$i+1]." -> Nazwa bloga: <a href='blog.php?nazwa=".$blog[$i]."'>".$blog[$i]."</a></li>";
}
echo '</ul>';
?>



</body>