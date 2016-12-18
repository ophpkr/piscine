<?php require'general/header.php'; ?>

<?php

if(!empty($_POST) && !empty($_POST['email']) && !empty($_POST['pwd']))
    {
        $bdd = mysqli_connect('localhost', 'root', '','test');
        $req = ("SELECT * FROM user WHERE MailUser = '".$_POST['email']."' ");
        $res = mysqli_query($bdd, $req);
        // faut creer verif que le mail entré est bien dans la bdd
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    
        $pwd = ($_POST['pwd']); //penser a remettre sha1
        
        if(($pwd==$row["PwdUser"]) && ($row["Admin"]==0))
        {
            header('Location: espaceEleve.php');
        
        }
        
        else
        {
           echo 'la combinaison Mot de Passe - Utilisateur n est pas valide' ;
            
        }
        //printf ("%s (%s)\n", $row["Name"], $row["CountryCode"]);
        

        /* $mail = $_POST['email'];
        $pwd = $_POST['pwd'];
        
        //Cryptage du mot de passe pour pouvoir le comparer ensuite à celui présent dans la base si l'adresse mail existe 
        $passe = sha1($pwd);
        
        //Recherche le compte correspondant à l'adresse mail
        $trouve = "SELECT COUNT(*) FROM User WHERE MailUser='$mail'";
        $res=mysqli_query($bdd, $trouve);
        $nbmailtrouve = mysqli_fetch_array($res, MYSQLI_NUM);
        if($nbmailtrouve == 0)
            {
                echo "Ce compte n'existe pas"
                
            }
        else
            {
                if 
            }
        header(espaceEleve.php) */
        
    }



?>

<form method="post" action = "">

<label>Adresse e-mail: <input type="email" name="email" required/></label><br/>
<label>Mot de passe: <input type="password" name="pwd" required/></label><br/>

<input type="submit" value="Connexion"/>

</form>

<?php require'general/footer.php'; ?>
