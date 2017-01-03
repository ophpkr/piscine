<?php
	try{
		$bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u727526629_pi;charset=utf8','u727526629_vince','chnenef83140');
	}
	catch(Exception $e){
		die('Erreur'. $e->getMessage());
	}
	$i=1;
	while($i<13){
		echo '<div class=question>';
		$query='SELECT NumProp,ContenuProp FROM proposition WHERE NumGroupe=$i';
		foreach($bdd->query($query) as $donnees){
			$num=($donnees['NumProp'])%(6*$i);
			if($num==0){
				$num='F';
			}
			elseif($num==1){
				$num='A';
			}
			elseif($num==2){
				$num='B';
			}
			elseif($num==3){
				$num='C';
			}
			elseif($num==4){
				$num='D';
			}
			else{
				$num='E';
			}
			echo '<p>$num  $donnees["ContenuProp"]</p>';
		}
		echo '</div>';
	}