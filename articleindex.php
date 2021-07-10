<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/article.css">
</head>


<body>

	<?php
		session_start();

		$conn=mysqli_connect('localhost','wafotots','Franklinw1997','wafotots') or die(mysqli_error());



	?>


	<?php


		
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
		    				<img class="schuh11" src="img/<?php echo $row['Schuhnr'];?>.jpg" width="400" height="360">
		    				<h3><?php echo $row['Schuhname'];?></h3>
		    				<h3>Preis: <?php echo number_format($row['Preis'],2,',',' ');?> €</h3>
		    				<h3>Größe: <?php echo $row['Groesse'];?></h3>
		    				<?php if($row['Bestand']!=0){?><a class="korb" href="warenkorb.php?action=add&amp;nr=<?php echo $row['Schuhnr'];?>&amp;s=<?php echo $row['Schuhname'];?>&amp;p=<?php echo $row['Preis'];?>&amp;m=1&amp;g=<?php echo $row['Groesse'];?>"><p>In Warenkorb legen</p></a><?php }else{ echo'<h4 style="color:red;">Ausverkauft!</h4>';}?>
			    			</div>
		    			</div>
    			<?php
    			}

			} else {
   				 echo "0 results";
			}
			
		

		}else{

		if(isset($_GET['marke'])){

			$marke=$_GET['marke'];

			$sql = "SELECT * FROM Schuh WHERE MarkeID = $marke ";
			$result = $conn->query($sql);

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



		}else{



			$sql1 = "SELECT * FROM Marke";
			$result1 = $conn->query($sql1);

			if ($result1->num_rows > 0) {
	    	// output data of each row
	    			while($row1 = $result1->fetch_assoc()) {

	    				?>
	    				
	    				<div class="artic">
	    					<div class="entit">
	    						<center><a href="?marke=<?php echo $row1['MarkeID']?>">
	    						<img src="img/<?php echo $row1['MarkeID'];?>.jpg" width="360" height="320" class="marke1">
		    					<h3><?php echo $row1['MarkeName'];?></h3></a></center>
		    				</div>
		    				
		    			</div>

	    			<?php
	    			}

			} else {
   				 echo "0 results";
			}

		}



	}


	?>

</body>

</html>