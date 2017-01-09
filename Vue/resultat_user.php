<?php
  if(!isset($_COOKIE["user"]))
        {
         header("Location: ../Vue/connexion.php");
        }
?>

 <!DOCTYPE html>
  <html>
  <body >
  <head>
  
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Test de RIASEC</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="assets/css/perso.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>

   
   <style>
#chartdiv {
  width:90%;
  height: 400px;
} 
  
  .modal
{
 width: 50% !important ; 
 max-height: 80% !important;
 overflow-y: hidden !important ;
/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#f2f6f8+0,d8e1e7+18,d8e1e7+18,d8e1e7+25,b5c6d0+48,e0eff9+85 */
/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#ffffff+0,ebe7fd+16,16bfb9+33,d1d1d1+49,8fbfb9+69,f2f0fe+100 */
/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#1e5799+6,7db9e8+72,7db9e8+72,1e5799+82&1+9,1+20,0.7+59,0+96 */
/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#b7deed+0,71ceef+29,21b4e2+50,b7deed+100 */
background: rgb(183,222,237); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(183,222,237,1) 0%, rgba(113,206,239,1) 29%, rgba(33,180,226,1) 50%, rgba(183,222,237,1) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top,  rgba(183,222,237,1) 0%,rgba(113,206,239,1) 29%,rgba(33,180,226,1) 50%,rgba(183,222,237,1) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom,  rgba(183,222,237,1) 0%,rgba(113,206,239,1) 29%,rgba(33,180,226,1) 50%,rgba(183,222,237,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b7deed', endColorstr='#b7deed',GradientType=0 ); /* IE6-9 */

}
</style>

  </head>

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
        <li><a href="connexion.php"><i class="material-icons right">view_module</i>Paramètre</a></li>
        <li><a href="questionnaire.php"><i class="material-icons right">view_module</i>Démarrer le Test</a></li>
        <li><a href="inscription.php"><i class="material-icons right">view_module</i>Déconnexion</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
</div>

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
  
  

 $profil = array(
 
      'Realiste' => $realiste, 
      'Investigatif' => $investigatif, 
      'Artistique' => $artistique,
      'Social'=> $social, 
      'Entrepreneur' => $entrepreneur,
      'Conventionnel'=> $conventionnel
  );

$array_profil = array();
$array_value = array();

arsort($profil);
foreach($profil as $key => $val)
{
  $array_profil[] =$key;
  $array_value[] = $val;

}


?>

<div class="container" >
<h3 class="center-align" style="background-color:#6fcae8"> Vous êtes <?php echo $array_profil[0]?> ! </h3>
     <p class="center-align"> Consultez les résultats de votre test et affichez le descriptif.</p>
<div class="row">
<div class="col s8 offset-s2  blue lighten-4" >
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
           <tr> %
            <td><?php echo $array_profil[5] ?></td>
            <td><?php printf ("%6.2f",$array_value[5]) ?>% </td>
            <td><a class="waves-effect waves-red btn-floating  " href="#<?php echo $array_profil[5] ?>"><i class="material-icons right">receipt</i></a></td>

          </tr>
        </tbody>
  </table>
</div>
</div>
 <!-- Modal Trigger -->
 <div class="col s4 offset-s4 center-align">
  <a class="waves-effect waves-light btn red center-align " href="#radar"><i class="material-icons right">polymer</i> Affichage radar</a>
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

  <div id="Social" class="modal  ">
  <div class="modal-content">
    <h3 class="center-align"> Etre Social</h3>
     <p class="center-align "> brrrr</p>

        <div class="row">
    <div class=" blue lighten-4" >
     
    </div>
  </div>

</div>
</div>

  <div id="Realiste" class="modal  ">
  <div class="modal-content">
    <h3 class="center-align"> Etre Réaliste</h3>
     <p class="center-align "> brrrr</p>

        <div class="row">
    <div class=" blue lighten-4" >
     
    </div>
  </div>

</div>
</div>

  <div id="Investigatif" class="modal  ">
  <div class="modal-content">
    <h3 class="center-align"> Etre Investigatif</h3>
     <p class="center-align "> brrrr</p>

        <div class="row">
    <div class=" blue lighten-4" >
     
    </div>
  </div>

</div>
</div>

  <div id="Artistique" class="modal  ">
  <div class="modal-content">
    <h3 class="center-align"> Etre Artistique</h3>
     <p class="center-align "> brrrr</p>

        <div class="row">
    <div class=" blue lighten-4" >
     
    </div>
  </div>

</div>
</div>

  <div id="Entrepreneur" class="modal  ">
  <div class="modal-content">
    <h3 class="center-align"> Etre Entrepreneur</h3>
     <p class="center-align "> brrrr</p>

        <div class="row">
    <div class=" blue lighten-4" >
     
    </div>
  </div>

</div>
</div>
  <div id="Conventionnel" class="modal  ">
  <div class="modal-content">
    <h3 class="center-align"> Etre Conventionnel</h3>
     <p class="center-align "> brrrr</p>

        <div class="row">
    <div class=" blue lighten-4" >
     
    </div>
  </div>

</div>
</div>




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
