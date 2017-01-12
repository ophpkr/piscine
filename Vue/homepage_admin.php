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

 <?php if (isset($_GET["fail"])) 
  { ?>
  <p class="center-align red"><?php
  // On affiche donc le contenu du message d'erreur sur la page pour avertir l'utilisateur de son erreur
  echo $_GET["fail"];?></p>
  
   <?php }

   else if(isset($_GET["reussi"]))
    {?>
  <p class="center-align green"><?php
  echo $_GET["reussi"];?></p>
  <?php }?>


<div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s3 hoverable " >
          <div class="icon-block">
            <img src="images/pm.jpg" class="circle responsive-img">
            <h5 id="Acceuil" class="center">Résultats Promo</h5>

            <p class="light">Affichage de la liste de toute les missions accepté, possibilité de visionner les detail de chaque reservation.</p>
            <p><a  href="stat_promo.php" class="waves-effect waves-light btn-large"><i class="small material-icons right">supervisor_account</i>Visualiser</a></p>
          </div>
        </div>

     

        <div class="col s3 hoverable" >
          <div class="icon-block">
            <img src="images/polytech.jpg"  class="circle responsive-img">
            <h5 class="center">Créer Promo</h5>

            <p class="light">Gestion de la base de données vehicule et chauffeur, possibilité d'ajouter ou de supprimer des vehicules ou des chauffeurs</p>
            <p><a  href="#AjoutPromo" class="waves-effect waves-light btn-large"><i class="small material-icons right">supervisor_account</i>Créer</a></p>
            <p><a  href="gestion_promo.php" class="waves-effect waves-light btn-large"><i class="small material-icons right">supervisor_account</i>Créer</a></p>
          </div>
        </div>
     

    
    

      <!--   Icon Section   -->
     
        <div class="col s3 hoverable"  >
          <div class="icon-block">
            <img src="images/riasec.png" class="circle responsive-img ">
            <h5 id="Acceuil" class="center">Modifier les propositions</h5>

            <p class="light">Affichage de la liste de toute les missions accepté, possibilité de visionner les detail de chaque reservation.</p>
            <p><a  href="propositions.php" class="waves-effect waves-light btn-large"><i class="small material-icons right">supervisor_account</i>Gérer</a></p>
          </div>
        </div>

           <div class="col s3 hoverable"  >
          <div class="icon-block">
           <img src="images/holland.png" class="circle responsive-img ">
            <h5 class="center">Liste Etudiant</h5>

            <p class="light"> Affichage de la liste de tout les inscrits du site, possibilité de promouvoir les membres en admin , recherche par nom.</p> 
            <p><a  href="gestion_membre.php" class="waves-effect waves-light btn-large"><i class="small material-icons right">supervisor_account</i>Gérer</a></p>
          </div>
        </div>

     
 </div>
   </div> 
  </div>


    <div id="AjoutPromo" class="modal  ">
  <div class="modal-content">
    <h3 class="center-align"> Création d'une promo et d'un code de promo</h3>
     <p class="center-align "> brrrr</p>
          <form class="col s12 " method="post" action="../Controlleur/ajout_promo.php">
       <div class="row">
            <div class="input-field col s6 offset-s3">
             <input id="name"  name="nom" type="text" class="validate white z-depth-5 hoverable" required >
              <label for="name">Nom Promo</label>
           </div>
        </div>
        <div class="row">
            <div class="input-field col s6 offset-s3">
             <input id="annee"  name="annee" type="text" class="validate white z-depth-5 hoverable" length="4" required >
              <label for="annee">Année en cours</label>
           </div>
        </div>

        <div class="row">
            <div class="input-field col s6 offset-s3">
             <input id="codepromo"  name="codepromo" type="text" class="validate white z-depth-5 hoverable" required >
              <label for="codepromo">Code Promo</label>
           </div>
        </div>
       
       </div>
       <div class="modal-footer">
        <div class="row">
           <div class="col s4 offset-s4">
             <button class="waves-effect waves-light red btn" type="submit">Connexion</button>
           </div>
       </div>
       </div>
    </form>

       
     
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
<!-- Script pour le modal de connexion-->
<script>
 $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
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