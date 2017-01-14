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
          <div class="card cyan darken-2">
            <div class="card-content white-text">
              <span class="card-title"><h5 class="center "> Gestion des Promotions  </h5></span>
              <p class="center">Vous pouvez créer un nouvelle promotion en cliquant sur le bouton à droite. </p>
              <p class="center">Vous pouvez a tout moment ouvrir ou fermer les questionnaire aux promotions de votre choix.</p>
              <p class="center">Vous pouvez voir le code que vous avez défini pour chaque promo et supprimer une promotion</p>
              <p class="center">Chaque promotion est rangé dans la formation qui lui correspond</p>
            </div>
          </div>
    </div>
   </div>
  </div>

<div class="container">
<div class="row">
  <div class="right">
  <button class="waves-effect waves-light green btn"  data-target="AjoutPromo"><i class="material-icons right">add</i>Creer Promotion</button>
  </div>
</div>

  <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s1"><a href="#IG" ><span class="bolt">IG</span></a></li>
        <li class="tab col s1"><a  href="#EGC">EGC</a></li>
        <li class="tab col s1"><a  href="#GBA">GBA</a></li>
        <li class="tab col s1"><a  href="#MAT">MAT</a></li>
        <li class="tab col s1"><a  href="#MEA">MEA</a></li>
        <li class="tab col s1"><a  href="#MI">MI</a></li>
        <li class="tab col s1"><a  href="#MSI">MSI</a></li>
        <li class="tab col s1"><a  href="#SE">SE</a></li>
        <li class="tab col s1"><a  href="#STE">STE</a></li>
      </ul>
    </div>



<div class="tab-content">
    <div id="IG" class="tab-pane fade in active">
     <table class="table2 highlight centered bordered  " >
        <thead>
          <tr>
          	  <th data-field="nom">Nom de Promo</th>
              <th data-field="Annee">Annee</th>
              <th data-field="code">Code de Promo</th>
              <th data-field="etat">Etat</th>
              <th data-field="etat">Action</th>
              <th data-field="supprimer">Supprimer</th>
  
          </tr>
        </thead>

        <tbody>

          <?php 
              require_once('../Modele/Promotion.php');

              $formation="IG";
              $promos = Obtenir_promos($formation);
                
              //Pour chaque promo on affiche .
              foreach($promos as $promo) 
              {
                print "<tr><td>" .  $promo["NomPromo"] . "</td>";
                print "<td>" .  $promo["AnneePromo"] . "</td>";
                print "<td>" .  $promo["CodePromo"] . "</td>";
               
                $res= Etat($promo["NumPromo"]);
                $etat = $res["OuverturePromo"];

                if ($etat == 0)
                {
                print "<td>Fermé</td>";
                print "<td><a class=\"waves-effect waves-light green btn btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?numpromo=".  $promo["NumPromo"] ."\">Ouvrir</a></td>";
                }
                else
                {
                print "<td>Ouvert</td>";
                print "<td><a class=\"waves-effect waves-light red btn btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?numpromo=".  $promo["NumPromo"] ."\">Fermer</a></td>";
                }

                 print "<td><a class=\"waves-effect waves-light red btn-floating btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?delpromo=".  $promo["NumPromo"] ."\"><i class=\"material-icons\">delete</i></a></td>";
                
              }
			?>

        </tbody>
      </table>

    </div>
    </div>

<div class="tab-content">
    <div id="EGC" class="tab-pane ">
     <table class="table2 highlight centered bordered  " >
        <thead>
          <tr>
              <th data-field="nom">Nom de Promo</th>
              <th data-field="Annee">Annee</th>
              <th data-field="code">Code de Promo</th>
              <th data-field="etat">Etat</th>
              <th data-field="etat">Action</th>
              <th data-field="supprimer">Supprimer</th>
  
          </tr>
        </thead>

        <tbody>

          <?php 
              require_once('../Modele/Promotion.php');

              $formation="EGC";
              $promos = Obtenir_promos($formation);
                
              //Pour chaque promo on affiche .
              foreach($promos as $promo) 
              {
                print "<tr><td>" .  $promo["NomPromo"] . "</td>";
                print "<td>" .  $promo["AnneePromo"] . "</td>";
                print "<td>" .  $promo["CodePromo"] . "</td>";
               
                $res= Etat($promo["NumPromo"]);
                $etat = $res["OuverturePromo"];

                if ($etat == 0)
                {
                print "<td>Fermé</td>";
                print "<td><a class=\"waves-effect waves-light green btn btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?numpromo=".  $promo["NumPromo"] ."\">Ouvrir</a></td>";
                }
                else
                {
                print "<td>Ouvert</td>";
                print "<td><a class=\"waves-effect waves-light red btn btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?numpromo=".  $promo["NumPromo"] ."\">Fermer</a></td>";
                }

                 print "<td><a class=\"waves-effect waves-light red btn-floating btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?delpromo=".  $promo["NumPromo"] ."\"><i class=\"material-icons\">delete</i></a></td>";
                
              }
      ?>

        </tbody>
      </table>

    </div>
    </div>


