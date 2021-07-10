<?php
	session_start();

	$conn=mysqli_connect('localhost','wafotots','Franklinw1997','wafotots') or die(mysqli_error());
?>

<!DOCTYPE html>
<html lang="de">
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	
</head>
<body>

	<!--Header-->

	<header class="header" role="header">
		<div class="inner">
			<div class="m1-left" >
				<a href="index.php" title="Zurück zu Startseite" >
					<img src="img/logoKFSport2.png" alt="logo" width="70" height="60"class="logo">
				</a>
			</div>
			<div class="m2-left">
				<h2 class="title">KFSport</h2>
			</div>
			<div class="m3-right">
				<form class="searchbox" action="search.php" method="GET">
					<input type="search"  class=" input" name="suche" placeholder="Arktikel suchen">
					<button type="submit" name="button"><img src="img/loupe1.png" width="42" height="28"></button> 
				</form>
			
			</div>
		</div>
	</header>


</body>
</html>