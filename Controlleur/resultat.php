<?php 
	require('../Modele/Reponse.php');


		if(isset($_COOKIE["user"]))
		{
					
			$numuser=$_COOKIE["user"];
			$nb_reponses = Obtenir_nombre_reponses_user($numuser);

                    // Si il a 12 réponse en bd c'est qu'il a terminer le test
                    if($nb_reponses == 12)
                    {   
                        header('Location: ../Vue/resultat_user.php');
                    }
                    else
                    {
                        $msg ="Vous ne pouvez pas accéder aux résultats sans avoir terminé le questionnaire ";
		   	header("location:../Vue/code_promo.php?msg=" .$msg);
			 		            
                    }
        }
        else
        {
        	 header('Location: ../Vue/homepage.php');
        }
 ?>
