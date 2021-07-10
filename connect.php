 <!--Login administrator-->



	<?php
		
		session_start();
		$conn=mysqli_connect('localhost','wafotots','Franklinw1997','wafotots') or die(mysqli_error());
		
		require_once('header.php');

		if (isset($_POST['melden'])){
			$username =$_POST['username'];
			$password =$_POST['password'];
			$_SESSION['username']=$username;

			$sql = "SELECT * FROM Administrator";
			$result = $conn->query($sql);

			if($result->num_rows > 0 ){

				while($row = $result->fetch_assoc() ){

					if($row['Username']==$username&&$row['Password']==$password){

						
						header('location: admin.php');


					}else{

						

					}
			

				}

					?>
						<br><br><br><br>
						<center>
						<div>
						<h2>Falsche Identifikatoren</h2>
						<br><br>
						<a href="profileadmin.php" style=" color:blue; font-size: 18px; text-decoration: none;">Zurück zur Anmeldung</a>
						</div>
						</center>

						<?php		

			}else{

			
				echo"0 results";
				
			}
		}
		
	?>