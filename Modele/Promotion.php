<?php
	
	/* Renvoie tout les eleves de la promo entré en paramètre qui ont répondu à au moin un groupe de proposition*/
	function Obtenir_reponses_promo($numPromo)
	{
		/*Préconditions : 	- $numPromo : l'id d'une promo
		Selectionne tous les utilisateurs d'une promotion ayant répondus à une question et les renvoie
		*/

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

		/*Préconditions : 	- 
		Selectionne tous les utilisateurs ayant répondus à une question et les renvoie
		*/

		//connexion a la Base de donnée
		require_once("BD_connexion.php");
 		$bd=connexion();

		

		$req = $bd->prepare('SELECT DISTINCT NumUser from repondre');
		$req->execute();

		$reponses = $req->fetchAll();
		return $reponses;
	}

	// Verifie à quel promo correspond le code entré en paramètre
	function Correspondance_promo_code($codepromo)
	{
		/*Préconditions : 	- $codePromo : le code d'une promotion
		Selectionne toutes les promotions dont le code est $codepromo et les renvoie
		*/

		require_once("BD_connexion.php");
 		$bd=connexion();

 		$req = $bd->prepare('SELECT NumPromo from promotion WHERE CodePromo=:codepromo');
 		$req->bindParam(':codepromo', $codepromo);
		$req->execute();

		$numpromo = $req->fetch();
		return $numpromo;
	}

	// Creation d'un promotion
	function Creer_promo($nompromo,$annee,$codepromo)
	{
		/*Préconditions : 	- $nomPromo : le nom d'une promotion
							- $annee : l'entier correspondant à l'annee de la promotion
							- $codepromo : le mot de passe de la promotion
		Ajoute une promotion à la bdd avec nomPromo = $nomPromo, annee = $annee, codepromo = $codepromo
		*/

		require_once("BD_connexion.php");
 		$bd=connexion();

 		$req = $bd->prepare("INSERT INTO promotion(NomPromo, AnneePromo, CodePromo,OuverturePromo) VALUES (?,?,?,?)");
		$req->execute(array ($nompromo,$annee,$codepromo,0));
		

		
	}
	// Fonction permettant de verifier la presence du code dans la bd
	function Verif_presence_codepromo($codepromo)
	{
		/*Préconditions : 	- $codepromo : le code d'une promotion
		Renvoie le nombre de promotions dont le code 
		*/

		require_once("BD_connexion.php");
 		$bd=connexion();

 		

		$req = $bd->prepare('SELECT COUNT(*) as cpt FROM promotion WHERE CodePromo=:codepromo');
		$req->execute(array(':codepromo' => $codepromo));
		$res=$req->fetch();

		//On compte le nombre de ligne pour constater la presence ou non du couple email+mdp dans la bd
		$nb =$res["cpt"];

		return $nb;
		
	}

	// Fonction qui va renvoyer les promos dont le nom commence par le mot clef
	function Obtenir_promos($motclef)
	{
		/*Préconditions : 	- $motclef : une string
		Renvoie toutes les promotions dont nomPromo = $motclef
		*/

		require_once("BD_connexion.php");
 		$bd=connexion();

 		

		$req = $bd->prepare('SELECT * FROM promotion WHERE NomPromo LIKE :motclef');
		$req->execute(array(':motclef' => $motclef . '%'));
		$res=$req->fetchAll();

		return $res;
	}

	// Permet d'obtenir le nombre de personne de la promo entré en paramètre qui ont répondu à au moins un groupe de réponse.
	function Obtenir_nombre_réponse($numpromo)
	{

		/*Préconditions : 	- $numpromo = l'id d'une promotion
		Renvoie le nombre d'utilisateurs d'une promotion ayant répondus à une question.
		*/

		require_once("BD_connexion.php");
 		$bd=connexion();

 		// recupere toute les personnes de la promo entré en paramètre qui ont répondu aux questionnaire
		$req = $bd->prepare('SELECT COUNT(DISTINCT rep.NumUser) as nb FROM repondre as rep, user as us WHERE us.NumPromo =:numpromo and us.NumUser =rep.NumUser ');

		$req->execute(array(':numpromo' => $numpromo));
		$res=$req->fetch();

		$nb_eleve = $res["nb"];
		return $nb_eleve;

	}

	function Etat($numpromo)
	{
		/*Préconditions : 	- $numpromo = l'id d'une promotion
		Renvoie un un entier correspondant l'etat d'une promotion
		*/

		require_once("BD_connexion.php");
 		$bd=connexion();

 		// recupere toute les personnes de la promo entré en paramètre qui ont répondu aux questionnaire
		$req = $bd->prepare('SELECT OuverturePromo FROM promotion  WHERE NumPromo =:numpromo ');

		$req->execute(array(':numpromo' => $numpromo));
		$res=$req->fetch();

		
		return $res;

	}

	function Modifier_etat($numpromo,$etat)
	{
		/*Préconditions : 	- $numpromo = l'id d'une promotion
							- $etat = un entier valant 0 ou 1 correspondant à l'etat d'une promotion
		Change l'etat de la promo $numpromo à $etat
		*/

		require_once("BD_connexion.php");
 		$bd=connexion();

 		if($etat == 1)
 		{
	 		$req = $bd->prepare("UPDATE promotion SET OuverturePromo=0 WHERE NumPromo=:numpromo");
	 		$req->execute(array (':numpromo' => $numpromo));
		}
	 	else
	 	{
	 		$req = $bd->prepare("UPDATE promotion SET OuverturePromo=1 WHERE NumPromo=:numpromo");
	 		$req->execute(array (':numpromo' => $numpromo));
	 	}

	}

	// Creation d'un promotion
	function Supprimer_promo($numpromo)
	{
		/*Préconditions : 	- $numpromo = l'id d'une promotion
		Supprime la promotion $numpromo de la base de donnees
		*/
		require_once("BD_connexion.php");
 		$bd=connexion();

 		$req = $bd->prepare("DELETE FROM promotion WHERE NumPromo =:numpromo");
		$req->execute(array (':numpromo' => $numpromo));
		

		
	}

	function Obtenir_info_promo($numpromo)
	{
		/*Préconditions : 	- $numpromo = l'id d'une promotion
		Renvoie la promotion $numpromo
		*/

		require_once("BD_connexion.php");
 		$bd=connexion();

 		$req = $bd->prepare('SELECT * FROM promotion  WHERE NumPromo =:numpromo ');

		$req->execute(array(':numpromo' => $numpromo));
		$res=$req->fetch();

		return $res;
	}

?>