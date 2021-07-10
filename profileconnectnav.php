<?php
	session_start();

	$conn=mysqli_connect('localhost','wafotots','Franklinw1997','wafotots') or die(mysqli_error());

	$idc= $_SESSION['id'];


?>



<!DOCTYPE html>
<html lang="de">
<head>

	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/profilenav.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/unternav.css">
	<link rel="stylesheet" type="text/css" href="css/article.css">
	<link rel="stylesheet" type="text/css" href="css/profiletable.css">



	
</head>
<body>

	<!--Header-->

	<header class="header" role="header">
		<div class="inner">
			<div class="m1-left" >
				<a href="profileconnect.php?action=index" title="Zurück zu Startseite" >
					<img src="img/logoKFSport2.png" alt="logo" width="70" height="60"class="logo">
				</a>
			</div>
			<div class="m2-left">
				<h2 class="title">KFSport</h2>
			</div>
			<div class="m3-right">
				<form class="searchbox" action="search1.php" method="POST">
					<input type="search"  class=" input" name="suche" placeholder="Arktikel suchen">
					<button type="submit" name="button"><img src="img/loupe1.png" width="42" height="28"></button> 
				</form>
			
			</div>
		</div>
	</header>


	<nav class="menu" role="navigation">
		<div class="inner1">
			<div class="m1-center">
				<ul>
					<li class="a">
						<a href="damenconnect.php"><p>Damen</p></a>
					</li>
					<li class="a">
						<a href="herrenconnect.php"><p>Herren</p> </a>
					</li>
					<li class="a">
						<a href="profileconnect.php?action=kontakt"><p>Kontakt</p></a>
					</li>
					<li class="a">
						<a href="profileconnect.php?action=hilfe"><p>Hilfe ?</p></a>
					</li>
				</ul>
			</div>

			<div class="m2-right">
				<ul>
					<li class="b">
						<a title="<?php echo $_SESSION['user'];?>"  onclick="javascript: showmenu(document.getElementById('profilemenu'));" style="cursor: pointer;"><img class="h" src="img/profilx.png" alt="profil" width="26" height="27"></a>
					</li>
					<li class="b">
						<a href="warenkorb1.php" title="Ihr Warenkorb"><img src="img/cart.png" alt="wagen"width="20" height="27"></a>
					</li>
				</ul>
				
			</div>
		</div>
	</nav>

		<nav class="profilemenu" id="profilemenu" style="display: none;">
			<ul>
				<li>
					<center><a href="profileconnect.php?action=bestell">Meine Bestellung</a></center>
				</li>
				<li>
					<center><a href="profileconnect.php?action=edit">Bearbeiten</a></center>
				</li>
				<li>
					<center><a href="profileconnect.php?action=logout">Abmelden</a></center>
				</li>
			</ul>
		</nav>


	<?php

		if(isset($_GET['action'])){

			 if($_GET['action']=='kontakt'){

				include 'kontaktc.php';

			}else if($_GET['action']=='hilfe'){

				include'hilfec.php';


			}else if($_GET['action']=='logout'){

				session_destroy();
				header('location:profile.php');


			}else if($_GET['action']=='edit'){


				$id = $_SESSION['id'];

				$sql = "SELECT * FROM KundeKF , User, Telefonnummer_Kunde WHERE KundeKF.NutzerID=User.UserID AND KundeID = $id AND KundeKF.Kontakt = Telefonnummer_Kunde.ID";
				$result1 = $conn->query($sql);
				$row2 = $result1->fetch_assoc();
						?>
						<br><br><br><br><br><br>
						<center>
						<div class="profile1">
						<table width="700" style="border:5px double black;">
							
							<tr>
								<td>
									<h3><?php echo $row2['Vorname']; echo '  '; echo $row2['Nachname'];?></h3>
									<p><?php echo $row2['Email']; ?></p>
									
								</td>

								<td>
									<center><a href="?action=bearbeiten&amp; id=<?php echo $row2['KundeID']; ?>"><img src="img/edit.png" width="30" height="30"></a></center>
								</td>
							</tr>

							<tr>
								<td>
									<h3>Password ändern</h3>
								</td>

								<td>
									<center><a href="?action=ändern&amp; id=<?php echo $row2['KundeID']; ?>"><img src="img/edit.png" width="30" height="30"></a></center>
								</td>
							</tr>

							<tr>
								<td>
									<h3>Benutzername ändern</h3>
								</td>

								<td>
									<center><a href="?action=change&amp; id=<?php echo $row2['KundeID']; ?>"><img src="img/edit.png" width="30" height="30"></a></center>
								</td>
							</tr>
						</table>
					</div>
				</center>
						<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

						<?php


			}else if ($_GET['action']=='bearbeiten') {

				$id = $_GET['id'];

				$select = "SELECT * FROM KundeKF , User, Telefonnummer_Kunde WHERE KundeKF.NutzerID=User.UserID AND KundeID = $id AND KundeKF.Kontakt = Telefonnummer_Kunde.ID";
				$result1 = $conn->query($select);
				$data = $result1->fetch_assoc();


				if(isset($_POST['speichern'])){

					$vorname=$_POST['vorname'];
					$nachname=$_POST['nachname'];
					$email=$_POST['email'];
					$nummer=$_POST['nummer'];
					$indik=$_POST['indik'];
					
					$req="UPDATE KundeKF , Telefonnummer_Kunde SET  Indikator='$indik', Nummer='$nummer'  WHERE KundeID=$id AND KundeKF.Kontakt = Telefonnummer_Kunde.ID ";
					$req2="UPDATE KundeKF , User SET  Email='$email'  WHERE KundeID=$id AND KundeKF.NutzerID = User.UserID ";
					$req3="UPDATE KundeKF SET Nachname='$nachname', Vorname='$vorname' WHERE KundeID=$id ";
					$res=mysqli_query($conn,$req);
					$res2=mysqli_query($conn,$req2);
					$res3=mysqli_query($conn,$req3);
					Header('location:profileconnect.php?action=edit');


					
				}

				?>
				<br><br><br><br><br>
				<center>
				<div class="bearbeiten">
					<form action="" method="post">
						<table width="500" style="border:5px double black;">

							<tr>
								<td>
									<label for="vorname"><p>Vorname:</p></label>
								</td>
								<td>
									<input type="text" name="vorname" id="vorname" value="<?php echo $data['Vorname'];?>">
								</td>
							</tr>

							<tr>
								<td>
									<label for="nachname"><p>Nachname:</p></label>
								</td>
								<td>
									<input type="text" name="nachname" id="nachname" value="<?php echo $data['Nachname'];?>">
								</td>
							</tr>

							<tr>
								<td>
									<label for="email"><p>Email:</p></label>
								</td>
								<td>
									<input type="email" name="email" id="email" value="<?php echo $data['Email'];?>">
								</td>
							</tr>

							<tr>
								<td>
									<label for="nummer"><p>Telefonnummer:</p></label>
								</td>
								<td>
									<input class="ink" type="text" name="indik" id="nummer" value="<?php echo $data['Indikator'];?>" size="2">
									<input class="num" type="tel" name="nummer" id="nummer" value="<?php echo $data['Nummer'];?>" size="13">
								</td>
							</tr>

							<tr>
								<td>
									
								</td>
								<td>
									<button type="submit" name="speichern">Speichern</button>
								</td>
							</tr>
							
						</table>
					</form>
				</div>
			</center>
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

				<?php

			}else if($_GET['action']== 'change'){

				$id = $_GET['id'];
				$select = "SELECT * FROM KundeKF , User, Telefonnummer_Kunde WHERE KundeKF.NutzerID=User.UserID AND KundeID = $id AND KundeKF.Kontakt = Telefonnummer_Kunde.ID";
				$result1 = $conn->query($select);
				$data = $result1->fetch_assoc();

				if(isset($_POST['speichern2'])){

					$user2 = $_POST['user2'];

					$req="UPDATE KundeKF , User SET  Benutzername='$user2'  WHERE KundeID=$id AND KundeKF.NutzerID = User.UserID ";
					$res=mysqli_query($conn,$req);
					
					header('location:profileconnect.php?action=edit');


				}


				?>
				<br><br><br><br><br><br><br><br>
				<center>
				<div class="bearbeiten">
					<form action="" method="post">
						<table width="500" style="border:5px double black;">

							<tr>
								<td>
									<label for="user"><p>Aktueller Benutzername:</p></label>
								</td>
								<td>
									<input type="text" name="user" id="user" value="<?php echo $data['Benutzername'];?>" >
								</td>
							</tr>

							<tr>
								<td>
									<label for="user2"><p>Neuer Benutzername:</p></label>
								</td>
								<td>
									<input type="text" name="user2" id="user2" required="required">
								</td>
							</tr>

							<tr>
								<td>
									
								</td>
								<td>
									<button type="submit" name="speichern2">Speichern</button>
								</td>
							</tr>
							
						</table>
					</form>
				</div>
			</center>
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


				<?php


			

			}else if($_GET['action'] == 'ändern'){

				$id=$_GET['id'];
				$$_SESSION['idk']=$id;

				$select = "SELECT * FROM KundeKF , User, Telefonnummer_Kunde WHERE KundeKF.NutzerID=User.UserID AND KundeID = $id AND KundeKF.Kontakt = Telefonnummer_Kunde.ID";
				$result1 = $conn->query($select);
				$data = $result1->fetch_assoc();

				if(isset($_POST['speichern1'])){

					$pass = $_POST['pass'];
					$pass2 = $_POST['pass2'];
					$pass3 = $_POST['pass3'];

					if($pass == $data['Password']){

						if($pass2 == $pass3){

							$req="UPDATE KundeKF , User SET  Password='$pass2'  WHERE KundeID=$id AND KundeKF.NutzerID = User.UserID  ";
							$res=mysqli_query($conn,$req);
					
							header('location:profileconnect.php?action=edit');


						}else{

							echo 'Die Password sind nicht gleich!!!';
						}

					}else{

						echo 'Password ist nicht korrekt!!!';
					}


				}

				?>
				<br><br><br><br><br><br><br><br>
				<center>
				<div class="bearbeiten">
					<form action="" method="post">
						<table width="500" style="border:5px double black;">

							<tr>
								<td>
									<label for="pass"><p>Aktuelles Password:</p></label>
								</td>
								<td>
									<input type="password" name="pass" id="pass" >
								</td>
							</tr>

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
									<button type="submit" name="speichern1">Speichern</button>
								</td>
							</tr>
							
						</table>
					</form>
				</div>
			</center>

				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

				<?php

				

			}else if($_GET['action']=='index'){

				include 'articleindex.php';

			}else if($_GET['action']=='bestell'){
				

					$sql = "SELECT * FROM Bestellung, Ist_für, Schuh WHERE Bestellung.BestellungID=Ist_für.BestellungID AND Bestellung.KundeID= $idc AND Ist_für.Schuhnr=Schuh.Schuhnr  ";
					$result = $conn->query($sql);

					if ($result->num_rows > 0  ) {
		    		// output data of each row


						?>
						<br><br><br><br><br>
						<center>
						<div>
							<table class="table"  width='1200' style="border:5px double black;">
		        					<tr class="tri">
		        						<td>        </td>
		        						<td>Schuhname</td>
		        						<td>Menge</td>
		        						<td>Preis</td>
		        						<td>Datum</td>
		        						<td> </td>
		        						
		        						
		        					</tr>
						<?php

		    			while($row = $result->fetch_assoc() ) {

		    				
		        			
		        			?>
		        			<tr class="class">
		        						<td>
									<img src="img/<?php echo $row['Schuhnr']; ?>.jpg" width="100" height="100"></td>
		        						<td ><P><?php echo $row["Schuhname"];?></P></td>
		        						<td ><P><?php echo $row["Menge"];?></P></td>
		        						<td ><P><?php echo $row["Preis"];?> €</P></td>
		        						<td ><P><?php echo $row["Datum"];?></P></td>
		        						<td width="90"><center><a href="?action=stoniert&amp; id=<?php echo $row['BestellungID']; ?>"><p class="sto">Stonieren</p></a></center></td>
			        					
			        				</tr>

			        				
		        			
		  
		        			<?php
		        				
		    			}

		    			?>
		    		</table>

		    		</div>
		    	</center>
		    	<br><br><br><br><br><br>
		    			<?php
					} else {

						?>
						<br><br><br><br><br><br>
						<center>
		   				 <h1 style="color:red;">Sie haben keine Bestellung!!!</h1>
		   				</center>
		   				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

		   				 <?php
					}

					

			}else if($_GET['action']=='stoniert'){

				$kid=$_GET['id'];
				$_SESSION['bid']=$kid;

				$select = "SELECT * FROM Bestellung ,Ist_für, Schuh WHERE Bestellung.BestellungID=Ist_für.BestellungID AND Ist_für.BestellungID=$kid AND Schuh.Schuhnr= Ist_für.Schuhnr";
				$result = $conn->query($select);
				

			if ($result->num_rows > 0  ) {
    		// output data of each row

				?>
					<br><br><br><br><br><br>
					<center>
						<div>
							<form method="post" action="">
							<table class="table"  width='1200' style="border:5px double black;">
		        					<tr class="tri">
		        						<td>        </td>
		        						<td>Schuhname</td>
		        						<td>Menge</td>
		        						<td>Preis</td>
		        						
		        						
		        					</tr>
						<?php

		    			while($row = $result->fetch_assoc() ) {

		    				$_SESSION['betrag'] = $row['Betrag'];

		    				
		        			
		        			?>
		        			<tr class="class">
		        						<td>
									<img src="img/<?php echo $row['Schuhnr']; ?>.jpg" width="100" height="100"></td>
		        						<td ><P><?php echo $row["Schuhname"];?></P></td>
		        						<td ><P><?php echo $row["Menge"];?></P></td>
		        						<td ><P><?php echo $row["Preis"];?> €</P></td>
			        					
			        				</tr>

			        				
		        			
		  
		        			<?php
		        				
		    			}

		    			?>

		    			<tr class=" class betra">
		    				
		    				<td>
		    					<label for="betrag">Betrag:</label>
		    				</td>
		    				<td>
		    					<p><?php echo $_SESSION['betrag'];?> €</p>
		    				</td>
		    				<td>
		    					
		    				</td>
		    				<td>
		    					
		    				</td>
		    			</tr>

		    			<tr class=" class dater">
		    				<td>
		    					<label for="date">Datum:</label>
		    				</td>
		    				<td>
				
								<input type="date" name="date" id="date" value="<?php echo date("Y-m-d");?>" required="required"><br><br>
		    				</td>
		    				<td>
		    					
		    				</td>
		    				<td>
		    					
		    				</td>
		    			</tr>

		    			<tr class="butt">
		    				<td>
		    					<button type="submit" name="storniert">Stornierung absenden</button>
		    				</td>
		    			</tr>

		    		</table>
		    		</form>

		    		</div>
		    	</center>
		    	<br><br><br><br><br>


		    			<?php
					} else {
						?>
		   				 	<br><br><br><br><br><br>
						<center>
		   				 <h1 style="color:red;">Sie haben keine Stornierung!!!</h1>
		   				</center>
		   				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

		   				<?php
					}

			}
			
		}

		if(isset($_POST['storniert'])){
			$kid1=$_SESSION['id'];
			$bid=$_SESSION['bid'];
			$date1=$_POST['date'];

			$req="INSERT INTO Storniert (KundeID, BestellungID, Datum) values ((SELECT KundeID FROM KundeKF WHERE KundeID= '$kid1'),(SELECT BestellungID FROM Bestellung WHERE BestellungID= '$bid'), '$date1')";
			$res=mysqli_query($conn,$req);

			
			echo'<center><p style=" color:red; font-size:20px;">Ihre Bestellung wird so bald wie möglich stoniert!!!</p></center><br><br><br><br><br><br>';
			echo'';
			

		}

			
		

		if(isset($_GET['marke'])){

			$marke=$_GET['marke'];

			$sql = "SELECT * FROM Schuh WHERE MarkeID = $marke ";
			$result = $conn->query($sql);
			echo'<br><br><br><br><br><br>';

			if ($result->num_rows > 0) {
    		// output data of each row
    			while($row = $result->fetch_assoc()) {

    				?>

    				<div class="article">
    					<div class="entity">
	    					<a href="?show=<?php echo $row['Schuhnr']; ?>"><img class="schuh10" src="img/<?php echo $row['Schuhnr'];?>.jpg" width="300" height="300"></a>
		    				<a href="?show=<?php echo $row['Schuhnr']; ?>"><h3><?php echo $row['Schuhname'];?></h3></a>
		    				<h3>Preis: <?php echo number_format($row['Preis'],2,',',' ');?> €</h3>
		    				<h3>Größe: <?php echo $row['Groesse'];?></h3>
		
		    			</div>
	    			</div>
    			<?php
    			}

			} else {
   				 echo "0 results";
			}
		}

		if(isset($_GET['show'])){

			$schuh=$_GET['show'];

			$sql = "SELECT * FROM Schuh WHERE Schuhnr = $schuh ";
			
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
    		// output data of each row
    			while($row = $result->fetch_assoc()) {

    				?>
 
	    				<div class="article">
	    					<div class="entity">
		    				<img class="schuh10" src="img/<?php echo $row['Schuhnr'];?>.jpg" width="400" height="360">
		    				<h3><?php echo $row['Schuhname'];?></h3>
		    				<h3>Preis: <?php echo number_format($row['Preis'],2,',',' ');?> €</h3>
		    				<h3>Größe: <?php echo $row['Groesse'];?></h3>
		    				<?php if($row['Bestand']!=0){?><a class="korb" href="warenkorb1.php?action=add&amp;nr=<?php echo $row['Schuhnr'];?>&amp;s=<?php echo $row['Schuhname'];?>&amp;p=<?php echo $row['Preis'];?>&amp;m=1&amp;g=<?php echo $row['Groesse'];?>"><p>In Warenkorb legen</p></a><?php }else{ echo'<h4 style="color:red;">Ausverkauft!</h4>';}?>
			    			</div>
		    			</div>
    			<?php
    			}

			} else {
   				 echo "0 results";
			}
		}
	?>


</body>

<script type="text/javascript">
	  function showmenu(menu) {
    if (menu.style.display == 'none') menu.style.display = 'block';
    else menu.style.display = 'none';
    }
</script>
</html>