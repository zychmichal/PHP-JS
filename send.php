<?php
$koncowe = $_POST["koncowe"];

$file=file('chat.txt');
$ile = count($file);
if($ile>5){
	unset($file[0]); //Usuwamy wskazaną linię z tablicy(pliku txt)
	$plik=fopen('chat.txt','w');  //Otwieramy plik
	fwrite($plik,join('',$file)); //Zapisujemy plik bez lini usunietej
	fclose($plik);
}

echo $ile;

$myfile = file_put_contents('chat.txt', $koncowe.PHP_EOL , FILE_APPEND | LOCK_EX);
?>