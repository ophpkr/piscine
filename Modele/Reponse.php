<?php
	
	/* Spécification fonctionnelle : 
	
	- Obtenir_reponses_user : int -> [[int](3)](12) / donnée : int >0 correspondant au NumUser dont on veut connaître les réponses
							/ résultat : [[int corresponndant au NumPop choisi](3)](12), ERREUR si le NumUser n'existe pas
							
	- Obtenir_profil_question : int -> string / donnée : int (entre 1 et 72) correspondant au NumProp de la proposition dont on veut connaître le profil associé
						  / résultat : string correspondant au NomProfil associé à la la proposition concerné
	
	- Obtenir_profil :  -> [[int],[string]](6) / résultat : retourne tous les profils (leur id et leur nom) sous forme de
								[[int, correspondant au NumProfil],[string, correspondant au NomProfil]](6) 
	
	
	- calcul_genre : int * int ->  int /données : le premier int > 0 correspond au NumUser, le deuxieme au NumProfil (compris entre 1 et 6)
						      dont on veut connaitre le résultat total 
					   / resultat : int correspondant au score obtenu par l'utilisateur dans le profil
	
	- reponse_deja_presente : int x int -> [int](3) / données : le premier int > 0 correspond au NumUser pour lequel on veut savoir s'il a répondu
								   au groupe de NumGroupe (2e int en parametre compris entre 1 et 12)
							/ résultat : [int](3) tableau comprenant des entiers >0 correspondants au réponses
								   choisies par l'utilisteur pour le groupe, ERREUR si le NumUser n'existe pas
	
	- ajout_reponse_user : int x int x int x int x int  / données : int > 0 correspondant au NumUser, int entre 1 et 12 correspondant au NumGroupe
									et les 3 derniers int > 0 correspondent aux 3 propositions choisies par l'utilisateur
									par l'utilisateur pour ce groupe
							    / résultat : insert dans la table 'repondre' les données passées en parametres,
							    		 ERREUR si le NumUser n'existe pas
	
	- Obtenir_nombre_reponses_user : int -> int / donnée : int > 0 correspondant au NumUser
						    / résultat : int > 0 correspondant au nombre de groupe auquel a repondu l'utilisateur,
						    		 ERREUR si NumUser n'existe pas
								 
	
	- Supprimer_reponses_user : int  / donnée : int > 0 correspondant au NumUser pour lequel on veut supprimer les réponses
					 / résultat : toutes les réponses deja enregistrées dans la table 'repondre' pour cet utilisateur 
					 	      sont supprimées de la bdd
	 
	
	
	
	*/
	function Obtenir_reponses_user($numuser)
	{
		/*Préconditions : 	- $numuser : l'id d'un utilisateur
		Selectionne toutes les reponses de l'utilisateur $numuser et les renvoie
		*/

		//connexion a la Base de donnée
		require_once("BD_connexion.php");
 		$bd=connexion();

		// chercher toutes les réponses de l'utilisateur dans la table repondre
		$req = $bd->prepare('SELECT * FROM repondre WHERE NumUser= :numuser');
		$req->bindParam(':numuser', $numuser);
		$req->execute();

		$reponses = $req->fetchAll();
		return $reponses;
	}

	/* Permet d'obtenir le type de profil de la proposition entré en paramètre */
	function Obtenir_profil_question($numprop)
	{
		/*Préconditions : 	- $numprop : l'id d'une proposition
		Renvoie le nom du profil associé à la proposition $numprop
		*/
		
		require_once("BD_connexion.php");
 		$bd=connexion();

		// On recupère le Profil de la proposition 
		$req = $bd->prepare('SELECT NomProfil FROM profil AS prof, proposition AS prop WHERE prop.NumProp=:numprop and prop.NumProfil = prof.NumProfil');
		$req->bindParam(':numprop', $numprop);

		$req->execute();

		$reponses = $req->fetch();
		
		return $reponses;
	}

	// Récupère tout les profils en bd
	function Obtenir_profil()
	{
		/*Préconditions : 	- 
		Selectionne tous les profils et les renvoie
		*/
		
		require_once("BD_connexion.php");
 		$bd=connexion();

		
		$req = $bd->prepare('SELECT * FROM profil');

		$req->execute();

		$reponses = $req->fetchAll();
		
		return $reponses;
	}