<div class="tab-content">
    <div id="GBA" class="tab-pane fade in active">
     <table class="table2 highlight centered bordered  " >
        <thead>
          <tr>
              <th data-field="nom">Nom de Promo</th>
              <th data-field="Annee">Annee</th>
              <th data-field="code">Code de Promo</th>
              <th data-field="etat">Etat</th>
              <th data-field="etat">Action</th>
              <th data-field="supprimer">Supprimer</th>
  
          </tr>
        </thead>

        <tbody>

          <?php 
              require_once('../Modele/Promotion.php');

              $formation="GBA";
              $promos = Obtenir_promos($formation);
                
              //Pour chaque promo on affiche .
              foreach($promos as $promo) 
              {
                print "<tr><td>" .  $promo["NomPromo"] . "</td>";
                print "<td>" .  $promo["AnneePromo"] . "</td>";
                print "<td>" .  $promo["CodePromo"] . "</td>";
               
                $res= Etat($promo["NumPromo"]);
                $etat = $res["OuverturePromo"];

                if ($etat == 0)
                {
                print "<td>Fermé</td>";
                print "<td><a class=\"waves-effect waves-light green btn btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?numpromo=".  $promo["NumPromo"] ."\">Ouvrir</a></td>";
                }
                else
                {
                print "<td>Ouvert</td>";
                print "<td><a class=\"waves-effect waves-light red btn btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?numpromo=".  $promo["NumPromo"] ."\">Fermer</a></td>";
                }

                 print "<td><a class=\"waves-effect waves-light red btn-floating btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?delpromo=".  $promo["NumPromo"] ."\"><i class=\"material-icons\">delete</i></a></td>";
                
              }
      ?>

        </tbody>
      </table>

    </div>
    </div>


<div class="tab-content">
    <div id="MAT" class="tab-pane fade in active">
     <table class="table2 highlight centered bordered  " >
        <thead>
          <tr>
              <th data-field="nom">Nom de Promo</th>
              <th data-field="Annee">Annee</th>
              <th data-field="code">Code de Promo</th>
              <th data-field="etat">Etat</th>
              <th data-field="etat">Action</th>
              <th data-field="supprimer">Supprimer</th>
  
          </tr>
        </thead>

        <tbody>

          <?php 
              require_once('../Modele/Promotion.php');

              $formation="MAT";
              $promos = Obtenir_promos($formation);
                
              //Pour chaque promo on affiche .
              foreach($promos as $promo) 
              {
                print "<tr><td>" .  $promo["NomPromo"] . "</td>";
                print "<td>" .  $promo["AnneePromo"] . "</td>";
                print "<td>" .  $promo["CodePromo"] . "</td>";
               
                $res= Etat($promo["NumPromo"]);
                $etat = $res["OuverturePromo"];

                if ($etat == 0)
                {
                print "<td>Fermé</td>";
                print "<td><a class=\"waves-effect waves-light green btn btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?numpromo=".  $promo["NumPromo"] ."\">Ouvrir</a></td>";
                }
                else
                {
                print "<td>Ouvert</td>";
                print "<td><a class=\"waves-effect waves-light red btn btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?numpromo=".  $promo["NumPromo"] ."\">Fermer</a></td>";
                }

                 print "<td><a class=\"waves-effect waves-light red btn-floating btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?delpromo=".  $promo["NumPromo"] ."\"><i class=\"material-icons\">delete</i></a></td>";
                
              }
      ?>

        </tbody>
      </table>

    </div>
    </div>


<div class="tab-content">
    <div id="MEA" class="tab-pane fade in active">
     <table class="table2 highlight centered bordered  " >
        <thead>
          <tr>
              <th data-field="nom">Nom de Promo</th>
              <th data-field="Annee">Annee</th>
              <th data-field="code">Code de Promo</th>
              <th data-field="etat">Etat</th>
              <th data-field="etat">Action</th>
              <th data-field="supprimer">Supprimer</th>
  
          </tr>
        </thead>

        <tbody>

          <?php 
              require_once('../Modele/Promotion.php');

              $formation="MEA";
              $promos = Obtenir_promos($formation);
                
              //Pour chaque promo on affiche .
              foreach($promos as $promo) 
              {
                print "<tr><td>" .  $promo["NomPromo"] . "</td>";
                print "<td>" .  $promo["AnneePromo"] . "</td>";
                print "<td>" .  $promo["CodePromo"] . "</td>";
               
                $res= Etat($promo["NumPromo"]);
                $etat = $res["OuverturePromo"];

                if ($etat == 0)
                {
                print "<td>Fermé</td>";
                print "<td><a class=\"waves-effect waves-light green btn btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?numpromo=".  $promo["NumPromo"] ."\">Ouvrir</a></td>";
                }
                else
                {
                print "<td>Ouvert</td>";
                print "<td><a class=\"waves-effect waves-light red btn btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?numpromo=".  $promo["NumPromo"] ."\">Fermer</a></td>";
                }

                 print "<td><a class=\"waves-effect waves-light red btn-floating btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?delpromo=".  $promo["NumPromo"] ."\"><i class=\"material-icons\">delete</i></a></td>";
                
              }
      ?>

        </tbody>
      </table>

    </div>
    </div>

