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

  <div id="Social" class=" modal modal-fixed-footer ">
  <div class="modal-content">
    <h3 class="center-align"> Etre Social</h3>
     <ul class="collapsible popout" data-collapsible="expandable">
      <li>
      <div class="collapsible-header"><i class="material-icons">favorite</i>PRINCIPALES VALEURS ET BESOINS</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Vos principales valeurs sont l'humanisme, la générosité, l'altruisme, et vous recherchez le lien social et le contact avec autrui.</li>
      </ul>
      </div>
    </li>
      <li>
      <div class="collapsible-header"><i class="material-icons">accessibility</i>QUALITÉS PERSONNELLES </div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Générosité, coopération, solidarité, idéalisme, tolérance, dévotion, perspicacité, bienveillance, sens du contact, diplomatie, écoute, empathie.</li>
      <li class="collection-item">Vous êtes une personne stable, accueillante, patiente avec les autres, persuasive, serviable, responsable, convaincante, compréhensive, soucieuse de la qualité de vos relations, attentive à ce que l'on pense de vous et attentive aux autres.</li>
      <li class="collection-item">Vous avez du tact.</li>
      <li class="collection-item">Vous vous préoccupez du sort des autres, vous avez tendance à voir le meilleur chez les autres.</li>
      <li class="collection-item">Vous avez besoin de vous sentir accepté.</li>
      <li class="collection-item">Vous réglez les conflits par le dialogue et vous défendez les autres.</li>
      <li class="collection-item">Vous aimez l'action concrète et le consensus.</li>
      </ul>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">directions walk</i>INTERETS PROFESSIONNELS</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Vous êtes à une ambiance chaleureuse.</li>
      <li class="collection-item">Vous êtes un soutien, vous savez encourager et inspirer confiance.</li>
      <li class="collection-item">Vous savez favoriser un climat propice à la coopération et vous mobilisez autour d'un projet commun.</li>
      <li class="collection-item">Vous savez vous adapter.</li>
      <li class="collection-item">Vous êtes capable de garder des informations confidentielles et de donner les bonnes informations aux bonnes personnes.</li>
      <li class="collection-item">Vous aimez le travail d'équipe.</li>
      <li class="collection-item">Vous aimez aider, guérir, former, enseigner et transmettre.</li>
      </ul>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">cloud</i>ENVIRONNEMENTS CONSEILLES</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Ceux qui favorisent le travail en équipe et permettent d'être en relation avec un nombre diversifié de personnes.</li>
      <li class="collection-item">Ceux qui permettent de faire avancer les gens que vous côtoyer.</li>
      <li class="collection-item">Ceux où règne le consensus</li>
      <li class="collection-item">Secteur social, éducatif, associatif, caritatif et les secteurs du soin, ressources humaines, du conseil.</li></ul>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">report problem</i>POINTS DE VIGILANCE</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Vous avez des difficultés à imposer votre point de vue et à gérer des budgets.</li>
      <li class="collection-item">Vous avez peur de blesser et pouvez être influençable ou trop accomodant.</li>
      <li class="collection-item">Vous detestez l'aventure, les débats trop intellectuels et théoriques, les activités ordonnées, systématiques et qui nécessitent l'utilisation d'objets ou de machines.</li>
      <li class="collection-item">Vous vous découragez si vous vous sentez rejeté.</li>


      
      </ul>
      </div>
    </li>
  </ul>

      

