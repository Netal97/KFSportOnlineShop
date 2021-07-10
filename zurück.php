<?php
	session_start();
	
	if(isset($_SESSION['email'])){


	}else{
		header('passwordzurücksetzen.php');
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Password Zurücksetzen</title>
	<link rel="shortcut icon" href="img/logoKFSport2.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/anmelden.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<?php
	session_start();


	$conn=mysqli_connect('localhost','wafotots','Franklinw1997','wafotots') or die(mysqli_error());
	require_once('header.php');
	require_once('nav.php');

			
	?>

	<style type="text/css">
		.zurück tr td{

			font-weight: bolder;
			font-size: 20px;
		}

		.zurück input{

			padding: 7px;
			width: 100%;
		}

		.zurück button{

			width: 108%;
			text-transform: uppercase;

		}

		.zurück button:hover{

			background-color:#BEBEBE;
			
		}

	</style>

	<br><br><br><br><br><br><br><br><br><br>

	<center>
		<div class="zurück">
					<form action="" method="post">
						<table width="500">
							<tr>
								<td>
									<label for="pass2"><p>Neues Password:</p></label>
								</td>
								<td>
									<input type="password" name="pass2" id="pass2">
								</td>
							</tr>

							<tr>
								<td>
									<label for="pass3"><p>Password bestätigen:</p></label>
								</td>
								<td>
									<input type="password" name="pass3" id="pass3">
								</td>
							</tr>

							<tr>
								<td>
									
								</td>
								<td>
									<button type="submit" name="speichern1"><p>Zurücksetzen</p></button>
								</td>
							</tr>
							
						</table>
					</form>
				</div>
			</center>

			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<?php



		$conn=mysqli_connect('localhost','wafotots','Franklinw1997','wafotots') or die(mysqli_error());
	
		if(isset($_POST['speichern1'])){

			$id1=$_SESSION['id1'];

			$pass = $_POST['pass2'];
			$pass2 = $_POST['pass3'];



			if($pass == $pass2){

							$req="UPDATE User SET  Password='$pass'  WHERE UserID= $id1";
							$res=mysqli_query($conn,$req);
					
							header('location: profile.php');


						}else{

							echo 'Die Password sind nicht gleich!!!';
						}
		}

		
	?>




	<?php
		
		require_once('footer.php');

	?>

</body>
</html>