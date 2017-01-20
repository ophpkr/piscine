<?php


require('../Modele/Reponse.php');

       // Si le cookie de l'utilisateur est defini
       if(isset($_COOKIE["user"]))
       {
	// On recupere le numuser dans le cookie
       	$numuser = $_COOKIE["user"];
	
	// Appel de la fonction de suppresion des réponse d'un utilisateur
       	Supprimer_reponses_user($numuser);

       	$msg =" Vos réponses ont été supprimé, vous pouvez refaire le questionnaire";
       	header('Location: ../Vue/code_promo.php?supp= '.$msg);
		

       }
        
       else
       {
       	header('Location: ../Vue/homepage.php');
       }

?>
