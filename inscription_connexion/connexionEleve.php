<?php require'general/header.php'; ?>

<?php

if(!empty($_POST) && !empty($_POST['email']) && !empty($_POST['pwd']))
    {
        $bdd = mysqli_connect('localhost', 'root', '','test');
        $req = "SELECT * FROM user WHERE MailUser = '".$_POST['email']."' ";
        $res = mysqli_query($bdd, $req);
        // faut creer verif que le mail entré est bien dans la bdd
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $pwd = sha1(($_POST['pwd']));
        
        if($row["NumUser"] != 0)
            {
                if(($pwd==$row["PwdUser"]) && ($row["Admin"]==0))
                    {
                        $nom = $row["NomUser"];
                        $prenom = $row["PrenomUser"];
                        $mail = $row["MailUser"];
                        setcookie('nom', "$nom", time()+ 365*24*3600); //cookie à durée d'un an
                        setcookie('prenom', "$prenom", time()+365*24*3600);
                        setcookie('mail', "$mail", time()+365*24*3600);
                        session_start();
                        $_SESSION['user'] = $nom;
                        $_SESSION['mail'] = $mail;
                        header('Location: Eleve/espaceEleve.php');
                
                    }
        
                else
                    {
                        echo 'la combinaison Mot de Passe - Utilisateur n est pas valide' ;
                    
                    }
            }
        else
            {
                echo "Ce compte élève n'existe pas";
            }
      
    }




?>

<form method="post" action = "">

<label>Adresse e-mail: <input type="email" name="email" required/></label><br/>
<label>Mot de passe: <input type="password" name="pwd" required/></label><br/>

<input type="submit" value="Connexion"/>

</form>

<?php require'general/footer.php'; ?>
