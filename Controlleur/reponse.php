<?php

	require_once('../Modele/Reponse.php');


	
	$NumUser=htmlspecialchars($_POST['NumUser']);
	$realiste=0;
	$investigatif=0;
	$artistique=0;
	$social=0;
	$entrepreneur=0;
	$conventionnel=0;


	$reponses = Obtenir_reponses_user($NumUser);

	foreach($reponses as $reponse) 
              {

                $numprop = $reponse["Reponse1"];
                $profil1 = Obtenir_profil_question($numprop);
                if($profil1 == "REALISTE")
                {
                	$realiste=$realiste+3;
                }
                 if($profil1 == "INVESTIGATIF")
                {
                	$investigatif=$investigatif+3;
                }

                 if($profil1 == "ARTISTIQUE")
                {
                	$artistique=$artistique+3;
                }

                 if($profil1 == "SOCIAL")
                {
                	$social=$social+3;
                }

                 if($profil1 == "ENTREPRENEUR")
                {
                	$entrepreneur=$entrepreneur+3;
                }

                 if($profil1 == "CONVENTIONNEL")
                {
                	$conventionnel=$conventionnel+3;
                }

                
                $numprop = $reponse["Reponse2"];
                $profil2 = Obtenir_profil_question($numprop);
                if($profil2 == "REALISTE")
                {
                	$realiste=$realiste+2;
                }
                 if($profil2 == "INVESTIGATIF")
                {
                	$investigatif=$investigatif+2;
                }

                 if($profil2 == "ARTISTIQUE")
                {
                	$artistique=$artistique+2;
                }

                 if($profil2 == "SOCIAL")
                {
                	$social=$social+2;
                }

                 if($profil2 == "ENTREPRENEUR")
                {
                	$entrepreneur=$entrepreneur+2;
                }

                 if($profil2 == "CONVENTIONNEL")
                {
                	$conventionnel=$conventionnel+2;
                }

                
                $numprop = $reponse["Reponse3"];
                $profil3 = Obtenir_profil_question($numprop);
                   if($profil3 == "REALISTE")
                {
                	$realiste=$realiste+1;
                }
                 if($profil3 == "INVESTIGATIF")
                {
                	$investigatif=$investigatif+1;
                }

                 if($profil3 == "ARTISTIQUE")
                {
                	$artistique=$artistique+1;
                }

                 if($profil3 == "SOCIAL")
                {
                	$social=$social+1;
                }

                 if($profil3 == "ENTREPRENEUR")
                {
                	$entrepreneur=$entrepreneur+1;
                }

                 if($profil3 == "CONVENTIONNEL")
                {
                	$conventionnel=$conventionnel+1;
                }
            }
                

	
?>