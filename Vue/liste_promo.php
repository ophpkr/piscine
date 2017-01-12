<?php
  	if(!isset($_COOKIE["admin"]))
        {
         header("Location: ../Vue/homepage.php");
        }
      
?>
<?php include("./head.php"); ?>
<main>

<div class="navbar-fixed">
   <nav class="nav" role="navigation">
    <div class="nav-wrapper container">
    <a id="logo-container" href="homepage_user.php" class="brand-logo">Test de RIASEC</a>
      <ul class="right hide-on-med-and-down">

       
        <li><a href="homepage_admin.php"><i class="material-icons right">dashboard</i>Tableau de bord</a></li>
        <li><a href="../Controlleur/deconnexion.php"><i class="material-icons right">settings_power</i>Déconnexion</a></li>
      </ul>

     <ul id="nav-mobile" class="side-nav">
        
        
        <li><a href="homepage_admin.php">Tableau de bord</a></li>
        <li><a href="../Controlleur/deconnexion.php">Déconnexion</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">Menu</i></a>
    </div>
  </nav>
</div>

<h4 class="center "> Promotions des <?php echo $_GET["nompromo"]; ?></h4>

<div class="container">
     <table class="table2 highlight centered bordered  " >
        <thead>
          <tr>
              <th data-field="id">Nom de Promo</th>
              <th data-field="marque">Année</th>
              <th data-field="prix">Visualisation 1</th>
  
          </tr>
        </thead>

        <tbody>

          <?php 
              require_once('../Modele/Promotion.php');
              $motclef = $_GET["nompromo"];

              $promos = Obtenir_promos($motclef);
                
              //On affiche chaque ligne de la table vehicule.
              foreach($promos as $promo) 
              {
                print "<tr><td>" .  $promo["NomPromo"] . "</td>";
                print "<td>" .  $promo["AnneePromo"] . "</td>";
                $numpromo = $promo["NumPromo"];?>
                <td>
                <form action="resultat_promo.php" method="post">
  					<div>
    				<input type="hidden" name="numpromo" value="<?php echo $numpromo; ?>" />
  	
    				<input class="btn waves-effect waves-light red btn " type="submit" value="Envoyer" />
  				</div>
				</form>
				</td>
               
                <!--print "<td><a class=\"waves-effect waves-light  btn\" href=\"resultat_promo.php?num=\" .$numpromo  >Resultats</a></td>";-->  
 				
       
             <?php }
			?>

        </tbody>
      </table>

  </div>


	<div id="radar" class="modal  ">
  <div class="modal-content">
    <h3 class="center-align"> Vos Résultats</h3>
     <p class="center-align "> Placer le curseur sur les points pour connaitre votre pourcentage</p>

         <?php
         echo $_GET["numerop"];
	// Inclusion des fichiers qui permettent de faire appel aux fonctions et aux requetes en BD.
	require_once('../../Modele/Promotion.php');
	require_once('../../Modele/Reponse.php');

	//recuperation de la promo choisi
	$NumPromo=htmlspecialchars($_POST['NumPromo']);

	$eleves = Obtenir_reponses_promo($NumPromo);

	//Les scores de Promo ont stocké dans ces variables.
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


?>

    <!--    <div class="row">
    <div class=" grey lighten-5" >-->
      <?php include("./radar.php"); ?>
    </div>
  </div>
   </div>
   </div>   
</main>
<?php include("./footer.php"); ?>


<!-- Script pour le modal -->
<script>
 $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });

</script>

  </body>
</html>