</div>
</div>

  <div id="Realiste" class="modal modal-fixed-footer">
  <div class="modal-content">
    <h3 class="center-align"> Etre Réaliste</h3>
     <ul class="collapsible popout" data-collapsible="expandable">
    <li>
      <div class="collapsible-header"><i class="material-icons">favorite</i>PRINCIPALES VALEURS ET BESOINS :</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Vos principales valeurs sont la tradition, le sens pratique, le bon sens, le goût du travail bien fait. Vous cherchez des résultats concrets.</li></ul></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">accessibility</i>QUALITÉS PERSONNELLES </div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Discipline, persévérance, efficacité, fiabilité, honnêteté, franchise, ambition, souci du travail bien fait, pragmatisme, sens pratique, sens du détail, sens des réalités, méticulosité, habileté manuelle, coordination physique, dextérité, patience, minutie, constance.</li>
      <li class="collection-item">Vous êtes une personne réaliste, concrète, précise, sensée, naturelle, simple et fidèle en amitié.</li>
      <li class="collection-item">Vous aimez les résultats tangibles et voir concrètement le résultat de vos actions.</li>
      <li class="collection-item">Vous aimez le mouvement, l’action, les sensations fortes, agir sur les choses, voir et toucher et avoir une certaine liberté.</li>
      <li class="collection-item">Vous êtes sensible aux récompenses.</li></ul></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">directions walk</i>INTERETS PROFESSIONNELS</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Intérêt pour les activités ancrées dans la réalité</li>
      <li class="collection-item">Intérêt pour la manipulation d’objets, d’outils, de machines.</li>
      <li class="collection-item">Vous savez gérer votre temps et travailler de façon autonome.</li>
      <li class="collection-item">Vous savez partager vos expériences et vos connaissances avec les autres.</li>
      <li class="collection-item">Vous préférez les solutions concrètes et pratiques aux stratégies faisant trop appel à l’imagination.</li>
      <li class="collection-item">Vous aimez construire et réparer.</li>
      <li class="collection-item">Vous aimez conduire des machines.</li>
      <li class="collection-item">Vous possédez un savoir faire mécanique.</li></ul></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">cloud</i>ENVIRONNEMENTS CONSEILLES</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Ceux orientés vers la réalisation concrète.</li>
      <li class="collection-item">Ceux qui permettent de travailler seul.</li>
      <li class="collection-item">Ceux de taille restreinte et homogène.</li>
      <li class="collection-item">Ceux assez centrés sur leurs activités.</li>
      <li class="collection-item">Pas trop hiérarchisé et permettant un travail libre et autonome.</li>
      <li class="collection-item">Ceux qui permettent une activité de plein air et qui nécessitent de l’endurance physique.</li>
      <li class="collection-item">Le travail manuel, la maintenance, l’industrie...</li></ul></div>
      <li>
      <div class="collapsible-header"><i class="material-icons">report problem</i>POINTS DE VIGILANCE</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Vous n’êtes pas portés à aller vers les autres.</li>
      <li class="collection-item">Faible intérêt pour la nouveauté.</li>
      <li class="collection-item">Difficultés à se mettre en valeur.</li>
      <li class="collection-item">Faible créativité.</li>
      <li class="collection-item">Pas très à l’aise dans la réflexion et l’abstraction.</li>
      <li class="collection-item">Vous parlez peu de vous-même, êtes peu intuitif et perspicace.</li>
      <li class="collection-item">Vous n’aimez pas les activités à caractère social, pédagogique et thérapeutique.</li></ul></div>
  </ul>
     
    </div>
  </div>

