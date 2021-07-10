<!DOCTYPE html>
<html lang="de">
<head>
	<title>Neuheiten/Fila</title>
	<link rel="shortcut icon" href="img/logoKFSport2.png" type="image/x-icon">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/typ.css">
	<link rel="stylesheet" type="text/css" href="css/article.css">
	
</head>
<body>


	<?php
	require_once('header.php');
	require_once('nav.php');

			
	?>




				<?php

	$sql1 = "SELECT * FROM Schuh WHERE Kategorie= 'Herren' AND Status= 'Neuheiten' AND MarkeID= '4' ";
			$result1 = $conn->query($sql1);

			if ($result1->num_rows > 0) {
	    	// output data of each row
	    			while($row = $result1->fetch_assoc()) {

	    				?>
	    				
	    				<div class="article">
	    					<div class="entity">
		    				<img class="schuh10" src="img/<?php echo $row['Schuhnr'];?>.jpg" width="400" height="360">
		    				<h3><?php echo $row['Schuhname'];?></h3>
		    				<h3>Preis: <?php echo number_format($row['Preis'],2,',',' ');?> €</h3>
		    				<h3>Größe: <?php echo $row['Groesse'];?></h3>
		    				<?php if($row['Bestand']!=0){?><a class="korb" href="warenkorb.php?action=add&amp;nr=<?php echo $row['Schuhnr'];?>&amp;s=<?php echo $row['Schuhname'];?>&amp;p=<?php echo $row['Preis'];  ?>&amp;m=1&amp;g=<?php echo $row['Groesse'];?>"><p>In Warenkorb legen</p></a><?php }else{ echo'<h4 style="color:red;">Ausverkauft!</h4>';}?>
			    			</div>
		    			</div>

	    			<?php
	    			}

			} else {
   				 echo "0 results";
			}

	?>

<br><br><br><br><br>

	<?php

		
		require_once('footer.php');

	?>

</body>
</html>