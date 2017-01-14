<?php
  if(!isset($_COOKIE["user"]))
        {
         header("Location: ../Vue/homepage.php");
         }
?>
<?php include("./head.php"); ?>
<main>


 
  <nav class="nav" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="homepage_user.php" class="brand-logo">Test de RIASEC</a>
        <ul class="right hide-on-med-and-down">
          <li><a href="../Controlleur/resultat.php"><i class="material-icons right">airplay</i>Résultats</a></li>
          <li><a href="code_promo.php"><i class="material-icons right">perm_identity</i>Démarrer le Test</a></li>
          <li><a href="../Controlleur/deconnexion.php"><i class="material-icons right">settings_power</i>Déconnexion</a></li>
        </ul>
      
        <ul id="nav-mobile" class="side-nav">  
          <li><a href="../Controlleur/resultat.php"><i class="material-icons right">airplay</i>Résultats</a></li>
        <li><a href="code_promo.php"><i class="material-icons right">perm_identity</i>Démarrer le Test</a></li>
        <li><a href="../Controlleur/deconnexion.php"><i class="material-icons right">settings_power</i>Déconnexion</a></li>
       </ul>
      <a href="homepage_user.php" data-activates="nav-mobile" class="button-collapse">Menu</a>
    </div>
  </nav>

  <div class="container">
    <div class="row">
        <div class="col s8 offset-s2 ">
          <div class="card cyan darken-2">
            <div class="card-content white-text">
              <span class="card-title"><h3 class="center "> Introduction au Test de RIASEC</h3></span>
            </div>
          </div>
        </div>
    </div>

    <div class="row">
      <div class="col s8 offset-s2">
        <div class="video-container">
        <iframe width="1600" height="900" src="https://www.youtube.com/embed/a2hMnDKF5BY" frameborder="0" allowfullscreen></iframe>
      </div>
      </div>
</div>
  
    <div class="row">
      <div class="col s8 offset-s2">
        <div class="center">
        <a class="waves-effect green btn-large" href="code_promo.php"><i class="material-icons left">done_all</i>J'ai compris</a>
        </div>
      </div>
</div>



<!-- END PAGE CONTENT -->

</div>
</main>
<?php include("./footer.php"); ?>
  
 



  </body>
</html>