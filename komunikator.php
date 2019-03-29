<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
	<title>Komunikator</title>
	<script type="text/javascript" src="komunik.js"></script>
</head>

	<body onload="blok();">
	
	<?php
	include("menu.php");
	?>

		<h1> Komunikator! </h1>


		<br />
		<div id="aktywacja">Aktywacja komunikatora
		<input type="checkbox" name="aktyw" value="active" onclick="zmiana()"/></div>
		<div id="kom"><textarea name="komunikator" rows="20" cols="80"  readonly="readonly"></textarea>
		</div>
		<div id="trescKomunikatu">Treść:<br/>
		<input type="text" name="tresc" size="100" />
		</div>
		<div id="podpis">Podpis:<br/>
		<input type="text" name="podpis"/>
		</div> 					
		<div>
		<input type="button" name="wyslij" value="Wyślij" onclick="submitChat()"/>
		</div>
	

</body>