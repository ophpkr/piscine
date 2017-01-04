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

	function Obtenir_profil()
	{

		require_once("BD_connexion.php");
 		$bd=connexion();

		
		$req = $bd->prepare('SELECT * FROM profil');

		$req->execute();

		$reponses = $req->fetchAll();
		
		return $reponses;
	}

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



	/*$req2 = $bd->prepare('
	SELECT Reponse2
	FROM repondre AS  R, proposition AS PR
	WHERE R.NumUser= :id_user AND PR.NumProfil= :NumProfil AND PR.NumProp = R.NumProp');

	$req2->execute(array(':id_user' => $id_user,':NumProfil' => $NumProfil));
	$req2->execute();
	$res2=$req2->rowCount();



	$req3 = $bd->prepare('
	SELECT Reponse3
	FROM repondre AS  R, proposition AS PR
	WHERE R.NumUser= :id_user AND PR.NumProfil= :NumProfil AND PR.NumProp = R.NumProp');

	$req3->execute(array(':id_user' => $id_user,':NumProfil' => $NumProfil));
	$req3->execute();
	$res3=$req3->rowCount();*/





	
	/*$score += $res2 * 2 ; 
	$score += $res3 * 1 ;*/

	return $score;
}

?>