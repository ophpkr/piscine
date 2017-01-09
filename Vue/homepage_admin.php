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


<div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s6 hoverable ">
          <div class="icon-block">
            <img src="images/pm.jpg" class="responsive-img">
            <h5 id="Acceuil" class="center">Résultats Promo</h5>

            <p class="light">Affichage de la liste de toute les missions accepté, possibilité de visionner les detail de chaque reservation.</p>
            <p><a  href="mission.php" class="waves-effect waves-light btn-large"><i class="small material-icons right">supervisor_account</i>Gérer</a></p>
          </div>
        </div>

     

        <div class="col s6 hoverable">
          <div class="icon-block">
            <img src="images/polytech.jpg"  class="responsive-img">
            <h5 class="center">Créer Promo</h5>

            <p class="light">Gestion de la base de données vehicule et chauffeur, possibilité d'ajouter ou de supprimer des vehicules ou des chauffeurs</p>
            <p><a  href="autre.php" class="waves-effect waves-light btn-large"><i class="small material-icons right">supervisor_account</i>Gérer</a></p>
          </div>
        </div>
      </div>

    </div>
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s6 hoverable">
          <div class="icon-block">
            <img src="images/riasec.png" class="responsive-img ">
            <h5 id="Acceuil" class="center">Modifier les propositions</h5>

            <p class="light">Affichage de la liste de toute les missions accepté, possibilité de visionner les detail de chaque reservation.</p>
            <p><a  href="mission.php" class="waves-effect waves-light btn-large"><i class="small material-icons right">supervisor_account</i>Gérer</a></p>
          </div>
        </div>

           <div class="col s6 hoverable">
          <div class="icon-block">
           <img src="images/holland.png" class="responsive-img ">
            <h5 class="center">Liste Etudiant</h5>

            <p class="light"> Affichage de la liste de tout les inscrits du site, possibilité de promouvoir les membres en admin , recherche par nom.</p> 
            <p><a  href="gestion_membre.php" class="waves-effect waves-light btn-large"><i class="small material-icons right">supervisor_account</i>Gérer</a></p>
          </div>
        </div>

      </div>

    </div>
  </div>

  


<!-- END PAGE CONTENT -->

</div>
</main>
<?php include("./footer.php"); ?>
  
  <script>  
  $(".button-collapse").sideNav(); 
  </script>
  <script>  
  $(document).ready(function(){
    $('.slider').slider({full_width: true});
    });
</script>

<script> 
// Pause slider
$('.slider').slider('pause');
// Start slider
$('.slider').slider('start');
// Next slide
$('.slider').slider('next');
// Previous slide
$('.slider').slider('prev');
</script>

  </body>
</html>