
<title>Suche</title>
<link rel="shortcut icon" href="img/logoKFSport2.png" type="image/x-icon">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/article.css">

<?php
	include 'header.php';
	include 'nav.php';

?>

<?php

session_start();

	$conn=mysqli_connect('localhost','wafotots','Franklinw1997','wafotots') or die(mysqli_error());


	if(isset($_GET['button']) AND !empty($_GET['suche'])){

			$name = htmlspecialchars($_GET['suche']);


	}


	//$sql1 = "SELECT Schuhname FROM Schuh ORDER BY Schuhnr DESC ";
	$sql1 = "SELECT * FROM Schuh NATURAL JOIN Schuh_Typ NATURAL JOIN Marke WHERE Schuhname LIKE'%$name%' OR MarkeName LIKE'%$name%'  OR Schuh_TypName LIKE '%$name%' ORDER BY Schuhnr DESC ";
	$result1 = $conn->query($sql1);



?>


<br><br>

	<?php
	if ($result1->num_rows > 0) {
	    	// output data of each row
	    			while($row = $result1->fetch_assoc()) {

	    				?>

	    				<div class="article">
	    					<div class="entity">
		    				<img class="schuh10" src="img/<?php echo $row['Schuhnr'];?>.jpg" width="400" height="410">
		    				<h3><?php echo $row['Schuhname'];?></h3>
		    				<h3>Preis: <?php echo number_format($row['Preis'],2,',',' ');?> €</h3>
		    				<h3>Größe: <?php echo $row['Groesse'];?></h3>
		    				<?php if($row['Bestand']!=0){?><a class="korb" href="warenkorb.php?action=add&amp;nr=<?php echo $row['Schuhnr'];?>&amp;s=<?php echo $row['Schuhname'];?>&amp;p=<?php echo $row['Preis'];?>&amp;m=1&amp;g=<?php echo $row['Groesse'];?>"><p>In Warenkorb legen</p></a><?php }else{ echo'<h4 style="color:red;">Ausverkauft!</h4>';}?>
			    			</div>
		    			</div>
							
						
	    				

	    			<?php
	    			}

			} else {
   				 echo "<center><h1 style='color:red;'>Keine ".$name." wurde gefunden</h1></center>" ;
   				 echo"<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
			}
			

	?>

	<?php




	?>

	 				


<?php
		include 'footer.php';
			
	?>
	   