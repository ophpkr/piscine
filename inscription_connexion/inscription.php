<!-- importion des fichiers dont on a besoin -->
<?php require'general/header.php'; ?>
<?php require 'general/fonctions.php'; ?>


<!--Traitement des données rentrées dans le formulaire-->
<?php

//Verifie que les champs récupérés ne sont pas vides
if (!empty($_POST))

    {
        //créer une variable errors, tableau initialement vide,
        //rentre les erreurs trouvées au fur et à mesure que parcourt les variables postées
        $erreurs = array();
        
        // Validation du nom
        if(empty($_POST['nom']) || !preg_match('/^[a-zA-Z-_]+$/', $_POST['nom']))
        //Si le nom entré est vide ou si le nom entré contient des caractères non acceptés (i.e. autres que a-z,A-Z)
        {
            //Rentre dans le tableau erreur, pour la clé 'nom' : 'Votre nom n'est pas valide'
            $erreurs['nom'] = "Votre nom n'est pas valide";            
        }
        
        
        // Validation du prenom
        if(empty($_POST['prenom']) || !(preg_match('/^[a-zA-Z- ]+$/', $_POST['prenom'])))
        {
            //Rentre dans le tableau erreur, pour la clé 'prenom' : 'Votre prenom n'est pas valide'
            $erreurs['prenom'] = "Votre prenom n'est pas valide";            
        }
        
        // Validation du mail
        if(empty($_POST['email']) || !(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)))
        {
            //Rentre dans le tableau erreur, pour la clé 'email' : 'Votre email n'est pas valide'
            $erreurs['email'] = "Votre email n'est pas valide";
        }
        else //verifier que le mail n'est pas deja utilisé
        {
            
            
        }
        
        if(empty($_POST['pwd1']) || ($_POST['pwd1'] != $_POST['pwd2']))
        {
            $erreurs['pwd1'] = "Votre mot de passe n'est pas valide";
        }
        
        
       
    if(empty($erreurs))
        {
           
            // cryptage du pwd
            $pwd1= $_POST['pwd1'];//penser a remettre sha1

            //connexion à la bd
            //$connect = require_once 'general/bdconnect.php';
            $connect = mysqli_connect ('localhost','root','','test');
        
            $req = "INSERT INTO user (NumUser, NomUser, PrenomUser, MailUser, PwdUser, Admin, NumPromo) VALUES ('', '".$_POST['nom']."', '".$_POST['prenom']."','".$_POST['email']."','".$pwd1."', '0', '1') ";
            $red=mysqli_query($connect,$req);
            //$res = mysqli_query($connect,$req);
            //alert('Votre compte a bien été enregistré, vous pouvez vous connecter:');
            //$text="ok";
            //echo '<div class="alert alert-success">';
            //echo '<strong>Success!</strong>';
            //echo '</div>';
            //$_SESSION['flash']['success']="ok";
            header('Location: connexionEleve.php');
        }  
    }
    
 // verifier qu'un user est pas deja inscrit par adresse mail
?>

<h1>S'inscrire</h1>

<form action="" method="POST">

<label>Nom: <input type="text" name="nom" required/></label><br/>
<label>Prenom: <input type="text" name="prenom" required/></label><br/>
<label>Adresse e-mail: <input type="email" name="email" required/></label><br/>
<label>Mot de passe: <input type="password" name="pwd1" required/></label><br/>
<label>Confirmez votre mot de passe: <input type="password" name="pwd2" required/></label><br/>

<button type="submit">M'inscrire</button>
</form>


<?php require'general/footer.php'; ?>