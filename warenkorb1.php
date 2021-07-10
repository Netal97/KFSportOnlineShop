<!DOCTYPE html>
<html lang="de">
<head>
	<title>Warenkorb</title>
	<link rel="shortcut icon" href="img/logoKFSport2.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/warenkorb1.css">
	<meta charset="utf-8">
	
</head>
<body>
	<?php
	session_start();

	require_once('profileconnectnav.php');
	require_once('fonctionwarenkorb.php');


	$error= false;


	$action = (isset($_POST['action'])?$_POST['action']:(isset($_GET['action'])?$_GET['action']:null));

	if($action !==null){

		if(!in_array($action, array('add','delete','refresh')))

			$error= true;
			$nr = (isset($_POST['nr'])?$_POST['nr']:(isset($_GET['nr'])?$_GET['nr']:null));
			$s = (isset($_POST['s'])?$_POST['s']:(isset($_GET['s'])?$_GET['s']:null));
			$p = (isset($_POST['p'])?$_POST['p']:(isset($_GET['p'])?$_GET['p']:null));
			$m = (isset($_POST['m'])?$_POST['m']:(isset($_GET['m'])?$_GET['m']:null));
			$g = (isset($_POST['g'])?$_POST['g']:(isset($_GET['g'])?$_GET['g']:null));

			$nr = preg_replace('#\v#', ' ', $nr);
			$s = preg_replace('#\v#', ' ', $s);

			$p=floatval($p);
			

			if(is_array($m)){

				$menge = array();

				$i = 0;

				foreach($m as $contenu){

					$menge[$i++]= intval($contenu);
				}

			}else{

				$m = intval($m);
			}

			$g= intval($g);

	}

	if(!$error){

		switch ($action) {
			case "add":
				schuhanlegen($nr,$s,$p,$m,$g);
				break;

			case "delete":
				deleteschuh($nr);
				break;

			case "refresh":
				for($i=0; $i< count($menge); $i++){

					mengeändern($_SESSION['korb']['schuhnr'][$i], round($menge[$i]));
					

				}
				break;
			
			default:
				break;
		}
	}

	


	?>

	<br><br><br><br><br><br>
	<center>
	<div class="waren">
		<form method="post" action=" ">
			<table width="1100" style="border:5px double black;">
				

				<?php

					if(isset($_GET['deletekorb']) && $_GET['deletekorb'] == true){

						deletekorb();
					}

					if(createkorb()){

						$nbschuh= count($_SESSION['korb']['schuhnr']);


						if($nbschuh <= 0){

							?><p class="status" style="color:red; font-size: 35px;"><?php echo 'Ihr Warenkorb ist leer!!!';?></p><?php

						}else{
							$betrag=betrag();
							

							?>

							<tr class="titre">
					
								<td>     </td>
								<td>Name </td>
								<td>Preis</td>
								<td>Menge</td>
								<td>Größe</td>
								<td>     </td>
				
							</tr><?php

							for($i=0; $i< $nbschuh; $i++){

								?>

								<tr>
									
									<td>
									<img src="img/<?php echo $_SESSION['korb']['schuhnr'][$i]; ?>.jpg" width="100" height="100"></td>
									<td><?php echo $_SESSION['korb']['schuhname'][$i]; ?></td>
									<td><?php echo number_format($_SESSION['korb']['preis'][$i],2,',', ' '); ?> €</td>
									<td><input type="number" min="0" name="m[]" value="<?php echo $_SESSION['korb']['menge'][$i];?>" size="5">
										<input class="cl" type="submit"  value="Speichern"/>
										<input type="hidden" name="action" value="refresh"></td>
									<td><?php echo $_SESSION['korb']['groesse'][$i];?> </td>
									<td><center><a href="warenkorb1.php?action=delete&amp;nr=<?php echo rawurlencode($_SESSION['korb']['schuhnr'][$i]);?>"><img class="del" src="img/delete.png" width="30" height="30"></a></center></td>
								</tr>

								<?php
									}


								?>

								<tr class="betr">
									<td colspan="2"><p>Betrag: </p>
										
									</td>

									<td>
										<p><?php echo number_format($betrag ,2,',', ' '); ?> €</p>
									</td>
									<td>
										
									</td>
									<td>
										
									</td>
									<td>
										
									</td>
								</tr>

								<tr>
									<td></td>
									<td colspan="4">
										<?php if(isset($_SESSION['id'])){?><center><a href="bestellung.php?action=Bestellen&amp;id=<?php echo $_SESSION['id'];?>&amp;betrag=<?php echo $betrag; ?>"><p class="be">Bestellen</p></a></center><?php }else{?> <h4> Sie müssen angemeldet sein, um Ihre Bestellung zu bezahlen </h4><?php } ?>
										<center><a href="?deletekorb=true"><p class="ware">Warenkorb löschen</p></a></center>
									</td>
								</tr>


								<?php



						}
					}


				?>
				

			</table>

		</form>
	</div>
</center>

	


	<?php
	echo"<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
	require_once('footer.php');

	?>
</body>
</html>