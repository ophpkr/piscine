<?php

require('../Modele/Utilisateur.php');

     //Verifie si tous les champs ont été remplis
     if(isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['email']) AND isset($_POST['password']) AND isset($_POST['vpassword']))
     {
     	// Verifie si les mot de passes sont similaire
     	if($_POST['password']== $_POST['vpassword'])
		{
			// Validation du nom
			if(!preg_match('/^[a-zA-Z- ]+$/', $_POST['nom']))
        	//Si le nom entré est vide ou si le nom entré contient des caractères non acceptés (i.e. autres que a-z,A-Z et _)
            {
                  $msg ="Nom incorrect";
		   		  header("location:../Vue/homepage.php?msg=" .$msg);
			 	        
            }
        
        
        	// Validation du prenom
        	if(!preg_match('/^[a-zA-Z- ]+$/', $_POST['prenom']))
            {
               	  $msg ="Prenom incorrect";
		   		  header("location:../Vue/homepage.php?msg=" .$msg);
			 	            
            }
        	
        	
        	$nom =htmlentities($_POST['nom']);
		   	$prenom =htmlentities($_POST['prenom']);
		   	$email =htmlentities($_POST['email']);
		   	$password=sha1(htmlentities($_POST['password']));

		   	//Verification dans la bd si l'email est deja présent.
		   	$reponse = Verif_mail_existant($email);

		   	//Si la requete nous a renvoyé quelque chose, c'est que le mail est deja présent
		   	if(!empty($reponse))
		   	{
		   		  $msg ="Adresse mail deja utilisé";
		   		  header("location:../Vue/homepage.php?msg=" .$msg);
			 	 
			}

			//  Sinon on crée l'utilisateur. (ajout en bd)
			$result = Creer_user($nom,$prenom,$email,$password);

			// La création et l'ajout en bd se sont bien passé => Direction la page de connexion
			if ($result==0){
				header('Location: ../Vue/homepage.php');

			}
			//sinon => Direction la page d'inscription
			else{
				header('Location: ../Vue/homepage.php');
			}
		}

		//Les mots de passes ne sont pas similaires.
		else
		{		$msg ="Les mot de passes ne correspondent pas";
				header("Location: ../Vue/homepage.php?msg=" .$msg);
		}

	}
	// Tout les champs n'ont pas été rempli
	else
	{
				header('Location: ../Vue/homepage.php');
 	}

?>
