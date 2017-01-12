<?php

require('../Modele/Proposition.php');


if( (!empty($_POST['numprop'])) && (!empty($_POST['contenuprop'])) && (!empty($_COOKIE['admin'])))
{

	$numprop=$_POST['numprop'];
	$contenuprop=$_POST['contenuprop'];
	
	

	//verifier si le code de la promo n'est pas deja présent en bd
	 Modifier_proposition($numprop,$contenuprop);

	
				$msg ="La proposition à bien été modifié ";
		   		header("location:../Vue/propositions.php?propok=" .$msg);
			 	exit();  
}
else
{
				$msg ="Vous devez remplir la proposition ";
		   		header("location:../Vue/propositions.php?propno=" .$msg);
			 	exit();  
}

?>