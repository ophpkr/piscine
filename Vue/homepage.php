<?php include("./head.php"); ?>
<main>
<?php include("./navbar.php"); ?>

  <!-- Si isset est defini c'est que l'utilisateur a tenté de se connecté avec un mauvais mail ou mdp-->
  <?php if (isset($_GET["connex"])) 
  { ?>
  <p class="center-align red"><?php
  // On affiche donc le contenu du message d'erreur sur la page pour avertir l'utilisateur de son erreur
  echo $_GET["connex"];?></p>
  
   <?php }?>

<div class="container">
  <h3 class="center-align" id="degrade" > Bienvenue sur votre plateforme : Test de RIASEC</h3> 


    <div class="row">
      <div class="carousel" id="degrade">
        <a class="carousel-item" href="http://www.polytech-montpellier.fr/index.php/formation/informatique-et-gestion-ig/presentation"><img src="images/ig.png"></a>
        <a class="carousel-item" href="http://www.polytech-montpellier.fr/index.php/formation/eau-et-genie-civil-apprentissage/presentation"><img src="images/egc.png"></a>
        <a class="carousel-item" href="http://www.polytech-montpellier.fr/index.php/formation/genie-biologique-agroalimentaire-gba/presentation"><img src="images/gba.png"></a>
        <a class="carousel-item" href="http://www.polytech-montpellier.fr/index.php/formation/materiaux-mat/presentation"><img src="images/mat.png"></a>
        <a class="carousel-item" href="http://www.polytech-montpellier.fr/index.php/formation/microelectronique-et-automatique-mea/presentation"><img src="images/mea.png"></a>
        <a class="carousel-item" href="http://www.polytech-montpellier.fr/index.php/formation/mecanique-et-interactions-m-i/presentation"><img src="images/mi.png"></a>
        <a class="carousel-item" href="http://www.polytech-montpellier.fr/index.php/formation/mecanique-structures-industrielles/presentation"><img src="images/msi.png"></a>
        <a class="carousel-item" href="http://www.polytech-montpellier.fr/index.php/formation/systemes-embarques-se/presentation"><img src="images/se.png"></a>
        <a class="carousel-item" href="http://www.polytech-montpellier.fr/index.php/formation/sciences-et-technologies-de-l-eau-ste/presentation"><img src="images/ste.png"></a>
      </div>
    </div>



  <div class="row">
      <div class="col s4 offset-s1">
      
        <div class="card-panel grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
              <img src="images/holland.jpg" alt="" class="circle responsive-img" width=80px;>
                <span class="black-text">
                  <I>John L. Holland (1919 - 2008) est un psychologue qui inventa le modèle RIASEC.</I>
                </span>
          </div>
        </div>
      </div>
     

      <div class="col s5 offset-s1">
        
          <div class="card-panel grey lighten-5 z-depth-1" >
               
              Le modèle RIASEC ou code Holland, est une théorie sur les carrières et les choix vocationnels qui s'appuie sur les types psychologiques. Il identifie 6 types de personnalités en milieu professionnel qui sont à mettre en lien avec les intérêts professionnels.
           
          </div>
       
      </div>
    </div>
</div>




  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer ">

  <div class="modal-content">


  	<h3 class="center-align"> Me connecter</h3>
  	 <p class="center-align"> Pour vous connecter, veuillez renseigner votre adresse mail et votre mot de passe</p>

      	
  		<form class="col s12 " method="post" action="../Controlleur/connexion.php">
   		 <div class="row">
        		<div class="input-field col s6 offset-s3">
         		 <input id="email"  name="email" type="email" class="validate white z-depth-5 hoverable" required >
          		<label for="email" data-error="addresse mail incorrecte" data-success="valide">Adresse Email</label>
       		 </div>
    		</div>
   		 <div class="row">
       		 <div class="input-field col s6 offset-s3">
          		<input id="password" name="password" type="password" class="validate white z-depth-5 hoverable" required>
         		 <label for="password">Mot de passe</label>
       		 </div>
   		 </div>
   		 </div>
   		 <div class="modal-footer">
    		<div class="row">
       		 <div class="col s4 offset-s4">
         		 <button class="waves-effect waves-light red btn" type="submit">Connexion</button>
       		 </div>
   		 </div>
   		 </div>
		</form>

</div>


 <!-- Modal Structure -->
  <div id="modal2" class="modal modal-fixed-footer">
 
 
  <div class="modal-content">
      <?php if (isset($_GET["msg"])) 
  { ?>
  <p class="center-align red"><?php
  echo $_GET["msg"];?></p>
  
   <?php }
  ?>
  	<h3 class="center-align"> S'inscrire</h3>
  	 <p class="center-align"> Pour vous inscrire, veuillez remplir tout les champs demandés</p>

      	
  		<form class="col s12" method="post" action="../Controlleur/inscription.php">
      <div class="row">
        <div class="input-field col s6 offset-s3">
          <input id="nom"  name="nom" type="text" class="validate white z-depth-5 hoverable" required >
          <label for="nom">Nom</label>
        </div>
      </div>

     <div class="row">
        <div class="input-field col s6 offset-s3">
          <input id="prenom"  name="prenom" type="text" class="validate white z-depth-5 hoverable" required >
          <label for="prenom">Prenom</label>
        </div>
      </div>
     <div class="row">
        <div class="input-field col s6 offset-s3">
          <input id="email"  name="email" type="email" class="validate white z-depth-5 hoverable" required>
          <label for="email" data-error="addresse mail incorrecte" data-success="valide">Email</label>
        </div>
      </div>
    <div class="row">
        <div class="input-field col s6 offset-s3">
          <input id="password" name="password" type="password" class="validate white z-depth-5 hoverable" required>
          <label for="password">Mot de passe</label>
        </div>
      </div>
       <div class="row">
        <div class="input-field col s6 offset-s3">
          <input id="vpassword" name="vpassword" type="password" class="validate white z-depth-5 hoverable" required>
          <label for="vpassword">Confirmation mot de passe</label>
        </div>
      </div>
      </div>
      <div class="modal-footer">
    <div class="row">
        <div class="col s4 offset-s3">
          <button class="waves-effect waves-light red btn" type="submit">S'inscrire</button>
        </div>
      </div>
      </div>
</form>


 </div>

</div>
          
</div>
</div>


</main>
<?php include("./footer.php"); ?>


  <script>  
  $(".button-collapse").sideNav(); 

  $(document).ready(function(){
    $('.slider').slider({full_width: true});
    });

   $(document).ready(function(){
      $('.carousel').carousel();
    });
  

//Script pour le modal de connexion
 $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });

      </script>



  </body>
</html>