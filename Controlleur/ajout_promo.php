<?php

require('../Modele/Promotion.php');


if( (!empty($_POST['nom'])) && (!empty($_POST['annee'])) && (!empty($_POST['codepromo'])) && (!empty($_COOKIE['admin'])))
{

	$nompromo= htmlentities($_POST['nom']);
	$annee= htmlentities($_POST['annee']);
	$codepromo= htmlentities($_POST['codepromo']);
	
	//verifier si le code de la promo n'est pas deja présent en bd
	$presence = Verif_presence_codepromo($codepromo);


	// Si le code de la promo entré est deja en bd
	if($presence!=0)
	{	
				$msg ="Le code promo est deja utilisé ";
		   		header("location:../Vue/homepage_admin.php?fail=" .$msg);
			 	  
	}

	// Si le mdp n'est pas en bd on peux creer la promo
	Creer_promo($nompromo,$annee,$codepromo);

		$msg ="La promo a été ajouté avec succès ";
		header("location:../Vue/homepage_admin.php?reussi=" .$msg);
		 

}
?>
