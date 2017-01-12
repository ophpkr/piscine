<?php
	
	/* Obtient toute les réponses de l'utilisateur entré en paramètre*/
	function Verif_mail_existant($email)
	{
		//connexion a la Base de donnée
		require_once("BD_connexion.php");
 		$bd=connexion();

		// chercher toute les réponse de l'utilisateur dans la table repondre
		$req = $bd->prepare('SELECT * FROM user WHERE MailUser= :email');
		$req->execute(array(':email' => $email));
		$result = $req->fetch();
		return $result;
	}


	function Creer_user($nom,$prenom,$email,$password)
	{
		//connexion a la Base de donnée
		require_once("BD_connexion.php");
 		$bd=connexion();

		$req = $bd->prepare('INSERT INTO user(NomUser,PrenomUser, MailUser, PwdUser, Admin, NumPromo) VALUES(?,?,?,?,?,?)');

		// A la creation de l'utilisateur on initialise ça promo à 
		$req->execute(array ($nom,$prenom,$email,$password,0,1));

		return 0;

	}



	function est_admin($email)
	{
		//connexion a la Base de donnée
		require_once("BD_connexion.php");
 		$bd=connexion();

		$req = $bd->prepare("SELECT * FROM user WHERE MailUser='$email';");
		$req->execute();
		$admin=$req->fetch();
		return $admin;

	}

	function verif_connexion($email, $mdp)
	{
		// Connexion à la base de données
		require_once("BD_connexion.php");
	 	$bdd=connexion();

		$req = $bdd->prepare("SELECT * FROM user WHERE MailUser=:email AND PwdUser= :mdp");
		$req->execute(array(':email' => $email,':mdp' => $mdp));

		//On compte le nombre de ligne pour constater la presence ou non du couple email+mdp dans la bd
		$res=$req->rowCount();
		return $res;
	}

	function modif_promo_user($numuser,$numpromo)
	{
		// Connexion à la base de données
		require_once("BD_connexion.php");
	 	$bdd=connexion();

	 	$req = $bdd->prepare("UPDATE user SET NumPromo=:numpromo WHERE NumUser=:numuser");
	 	$req->bindParam(':numpromo', $numpromo);
	 	$req->bindParam(':numuser', $numuser);
	 	$req->execute();
	}

		function verifpwd($pwd, $numuser)//$pwd est le mot de passe hashé; True si le pwd correspond au pwd de l'utilisateur
	{
		require_once("BD_connexion.php");
		$bd = connexion();
		
		$req = $bd->prepare("SELECT * FROM user WHERE NumUser=:numuser AND PwdUser= :pwd");
		$req->execute(array(':numuser' => $numuser,':pwd' => $pwd));

		//On compte le nombre de ligne pour constater la presence ou non du couple email+mdp dans la bd
		$res=$req->rowCount();
		return $res;
		
	}
	
	function modifpwd($nouveaupwd, $numuser)
	{
		require_once("BD_connexion.php");
		$bd = connexion();

		$req = $bd -> prepare("UPDATE user SET PwdUser=:nouveaupwd WHERE NumUser=:numuser");
		$req->bindParam(':numuser', $numuser);
	 	$req->bindParam(':nouveaupwd', $nouveaupwd);
		$req -> execute();

	}
	
?>