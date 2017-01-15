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

  <div class="col s5  ">
          <div class="card blue darken-2">
            <div class="card-content white-text">
              <span class="card-title"><h5 class="center "> Groupe numero : <?php echo "$numGroupe"; ?></h5></span>
              <p>-Vous devez obligatoirement faire vos 3 choix pour passer au groupe suivant.</p>
              <p>-Une fois que vous appuyez sur suivant vos données sont envoyées et ne sont plus modifiable meme par un retour en arrière (le groupe vous sera proposé mais les réponses ne seront pas prisent en compte).</p>
            </div>
          </div>
      </div>

<form action=../Controlleur/questionnaire.php method="post">

          <div style="background-color:#bdbdbd ">
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
            </div>
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
