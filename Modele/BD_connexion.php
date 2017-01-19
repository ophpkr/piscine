<?php 
function connexion()
	//Permet de se connecter à la bdd
{
	try
	{
		
	//Local
	$bdd = new PDO('mysql:host=localhost;dbname=piscine;charset=utf8', 'root', '');

	
	//$bdd = new PDO('mysql:host=127.6.174.130;dbname=nicedriver;charset=utf8', 'adminc57M6b5', 'AWD1MYZZ3tep');
	//$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	}
	catch (Exception $e)
	{
        die('Erreur : ' . $e->getMessage());
	}

return $bdd;
}
?>