</div>
</div>

  <div id="Investigatif" class="modal modal-fixed-footer">
  <div class="modal-content">
    <h3 class="center-align"> Etre Investigatif</h3>
     <ul class="collapsible popout" data-collapsible="expandable">
    <li>
      <div class="collapsible-header"><i class="material-icons">favorite</i>PRINCIPALES VALEURS ET BESOINS :</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Vos principales valeurs sont l'indépendance, la curiosité d'esprit, le désir d'élaborer intellectuellement. Vous avez besoin d'apprendre et de comprendre.</li>
      </ul>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">accessibility</i>QUALITÉS PERSONNELLES </div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Méthode, rigueur, curiosité, calme, indépendance, sens critique, esprit d'analyse, esprit logique, esprit scientifique, sens de l'observation, sens de l'anticipation, talent pour les maths et les sciences, ouverture d'esprit, créativité, persévérance, tolérance, objectivité, raisonnement, spécialisation.</li>
      <li class="collection-item">Vous êtes une personne précise, prudente dans vos jugements et réfléchie, attirée par la théorie et par l'abstrait.</li>
      <li class="collection-item">Vous aimez les défis compliqués faisant appel à la créativité et aux raisonnements.</li>
      <li class="collection-item">Vous aimez les activités permettant d'étudier divers phénomène physiques, culturels, sociaux ou biologiques.</li>
      <li class="collection-item">Vous donnez une image de crédibilité et de compétence intellectuelle.</li>
      </ul>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">directions walk</i>INTERETS PROFESSIONNELS</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Goût pourla recherche.</li>
      <li class="collection-item">Vous tenez compte de tous les aspects d'une situation avant de l'aborder.</li>
      <li class="collection-item">Vous savez partager les responsabilités, gérer les priorités et rédiger un projet de manière claire et précise.</li>
      <li class="collection-item">Vous êtes capable de mettre en place un plan d'action.</li>
      <li class="collection-item">Vous cherchez à étendre le champ de vos connaissances, compétences, expériences.</li>
      <li class="collection-item">Vous aimez comprendre, apprendre et jongler avec les idées, les concepts et les symboles.</li>
      <li class="collection-item">Vous aimez relever les défis intellectuels complexes, étudier et résoudre des problèmes abstraits.</li>
      </ul>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">cloud</i>ENVIRONNEMENTS CONSEILLES</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Ceux qui encouragent la réflexion et l'observation.</li>
      <li class="collection-item">Ceux qui favorisent la recherche de solutions originales et mettent les personne en situation d'apprentissage permanent.</li>
      <li class="collection-item">Domaine de la recherche, des sciences, des idées, des données mathématiques, de l'éducation et de l'écrit.</li>
      </ul>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">report problem</i>POINTS DE VIGILANCE</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Vous avez des difficultés à vendre vos idées, à prendre des décisions rapides, à prendre en compte les aspects pratiques d'un projet.</li>
      <li class="collection-item">Vous n'aimez pas les contraintes de temps.</li>
      <li class="collection-item">Vous avez peu confiance en vous.</li>
      <li class="collection-item">Vous pouvez être dogmatique et refermé.</li>
      <li class="collection-item">Vous avez parfois du mal à faire la part des choses entre vie personnelle et vie professionnelle.</li>
      <li class="collection-item">Vous êtes rétif aux aspects administratifs et hiérarchiques et aux activités routinières.</li>
      </ul>
      </div>
    </li>
  </ul>
     
    </div>
  </div>

</div>
</div>

  <div id="Artistique" class="modal modal-fixed-footer">
  <div class="modal-content">
    <h3 class="center-align"> Etre Artistique</h3>
     <ul class="collapsible popout" data-collapsible="expandable">
    <li>
      <div class="collapsible-header"><i class="material-icons">favorite</i>PRINCIPALES VALEURS ET BESOINS :</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Vos principales valeurs sont la beauté, l'orignalité, l'indépendance, la sensibilité et l'imagination. Vous recherchez l'expression de soi.</li>
      </ul>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">accessibility</i>QUALITÉS PERSONNELLES </div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Non-conformisme, idéalisme, curiosité sans bornes, faculté d’adaptation, émotivité, sensibilité, capacité d’anticipation, originalité, créativité, impulsivité, intuition, indépendance.</li>
      <li class="collection-item">Vous êtes une personne ouverte, expressive, désordonnée, passionnée, de tempérament inquiet et qui ne craint pas les conflits.
      </li>
      <li class="collection-item">Vous aimez l’introspection</li>
      <li class="collection-item">Vous possédez des qualités pour ce qui est de nature artistique et ce qui fait appel au « feeling » et à l’émotion.</li>
      <li class="collection-item"> Les conditions matérielles et financières ne sont pas les plus importantes pour vous.</li>
      </ul>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">directions walk</i>INTERETS PROFESSIONNELS</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Vous savez prendre vos distances par rapport à l’avis partagé par tous.</li>
      <li class="collection-item">Vous savez prendre des initiatives.</li>
      <li class="collection-item">Vous vous lancez avec enthousiasme dans de nouvelles activités et aimez le changement.</li>
      <li class="collection-item"> Vous pouvez entraîner les autres.</li>
      <li class="collection-item">Vous êtes capable de faire des entorses aux règles admises, de tout remettre en cause si les résultats ne sont pas à la hauteur de vos ambitions de départ.</li>
      <li class="collection-item">Vous êtes capable de prendre des risques.</li>
      <li class="collection-item">Vous préférez les activités libres, ambiguës et non systématiques.</li>
      <li class="collection-item">Vous faites preuve de discipline dans votre travail.</li>

      </ul>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">cloud</i>ENVIRONNEMENTS CONSEILLES</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Ceux laissant une grande part à la créativité et à l’improvisation.</li>
      <li class="collection-item">Ceux peu structurés et laissant une grande marge de manœuvre.</li>
      <li class="collection-item">Ceux où chacun peut s’exprimer de manière personnelle à travers ce qu’il fait, lorsqu’il a le sentiment d’apporter quelque chose de personnel et de nouveau.</li>
      <li class="collection-item">Le monde artistique (musique, théâtre, danse, cinéma, écriture…), de la culture, de la communication, de la mode, de la publicité, marketing, événementiel…</li>
      </ul>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">report problem</i>POINTS DE VIGILANCE</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Vous n’êtes pas toujours apte à présenter vos projets et idées de façon claire et concrète.</li>
      <li class="collection-item">Vous avez des difficultés à entendre les objections et à vous intégrer dans une équipe, car vous avez un fort besoin de reconnaissance personnelle.</li>
      <li class="collection-item">Vous avez tendance à faire cavalier seul.</li>
      <li class="collection-item">Vous n’êtes pas toujours diplomate.</li>
      <li class="collection-item">Vous manquez d’organisation.</li>
      <li class="collection-item">Vous détestez les activités répétitives, ordonnées et systématiques.</li>
      </ul>
      </div>
    </li>
  </ul>
     
    </div>
  </div>

