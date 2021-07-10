<?php

session_start();
$conn=mysqli_connect('localhost','wafotots','Franklinw1997','wafotots') or die(mysqli_error());
if(isset($_SESSION['username'])){


}else{
	header('location: index.php');
}

	include 'header.php';
?>


<!DOCTYPE html>
<html lang="de">
<head>

	<meta charset="utf-8">
	<title>KFSport</title>
	<link rel="shortcut icon" href="img/logoKFSport2.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	
</head>
<body>
	<nav class="admin1">
		<h1 class="admin"><img src="img/admin.png" width="30" height="25"> Website-Verwaltung, <?php echo $_SESSION['username'];?></h1>
		<h1 class="logout"><a href="?action=logout">Abmelden</a></h1>
	</nav>


	<div class="champ">

		<ul>
			<li><center><a href="?action=add"><p><img src="img/administrator.png" width="20" height="20">Schuhe anlegen</p></a></center></li>
			<li><center><a href="?action=modifyanddelete"><p><img src="img/administrator.png" width="20" height="20">Schuhe bearbeiten</p></a></center></li>
			<li><center><a href="?action=printandcancel"><p><img src="img/administrator.png" width="20" height="20">Auftrag bearbeiten </p></a></center></li>
			<li><center><a href="?action=storniert"><p><img src="img/administrator.png" width="20" height="20">Stornierung validieren</p></a></center></li>
		</ul>
	</div>

	<br><br>
</body>
</html>



