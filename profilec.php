<?php
	session_start();

	$conn=mysqli_connect('localhost','wafotots','Franklinw1997','wafotots') or die(mysqli_error());

	if(isset($_POST['melden'])){
		$user= $_POST['username'];
		$pass=$_POST['password'];
		

		$sql = "SELECT * FROM KundeKF , User, Telefonnummer_Kunde WHERE KundeKF.NutzerID=User.UserID  AND KundeKF.Kontakt = Telefonnummer_Kunde.ID";
		$result = $conn->query($sql);
		if ($result->num_rows > 0  ) {

			while($row = $result->fetch_assoc() ) {

				if($row['Benutzername']==$user && $row['Password']==$pass){
					$_SESSION['user']=$user;
					$_SESSION['id']= $row['KundeID'];
					$_SESSION['nachname']= $row['Nachname'];
					$_SESSION['vorname']= $row['Vorname'];
					$_SESSION['nummer']= $row['Nummer'];
					$_SESSION['email']=$row['Email'];
					$_SESSION['pass']=$row['Password'];
					$_SESSION['indikator']=$row['Indikator'];


					header('location: profileconnect.php?action=index');

				}else{
					
				}


			}

			?>

			<br><br>
			<center>
			<h2 style="color: red;">Falsches Passwort oder Falscher Benutzername !!!</h2>
			</center>

			<?php
		}else{

			echo '0 results';
		}
	}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/anmelden.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="wrapper">
	    <section class="login-container">
	        <div class="container2">
	          
	            <form action=" " method="POST">
	              <label for="username"><p>Benutzername:</p></label>
	                <input type="text" name="username" placeholder="Benutzername eingeben" id="username" required="required"/><br><br>
	              <label for="password"><p>Password:</p></label>
	                <input type="password" name="password" placeholder="Password eingeben" id="password" required="required"/><br><br>
	                <p></p>
	                <p>Password vergessen?  Klicken Sie <a class="vergiss" href="passwordzurücksetzen.php">Hier</a></p>
	                <p></p>
	                <button type="submit" class="btn" name="melden">Anmelden</button>
	            </form>
	            <p>Haben Sie noch keine Konto?</p>
	            <button class="btn1" type="submit"><a href="registrieren.php">Registrieren</a></button>
	        </div>
	    </section>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br>






