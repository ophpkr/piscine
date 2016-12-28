<?php
class CONNEXION ;

public static function connexion()
{

$host = "mysql.hostinger.fr";
$user = "u359321685_clint";
$passwd = "012345";
$bdd = "u359321685_pisci";

$connect = mysql_connect($host,$user,$passwd) or die ("erreur de connexion au serveur" $host);
mysql_select_db($bdd, $connect) or die ("Erreur de connexion à la base");

}
?>