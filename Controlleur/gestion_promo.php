<?php 
require('../Modele/Promotion.php');

	// Si on a reçu le numpromo et que le cookie de l'admin est tjr actif
	if(isset($_GET["numpromo"]) and isset($_COOKIE["admin"]))
	{
		$numpromo = htmlentities($_GET["numpromo"]);

		$etat= Etat($numpromo);
		$etat = $etat["OuverturePromo"];

		
		//Modification de l'etat de la promo:
			// - Passe a ouvert si elle était fermé
			// - Passe a fermé si elle etait ouverte
		Modifier_etat($numpromo,$etat);


		header('Location: ../Vue/gestion_promo.php');
	}

	// Si on a reçu la variable delpromo c'est qu'on nous demande de supprimer la promo
	else if(isset($_GET["delpromo"]) and isset($_COOKIE["admin"]))
	{
		$numpromo = $_GET["delpromo"];

		//suppression de la promo
		Supprimer_promo($numpromo);


		header('Location: ../Vue/gestion_promo.php');
	}
	else
	{
		header('Location: ../Vue/gestion_promo.php');
	}
?>