<?php
	

	if(isset($_GET['action'])){
	if($_GET['action'] =='add'){



	?>
	<div class="anlegen">
		<form class="form" action="insert.php" method="post" enctype="multipart/form-data">
			<label id="schuhname"><p>Schuhname:</p></label>
			<input type="text" name="schuhname" id="schuhname" required="required">
			<label id="marke"><p>Marke:</p></label>
			<select name="marke" id="marke" required="required">
  				<option value="1">Adidas</option>
  				<option value="2" >Nike</option>
  				<option value="3">Puma</option>
 			 	<option value="4" >Fila</option>
			</select>
			<label id="schuhtyp"><p>Schuh_Typ:</p></label>
			<select name="schuhtyp" id="schuhtyp" required="required">
  				<option value="1" >Sneaker</option>
  				<option value="2" >Sandale</option>
  				<option value="3" >Sportschuh</option>
			</select>
			<label id="kategorie"><p>Kategorie:</p></label>
			<select name="kategorie" id="kategorie" required="required">
  				<option value="1" >Damen</option>
  				<option value="2" >Herren</option>
			</select>
			<label id="status"><p>Status:</p></label>
			<select name="status" id="status" required="required">
  				<option value="1" >Sale</option>
  				<option value="2" >Neuheiten</option>
			</select>
			<label id="anzahl"><p>Bestand:</p></label>
			<input type="number" name="anzahl" id="anzahl" required="required">
			<label id="preis"><p>Preis:</p></label>
			<input type="text" name="preis" id="preis" required="required">
			<label id="groesse"><p>Größe:</p></label>
			<input type="number" name="groesse" id="groesse" required="required"><br><br><br>
			<!--<label for="img"><p>Bild:</p></label>
			<input type="file" name="img" id="img"><br><br><br>-->
			<center><button type="submit" name="submit1"><p>Anlegen</p></button></center>

			
			
		</form>
	</div>



	<?php

		

		}else if($_GET['action'] =='modifyanddelete'){

			
			$sql = "SELECT * FROM Schuh, Marke , Schuh_Typ  WHERE Schuh.MarkeID=Marke.MarkeID AND Schuh.Schuh_TypID=Schuh_Typ.Schuh_TypID ORDER BY Schuhnr";
			$result = $conn->query($sql);

		
			if ($result->num_rows > 0  ) {
    		// output data of each row


				?>
		
	        		
				
				<table class="table"  width='1200'>
        					<tr>
        						<th class="schuhnr">Schuhnr</th>
        						<th>Schuhname</th>
        						<th>Kategorie</th>
        						<th>Status</th>
        						<th>Marke</th>
        						<th>Schuh_Typ</th>
        						<th>Anzahl</th>
        						<th>Preis</th>
        						<th>Größe</th>
        						<th>Ändern</th>
        						<th>Löschen</th>
        					</tr>

				<?php

    			while($row = $result->fetch_assoc() ) {


        			
        			?>
        				
   
        				
        				
        					<tr>
        						<td class="td" width="80"><P><?php echo $row["Schuhnr"];?></P></td>
        						<td class="td" width="300"><P><?php echo $row["Schuhname"];?></P></td>
        						<td class="td" width="100"><P><?php echo $row["Kategorie"];?></P></td>
        						<td class="td" width="100"><P><?php echo $row["Status"];?></P></td>
        						<td class="td" width="100"><P><?php echo $row["MarkeName"];?></P></td>
        						<td class="td" width="100"><P><?php echo $row["Schuh_TypName"];?></P></td>
        						<td class="td" width="100"><P><?php echo $row["Bestand"];?></P></td>
        						<td class="td" width="100"><P><?php echo $row["Preis"];?> €</P></td>
        						<td class="td" width="90"><P><?php echo $row["Groesse"];?></P></td>
        					
        						<td width="90"><center><a href="?action=modify&amp; Schuhnr=<?php echo $row['Schuhnr']; ?>"><img src="img/edit.png" width="30" height="30"></a></center></td>
  
	        					<td width="90"><center><a href="?action=delete&amp; Schuhnr=<?php echo $row['Schuhnr']; ?>"><img src="img/delete.png" width="30" height="30"></a></center></td>
	        				</tr>

	        			
        			

        			<?php
        		
        				
    			}

    		
    			?>

    			</table>



    			<?php

			} else {
   				 echo "0 results";
			}

			$conn->close();
            
	

		}else if($_GET['action'] =='delete'){

			$id=$_GET['Schuhnr'];

			$sql = "DELETE FROM Schuh WHERE Schuhnr=$id";
			$result = $conn->query($sql);
			header('location:admin.php?action=modifyanddelete');

		}else if($_GET['action']=='logout'){

			session_destroy();
			header('location: profileadmin.php');
			



		}else if($_GET['action']=='modify'){

			

			$id1=$_GET['Schuhnr'];
			$_SESSION['id']= $id1;

			$select = "SELECT * FROM Schuh NATURAL JOIN Marke NATURAL JOIN Schuh_Typ WHERE Schuhnr=$id1";
			$result1 = $conn->query($select);
			$data = $result1->fetch_assoc();


			if(isset($_POST['submit2'])){
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
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Sale', MarkeID='1', Schuh_TypID='1', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==1&&$choice2==1&&$choice3==1&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Neuheiten', MarkeID='1', Schuh_TypID='1', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==1&&$choice2==1&&$choice3==2&&$choice4==1){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Sale', MarkeID='1', Schuh_TypID='1', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==1&&$choice2==1&&$choice3==2&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Neuheiten', MarkeID='1', Schuh_TypID='1', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==1&&$choice2==2&&$choice3==1&&$choice4==1){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Sale', MarkeID='1', Schuh_TypID='2', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==1&&$choice2==2&&$choice3==1&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Neuheiten', MarkeID='1', Schuh_TypID='2', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==1&&$choice2==2&&$choice3==2&&$choice4==1){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Sale', MarkeID='1', Schuh_TypID='2', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==1&&$choice2==2&&$choice3==2&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Neuheiten', MarkeID='1', Schuh_TypID='2', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');


				}else if($choice==1&&$choice2==3&&$choice3==1&&$choice4==1){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Sale', MarkeID='1', Schuh_TypID='3', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==1&&$choice2==3&&$choice3==1&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Neuheiten', MarkeID='1', Schuh_TypID='3', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==1&&$choice2==3&&$choice3==2&&$choice4==1){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Sale', MarkeID='1', Schuh_TypID='3', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==1&&$choice2==3&&$choice3==2&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Neuheiten', MarkeID='1', Schuh_TypID='3', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==2&&$choice2==1&&$choice3==1&&$choice4==1){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Sale', MarkeID='2', Schuh_TypID='1', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==2&&$choice2==1&&$choice3==1&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Neuheiten', MarkeID='2', Schuh_TypID='1', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==2&&$choice2==1&&$choice3==2&&$choice4==1){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Sale', MarkeID='2', Schuh_TypID='1', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==2&&$choice2==1&&$choice3==2&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Neuheiten', MarkeID='2', Schuh_TypID='1', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==2&&$choice2==2&&$choice3==1&&$choice4==1){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Sale', MarkeID='2', Schuh_TypID='2', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==2&&$choice2==2&&$choice3==1&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Neuheiten', MarkeID='2', Schuh_TypID='2', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==2&&$choice2==2&&$choice3==2&&$choice4==1){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Sale', MarkeID='2', Schuh_TypID='2', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==2&&$choice2==2&&$choice3==2&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Neuheiten', MarkeID='2', Schuh_TypID='2', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');


				}else if($choice==2&&$choice2==3&&$choice3==1&&$choice4==1){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Sale', MarkeID='2', Schuh_TypID='3', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');


				}else if($choice==2&&$choice2==3&&$choice3==1&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Neuheiten', MarkeID='2', Schuh_TypID='3', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');


				}else if($choice==2&&$choice2==3&&$choice3==2&&$choice4==1){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Sale', MarkeID='2', Schuh_TypID='3', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');


				}else if($choice==2&&$choice2==3&&$choice3==2&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Neuheiten', MarkeID='2', Schuh_TypID='3', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');


				}else if($choice==3&&$choice2==1&&$choice3==1&&$choice4==1){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Sale', MarkeID='3', Schuh_TypID='1', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==3&&$choice2==1&&$choice3==1&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Neuheiten', MarkeID='3', Schuh_TypID='1', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==3&&$choice2==1&&$choice3==2&&$choice4==1){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Sale', MarkeID='3', Schuh_TypID='1', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==3&&$choice2==1&&$choice3==2&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Neuheiten', MarkeID='3', Schuh_TypID='1', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');


				}else if($choice==3&&$choice2==2&&$choice3==1&&$choice4==1){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Sale', MarkeID='3', Schuh_TypID='2', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==3&&$choice2==2&&$choice3==1&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Neuheiten', MarkeID='3', Schuh_TypID='2', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==3&&$choice2==2&&$choice3==2&&$choice4==1){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Sale', MarkeID='3', Schuh_TypID='2', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==3&&$choice2==2&&$choice3==2&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Neuheiten', MarkeID='3', Schuh_TypID='2', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');


				}else if($choice==3&&$choice2==3&&$choice3==1&&$choice4==1){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Sale', MarkeID='3', Schuh_TypID='3', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==3&&$choice2==3&&$choice3==1&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Neuheiten', MarkeID='3', Schuh_TypID='3', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==3&&$choice2==3&&$choice3==2&&$choice4==1){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Sale', MarkeID='3', Schuh_TypID='3', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==3&&$choice2==3&&$choice3==2&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Neuheiten', MarkeID='3', Schuh_TypID='3', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');


				}else if($choice==4&&$choice2==1&&$choice3==1&&$choice4==1){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Sale', MarkeID='4', Schuh_TypID='1', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==4&&$choice2==1&&$choice3==1&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Neuheiten', MarkeID='4', Schuh_TypID='1', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==4&&$choice2==1&&$choice3==2&&$choice4==1){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Sale', MarkeID='4', Schuh_TypID='1', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==4&&$choice2==1&&$choice3==2&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Neuheiten', MarkeID='4', Schuh_TypID='1', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');


				}else if($choice==4&&$choice2==2&&$choice3==1&&$choice4==1){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Sale', MarkeID='4', Schuh_TypID='2', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==4&&$choice2==2&&$choice3==1&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Neuheiten', MarkeID='4', Schuh_TypID='2', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==4&&$choice2==2&&$choice3==2&&$choice4==1){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Sale', MarkeID='4', Schuh_TypID='2', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==4&&$choice2==2&&$choice3==2&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Neuheiten', MarkeID='4', Schuh_TypID='2', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');
				}else if($choice==4&&$choice2==3&&$choice3==1&&$choice4==1){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Sale', MarkeID='4', Schuh_TypID='3', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==4&&$choice2==3&&$choice3==1&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Damen', Status='Neuheiten', MarkeID='4', Schuh_TypID='3', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==4&&$choice2==3&&$choice3==2&&$choice4==1){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Sale', MarkeID='4', Schuh_TypID='3', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');

				}else if($choice==4&&$choice2==3&&$choice3==2&&$choice4==2){
					$req="UPDATE Schuh SET Schuhname='$schuhname', Kategorie='Herren', Status='Neuheiten', MarkeID='4', Schuh_TypID='3', Bestand='$anzahl', Preis='$preis', Groesse='$groesse' WHERE Schuhnr=$id1 ";
					$res=mysqli_query($conn,$req);
					header('location:admin.php?action=modifyanddelete');
				}

				
			}
		}





			?>

		<div class="anlegen">
		<form class="form" action=" " method="post">
			<label id="schuhname"><p>Schuhname:</p></label>
			<input value="<?php echo $data['Schuhname'];?>" type="text" name="schuhname" id="schuhname" required="required">
			<label id="marke"><p>Marke:</p></label>
			<select name="marke" id="marke" required="required">

				
  				<option value="1">Adidas</option>
  				<option value="2" >Nike</option>
  				<option value="3">Puma</option>
 			 	<option value="4" >Fila</option>
 			 	
 			 	
			</select>
			<h4 class="kl" style="color:red;"><?php echo $data['MarkeName'];?></h4>
			
			<label id="schuhtyp"><p>Schuh_Typ:</p></label>
			<select name="schuhtyp" id="schuhtyp" required="required">

				
  				<option value="1" >Sneaker</option>
  				<option value="2" >Sandale</option>
  				<option value="3" >Sportschuh</option>
  				
  				
			</select>
			<h4 class="kl" style="color:red;"><?php echo $data['Schuh_TypName'];?></h4>

			<label id="kategorie"><p>Kategorie:</p></label>
			<select name="kategorie" id="kategorie" required="required" >

				
  				<option value="1" >Damen</option>
  				<option value="2" >Herren</option>
			</select>
			<h4 class="kl" style="color:red;"><?php echo $data['Kategorie'];?></h4>

			<label id="status"><p>Status:</p></label>
			<select name="status" id="status" required="required">

				
  				<option value="1" >Sale</option>
  				<option value="2" >Neuheiten</option>
			</select>
			<h4 class="kl" style="color:red;"><?php echo $data['Status'];?></h4>

			<label id="anzahl"><p>Bestand:</p></label>
			<input value="<?php echo $data['Bestand'];?>" type="number" name="anzahl" id="anzahl" required="required">
			<label id="preis"><p>Preis:</p></label>
			<input value="<?php echo $data['Preis'];?>" type="text" name="preis" id="preis" required="required">
			<label id="groesse"><p>Größe:</p></label>
			<input value="<?php echo $data['Groesse'];?>" type="number" name="groesse" id="groesse" required="required"><br><br>
			<center><button type="submit" name="submit2"><p>Ändern</p></button></center>

			
			
		</form>
	</div>

	<?php


		}else if($_GET['action']=='printandcancel'){

			$sql = "SELECT * FROM Bestellung, Ist_für, Schuh, KundeKF, Versandadresse, Ort WHERE Bestellung.BestellungID=Ist_für.BestellungID  AND Ist_für.Schuhnr=Schuh.Schuhnr AND Bestellung.KundeID=KundeKF.KundeID  AND Bestellung.VersandadresseID = Versandadresse.VersandadresseID AND Versandadresse.Postleitzahl=Ort.Postleitzahl";
					$result = $conn->query($sql);

					if ($result->num_rows > 0  ) {
		    		// output data of each row


						?>
						<div>
							<table class="table"  width='1200'>
		        					<tr>
		        						<th>Auftragnr</th>
		        						<th>Schuhname</th>
		        						<th>Menge</th>
		        						<th>Preis</th>
		        						<th>Datum</th>
		        						<th>Nachname</th>
		        						<th>Vorname</th>
		        						<th>Versandadresse</th>
		        						<th>Print</th>
		        						
		        						
		        						
		        						
		        					</tr>
						<?php

						

		    			while($row = $result->fetch_assoc() ) {

		
		        			
		        			?>
		        			<tr>
		        					
										<td width="70"><p><?php echo $row["BestellungID"];?></p></td>
		        						<td ><P><?php echo $row["Schuhname"];?></P></td>
		        						<td ><P><?php echo $row["Menge"];?></P></td>
		        						<td ><P><?php echo $row["Preis"];?> €</P></td>
		        						<td ><P><?php echo $row["Datum"];?></P></td>
		        						<td ><P><?php echo $row["Nachname"];?></P></td>
		        						<td ><P><?php echo $row["Vorname"];?></P></td>
		        						<td ><P><?php echo $row["Straße"];?> <?php echo $row["Hausnummer"];?> <?php echo $row["Postleitzahl"];?> <?php echo $row["Ort"];?></p></td>
		        						<td width="90"><center><a href="drucken.php?action=print&amp; id=<?php echo $row['BestellungID']; ?>&amp; kid=<?php echo $row['KundeID']; ?>" target="_blank"><img src="img/print.png" width="30"></a></center></td>
		        						
			        					
			        				</tr>
			        		

			        				
		        			
		  
		        			<?php
		        				
		    			}

		    			?>
		    		</table>

		    		</div>


		    			<?php
					} else {
		   				 echo "<center><p style='color:red; font-size:30px; font-weight: bold;'>Keine Auftrag vorhanden</p></center>";
					}

		}else if($_GET['action']=='storniert'){

			$sql = "SELECT * FROM Storniert, KundeKF, User, Telefonnummer_Kunde WHERE KundeKF.NutzerID=User.UserID AND Storniert.KundeID=KundeKF.KundeID AND KundeKF.Kontakt=Telefonnummer_Kunde.ID ";
					$result = $conn->query($sql);

					if ($result->num_rows > 0  ) {
		    		// output data of each row


						?>
						<div>
							<table class="table"  width='1200'>
		        					<tr>
		        						<th>Auftragnr</th>
		        						<th>Datum</th>
		        						<th>Nachname</th>
		        						<th>Vorname</th>
		        						<th>Kontakt</th>
		        						<th>Validierung</th>
		        						
		        						
		        						
		        					</tr>
						<?php

						

		    			while($row = $result->fetch_assoc() ) {

		
		        			
		        			?>
		        			<tr>
		        					
										<td><p><?php echo $row["BestellungID"];?></p></td>
		        						<td ><P><?php echo $row["Datum"];?></P></td>
		        						<td ><P><?php echo $row["Nachname"];?></P></td>
		        						<td ><P><?php echo $row["Vorname"];?></P></td>
		        						<td ><a href="mailto:<?php echo $row['Email'];?>"><p><?php echo $row["Email"];?></a>  ,<?php echo $row["Nummer"];?></p></td>
		        					
		        						<td><center><a href="?action=cancel&amp; id=<?php echo $row['BestellungID']; ?>"><img src="img/valide.png" width="33"></a></center></td>
			        					
			        				</tr>
			        		

			        				
		        			
		  
		        			<?php
		        				
		    			}

		    			?>
		    		</table>

		    		</div>


		    			<?php
					} else {

		   				 ?>
		   				 <center><h1 style="color:red;">keine Stornierung vorhanden</h1></center>

		   				 <?php
					}


		}else if($_GET['action']=='cancel'){

			$bid2=$_GET['id'];

			$sql = "SELECT * FROM Storniert, KundeKF, Schuh, Ist_für WHERE  Storniert.KundeID=KundeKF.KundeID AND Storniert.BestellungID=Ist_für.BestellungID AND Ist_für.Schuhnr=Schuh.Schuhnr AND Storniert.BestellungID=$bid2 ";
					$result = $conn->query($sql);

					if ($result->num_rows > 0  ) {
		    		// output data of each row


						?>
						<div>
							<form method="post" action=" ">
							<table class="table"  width='1200'>
		        					<tr>
		        						<th>Auftragnr</th>
		        						
		        						<th>Schuhname</th>
		        						<th>Menge</th>
		        						<th>Datum</th>
		        						<th>Kunde</th>
		        						
		        						
		        						
		        						
		        						
		        						
		        					</tr>
						<?php

						

		    			while($row = $result->fetch_assoc() ) {

		    				$_SESSION['bid3']=$row['BestellungID'];

		
		        			
		        			?>
		        			<tr>
		        					
										<td><p><?php echo $row["BestellungID"];?></p></td>
		        						<td ><P><input type="text" name="schuhnr[]" value="<?php echo $row['Schuhnr'];?>" size="2">  <?php echo $row["Schuhname"];?></P></td>
		        						<td ><p> </p><input type="number" name="menge1[]" value="<?php echo $row["Menge"];?>" required="required"></td>
		        						<td ><P><?php echo $row["Datum"];?></P></td>
		        						<td ><p><?php echo $row["Nachname"];?>  <?php echo $row["Vorname"];?></p></td>
		        					
		        		
			        					
			        				</tr>
			        		

			        				
		        			
		  
		        			<?php
		        				
		    			}

		    			?>
		    		</table>

		    		<br><br><br><br>

		    		<center><button class="btn10" type="submit" name="stornier">Bestellung stonieren</button></center>
		    	</form>


		    		</div>


		    			<?php
					} else {
		   				 echo "0 results";
					}


		}
}


if(isset($_POST['stornier'])){

	$menge1=$_POST['menge1'];
	$schuhnr=$_POST['schuhnr'];
	$bid3=$_SESSION['bid3'];

	$i = 0;
	while($i< count($_POST['menge1'])){

		

		$select1 = "SELECT Bestand FROM Schuh WHERE Schuhnr = $schuhnr[$i] ";
		$result2 = $conn->query($select1);
		$data1 = $result2->fetch_assoc();
		$bestand=$data1['Bestand'];

		$req5="UPDATE Schuh SET  Bestand=$bestand+$menge1[$i]  WHERE Schuhnr=$schuhnr[$i]  ";
		$res5=mysqli_query($conn,$req5);

		$i++;

	}


	$sql1 = "DELETE FROM Storniert WHERE BestellungID=$bid3";
	$result1 = $conn->query($sql1);

	$sql2 = "DELETE FROM Ist_für WHERE BestellungID=$bid3";
	$result2 = $conn->query($sql2);

	$sql3 = "DELETE FROM Bestellung WHERE BestellungID=$bid3";
	$result3 = $conn->query($sql3);

	header('Location:admin.php?action=storniert');

}
		

?>