<?php
  if(!isset($_COOKIE["user"]))
        {
         header("Location: ../Vue/connexion.php");
         }
?>
<?php include("./head.php"); ?>
<main>

<div class="navbar-fixed">
   <nav class="nav" role="navigation">
    <div class="nav-wrapper container">
    <a id="logo-container" href="homepage_user.php" class="brand-logo">Test de RIASEC</a>
      <ul class="right hide-on-med-and-down">

        <li><a href="homepage_user.php"><i class="material-icons right">settings</i>Paramètre</a></li>
        <li><a href="code_promo.php"><i class="material-icons right">perm_identity</i>Démarrer le Test</a></li>
        <li><a href="../Controlleur/deconnexion.php"><i class="material-icons right">settings_power</i>Déconnexion</a></li>
      </ul>

     <ul id="nav-mobile" class="side-nav">
        <li><a href="homepage_user.php">Paramètre</a></li>
        
        <li><a href="questionnaire.php">Démarrer le Test</a></li>
        <li><a href="../Controlleur/deconnexion.php">Déconnexion</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">Menu</i></a>
    </div>
  </nav>
</div>


   <?php if (isset($_GET["msg"])) 
  { 

  echo $_GET["msg"];
  
    }
  ?>


   <div class="container ">
   <h3 class="center-align" style="background-color:#6fcae8"> Entrer le code de votre promotion</h3>
     <p class="center-align"> Pour demarrer le test, veuillez renseigner le code de votre promotion</p>

  <form class="col s12" method="post" action="../Controlleur/code_promo.php">
     
    <div class="row">
        <div class="input-field col s4 offset-s4">
          <input id="codepromo" name="codepromo" type="password" class="validate white z-depth-5 hoverable" required>
          <label for="codepromo">Password</label>
        </div>
      </div>
    <div class="row">
        <div class="input-field col s4 offset-s4">
          <button class="waves-effect waves-light btn red" type="submit"><i class="material-icons right">done</i>Démarrer le test</button>
        </div>
      </div>
</form>
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