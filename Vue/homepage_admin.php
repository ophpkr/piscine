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


  <?php 

  if (isset($_GET["fail"])) 
  { 
  ?>
  <p class="center-align red">

  <!-- On affiche donc le contenu du message d'erreur sur la page pour avertir l'utilisateur de son erreur-->
  <?php echo $_GET["fail"];?> </p>
    
  <?php }

  else if(isset($_GET["reussi"]))
  {
  ?>
  <p class="center-align green"><?php echo $_GET["reussi"];?></p>
  <?php } ?>


  <div class="container">
   
    <h3 class="center-align" > Tableau de bord </h3>

   
    <div class="row">
      <div class="col s4 m4 " >
        <img src="images/stati.jpg" class="responsive-img "  >
      </div>
      <div class="col s4 m4 " >
        <img src="images/dash.png" class="responsive-img " >
      </div>
      <div class="col s4 m4 " >
        <img src="images/propo.jpeg" class=" responsive-img "  >
      </div>
    </div>

      <div class="row">
        <div class="col s4 m4 " style="background-color: #7cb342 " >
          <div class="icon-block">
            
              <h5 id="Acceuil" class="center">Statistique et Résultat </h5>
              <p class="light"> Observer les résultats de chaque promotion</p>
              <p class="light"> Visualisation radar / camembert / tableau ordonnée</p>
              </br>
            
          </div>
        </div>
      

        <div class="col s4 m4 " style="background-color:#039be5" >
          <div class="icon-block">
           
              
              <h5 class="center">Gestion Formation</h5>
              <p class="light">Ouvrir/ Fermer le questionnaire à la votre promotion de votre choix</p>
              <p class="light">Créer une promotion, Supprimer un promotion, récuperer le code de chaque promotion</p>
              
              
          </div>
        </div>
    
     
        <div class="col s4 m4 " style="background-color:#5e35b1" >
          <div class="icon-block">
            
              <h5 id="Acceuil" class="center">Modifier les propositions</h5>
              <p class="light">Modification des propositions.</p>
              <p class="light">Organisation par groupe</p></br></br>
      
          </div>
        </div>

    </div>

    <div class="row">
      <div class="col s4 m4 " >
      <div class="center">
        <a  href="stat_promo.php" class="waves-effect waves-light green btn-large">Statistiques</i></a>
      </div>
      </div>
      <div class="col s4 m4 " >
      <div class="center">
      <a  href="gestion_promo.php" class="waves-effect waves-light blue btn-large">Gérer les promo</a>
      </div>
      </div>
      <div class="col s4 m4 " >
      <div class="center">
      <a  href="propositions.php" class="waves-effect waves-light purple btn-large">Modifier</a>
      </div>
      </div>
    </div>
    <!-- FIN DU CONTENAIRE-->
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
  


<!-- END PAGE CONTENT -->

</div>
</main>
<?php include("./footer.php"); ?>
  
  <script>  
  $(".button-collapse").sideNav(); 
  </script>
 




  </body>
</html>