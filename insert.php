

<?php

	session_start();

	$conn=mysqli_connect('localhost','wafotots','Franklinw1997','wafotots') or die(mysqli_error());

	if(isset($_POST['submit1'])){


		$schuhname=$_POST['schuhname'];
		$anzahl=$_POST['anzahl'];
		$preis=$_POST['preis'];
		$groesse=$_POST['groesse'];

		if(isset($_POST['marke'])){
			$choice= $_POST['marke'];
			$choice2= $_POST['schuhtyp'];
			$choice3=$_POST['kategorie'];
			$choice4=$_POST['status'];


			if($choice==1&&$choice2==1&&$choice3==1&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Damen','Sale','1','1', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==1&&$choice2==1&&$choice3==1&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Damen','Neuheiten','1','1', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==1&&$choice2==1&&$choice3==2&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Herren','Sale','1','1', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==1&&$choice2==1&&$choice3==2&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Herren','Neuheiten','1','1', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==1&&$choice2==2&&$choice3==1&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Damen','Sale','1','2', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==1&&$choice2==2&&$choice3==1&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Damen','Neuheiten','1','2', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==1&&$choice2==2&&$choice3==2&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Herren','Sale','1','2', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==1&&$choice2==2&&$choice3==2&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Herren','Neuheiten','1','2', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');


			}else if($choice==1&&$choice2==3&&$choice3==1&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Damen','Sale','1','3', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==1&&$choice2==3&&$choice3==1&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Damen','Neuheiten','1','3', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==1&&$choice2==3&&$choice3==2&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Herren','Sale','1','3', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==1&&$choice2==3&&$choice3==2&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Herren','Neuheiten','1','3', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==2&&$choice2==1&&$choice3==1&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Damen','Sale','2','1', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==2&&$choice2==1&&$choice3==1&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Damen','Neuheiten','2','1', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==2&&$choice2==1&&$choice3==2&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Herren','Sale','2','1', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==2&&$choice2==1&&$choice3==2&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Herren','Neuheiten','2','1', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==2&&$choice2==2&&$choice3==1&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Damen','Sale','2','2', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==2&&$choice2==2&&$choice3==1&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Damen','Neuheiten','2','2', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==2&&$choice2==2&&$choice3==2&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Herren','Sale','2','2', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==2&&$choice2==2&&$choice3==2&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Herren','Neuheiten','2','2', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');


			}else if($choice==2&&$choice2==3&&$choice3==1&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Damen','Sale','2','3', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');


			}else if($choice==2&&$choice2==3&&$choice3==1&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Damen','Neuheiten','2','3', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');


			}else if($choice==2&&$choice2==3&&$choice3==2&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Herren','Sale','2','3', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');


			}else if($choice==2&&$choice2==3&&$choice3==2&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Herren','Neuheiten','2','3', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');


			}else if($choice==3&&$choice2==1&&$choice3==1&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Damen','Sale','3','1', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==3&&$choice2==1&&$choice3==1&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Damen','Neuheiten','3','1', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==3&&$choice2==1&&$choice3==2&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Herren','Sale','3','1', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==3&&$choice2==1&&$choice3==2&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname,Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Herren','Neuheiten','3','1', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');


			}else if($choice==3&&$choice2==2&&$choice3==1&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname', 'Damen','Sale','3','2', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==3&&$choice2==2&&$choice3==1&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname', 'Damen','Neuheiten','3','2', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==3&&$choice2==2&&$choice3==2&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname', 'Herren','Sale','3','2', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==3&&$choice2==2&&$choice3==2&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname', 'Herren','Neuheiten','3','2', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');


			}else if($choice==3&&$choice2==3&&$choice3==1&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname', 'Damen','Sale','3','3', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==3&&$choice2==3&&$choice3==1&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname', 'Damen','Neuheiten','3','3', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==3&&$choice2==3&&$choice3==2&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname', 'Herren','Sale','3','3', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==3&&$choice2==3&&$choice3==2&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname', 'Herren','Neuheiten','3','3', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');


			}else if($choice==4&&$choice2==1&&$choice3==1&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Damen','Sale','4','1', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==4&&$choice2==1&&$choice3==1&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Damen','Neuheiten','4','1', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==4&&$choice2==1&&$choice3==2&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Herren','Sale','4','1', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==4&&$choice2==1&&$choice3==2&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname','Herren','Neuheiten','4','1', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');


			}else if($choice==4&&$choice2==2&&$choice3==1&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname', 'Damen','Sale','4','2', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==4&&$choice2==2&&$choice3==1&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname', 'Damen','Neuheiten','4','2', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==4&&$choice2==2&&$choice3==2&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname', 'Herren','Sale','4','2', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==4&&$choice2==2&&$choice3==2&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname', 'Herren','Neuheiten','4','2', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');
			}else if($choice==4&&$choice2==3&&$choice3==1&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname', 'Damen','Sale','4','3', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==4&&$choice2==3&&$choice3==1&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname', 'Damen','Neuheiten','4','3', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==4&&$choice2==3&&$choice3==2&&$choice4==1){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname', 'Herren','Sale','4','3', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');

			}else if($choice==4&&$choice2==3&&$choice3==2&&$choice4==2){
				$req="INSERT INTO Schuh (Schuhname, Kategorie, Status, MarkeID, Schuh_TypID, Bestand, Preis, Groesse) values ('$schuhname', 'Herren','Neuheiten','4','3', '$anzahl', '$preis', '$groesse')";
				$res=mysqli_query($conn,$req);
				header('location:admin.php');
			}

			
		}

		
		
	}



	

	?>