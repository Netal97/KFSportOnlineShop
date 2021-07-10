
<?php
	session_start();
	$conn=mysqli_connect('localhost','wafotots','Franklinw1997','wafotots') or die(mysqli_error());
	require_once('header.php');
?>

<title>Anmelden-Administrator</title>
<link rel="shortcut icon" href="img/logoKFSport2.png" type="image/x-icon">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/anmelden.css">
<link rel="stylesheet" type="text/css" href="css/style.css">


<div class="wrapper">
	    <section class="login-container">
	        <div class="container2">
	          
	            <form action="connect.php" method="POST">
	              <label for="username"><p>Benutzername:</p></label>
	                <input type="text" name="username" placeholder="Benutzername eingeben" id="username" required="required"/><br><br>
	              <label for="password"><p>Password:</p></label>
	                <input type="password" name="password" placeholder="Password eingeben" id="password" required="required"/><br><br>
	                <p></p>
	                <br><br>
	                <button type="submit" class="btn" name="melden">Anmelden</button>
	            </form>
	        </div>
	    </section>
</div>