<div class="tab-content">
    <div id="MI" class="tab-pane fade in active">
     <table class="table2 highlight centered bordered  " >
        <thead>
          <tr>
              <th data-field="nom">Nom de Promo</th>
              <th data-field="Annee">Annee</th>
              <th data-field="code">Code de Promo</th>
              <th data-field="etat">Etat</th>
              <th data-field="etat">Action</th>
              <th data-field="supprimer">Supprimer</th>
  
          </tr>
        </thead>

        <tbody>

          <?php 
              require_once('../Modele/Promotion.php');

              $formation="MI";
              $promos = Obtenir_promos($formation);
                
              //Pour chaque promo on affiche .
              foreach($promos as $promo) 
              {
                print "<tr><td>" .  $promo["NomPromo"] . "</td>";
                print "<td>" .  $promo["AnneePromo"] . "</td>";
                print "<td>" .  $promo["CodePromo"] . "</td>";
               
                $res= Etat($promo["NumPromo"]);
                $etat = $res["OuverturePromo"];

                if ($etat == 0)
                {
                print "<td>Fermé</td>";
                print "<td><a class=\"waves-effect waves-light green btn btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?numpromo=".  $promo["NumPromo"] ."\">Ouvrir</a></td>";
                }
                else
                {
                print "<td>Ouvert</td>";
                print "<td><a class=\"waves-effect waves-light red btn btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?numpromo=".  $promo["NumPromo"] ."\">Fermer</a></td>";
                }

                 print "<td><a class=\"waves-effect waves-light red btn-floating btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?delpromo=".  $promo["NumPromo"] ."\"><i class=\"material-icons\">delete</i></a></td>";
                
              }
      ?>

        </tbody>
      </table>

    </div>
    </div>


<div class="tab-content">
    <div id="MSI" class="tab-pane fade in active">
     <table class="table2 highlight centered bordered  " >
        <thead>
          <tr>
              <th data-field="nom">Nom de Promo</th>
              <th data-field="Annee">Annee</th>
              <th data-field="code">Code de Promo</th>
              <th data-field="etat">Etat</th>
              <th data-field="etat">Action</th>
              <th data-field="supprimer">Supprimer</th>
  
          </tr>
        </thead>

        <tbody>

          <?php 
              require_once('../Modele/Promotion.php');

              $formation="MSI";
              $promos = Obtenir_promos($formation);
                
              //Pour chaque promo on affiche .
              foreach($promos as $promo) 
              {
                print "<tr><td>" .  $promo["NomPromo"] . "</td>";
                print "<td>" .  $promo["AnneePromo"] . "</td>";
                print "<td>" .  $promo["CodePromo"] . "</td>";
               
                $res= Etat($promo["NumPromo"]);
                $etat = $res["OuverturePromo"];

                if ($etat == 0)
                {
                print "<td>Fermé</td>";
                print "<td><a class=\"waves-effect waves-light green btn btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?numpromo=".  $promo["NumPromo"] ."\">Ouvrir</a></td>";
                }
                else
                {
                print "<td>Ouvert</td>";
                print "<td><a class=\"waves-effect waves-light red btn btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?numpromo=".  $promo["NumPromo"] ."\">Fermer</a></td>";
                }

                 print "<td><a class=\"waves-effect waves-light red btn-floating btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?delpromo=".  $promo["NumPromo"] ."\"><i class=\"material-icons\">delete</i></a></td>";
                
              }
      ?>

        </tbody>
      </table>

    </div>
    </div>

