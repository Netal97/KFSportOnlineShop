<?php

	session_start();


	$conn=mysqli_connect('localhost','wafotots','Franklinw1997','wafotots') or die(mysqli_error());
	$name=$_POST['nachname'];
	$vname=$_POST['vorname'];
	$bname=$_POST['benutzername'];
	$indikator=$_POST['indikator'];
	$nummer=$_POST['nummer'];
	$email=$_POST['email'];
	$pwd=$_POST['password'];
	$pwd2=$_POST['password2'];
	$msg=$_POST['message'];

	if(isset($_POST['registrieren'])){
		if($pwd==$pwd2){

			if(isset($msg)){
						
			
				$req3="INSERT INTO User (Benutzername, Email, Password) values ('$bname','$email','$pwd')";
				$res3=mysqli_query($conn,$req3);
				$req2="INSERT INTO Telefonnummer_Kunde ( Indikator, Nummer) values ('$indikator', '$nummer')";
				$res2=mysqli_query($conn,$req2);

				$req5="INSERT INTO KundeKF (Nachname, Vorname, NutzerID ,Kontakt) values ('$name','$vname',(SELECT UserID FROM User WHERE Email='$email'),(SELECT ID FROM Telefonnummer_Kunde WHERE Nummer='$nummer'))";
				$res5=mysqli_query($conn,$req5);

				header('location:sucess.php');
			}else{
				echo'';
			}

		}else{
			echo'';
		}



	}

	
	
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/registrierung.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<body>
	
	<section class="gform">
		<div class="formular">
			<div class="titled"><p class="h1">Registrierung</p>
			</div>
			<form action=" " class="register" method="POST">
				<label for="vorname"><p>Vorname:</p></label>
				<input class="name" type="text" name="vorname" id="vorname" placeholder="Vorname eingeben" required="required">

				<label for="nachname"><p>Nachname:</p></label>
				<input class="name" type="text" name="nachname" id="nachname" placeholder="Nachname eingeben" required="required">

				<label for="benutzername"><p>Benutzername:</p></label>
				<input class="name" type="text" name="benutzername" id="benutzername" placeholder="Benutzername eingeben" required="required">

				<label for="email"><p>E-Mail:</p></label>
				<input class="name" type="email" name="email" id="email" placeholder="E-Mail eingeben" required="required">

				<label for="nummer"><p>Telefonnummer:</p></label>
				<center><input class="indik" type="text" name="indikator" id="nummer" placeholder="0049"  required="required">
				<input class="num" type="tel" name="nummer" id="nummer" placeholder="175-63523851" pattern="[0-9]{3}-[0-9]{8}" required="required"></center>

				<label for="passwd"><p>Password:</p></label>
				<input class="pass" type="password" name="password" id="passwd" placeholder="Password eingeben" required="required">

				<label for="passwd2"><p>Password wiederholen:</p></label>
				<input class="pass" type="password" name="password2" id="passwd2" placeholder="Password eingeben" required="required">

				<br><br>
				<input class="check" type="checkbox" name="message" id="message" required="required" checked="checked" >
				<label class="mss" for="message"><p>Ja, ich stimme den AGB und den Datenschutzbestimmungen<br> von KFSport sowie einer Bonitätsprüfung zu.*</p></label>
				<br><br><br>

				<button type="submit" name="registrieren"><p>Registrieren</p></button>
			</form>
		</div>
	</section>
	<br><br><br>

</body>

</html>