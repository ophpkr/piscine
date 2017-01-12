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

  

   


<?php 
  require_once('../Modele/Reponse.php');
  require_once('../Modele/Promotion.php');

  //recuperation de la promo choisi
  $NumPromo=htmlspecialchars($_POST["numpromo"]);

  // On va chercher tout les eleves de cette promo qui ont répondu a aux moins un groupe de question du questionnaire
  $touteleves = Obtenir_reponses_promo($NumPromo);
  $eleves =array();

  // Pour chaque eleves reçu on va compter le nombre de ligne qu'il a dans la table repondre :Si il en a 12(il a donc repondu a tout le questionnaire) on l'ajoute au tableau sinon non. Cela permet d'obtenir seulement les eleves qui ont terminé le questionnaire et non les autre.
     foreach($touteleves as $boneleve) 
             {
                $NumUser=$boneleve["NumUser"];
                $nb_reponses= Obtenir_nombre_reponses_user($NumUser);
                if($nb_reponses == 12)
                {
                  $eleves[]= $NumUser;
                }
             }


  // On va chercher le nombre d'eleves qui ont terminer le test pour cette promo
  $nb_eleves = sizeof($eleves);
  

  

 // Les scores de Promo sont stocké dans ces variables.
  $realiste=0;
  $investigatif=0;
  $artistique=0;
  $social=0;
  $entrepreneur=0;
  $conventionnel=0;

  //Pour chaque eleve d'IG qui a répondu on calcule son score et on met a jour les variables de promo         
  foreach($eleves as $eleve) 
             {
                $NumUser=$eleve;
                $realiste = $realiste + calcul_genre($NumUser,1);
                $investigatif = $investigatif + calcul_genre($NumUser,2);
                $artistique = $artistique+ calcul_genre($NumUser,3);
                $social =    $social +  calcul_genre($NumUser,4);
                $entrepreneur = $entrepreneur + calcul_genre($NumUser,5);
                $conventionnel= $conventionnel+ calcul_genre($NumUser,6);
             }
// Pour eviter les erreurs de division par 0
if($nb_eleves !=0)
{
  $realiste =    ($realiste *100)/(72*$nb_eleves);
  $investigatif =($investigatif*100)/(72*$nb_eleves);
  $artistique =  ($artistique*100)/(72*$nb_eleves);
  $social =       ($social*100)/(72*$nb_eleves);
  $entrepreneur = ($entrepreneur *100)/(72*$nb_eleves);
  $conventionnel= ($conventionnel *100)/(72*$nb_eleves);
}

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

<div class="container" >
<h3 class="center-align" style="background-color:#6fcae8"> <?php echo $nb_eleves?> personnes ont terminé le Test ! </h3>
     <p class="center-align"> Consultez les résultats.</p>
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
           <tr> 
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



</div>
 </main>

 <?php include("./footer.php"); ?>




<!-- Script pour le modal de connexion-->
<script>
 $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });

      </script>


    

  </body>
</html>