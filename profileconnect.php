<?php
	session_start();

	$conn=mysqli_connect('localhost','wafotots','Franklinw1997','wafotots') or die(mysqli_error());


	if(isset ($_SESSION['user'])){

	}else{
		header('location: index.php');
	}

?>





<?php
	include 'profileconnectnav.php';
	
	include 'footer.php';
			
?>


<!DOCTYPE html>
<html lang="de">
<head>

	<meta charset="utf-8">
	<title>KFSport</title>
	<link rel="shortcut icon" href="img/logoKFSport2.png" type="image/x-icon">
	
</head>
<body>


</body>
</html>