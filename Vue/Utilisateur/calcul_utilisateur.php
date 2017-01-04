<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Page de test</title>
    <style>
body { background-color: #3f3e3b; color: #fff; }
#chartdiv {
  width: 100%;
  height: 500px;
}   
</style>


<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/radar.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/chalk.js"></script>
    </head>

    <body>
    


<?php

	require_once('../../Modele/Reponse.php');


	
	$NumUser=htmlspecialchars($_POST['NumUser']);

	// Initialisation des variables à 0
	

	$realiste =     calcul_genre($NumUser,1);
  $investigatif = calcul_genre($NumUser,2);
  $artistique =   calcul_genre($NumUser,3);
  $social =       calcul_genre($NumUser,4);
  $entrepreneur = calcul_genre($NumUser,5);
  $conventionnel= calcul_genre($NumUser,6);

	
	
	
	

	            
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