// calcul le resultat de chaque profil en fonction des reponses de l'utilisateur.
function calcul_genre($id_user, $NumProfil)
{
	/*Préconditions : 	- $id_user : l'id d'un utilisateur
						- $NumProfil : l'id d'un profil
		Calcule le score de l'utilisateur $id_user dans le profil $NumProfil et le renvoie
	*/
		
	require_once("BD_connexion.php");
 	$bd=connexion();

	$req1 = $bd->prepare('
	SELECT COUNT(*) as score
	FROM repondre AS  R, proposition AS PR
	WHERE R.NumUser= :id_user AND PR.NumProfil= :NumProfil AND PR.NumProp = R.Reponse1');

	$req1->execute(array(':id_user' => $id_user,':NumProfil' => $NumProfil));
	$res1=$req1->fetch();



	$req2 = $bd->prepare('
	SELECT COUNT(*) as score
	FROM repondre AS  R, proposition AS PR
	WHERE R.NumUser= :id_user AND PR.NumProfil= :NumProfil AND PR.NumProp = R.Reponse2');

	$req2->execute(array(':id_user' => $id_user,':NumProfil' => $NumProfil));
	$res2=$req2->fetch();


	$req3 = $bd->prepare('
	SELECT COUNT(*) as score
	FROM repondre AS  R, proposition AS PR
	WHERE R.NumUser= :id_user AND PR.NumProfil= :NumProfil AND PR.NumProp = R.Reponse3');

	$req3->execute(array(':id_user' => $id_user,':NumProfil' => $NumProfil));
	$res3=$req3->fetch();


	
   $score1 =$res1["score"] *3;
   $score2 =$res2["score"] *2;
   $score3 =$res3["score"];
   $score= $score1 + $score2+ $score3;



	return $score;
}

	// Verifie si un utilisateur à deja repondu à un groupe de question
	function reponse_deja_presente($numuser,$numgroupe)
	{
		/*Préconditions : 	- $numuser : l'id d'un utilisateur
							-numgroupe : id d'une groupe de proposition
		renvoie quelque chose si l'utilisateur $numuser à deja répondu aux proposition du groupe $numgroupe
		*/
		
		require_once("BD_connexion.php");
 		$bd=connexion();

 		// On recupère le Profil de la proposition 
		$req = $bd->prepare('SELECT * FROM repondre WHERE NumUser=:numuser and NumGroupe =:numgroupe');
		$req->bindParam(':numuser', $numuser);
		$req->bindParam(':numgroupe', $numgroupe);

		$req->execute();
		$result = $req->fetch();
	
		return $result;

	}

	// Fonction d'ajout des réponses de l'utilisateur dans la table repondre
	function ajout_reponse_user($numuser,$numgroupe,$reponse1,$reponse2,$reponse3)
	{
		/*Préconditions : 	- $numuser : l'id d'un utilisateur
							- $numgroupe : l'id d'un groupe de propositions
							- $reponseX :  l'id d'une reponse
		Selectionne tous les reponses de l'utilisateur $numuser et les renvoie
		*/
		

		//connexion a la Base de donnée
		require_once("BD_connexion.php");
 		$bd=connexion();

		$req = $bd->prepare('INSERT INTO repondre(NumUser,NumGroupe, Reponse1, Reponse2, Reponse3) VALUES(?,?,?,?,?)');

		// A la creation de l'utilisateur on initialise ça promo à 
		$req->execute(array ($numuser,$numgroupe,$reponse1,$reponse2,$reponse3));

		return 0;

	}

	//Fonction qui permet de renvoyer le nombre de réponses de l'utilisateur ==> Pour savoir si il a terminer le test ou non
	function Obtenir_nombre_reponses_user($numuser)
	{
		/*Préconditions : 	- $numuser : l'id d'un user
		Cherche le nombre de réponse d'un utilisateur $numuser au test et le renvoie
		*/

		//connexion a la Base de donnée
		require_once("BD_connexion.php");
 		$bd=connexion();

 		$req = $bd->prepare('SELECT COUNT(*) as cpt FROM repondre WHERE NumUser=:numuser');
		$req->execute(array(':numuser' => $numuser));
		$res=$req->fetch();

		$nb =$res["cpt"];

		return $nb;

	}

	// Permet de supprimer les réponses de l'utilisateur qui sont dans la table repondre
	function Supprimer_reponses_user($numuser)
	{
		/*Préconditions : 	- $numuser : l'id d'un user
		Supprime toutes les réponses données par l'utilisateur $numuser
		*/

		require_once("BD_connexion.php");
 		$bd=connexion();

 		$req = $bd->prepare("DELETE FROM repondre WHERE NumUser =:numuser");
		$req->execute(array (':numuser' => $numuser));
	}

?>
