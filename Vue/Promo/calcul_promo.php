<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Page de test</title>
    <style>
#chartdiv {
  width: 50%;
  height: 500px;
}	
	
</style>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/radar.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    </head>

    <body>
    

	<?php

	// Inclusion des fichiers qui permettent de faire appel aux fonctions et aux requetes en BD.
	require_once('../../Modele/Promotion.php');
	require_once('../../Modele/Reponse.php');

	//recuperation de la promo choisi
	$NumPromo=htmlspecialchars($_POST['NumPromo']);

	$eleves = Obtenir_reponses_promo($NumPromo);

	// Les scores de Promo ont stocké dans ces variables.
	$realiste=0;
	$investigatif=0;
	$artistique=0;
	$social=0;
	$entrepreneur=0;
	$conventionnel=0;

    //Pour chaque eleve d'IG qui a répondu on calcule son score et on met a jour les variables de promo         
	foreach($eleves as $eleve) 
             {
                $NumUser=$eleve["NumUser"];
                $realiste = $realiste + calcul_genre($NumUser,1);
  				$investigatif = $investigatif + calcul_genre($NumUser,2);
  				$artistique = $artistique+ calcul_genre($NumUser,3);
  				$social =    $social +  calcul_genre($NumUser,4);
  				$entrepreneur = $entrepreneur + calcul_genre($NumUser,5);
  				$conventionnel= $conventionnel+ calcul_genre($NumUser,6);
             }


echo $realiste;
echo $investigatif;	
echo $artistique;
echo $social;
echo $entrepreneur;
echo $conventionnel;

?>

<?php include("../radar.php"); ?>	

                
	


	</body>
</html>
