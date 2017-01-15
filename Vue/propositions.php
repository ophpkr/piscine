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

<div class="row">
<div class="container">
    <div class="col s12  ">
          <div class="card blue darken-2">
            <div class="card-content white-text">
              <span class="card-title"><h4 class="center "> Gestion des propositions  </h4></span>
        
            </div>
          </div>
    </div>
   </div>
  </div>
   
    <?php if (isset($_GET["propno"])) 
  { ?>
  <p class="center-align red"><?php
  echo $_GET["propno"];?></p>
  
   <?php } 
   else if(isset($_GET["propok"])){?>

 <p class="center-align green"><?php
  echo $_GET["propok"];?></p>
  <?php }
  ?>

<div class="container">
 <ul class="collapsible " data-collapsible="accordion">
  <li>
      <div class="collapsible-header center">Groupe 1</div>
       <?php
        require_once('../Modele/Proposition.php');
        $props =Obtenir_propositions_groupe(1);

        foreach($props as $prop) 
              {
                /*print "<div class=\"collapsible-body\"><p>" .  $prop["ContenuProp"] . "";
                print "<a class=\"waves-effect waves-light green btn btn-small btn-lg right-center\">Promouvoir</a></p></div>";*/?>

              <div class="collapsible-body">
                <form id="form-insert" method="post" action="../Controlleur/modif_propositions.php">
                  <input type="hidden" name="numprop" value="<?php echo $prop["NumProp"]; ?>"></input>
                  <div class="row">
                  <div class=" col s8 offset-s2">
                  <input value="<?php echo $prop["ContenuProp"]; ?>" name="contenuprop" id="contenuprop" type="text" class="center ">
                  <label class="active" for="contenuprop"></label>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col s2 offset-s5">
                  <button class="btn waves-effect waves-light " type="submit" name="action">Modifier</button>
                  </div>
                  </div>
                </form>
              </div>
              <?php }


       ?>
    </li>
    <li>
      <div class="collapsible-header center">Groupe 2</div>
       <?php
        require_once('../Modele/Proposition.php');
        $props =Obtenir_propositions_groupe(2);

        foreach($props as $prop) 
              {
                /*print "<div class=\"collapsible-body\"><p>" .  $prop["ContenuProp"] . "";
                print "<a class=\"waves-effect waves-light green btn btn-small btn-lg right-center\">Promouvoir</a></p></div>";*/?>

              <div class="collapsible-body">
                <form id="form-insert" method="post" action="../Controlleur/modif_propositions.php">
                  <input type="hidden" name="numprop" value="<?php echo $prop["NumProp"]; ?>"></input>
                  <div class="row">
                  <div class=" col s8 offset-s2">
                  <input value="<?php echo $prop["ContenuProp"]; ?>" name="contenuprop" id="contenuprop" type="text" class="center ">
                  <label class="active" for="contenuprop"></label>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col s2 offset-s5">
                  <button class="btn waves-effect waves-light " type="submit" name="action">Modifier</button>
                  </div>
                  </div>
                </form>
              </div>
              <?php }


       ?>
    </li>
    <li>
      <div class="collapsible-header center">Groupe 3</div>
         <?php
        require_once('../Modele/Proposition.php');
        $props =Obtenir_propositions_groupe(3);

        foreach($props as $prop) 
              {
                /*print "<div class=\"collapsible-body\"><p>" .  $prop["ContenuProp"] . "";
                print "<a class=\"waves-effect waves-light green btn btn-small btn-lg right-center\">Promouvoir</a></p></div>";*/?>

              <div class="collapsible-body">
                <form id="form-insert" method="post" action="../Controlleur/modif_propositions.php">
                  <input type="hidden" name="numprop" value="<?php echo $prop["NumProp"]; ?>"></input>
                  <div class="row">
                  <div class=" col s8 offset-s2">
                  <input value="<?php echo $prop["ContenuProp"]; ?>" name="contenuprop" id="contenuprop" type="text" class="center ">
                  <label class="active" for="contenuprop"></label>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col s2 offset-s5">
                  <button class="btn waves-effect waves-light " type="submit" name="action">Modifier</button>
                  </div>
                  </div>
                </form>
              </div>
              <?php }


       ?>
    </li>
      <li>
      <div class="collapsible-header center">Groupe 4</div>
         <?php
        require_once('../Modele/Proposition.php');
        $props =Obtenir_propositions_groupe(4);

        foreach($props as $prop) 
              {
                /*print "<div class=\"collapsible-body\"><p>" .  $prop["ContenuProp"] . "";
                print "<a class=\"waves-effect waves-light green btn btn-small btn-lg right-center\">Promouvoir</a></p></div>";*/?>

              <div class="collapsible-body">
                <form id="form-insert" method="post" action="../Controlleur/modif_propositions.php">
                  <input type="hidden" name="numprop" value="<?php echo $prop["NumProp"]; ?>"></input>
                  <div class="row">
                  <div class=" col s8 offset-s2">
                  <input value="<?php echo $prop["ContenuProp"]; ?>" name="contenuprop" id="contenuprop" type="text" class="center ">
                  <label class="active" for="contenuprop"></label>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col s2 offset-s5">
                  <button class="btn waves-effect waves-light " type="submit" name="action">Modifier</button>
                  </div>
                  </div>
                </form>
              </div>
              <?php }

       ?>
    </li>
    <li>
      <div class="collapsible-header center">Groupe 5</div>
         <?php
        require_once('../Modele/Proposition.php');
        $props =Obtenir_propositions_groupe(5);

        foreach($props as $prop) 
              {
                /*print "<div class=\"collapsible-body\"><p>" .  $prop["ContenuProp"] . "";
                print "<a class=\"waves-effect waves-light green btn btn-small btn-lg right-center\">Promouvoir</a></p></div>";*/?>

              <div class="collapsible-body">
                <form id="form-insert" method="post" action="../Controlleur/modif_propositions.php">
                  <input type="hidden" name="numprop" value="<?php echo $prop["NumProp"]; ?>"></input>
                  <div class="row">
                  <div class=" col s8 offset-s2">
                  <input value="<?php echo $prop["ContenuProp"]; ?>" name="contenuprop" id="contenuprop" type="text" class="center ">
                  <label class="active" for="contenuprop"></label>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col s2 offset-s5">
                  <button class="btn waves-effect waves-light " type="submit" name="action">Modifier</button>
                  </div>
                  </div>
                </form>
              </div>
              <?php }


       ?>
    </li>
    <li>
      <div class="collapsible-header center">Groupe 6</div>
         <?php
        require_once('../Modele/Proposition.php');
        $props =Obtenir_propositions_groupe(6);

        foreach($props as $prop) 
              {
                /*print "<div class=\"collapsible-body\"><p>" .  $prop["ContenuProp"] . "";
                print "<a class=\"waves-effect waves-light green btn btn-small btn-lg right-center\">Promouvoir</a></p></div>";*/?>

              <div class="collapsible-body">
                <form id="form-insert" method="post" action="../Controlleur/modif_propositions.php">
                  <input type="hidden" name="numprop" value="<?php echo $prop["NumProp"]; ?>"></input>
                  <div class="row">
                  <div class=" col s8 offset-s2">
                  <input value="<?php echo $prop["ContenuProp"]; ?>" name="contenuprop" id="contenuprop" type="text" class="center ">
                  <label class="active" for="contenuprop"></label>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col s2 offset-s5">
                  <button class="btn waves-effect waves-light " type="submit" name="action">Modifier</button>
                  </div>
                  </div>
                </form>
              </div>
              <?php }


       ?>
    </li>
      <li>
      <div class="collapsible-header center">Groupe 7</div>
         <?php
        require_once('../Modele/Proposition.php');
        $props =Obtenir_propositions_groupe(7);

        foreach($props as $prop) 
              {
                /*print "<div class=\"collapsible-body\"><p>" .  $prop["ContenuProp"] . "";
                print "<a class=\"waves-effect waves-light green btn btn-small btn-lg right-center\">Promouvoir</a></p></div>";*/?>

              <div class="collapsible-body">
                <form id="form-insert" method="post" action="../Controlleur/modif_propositions.php">
                  <input type="hidden" name="numprop" value="<?php echo $prop["NumProp"]; ?>"></input>
                  <div class="row">
                  <div class=" col s8 offset-s2">
                  <input value="<?php echo $prop["ContenuProp"]; ?>" name="contenuprop" id="contenuprop" type="text" class="center ">
                  <label class="active" for="contenuprop"></label>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col s2 offset-s5">
                  <button class="btn waves-effect waves-light " type="submit" name="action">Modifier</button>
                  </div>
                  </div>
                </form>
              </div>
              <?php }


       ?>
    </li>
    <li>
      <div class="collapsible-header center">Groupe 8</div>
         <?php
        require_once('../Modele/Proposition.php');
        $props =Obtenir_propositions_groupe(8);

        foreach($props as $prop) 
              {
                /*print "<div class=\"collapsible-body\"><p>" .  $prop["ContenuProp"] . "";
                print "<a class=\"waves-effect waves-light green btn btn-small btn-lg right-center\">Promouvoir</a></p></div>";*/?>

              <div class="collapsible-body">
                <form id="form-insert" method="post" action="../Controlleur/modif_propositions.php">
                  <input type="hidden" name="numprop" value="<?php echo $prop["NumProp"]; ?>"></input>
                  <div class="row">
                  <div class=" col s8 offset-s2">
                  <input value="<?php echo $prop["ContenuProp"]; ?>" name="contenuprop" id="contenuprop" type="text" class="center ">
                  <label class="active" for="contenuprop"></label>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col s2 offset-s5">
                  <button class="btn waves-effect waves-light " type="submit" name="action">Modifier</button>
                  </div>
                  </div>
                </form>
              </div>
              <?php }


       ?>
    </li>
    <li>
      <div class="collapsible-header center">Groupe 9</div>
         <?php
        require_once('../Modele/Proposition.php');
        $props =Obtenir_propositions_groupe(9);

        foreach($props as $prop) 
              {
                /*print "<div class=\"collapsible-body\"><p>" .  $prop["ContenuProp"] . "";
                print "<a class=\"waves-effect waves-light green btn btn-small btn-lg right-center\">Promouvoir</a></p></div>";*/?>

              <div class="collapsible-body ">
                <form id="form-insert" method="post" action="../Controlleur/modif_propositions.php">
                  <input type="hidden" name="numprop" value="<?php echo $prop["NumProp"]; ?>"></input>
                  <div class="row">
                  <div class=" col s8 offset-s2">
                  <input value="<?php echo $prop["ContenuProp"]; ?>" name="contenuprop" id="contenuprop" type="text" class="center ">
                  <label class="active" for="contenuprop"></label>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col s2 offset-s5">
                  <button class="btn waves-effect waves-light " type="submit" name="action">Modifier</button>
                  </div>
                  </div>
                </form>
              </div>
              <?php }


       ?>
    </li>
      <li>
      <div class="collapsible-header center">Groupe 10 </div>
         <?php
        require_once('../Modele/Proposition.php');
        $props =Obtenir_propositions_groupe(10);

        foreach($props as $prop) 
              {
                /*print "<div class=\"collapsible-body\"><p>" .  $prop["ContenuProp"] . "";
                print "<a class=\"waves-effect waves-light green btn btn-small btn-lg right-center\">Promouvoir</a></p></div>";*/?>

              <div class="collapsible-body">
                <form id="form-insert" method="post" action="../Controlleur/modif_propositions.php">
                  <input type="hidden" name="numprop" value="<?php echo $prop["NumProp"]; ?>"></input>
                  <div class="row">
                  <div class=" col s8 offset-s2">
                  <input value="<?php echo $prop["ContenuProp"]; ?>" name="contenuprop" id="contenuprop" type="text" class="center ">
                  <label class="active" for="contenuprop"></label>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col s2 offset-s5">
                  <button class="btn waves-effect waves-light " type="submit" name="action">Modifier</button>
                  </div>
                  </div>
                </form>
              </div>
              <?php }

       ?>
    </li>
    <li>
      <div class="collapsible-header center">Groupe 11</div>
         <?php
        require_once('../Modele/Proposition.php');
        $props =Obtenir_propositions_groupe(11);

        foreach($props as $prop) 
              {
                /*print "<div class=\"collapsible-body\"><p>" .  $prop["ContenuProp"] . "";
                print "<a class=\"waves-effect waves-light green btn btn-small btn-lg right-center\">Promouvoir</a></p></div>";*/?>

              <div class="collapsible-body">
                <form id="form-insert" method="post" action="../Controlleur/modif_propositions.php">
                  <input type="hidden" name="numprop" value="<?php echo $prop["NumProp"]; ?>"></input>
                  <div class="row">
                  <div class=" col s8 offset-s2">
                  <input value="<?php echo $prop["ContenuProp"]; ?>" name="contenuprop" id="contenuprop" type="text" class="center ">
                  <label class="active" for="contenuprop"></label>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col s2 offset-s5">
                  <button class="btn waves-effect waves-light " type="submit" name="action">Modifier</button>
                  </div>
                  </div>
                </form>
              </div>
              <?php }


       ?>
    </li>
    <li>
      <div class="collapsible-header center">Groupe 12</div>
      <?php
        require_once('../Modele/Proposition.php');
        $props =Obtenir_propositions_groupe(12);

        foreach($props as $prop) 
              {
                /*print "<div class=\"collapsible-body\"><p>" .  $prop["ContenuProp"] . "";
                print "<a class=\"waves-effect waves-light green btn btn-small btn-lg right-center\">Promouvoir</a></p></div>";*/?>

              <div class="collapsible-body">
                <form id="form-insert" method="post" action="../Controlleur/modif_propositions.php">
                  <input type="hidden" name="numprop" value="<?php echo $prop["NumProp"]; ?>"></input>
                  <div class="row">
                  <div class=" col s8 offset-s2">
                  <input value="<?php echo $prop["ContenuProp"]; ?>" name="contenuprop" id="contenuprop" type="text" class="center ">
                  <label class="active" for="contenuprop"></label>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col s2 offset-s5">
                  <button class="btn waves-effect waves-light " type="submit" name="action">Modifier</button>
                  </div>
                  </div>
                </form>
              </div>
              <?php }

       ?>
    </li>
  </ul>
</div>

</main>
<?php include("./footer.php"); ?>

<script>
  $(document).ready(function(){
    $('ul.tabs').tabs();  });

  $(document).ready(function(){
    $('.collapsible').collapsible();
  
  });
        
    $(document).ready(function() {
    Materialize.updateTextFields();
  });
</script>

  </body>
</html>