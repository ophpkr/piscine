<?php
	
	/* Obtient toute les réponses de l'utilisateur entré en paramètre*/
	function Obtenir_reponses_user($numuser)
	{
		//connexion a la Base de donnée
		require_once("BD_connexion.php");
 		$bd=connexion();

		// chercher toute les réponse de l'utilisateur dans la table repondre
		$req = $bd->prepare('SELECT * FROM repondre WHERE NumUser= :numuser');
		$req->bindParam(':numuser', $numuser);
		$req->execute();

		$reponses = $req->fetchAll();
		return $reponses;
	}

	/* Permet d'obtenir le type de profil de la proposition entré en paramètre */
	function Obtenir_profil_question($numprop)
	{

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
		//connexion a la Base de donnée
		require_once("BD_connexion.php");
 		$bd=connexion();

 		$req = $bd->prepare('SELECT COUNT(*) as cpt FROM repondre WHERE NumUser=:numuser');
		$req->execute(array(':numuser' => $numuser));
		$res=$req->fetch();

		//On compte le nombre de ligne pour constater la presence ou non du couple email+mdp dans la bd
		$nb =$res["cpt"];

		return $nb;

	}

	// Permet de supprimer les réponses de l'utilisateur qui sont dans la table repondre
	function Supprimer_reponses_user($numuser)
	{

		require_once("BD_connexion.php");
 		$bd=connexion();

 		$req = $bd->prepare("DELETE FROM repondre WHERE NumUser =:numuser");
		$req->execute(array (':numuser' => $numuser));
	}

?>