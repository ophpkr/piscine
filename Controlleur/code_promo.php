<?php

require('../Modele/Promotion.php');
require('../Modele/Utilisateur.php');
require('../Modele/Reponse.php');

        

        if(isset($_POST["codepromo"]) AND  isset($_COOKIE["user"]))
        	{
        		$codepromo=$_POST["codepromo"];
       		 	$numuser = $_COOKIE["user"];

       		 	// Renvoie la promo a laquel appartient ce code
        		$res= Correspondance_promo_code($codepromo);

        		$numpromo=$res['NumPromo'];
                $etat= Etat($numpromo);
                $etat = $etat["OuverturePromo"];

        		// Si la requete à renvoyer une promo
        		if(!empty($numpromo) and $etat == 1)
        		{

        			//Affectation de l'utilisateur a sa promotion
        			modif_promo_user($numuser,$numpromo);

                    // On verifie si l'utilisateur n'a pas deja réaliser le test
                    $nb_reponses = Obtenir_nombre_reponses_user($numuser);

                    // Si il a 12 réponse en bd c'est qu'il a terminer le test
                    if($nb_reponses == 12)
                    {   
                        header('Location: ../Vue/resultat_user.php');
                    }
                    else
                    {
                        header('Location: ../Vue/questionnaire.php');
                    }
        			
        		}
                // Le code n'appartient a aucune promo
        		else
        		{
        		  $msg ="Code Promo incorrecte ou session non ouverte ";
		   		  header("location:../Vue/code_promo.php?msg=" .$msg);
			 	  exit(); 
        		}
        	}
        // Pas de code entré ou cookie désactivé
        else
        	{

        		$msg ="Veuillez entrer un mot de passe de Promo ";
		   		header("location:../Vue/code_promo.php?msg=" .$msg);
			 	exit(); 
        	}	