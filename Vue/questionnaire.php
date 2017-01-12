<?php
  if(!isset($_COOKIE["user"]))
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
   

<?php
    // Inclusion des fichiers qui permettent de faire appel aux fonctions et aux requetes en BD.
    require_once('../Modele/Proposition.php');

   if (isset($_GET['numero']) )
    {
        $numGroupe = $_GET['numero'];
        
    } 
    
    else 
    {
    $numGroupe = 1;
    } ?>

<div class="container">

<form action=../Controlleur/questionnaire.php method="post">
<p><h3> Groupe numero : <?php echo "$numGroupe"; ?></h3></p>
            <table class="responsive-table highlight bordered striped">
                <thead> <!-- En-tête du tableau -->
                <tr>
                    <th></th>
                    <th>Choix 1</th>
                    <th>Choix 2</th>
                    <th>Choix 3</th>
                </tr>
                </thead>

                <tbody> <!-- Corps du tableau -->
                <?php
                $propositions = Obtenir_propositions_groupe($numGroupe);
                foreach ($propositions as $proposition){?>
                    <tr>
                    
                    <td><?php echo "$proposition[ContenuProp]"; ?></td>
        

                    <td><input class="with-gap" name="option1" type="radio" id=<?php echo "$proposition[NumProp]"; ?> value=<?php echo "$proposition[NumProp]"; ?> required>
                    <label for=<?php echo "$proposition[NumProp]"; ?> ></label></td>

                    <td><input class="with-gap" name="option2" type="radio" id=<?php echo "$proposition[NumProp]+1"; ?> value=<?php echo "$proposition[NumProp]"; ?> >
                    <label for=<?php echo "$proposition[NumProp]+1"; ?>></label></td>

                    <td><input class="with-gap" name="option3" type="radio" id=<?php echo "$proposition[NumProp]+2"; ?> value=<?php echo "$proposition[NumProp]"; ?> >
                    <label for=<?php echo "$proposition[NumProp]+2"; ?>></label></td>

                    </tr>

                <?php
            }
                ?>
                </tbody>
            </table>
            <input type="hidden" name="numero" value="<?php echo $numGroupe;?>">
            <?php
            if($numGroupe == 12)
                echo '<p class="right-align"><button class="btn waves-effect waves-light green btn " type="submit" name="action">Valider
                      <i class="material-icons right">send</i>
                      </button></p>';
            else
               echo '<p class="right-align"><button class="btn waves-effect waves-light red btn " type="submit" name="action">Suivant
                     <i class="material-icons right">send</i>
                     </button></p>';
            ?>
        </form>

</div>

</main>
 

<?php include("./footer.php"); ?>


  <!--  Scripts
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="assets/js/materialize.js"></script>
  <script src="assets/js/init.js"></script>-->
   
   



<script>
$('input[type=radio]').click(function(){
    $(this).parent().parent().find('input[type=radio]').prop('checked',false);
    $(this).prop('checked',true);
});
</script>

  </body>
</html>
