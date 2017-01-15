<?php


require('../Modele/Reponse.php');

       
       if(isset($_COOKIE["user"]))
       {

       	$numuser = $_COOKIE["user"];

       	Supprimer_reponses_user($numuser);

       	$msg =" Vos réponses ont été supprimé, vous pouvez refaire le questionnaire";
       	header('Location: ../Vue/code_promo.php?supp= '.$msg);
		exit();

       }
        
       else
       {
       	header('Location: ../Vue/homepage.php');
       }

?>