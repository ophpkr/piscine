<?php
	
	/* Obtient toute les réponses de la promo entré en paramètre*/
	function Obtenir_reponses_promo($numPromo)
	{
		//connexion a la Base de donnée
		require_once("BD_connexion.php");
 		$bd=connexion();

		// recupere toute les personnes de la promo entré en paramètre qui ont répondu aux questionnaire
		$req = $bd->prepare('SELECT DISTINCT rep.NumUser FROM repondre as rep, user as us WHERE us.NumPromo =:numPromo and us.NumUser =rep.NumUser ');

		//$req = $bd->prepare('SELECT DISTINCT NumUser from user WHERE NumPromo =:numPromo ');

		$req->bindParam(':numPromo', $numPromo);
		$req->execute();

		$reponses = $req->fetchAll();
		return $reponses;
	}

	function Obtenir_user_repondre()
	{
		//connexion a la Base de donnée
		require_once("BD_connexion.php");
 		$bd=connexion();

		

		$req = $bd->prepare('SELECT DISTINCT NumUser from repondre');
		$req->execute();

		$reponses = $req->fetchAll();
		return $reponses;
	}

	function Correspondance_promo_code($codepromo)
	{
		require_once("BD_connexion.php");
 		$bd=connexion();

 		$req = $bd->prepare('SELECT NumPromo from promotion WHERE CodePromo=:codepromo');
 		$req->bindParam(':codepromo', $codepromo);
		$req->execute();

		$numpromo = $req->fetch();
		return $numpromo;
	}


?>