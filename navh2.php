<?php
	session_start();
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/navh.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>


</head>
<body>

	<nav class="horizon">
		<ul>
			<li class="red"><?php if(isset($_SESSION['id'])){ ?><a href="saleherrenconnect.php"><p>Sale</p></a><?php }else{?><a href="saleherren.php"><p>Sale</p></a><?php } ?>
	
			</li>
			<li class="cyan"><?php if(isset($_SESSION['id'])){ ?><a href="neuheitenherrenconnect.php"><p>Neuheiten</p></a><?php }else{?><a href="neuheitenherren.php"><p>Neuheiten</p></a><?php } ?>
			</li>
		</ul>
	</nav>

</body>
</html>