<div class="tab-content">
    <div id="SE" class="tab-pane fade in active">
     <table class="table2 highlight centered bordered  " >
        <thead>
          <tr>
              <th data-field="nom">Nom de Promo</th>
              <th data-field="Annee">Annee</th>
              <th data-field="code">Code de Promo</th>
              <th data-field="etat">Etat</th>
              <th data-field="etat">Action</th>
              <th data-field="supprimer">Supprimer</th>
  
          </tr>
        </thead>

        <tbody>

          <?php 
              require_once('../Modele/Promotion.php');

              $formation="SE";
              $promos = Obtenir_promos($formation);
                
              //Pour chaque promo on affiche .
              foreach($promos as $promo) 
              {
                print "<tr><td>" .  $promo["NomPromo"] . "</td>";
                print "<td>" .  $promo["AnneePromo"] . "</td>";
                print "<td>" .  $promo["CodePromo"] . "</td>";
               
                $res= Etat($promo["NumPromo"]);
                $etat = $res["OuverturePromo"];

                if ($etat == 0)
                {
                print "<td>Fermé</td>";
                print "<td><a class=\"waves-effect waves-light green btn btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?numpromo=".  $promo["NumPromo"] ."\">Ouvrir</a></td>";
                }
                else
                {
                print "<td>Ouvert</td>";
                print "<td><a class=\"waves-effect waves-light red btn btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?numpromo=".  $promo["NumPromo"] ."\">Fermer</a></td>";
                }

                 print "<td><a class=\"waves-effect waves-light red btn-floating btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?delpromo=".  $promo["NumPromo"] ."\"><i class=\"material-icons\">delete</i></a></td>";
                
              }
      ?>

        </tbody>
      </table>

    </div>
    </div>

<div class="tab-content">
    <div id="STE" class="tab-pane fade in active">
     <table class="table2 highlight centered bordered  " >
        <thead>
          <tr>
              <th data-field="nom">Nom de Promo</th>
              <th data-field="Annee">Annee</th>
              <th data-field="code">Code de Promo</th>
              <th data-field="etat">Etat</th>
              <th data-field="etat">Action</th>
              <th data-field="supprimer">Supprimer</th>
  
          </tr>
        </thead>

        <tbody>

          <?php 
              require_once('../Modele/Promotion.php');

              $formation="STE";
              $promos = Obtenir_promos($formation);
                
              //Pour chaque promo on affiche .
              foreach($promos as $promo) 
              {
                print "<tr><td>" .  $promo["NomPromo"] . "</td>";
                print "<td>" .  $promo["AnneePromo"] . "</td>";
                print "<td>" .  $promo["CodePromo"] . "</td>";
               
                $res= Etat($promo["NumPromo"]);
                $etat = $res["OuverturePromo"];

                if ($etat == 0)
                {
                print "<td>Fermé</td>";
                print "<td><a class=\"waves-effect waves-light green btn btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?numpromo=".  $promo["NumPromo"] ."\">Ouvrir</a></td>";
                }
                else
                {
                print "<td>Ouvert</td>";
                print "<td><a class=\"waves-effect waves-light red btn btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?numpromo=".  $promo["NumPromo"] ."\">Fermer</a></td>";
                }

                 print "<td><a class=\"waves-effect waves-light red btn-floating btn-small btn-lg\" href=\"../Controlleur/gestion_promo.php?delpromo=".  $promo["NumPromo"] ."\"><i class=\"material-icons\">delete</i></a></td>";
                
              }
      ?>

        </tbody>
      </table>

    </div>
    </div>





   </div>
	</div>
  </div>


  <div id="AjoutPromo" class="modal  ">
  <div class="modal-content">
    <h3 class="center-align"> Création d'une promotion</h3>
     <p class="center-align red ">Le code de promotion doit etre unique pour chaque promo</p>
          <form class="col s12 " method="post" action="../Controlleur/ajout_promo.php">
       <div class="row">
            <div class="input-field col s6 offset-s3">
             <input id="name"  name="nom" type="text" class="validate white z-depth-5 hoverable" required >
              <label for="name">Nom Promo</label>
           </div>
        </div>
        <div class="row">
            <div class="input-field col s6 offset-s3">
             <input id="annee"  name="annee" type="text" class="validate white z-depth-5 hoverable" length="4" required >
              <label for="annee">Année en cours</label>
           </div>
        </div>

        <div class="row">
            <div class="input-field col s6 offset-s3">
             <input id="codepromo"  name="codepromo" type="text" class="validate white z-depth-5 hoverable" required >
              <label for="codepromo">Code Promo</label>
           </div>
        </div>
       
       </div>
       <div class="modal-footer">
        <div class="row">
           <div class="col s4 offset-s3">
             <button class="waves-effect waves-light green btn" type="submit">Création</button>
           </div>
       </div>
       </div>
    </form>

       
     
    </div>
  </div>


</main>
<?php include("./footer.php"); ?>
  

    <script>  
	$(document).ready(function(){
    $('ul.tabs').tabs();
  });
    
    $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
 
 $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });

      </script>
</body>
</html>