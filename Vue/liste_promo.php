<?php
  	if(!isset($_COOKIE["admin"]))
        {
         header("Location: ../Vue/homepage.php");
        }
      
?>
<?php include("./head.php"); ?>
<main>

 <nav class="nav" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="homepage_admin.php" class="brand-logo">Test de RIASEC</a>
        <ul class="right hide-on-med-and-down">
          <li><a href="homepage_admin.php"><i class="material-icons right">dashboard</i>Tableau de bord</a></li>
          <li><a href="../Controlleur/deconnexion.php"><i class="material-icons right">settings_power</i>Déconnexion</a></li>
        </ul>
      
        <ul id="nav-mobile" class="side-nav">  
          <li><a href="homepage_admin.php">Acceuil</a></li>
          <li><a href="homepage_admin.php">Tableau de bord</a></li>
          <li><a href="../Controlleur/deconnexion.php">Déconnexion</a></li>
       </ul>
      <a href="homepage_admin.php" data-activates="nav-mobile" class="button-collapse">Menu</a>
    </div>
  </nav>



<div class="row">
        <div class="col s6 offset-s3 ">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title"><h3 class="center "> Vous avez choisi la formation : <?php echo $_GET["nompromo"]; ?></h3></span>
              <p>Le tableau ci-dessous vous propose une liste complète des promotions enregistrées en base de données.</p>
              <p>Choisissez la promotion de votre choix et cliquez sur résultat pour afficher les détails de chaques promos.</p>
            </div>
          </div>
        </div>
</div>

<div class="container">
<div class="container" style="background-color: white">
     <table class="table2 highlight centered bordered stripped responsive-table " >
        <thead>
          <tr>
              <th data-field="id">Nom de Promo</th>
              <th data-field="marque">Année</th>
              <th data-field="prix">Résultats</th>
  
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
    				        <input class="btn waves-effect waves-light green btn " type="submit" value="Afficher" />
  				        </div>
				       </form>
				    </td>
               
                
 				
       
     <?php }?>
			         

        </tbody>
      </table>

  </div>
</div>



  

</main>

<?php include("./footer.php"); ?>


  </body>
</html>