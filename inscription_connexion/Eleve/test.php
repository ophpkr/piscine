<?php require 'headerEleve.php'; ?>
<?php echo $_SESSION['mail']; ?>
<?php  
     
    if(!empty($_POST))
        {
            $cle = $_POST['codePromo']; //remettre le sha1
            
            $bdd = mysqli_connect('localhost', 'root', '','test');
            $reqExistence = "SELECT NumPromo FROM promotion WHERE CodePromo = '".$cle."' ";
            $res = mysqli_query($bdd, $reqExistence);
            $verif = mysqli_fetch_array($res, MYSQLI_ASSOC);
            echo'et 1';
            var_dump($verif['NumPromo']);
            //verifie que la cle existe dans la bd
            if($verif['NumPromo'] != 0)
                {
                    $mail = $_SESSION['mail'];
                    echo 'et2';
                    $promo = ("UPDATE user SET NumPromo = '".$verif["NumPromo"]."' WHERE MailUser = '".$mail."'");
                    $exec=mysqli_query($bdd, $promo);
                    echo'ca maaaaarche!!!!!';
                    //header('Location : '); //correspond à la page du test
                }
            else
                {
                    echo "la clé entrée n'existe pas";
                }
            
        }
?>

<!-- espace dédié à rentrer la clé de la Promo -->
<form action="" method="POST">

<label>Clé de promo : <input type="password" name="codePromo"/></label><br/>
<button type="submit">Valider</button>
</form>

<?php require 'footerEleve.php'; ?>