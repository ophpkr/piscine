<?php require'general/header.php'; ?>

<?php

if(!empty($_POST) && !empty($_POST['email']) && !empty($_POST['pwd']))
    {
        $bdd = mysqli_connect('localhost', 'root', '','test');
        $req = ("SELECT * FROM user WHERE MailUser = '".$_POST['email']."' ");
        $res = mysqli_query($bdd, $req);
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        
        if($row["NumUser"] != 0)
            {
                
                //hash le pwd pour ensuite le vérifier avec la valeur entrée de pwd de la bd
                $pwd = sha1(($_POST['pwd']));
        
                if(($pwd==$row["PwdUser"]) && ($row["Admin"]==1))
                    {
                        //on fait session + cookie? ou que session? ou que cookie?
                        $nom = $row["NomUser"];
                        $prenom = $row["PrenomUser"];
                        setcookie('nom', "$nom", time()+ 365*24*3600); //cookie à durée d'un an
                        setcookie('prenom', "$prenom", time()+365*24*3600);
                        session_start();
                        $_SESSION['user'] = $nom;
                        header('Location: Admin/espaceAdmin.php');
                        exit();
            
                    }
        
                else
                    {
                        echo 'la combinaison Mot de Passe - Utilisateur n est pas valide' ;
            
                    } 
                
            }
        else
            {
                echo "Ce compte admin n'existe pas"; 
            }
        
    }




?>

<form method="post" action = "">

<label>Adresse e-mail: <input type="email" name="email" required/></label><br/>
<label>Mot de passe: <input type="password" name="pwd" required/></label><br/>

<input type="submit" value="Connexion"/>

</form>

<?php require'general/footer.php'; ?>