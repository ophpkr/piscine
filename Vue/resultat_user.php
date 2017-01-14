<?php
  if(!isset($_COOKIE["user"]))
        {
         header("Location: ../Vue/homepage.php");
        }
?>

 <?php include("./head.php"); ?>
    <style>
#chartdiv {
  width:90%;
  height: 400px;
} 
#chartdiv2 {
  width: 100%;
  height: 500px;
}
#chartdiv3 {
  width : 100%;
  height  : 500px;
}
</style>
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
  require_once('../Modele/Reponse.php');

  $NumUser=$_COOKIE["user"];
  // Initialisation des variables à 0
  
  $realiste =     (calcul_genre($NumUser,1)*100)/72;
  $investigatif = (calcul_genre($NumUser,2)*100)/72;
  $artistique =   (calcul_genre($NumUser,3)*100)/72;
  $social =       (calcul_genre($NumUser,4)*100)/72;
  $entrepreneur = (calcul_genre($NumUser,5)*100)/72;
  $conventionnel= (calcul_genre($NumUser,6)*100)/72;
  
  // Classement par ordre décroissant des profils

  //  On crée un tableau associatif avec pour clef les noms des profils et comme valeur,la valeur calculé précedemment
 $profil = array(
 
      'Realiste' => $realiste, 
      'Investigatif' => $investigatif, 
      'Artistique' => $artistique,
      'Social'=> $social, 
      'Entrepreneur' => $entrepreneur,
      'Conventionnel'=> $conventionnel
  );
// On crée un tableau de profil et un tableau de valeur
$array_profil = array();
$array_value = array();

// Fonction permmettant de trier par ordre decroissant
arsort($profil);

// On place chaque clé dans un tableau et chaque valeur dans un autre, les index de chaque tableau correspondront avec la clef et la valeur
foreach($profil as $key => $val)
{
  $array_profil[] =$key;
  $array_value[] = $val;

}


?>

<div class="row">
<div class="container">
  <h3 class="center"> Vos résultats !</h3>
  
        <div class="col s5  ">
          <div class="card cyan darken-2">
            <div class="card-content white-text">
              <span class="card-title"><h5 class="center "> Vous êtes <?php echo $array_profil[0]?> !  </h5></span>
              <p>Vous trouverez dans cette page le tableau trié par ordre décroissant de vos résultats de personnalité. </p>
              <p>De plus, vous pouvez consulter le descriptif de chaques profil en cliquant sur la petite icone qui s'affiche a coté de chaque résultat.</p>
              <p>Différent choix de visualisation des résultats vous sont proposé : Optez pour le radar / le diagramme en baton ou le camembert</p>
            </div>
          </div>
      </div>

<div class="col s5 offset-s2" >
  <table class="responsive-table bordered highlight centered striped">
        <thead>
          <tr>
              <th data-field="profil">Profils</th>
              <th data-field="pourcent">Pourcentages</th>
              <th data-field="descrip">Description</th>
              
          </tr>
        </thead>

        <tbody>
          <tr>
            <td><?php echo $array_profil[0] ?></td>
            <td><?php printf ("%6.2f",$array_value[0]) ?>% </td>
            <td><a class="waves-effect waves-red btn-floating   " href="#<?php echo $array_profil[0] ?>"><i class="material-icons right">receipt</i></a></td>
          </tr>
           <tr>
           <td><?php echo $array_profil[1] ?></td>
            <td><?php printf ("%6.2f",$array_value[1]) ?>% </td>
            <td><a class="waves-effect waves-red btn-floating   " href="#<?php echo $array_profil[1] ?>"><i class="material-icons right">receipt</i></a></td>
          </tr>
           <tr>
            <td><?php echo $array_profil[2] ?></td>
            <td><?php printf ("%6.2f",$array_value[2]) ?>% </td>
            <td><a class="waves-effect waves-red btn-floating   " href="#<?php echo $array_profil[2] ?>"><i class="material-icons right">receipt</i></a></td>
          </tr>
           <tr>
            <td><?php echo $array_profil[3] ?></td>
            <td><?php printf ("%6.2f",$array_value[3]) ?>% </td>
            <td><a class="waves-effect waves-red btn-floating  " href="#<?php echo $array_profil[3] ?>"><i class="material-icons right">receipt</i></a></td>
          </tr>
           <tr>
            <td><?php echo $array_profil[4] ?></td>
            <td><?php printf ("%6.2f",$array_value[4]) ?>% </td>
            <td><a class="waves-effect waves-red btn-floating   " href="#<?php echo $array_profil[4] ?>"><i class="material-icons right">receipt</i></a></td>
          </tr>
           <tr> 
            <td><?php echo $array_profil[5] ?></td>
            <td><?php printf ("%6.2f",$array_value[5]) ?>% </td>
            <td><a class="waves-effect waves-red btn-floating  " href="#<?php echo $array_profil[5] ?>"><i class="material-icons right">receipt</i></a></td>

          </tr>
        </tbody>
  </table>
</div>
</div>
</div>

 <div class="container">
  <div class="row">
      <div class="col s4 m4" style="background-color: #0097a7 ">
      </br>
        <div class=center>
          <a class="waves-effect  btn red center-align " href="#radar"> Radar</a>
        </div>
        </br>
      </div>
      <div class="col s4 m4" style="background-color: #0097a7 ">
      </br>
        <div class=center>
          <a class="waves-effect  btn red center-align " href="#baton"> Baton </a>
        </div>
        </br>
      </div>
      <div class="col s4 m4" style="background-color: #0097a7  ">
      </br>
        <div class=center>
          <a class="waves-effect  btn red center-align " href="#camembert"> Camembert</a>
        </div>
        </br>
      </div>
  </div>
</div> 


  <div id="radar" class="modal  ">
    <div class="modal-content">
      <h3 class="center-align"> Vos Résultats</h3>
      <p class="center-align "> Placer le curseur sur les points pour connaitre votre pourcentage</p>

      <div class="row">
        <div class=" grey lighten-5" >
          <?php include("./radar.php"); ?>
        </div>
      </div>
   </div>
  </div>  

  <div id="camembert" class="modal  ">
    <div class="modal-content">
      <h3 class="center-align"> Vos Résultats</h3>
      

      <div class="row">
        <div class=" grey lighten-5" >
          <?php include("./camembert.php"); ?>
        </div>
      </div>
   </div>
  </div>   

  <div id="baton" class="modal  ">
    <div class="modal-content">
      <h3 class="center-align"> Vos Résultats</h3>
      

      <div class="row">
        <div class=" grey lighten-5" >
          <?php include("./baton.php"); ?>
        </div>
      </div>
   </div>
  </div>   

  <?php include("./descriptif.php"); ?>





 </main>

 <?php include("./footer.php"); ?>


  <!--  Scripts
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="assets/js/materialize.js"></script>
  <script src="assets/js/init.js"></script>-->
   
  <!--  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="assets/js/materialize.min.js"></script>-->

<!-- Script pour le modal de connexion-->
<script>
 $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });

      </script>


    

  </body>
</html>
