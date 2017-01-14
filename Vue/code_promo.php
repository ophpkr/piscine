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


   <?php if (isset($_GET["msg"])) 
  { 
?>
  <p class="center-align red"><?php
  echo $_GET["msg"];?></p>
  
   <?php
  
    }
  ?>
</br>
<div class="row">
   <div class="container ">
   <div class="col s8 offset-s2" style="background-color: #0097a7   ">
    <h3 class="center-align"> Entrer le code de votre promotion</h3>
     <p class="center-align"> Pour demarrer le test, veuillez renseigner le code de votre promotion</p>
    <div class="container" >
  <form class="col s12" method="post" action="../Controlleur/code_promo.php" >
     
    <div class="row">
        <div class="input-field col s8 offset-s2">
          <input id="codepromo" name="codepromo" type="password" class="validate white z-depth-5 hoverable" required>
          <label for="codepromo">Code de Promotion</label>
        </div>
      </div>
    <div class="row">
        <div class="input-field col s8 offset-s2">
          <div class="center">
          <button class="waves-effect waves-light btn green" type="submit"><i class="material-icons right">done</i>Démarrer le test</button>
          </div>
          
        </div>
      </div>
</form>
</div>
</div>
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