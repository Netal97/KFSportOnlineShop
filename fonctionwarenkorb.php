<?php


	function createkorb(){

		if(!isset($_SESSION['korb'])){

			$_SESSION['korb']= array();
			$_SESSION['korb']['schuhnr']=array();
			$_SESSION['korb']['schuhname']=array();
			$_SESSION['korb']['preis']=array();
			$_SESSION['korb']['menge']=array();
			$_SESSION['korb']['groesse']=array();
			$_SESSION['korb']['close']=false;

		}

		return true;
	}

	function schuhanlegen($schuhnr,$schuhname,$preis,$menge,$groesse){

		if(createkorb() && !isclose()){

			$standschuh = array_search($schuhnr, $_SESSION['korb']['schuhnr']);

			if($standschuh !== false){

				$_SESSION['korb']['menge'][$standschuh] += $menge;

			}else{

				array_push($_SESSION['korb']['schuhnr'], $schuhnr);
				array_push($_SESSION['korb']['schuhname'], $schuhname);
				array_push($_SESSION['korb']['preis'], $preis);
				array_push($_SESSION['korb']['menge'], $menge);
				array_push($_SESSION['korb']['groesse'], $groesse);
			}
		}else{

			echo"Fehler wenden Sie sich bitte an den Administrator";
		}

	}


	function mengeändern($schuhnr,$menge){

		if(createkorb() && !isclose()){

			if($menge>0){

				for($i=0; $i< count($_SESSION['korb']['schuhnr']); $i++){
					if($schuhnr == $_SESSION['korb']['schuhnr'][$i]){

						$_SESSION['korb']['menge'][$i] = $menge;
					}

				}

				

					
				
			}else{

				deleteschuh($schuhnr);

			}
		}else{

			echo"Fehler wenden Sie sich bitte an den Administrator";
		}
	}


	function deleteschuh($schuhnr){

		if(createkorb() && !isclose()){

			
				$tmp = array();
				$tmp['schuhnr']= array();
				$tmp['schuhname']= array();
				$tmp['preis']= array();	
				$tmp['menge']= array();
				$tmp['groesse']= array();
				$tmp['close']= false;

				for($i=0; $i< count($_SESSION['korb']['schuhnr']); $i++){

					if($_SESSION['korb']['schuhnr'][$i] !== $schuhnr){

						array_push($tmp['schuhnr'], $_SESSION['korb']['schuhnr'][$i]);
						array_push($tmp['schuhname'], $_SESSION['korb']['schuhname'][$i]);
						array_push($tmp['preis'], $_SESSION['korb']['preis'][$i]);
						array_push($tmp['menge'], $_SESSION['korb']['menge'][$i]);
						array_push($tmp['groesse'],$_SESSION['korb']['groesse'][$i]);
					}

				}

				$_SESSION['korb']= $tmp;

				unset($tmp);
	


		}else{
			echo"Fehler wenden Sie sich bitte an den Administrator";
		}
	}

	function isclose(){

		if(isset($_SESSION['korb']) && $_SESSION['korb']['close']== true){
			return true;

		}else{
			return false;
		}
	}

	function deletekorb(){

		if(isset($_SESSION['korb'])){
			unset($_SESSION['korb']);
		}
		
	}


	function schuhzahlen($schuhnr){

		$zahlen= false;

		for($i=0; $i< count($_SESSION['korb']['schuhnr']); $i++){

			if($_SESSION['korb']['schuhnr'][$i] == $schuhnr)
        		$nombre = $_SESSION['korb']['menge'][$i]; 
		}

		return $nombre;
	}

	function betrag(){

		$betrag= 0;

		for($i=0; $i< count($_SESSION['korb']['schuhnr']); $i++){

			$betrag+=$_SESSION['korb']['menge'][$i]*$_SESSION['korb']['preis'][$i];
		}

		return $betrag;
	}

?>