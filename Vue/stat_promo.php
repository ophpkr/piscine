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
    <div class="carousel">
    <a class="carousel-item" href="liste_promo.php?nompromo=ig"><img src="images/ig.jpg"></a>
    <a class="carousel-item" href="liste_promo.php?nompromo=egc"><img src="images/egc.jpg"></a>
    <a class="carousel-item" href="liste_promo.php?nompromo=gba"><img src="images/gba.jpg"></a>
    <a class="carousel-item" href="liste_promo.php?nompromo=mat"><img src="images/mat.jpg"></a>
    <a class="carousel-item" href="liste_promo.php?nompromo=mea"><img src="images/mea.jpg"></a>
    <a class="carousel-item" href="liste_promo.php?nompromo=mi"><img src="images/mi.jpg"></a>
    <a class="carousel-item" href="liste_promo.php?nompromo=msi"><img src="images/msi.jpg"></a>
    <a class="carousel-item" href="liste_promo.php?nompromo=se"><img src="images/se.jpg"></a>
    <a class="carousel-item" href="liste_promo.php?nompromo=ste"><img src="images/ste.jpg"></a>
  </div>
</div>


</main>
<?php include("./footer.php"); ?>

<!-- Script qui permet d'effectuer le carroussel-->
<script>
   $(document).ready(function(){
      $('.carousel').carousel();
    });
</script>


  </body>
</html>