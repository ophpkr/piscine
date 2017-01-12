<?php


require('../Modele/Reponse.php');

        $numgroupe=$_POST["numero"];
        
	
	
	
	//Verifie que l'utilisateur à répondu aux 3 choix
    if(isset($_POST['option1']) AND isset($_POST['option2']) AND isset($_POST['option3']) AND  isset($_COOKIE["user"]))
    {
    	$numuser = $_COOKIE["user"];
    	//Verifier que l'utilisateur n'a pas deja répondu a ce groupe.
    	$res = reponse_deja_presente($numuser,$numgroupe);

    	//Si la requete nous a renvoyé quelque chose, c'est qu'il a deja répondu
		if(!empty($res))
		{
			
			//Verification si l'on se situe sur le dernier groupe de propositions
			while($numgroupe <12 AND !empty($res) )
			{
				$numgroupe= $numgroupe +1;
				$res = reponse_deja_presente($numuser,$numgroupe);
				
			}//Condition de sortie : le numgroupe est =<12 ou aucune reponse d'un groupe n'a été trouvé
			
			// si le numgroupe est inferieur a 12, c'est qu'il reste des groupes  auquel il n'a pas répondu	
			if($numgroupe<12)
			{

				$numgroupe= $numgroupe -1;
				header('Location: ../Vue/questionnaire.php?numero= '.$numgroupe );
			}
			
			//L'utilisateur à répondu à tout les groupes donc => Direction le resultat
			else
			{
				header('Location: ../Vue/resultat_user.php');
				exit(); 
			}
			 
		}
		
		$reponse1= $_POST["option1"];
		$reponse2= $_POST["option2"];
		$reponse3= $_POST["option3"];

		//  L'utilisateur n'a pas répondu à ce groupe donc on peux ajouter ses réponses en bd
		$result = ajout_reponse_user($numuser,$numgroupe,$reponse1,$reponse2,$reponse3);

		//L'ajout s'est bien déroulé
		if ($result==0)
		{
			//Verification si l'on se situe sur le dernier groupe de propositions
			if($numgroupe <12)
			{
				$numgroupe= $numgroupe +1;
				header('Location: ../Vue/questionnaire.php?numero= '.$numgroupe );
				exit(); 
			}
			//L'utilisateur à répondu à tout les groupes donc => Direction le resultat
			else
			{
				header('Location: ../Vue/resultat_user.php');
				exit(); 
			} 

		}

		//L'ajout ne s'est pas bien déroulé
		else
		{
			header('Location: ../Vue/questionnaire.php?numero= '.$numgroupe);
			exit(); 
		}
			
	}

	// Si les 3 choix n'ont pas été coché
	else
	{
		
		header('Location: ../Vue/questionnaire.php?numero= '.$numgroupe);
		exit();   
	}

?>