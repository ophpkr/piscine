<?php

require('../Modele/Utilisateur.php'); 	
  
     if(isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['email']) AND isset($_POST['password']))
     {


        	$nom =htmlentities($_POST['nom']);
		   	$prenom =htmlentities($_POST['prenom']);
		   	$email =htmlentities($_POST['email']);
		   	$password=sha1(htmlentities($_POST['password']));

		   	$reponse = Verif_mail_existant($email);

		   	if(!empty($reponse))
		   	{
		   		  header("location:../Vue/inscription.php?msg=failed");
			 	  exit();
			}

			$result = Creer_user($nom,$prenom,$email,$password);

			if ($result==0){
				header('Location: ../Vue/connexion.php');

			}
			else{
				header('Location: ../Vue/inscription.php');
			}

	 }

?>