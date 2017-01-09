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

		 	//Le couple email-pssword n'a pas été trouvé dans la bd, donc utilsateur inconnu, mauvais mmot de passe ou mauvais mail
		 	else
		 	{	  
		 		$msg ="Erreur dans les informations entrées ";
		   		header("location:../Vue/homepage.php?connex=" .$msg);
			 	exit();            
		 		
			}
	

?>