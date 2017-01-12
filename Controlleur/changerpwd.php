<?php require_once('../Modele/Utilisateur.php'); ?>

<?php
    if(!empty($_POST) && !empty($_POST['ancienpwd']) && !empty($_POST['pwd1'])  && !empty($_POST['pwd2']))
        
        $apwd = sha1($_POST['ancienpwd']);
        $npwd = sha1($_POST['pwd1']);
        $vpwd = sha1($_POST['pwd2']);
        
        $numuser = $_COOKIE['user'];
        if(verifpwd($apwd, $numuser)==1)
        {
            if($npwd==$vpwd)
            {
                modifpwd($npwd, $numuser);
            }
            $msg="le mot de passe a bien été mis à jour";
        }
       else
		{	  
            $msg ="Erreur dans les informations entrées "; 		 		
		}
        
        //AUCUN MESSAGE S'AFFICHE!!!!!!!!!!!
        header("location:../Vue/parametres.php?msg=" .$msg);
        exit();       
?>