</div>
</div>

  <div id="Entrepreneur" class="modal modal-fixed-footer">
  <div class="modal-content">
    <h3 class="center-align"> Etre Entrepreneur</h3>
     <ul class="collapsible popout" data-collapsible="expandable">
    <li>
      <div class="collapsible-header"><i class="material-icons">favorite</i>PRINCIPALES VALEURS ET BESOINS :</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Vos principales valeurs sont le défi, le statut social, l’efficacité, la compétition et la réussite. Vous recherchez le pouvoir.</li>
      </ul>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">accessibility</i>QUALITÉS PERSONNELLES </div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Engagement, optimisme, débrouillardise, charme, bagout, persévérance, enthousiasme, audace, efficacité, détermination, ambition.</li>
      <li class="collection-item">Vous êtes une personne extravertie, persuasive, aventureuse, dominatrice, autoritaire, populaire, énergique, tonique, entreprenante, sociable, stratège, sensible au prestige, à la reconnaissance, au statut social et aux avantages matériels, motivée par la compétition et le challenge, douée pour entraîner les autres et pour le leadership.</li>
      <li class="collection-item">Vous stimulez les autres par votre énergie.</li>
      <li class="collection-item">Vous agissez à l’instinct et au moment opportun.</li>
      <li class="collection-item">Vous avez confiance en vous.</li>
      </ul>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">directions walk</i>INTERETS PROFESSIONNELS</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Vous savez prendre des positions et défendre vos opinions, vendre vos idées, motiver les autres autour d’un projet, déléguer et contrôler les résultats, prendre des risques et des décisions rapides, organiser et planifier, prendre des initiatives, mener à bien un projet.Vous pouvez diriger des personnes.</li>
      <li class="collection-item">Vous pouvez diriger des personnes.</li>
      <li class="collection-item">Vous comprenez les besoins et les attentes des membres d’un groupe.</li>
      <li class="collection-item">Vous vous exprimez avec aisance et vous aimez vendre, convaincre, gérer et négocier.</li>
      </ul>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">cloud</i>ENVIRONNEMENTS CONSEILLES</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Fortement concurrentiels dans lesquels la performance personnelle prime. 
      </li>
      <li class="collection-item">Ceux permettant de mettre sur pied des projets, d’évoluer et de prendre des responsabilités croissantes.</li>
      <li class="collection-item">Le monde du pouvoir, des affaires, de la politique, la vente.</li>

      </ul>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">report problem</i>POINTS DE VIGILANCE</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Vous manquez de vision à long terme.</li>
      <li class="collection-item">Vous avez tendance à foncer tête baissée, à manipuler, à vous surmener, à être un peu brusque en communication.</li>
      <li class="collection-item">Vous avez des difficultés à transiger.</li>
      <li class="collection-item">Vous n’aimez pas les activités intellectuelles, scientifiques ou de bureau.</li>
      <li class="collection-item">La précision dans le travail vous ennuie ainsi que les activités systématiques et d’observation.</li>
      </ul>
      </div>
    </li>
  </ul>
     
    </div>
  </div>

