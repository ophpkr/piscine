<?php
	
	/* Specification fonctionnelle


	/* Obtient toute les réponses de l'utilisateur entré en paramètre*/
	function Verif_mail_existant($email)
	{

		/*Préconditions : 	-$email : une string correspodant à l'email d'un utilisateur
		Renvoie l'utilisateur ayant cet email s'ils existent sinon renvoie du vide
		*/

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
		/*Préconditions : 	- $nom : string correspondant au nom de l'utilisateur
							- $prenom : string correspondant au prenom de l'utilisateur
							- $email : string correspondant à l'email de l'utilisateur
							- $password : string correspondant au mot de passe de l'utilisateur
		Ajoute un utilisateur à la bdd avec nom = $nom, prenom =  $prenom, email = $email, password = $password
		*/

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
		/*Préconditions : 	-$email : une string correspodant à l'email d'un utilisateur
		Renvoie les utilisateurs ayant cet email s'ils existent sinon renvoie du vide
		*/

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
		/*Préconditions : 	-$email : une string correspodant à l'email d'un utilisateur
							-$mdp : une string correspodant au mot de passe d'un utilisateur
		Renvoie le nombre de personne qui possedent le couple $email $mdp
		*/

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

		/*Préconditions : 	-$numuser : id d'un utilisateur
							-$numpromo : id d'une promotion
		Change la promotion d'un utilisateur
		*/
		
		// Connexion à la base de données
		require_once("BD_connexion.php");
	 	$bdd=connexion();

	 	$req = $bdd->prepare("UPDATE user SET NumPromo=:numpromo WHERE NumUser=:numuser");
	 	$req->bindParam(':numpromo', $numpromo);
	 	$req->bindParam(':numuser', $numuser);
	 	$req->execute();
	}
?>
