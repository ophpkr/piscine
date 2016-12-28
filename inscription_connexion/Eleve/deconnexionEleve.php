<?php

    session_start();
    setCookie('nom', '', time() - 3600, '/');
	//setcookie('nom', '', time() -365*24*3600, '/');
	setcookie('prenom', False, time() -365*24*3600, '/');
    unset($_COOKIE['nom']);
    //echo '2:', $_COOKIE['nom'] ;
    unset($_COOKIE['prenom']);
    session_destroy();
    
    
?>
<script type="text/javascript">


alert("Vous allez être déconnecté");


</script>

<?php
    
    header('Location: ../index.php');
    exit; 
?>