</div>
</div>
  <div id="Conventionnel" class="modal modal-fixed-footer">
  <div class="modal-content">
    <h3 class="center-align"> Etre Conventionnel</h3>
     <ul class="collapsible popout" data-collapsible="expandable">
    <li>
      <div class="collapsible-header"><i class="material-icons">favorite</i>PRINCIPALES VALEURS ET BESOINS :</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Vos principales valeurs sont la qualité du travail, la tradition et l’efficacité. Vous recherchez la sécurité.</li>
      </ul>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">accessibility</i>QUALITÉS PERSONNELLES </div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Stabilité, fiabilité, honnêteté, loyauté, conformisme, maîtrise de soi, discrétion, efficacité, ténacité, rigueur, ponctualité, organisation, minutie, méticulosité, prudence, sens du détail, souci du bien fait, sens du devoir, autodiscipline.</li>
      <li class="collection-item">Vous êtes une personne introvertie, calme, méthodique, disciplinée, soigneuse, précise et consciencieuse.</li>
      <li class="collection-item">Vous recherchez la sécurité, la stabilité, la meilleure façon de faire les choses.</li>
      <li class="collection-item">Vous n’aimez pas le pouvoir.</li>
      <li class="collection-item">Vous aimez savoir ce qu’on attend de vous.</li>
      <li class="collection-item">Vous acceptez l’autorité et vous appréciez d’être encadré.</li>
      <li class="collection-item">Vous avez horreur de prendre des risques inutiles.</li>
      <li class="collection-item">Vous êtes adepte de la tradition.</li>
      </ul>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">directions walk</i>INTERETS PROFESSIONNELS</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Vous êtes capable de respecter les consignes données.</li>
      <li class="collection-item">Vous savez collaborer dans un travail en commun, vous intégrer dans une équipe et partager vos connaissances avec les autres.
      </li>
      <li class="collection-item">Vous appréciez les tâches répétitives et prévisibles, l’ordre, le systématisme et la régularité.</li>
      <li class="collection-item">Vous aimez planifier, établir des consignes, organiser, assurer le suivi, mener un travail jusqu’à son terme, utiliser des ordinateurs, analyser des données, tenir des livres de comptes et calculer.</li>
      <li class="collection-item">Vous êtes rassuré de pouvoir vous en référer à une instance supérieure ou à des règles établies.</li>
      <li class="collection-item">Vous vous impliquez dans votre travail.</li>
      </ul>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">cloud</i>ENVIRONNEMENTS CONSEILLES</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Très structurés et dans lesquels les règles sont bien établies.</li>
      <li class="collection-item">Ceux qui ne nécessitent pas trop de compétition entre les gens.</li>
      <li class="collection-item">Préférence pour les grandes entreprises.</li>
      <li class="collection-item">Domaine de la finance, du juridique, de l’organisation, du contrôle et des structures administratives.</li>
      </ul>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">report problem</i>POINTS DE VIGILANCE</div>
      <div class="collapsible-body"><ul class="collection"><li class="collection-item">Vous avez des difficultés à prendre des décisions personnelles et à prendre des risques, à faire confiance à votre instinct.</li>
      <li class="collection-item">Vous manquez de créativité.</li>
      <li class="collection-item">Vous détestez le conflit, les situations ambiguës et l’improvisation.</li>
      <li class="collection-item">Vous êtes conservateur et vous vous en tenez à l’expérience acquise.</li>
      <li class="collection-item">Vous êtes assez réticent au changement.</li>
      </ul>
      </div>
    </li>
  </ul>
     
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
<script>
 $(document).ready(function(){
    $('.collapsible').collapsible();
  });
  </script


    

  </body>
</html>
