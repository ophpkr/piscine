<?php
	
	/* Spécification fonctionnelle: 
	
	- Obtenir_reponses_promo : int -> [[int](1)](n) / donnée : int >0 , numéro de la promotion  dont on veut connaitre le résultat
							/ résultat : [[int](1)](n), contient tous les numéros des users (int>=0) qui appartiennent
							     	     à la promo prise en paramètre et ayant répondu à au moins un groupe de propostions
								     
	- Obtenir_user_repondre() -> [[int](1)](n) / donnée : aucun paramètre
						   / résultat : [[int](1)](n), contient tous les NumUser des utilisateurs ayant répondu à 
						   		au moins un groupe de propositions
								
	- Correspondance_promo_code : string -> int / donnée : string correspondant au code de la promotion dont on cherche à connaître le NumPromo
						    / résultat : int (entre 0 et 8) correspondant au NumPromo que l'on cherche, ERREUR si 
						                 aucune promo n'a ce CodePromo

	- Creer_promo : string x int x string  / données : le premier string correspond au nom de la promo que l'on veut créer, l'int>0 correspond 
							   à l'année de la promo que l'on veut créer, l'autre string correspond au code
							   donné à la promo que l'on crée
					       / résultat : création de la promotion, comprenant tous les paramètres voulus, dans la bdd
					       
	- Verif_presence_codepromo : string -> int / donnée : string correspondant au CodePromo dont on cherche à connaître le nombre de 
								 fois qu'il apparaît
						   / résultat : int, vaut 0 ou 1, nombre de fois que le CodePromo apparaît dans la bdd
						      		   
	- Obtenir_promos : string -> [[int],[string],[int],[string],[int]] / donnée : string correspondant au NomPromo dont on cherche à connaître
										les informations
								     / résultat : [[int >=0 correspondant au NumPromo],[string correspondant
								     		  au NomPromo], [int >0 correspondant à l'année de la promo],
										  [string correspondant au CodePromo], [int correspondant à 
										  l'état ouvert (1) ou fermé(0) de la promo]],
										  ERREUR si le NomPromo n'existe pas dans la bdd
										  
	- Obtenir_nombre_réponse : int -> int / donnée : int (entre 0 et 8) correspondant au NumPromo dont on veut connaitre le nombre d'élèves ayant
							 répondu à au moins un groupe dans la promo
					      / résultat : int >= 0, correspond au nombre d'élèves de cette promotion ayant répondu à au moins un groupe
					     
	- Etat : int -> int / donnée : int >0, correspondant au NumPromo
			    / résultat : int correspondant à l'état, ouvert (int = 1) ou fermé (int = 0) de la promo
			      
	- Modifier_etat(int, int) / données : le premier int>0 correspond au NumPromo dont on veut changer l'état, le deuxieme int correspond à l'état ouvert (int = 1)
					      ou fermé (int = 0) de la promotion 
				  / résultat : modifie l'état de la promotion dans la bdd, ERREUR si NumPromo n'existe pas
	
	- Supprimer_promo(int) / donnée : int >0 NumPromo que l'on veut supprimer 
			       / résultat : suppression de la promo de la bdd, ERREUR si le NumPromo n'existe pas
			      
	- Obtenir_info_promo : int -> [[int],[string],[int],[string],[int]] /meme func que Obtenir_promos
	
	
	Renvoie tout les eleves de la promo entré en paramètre qui ont répondu à au moin un groupe de proposition*/
	function Obtenir_reponses_promo($numPromo)
	{
		/*Préconditions : 	- $numPromo : l'id d'une promo
		Selectionne tous les utilisateurs d'une promotion ayant répondu à une question et les renvoie
		*/

		//connexion a la Base de donnée
		require_once("BD_connexion.php");
 		$bd=connexion();
 		

		// recupere toutes les personnes de la promo entrée en paramètre qui ont répondu au questionnaire
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
