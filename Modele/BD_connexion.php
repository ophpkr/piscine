<?php 
function connexion()
	//Permet de se connecter à la bdd
{
	try
	{
		
	//Local
	$bdd = new PDO('mysql:host=localhost;dbname=piscine;charset=utf8', 'root', '');

	
	

	}
	catch (Exception $e)
	{
        die('Erreur : ' . $e->getMessage());
	}

return $bdd;
}
?>
