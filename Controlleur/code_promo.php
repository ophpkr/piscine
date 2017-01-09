<?php

require('../Modele/Promotion.php');
require('../Modele/Utilisateur.php');

        

        if(isset($_POST["codepromo"]) AND  isset($_COOKIE["user"]))
        	{
        		$codepromo=$_POST["codepromo"];
       		 	$numuser = $_COOKIE["user"];

       		 	// Renvoie la promo a laquel appratient ce code
        		$res= Correspondance_promo_code($codepromo);

        		$numpromo=$res['NumPromo'];

        		// Si la requete à renvoyer une promo
        		if(!empty($numpromo))
        		{

        			//Affectation de l'utilisateur a sa promotion
        			modif_promo_user($numuser,$numpromo);
        			header('Location: ../Vue/questionnaire.php');
        		}

        		else
        		{
        		  $msg ="Code Promo incorrecte ";
		   		  header("location:../Vue/code_promo.php?msg=" .$msg);
			 	  exit(); 
        		}
        	}
        else
        	{

        		$msg ="Veuillez entrer un mot de passe de Promo ";
		   		header("location:../Vue/code_promo.php?msg=" .$msg);
			 	exit(); 
        	}	