<?php
  if(!isset($_COOKIE["user"]))
        {
         header("Location: ./Vue/homepage.php");
         }
  
?>
<?php include("./head.php"); ?>

<main>

<div class="navbar-fixed">
   <nav class="nav" role="navigation">
    <div class="nav-wrapper container">
    <a id="logo-container" href="homepage_user.php" class="brand-logo">Test de RIASEC</a>
      <ul class="right hide-on-med-and-down">

        <li><a href="parametres.php"><i class="material-icons right">settings</i>Paramètre</a></li>
        <li><a href="code_promo.php"><i class="material-icons right">perm_identity</i>Démarrer le Test</a></li>
        <li><a href="../Controlleur/deconnexion.php"><i class="material-icons right">settings_power</i>Déconnexion</a></li>
      </ul>

     <ul id="nav-mobile" class="side-nav">
        <li><a href="parametres.php">Paramètre</a></li>
        
        <li><a href="questionnaire.php">Démarrer le Test</a></li>
        <li><a href="../Controlleur/deconnexion.php">Déconnexion</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">Menu</i></a>
    </div>
  </nav>
</div>
   
</main>

<body>
  
  <h1>Changer de mot de passe</h1>
  <form action="../Controlleur/changerpwd.php" method="POST">

  <label>Mot De Passe Actuel<input type="password" name="ancienpwd" required/></label><br/>
  <label>Nouveau Mot De Passe <input type="password" name="pwd1" required/></label><br/>
  <label>Confirmer le nouveau Mot De Passe <input type="password" name="pwd2" required/></label><br/>
    

  <button type="submit">Valider</button>
  </form>
  
</body>