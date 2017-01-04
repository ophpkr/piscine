<?php

require('../Modele/Utilisateur.php'); 	
  
    

        	// recupération des informations transmisent
		   	$email =htmlentities($_POST['email']);
		   	// On hache le mot de passe pour pouvoir le comparer au mot de passe haché en bd
		   	$password=sha1(htmlentities($_POST['password']));

		


		   	// Verification de la presence du couple email+mdp en bd
		   	$connexion = verif_connexion($email,$password);

		   	// L'utilisateur est dans la bd
		   	if ($connexion == 1)
		   	{
		   		// On verifie si l'utilisateur est un admin
		   		$user = est_admin($email);

		   		//verification admin
		   		if($user['Admin'] == 1)
		   		{
		   				
						setcookie("admin",$user['NumUser'],time() + (86400  * 30),'/');
						header("Location: ../Vue/homepage_admin.php");
						exit();
		   		}

		   		//Non admin
		   		else
		   		{
		   				
						setcookie("user",$user['NumUser'],time() + (86400  * 30),'/');
						header("Location: ../Vue/homepage_user.php");
		   		}
		 	}

		 	else
		 	{	
		 		header("Location: ../Vue/connexion.php");
			}
	

?>