
<?php
	session_start();
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/navh.css">
	
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>


</head>
<body>

	<nav class="horizon">
		<ul>
			<li class="red"><?php if(isset($_SESSION['id'])){ ?><a href="saledamenconnect.php"><p>Sale</p></a><?php }else{?><a href="saledamen.php"><p>Sale</p></a><?php } ?>
	
			</li>
			<li class="cyan"><?php if(isset($_SESSION['id'])){ ?><a href="neuheitendamenconnect.php"><p>Neuheiten</p></a><?php }else{?><a href="neuheitendamen.php"><p>Neuheiten</p></a><?php } ?>
	
			</li>
		</ul>
	</nav>

</body>
</html>