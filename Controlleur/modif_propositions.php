<?php

require('../Modele/Proposition.php');


if( (!empty($_POST['numprop'])) && (!empty($_POST['contenuprop'])) && (!empty($_COOKIE['admin'])))
{

	$numprop=htmlentities($_POST['numprop']);
	$contenuprop=htmlentities($_POST['contenuprop']);
	
	

	//verifier si le code de la promo n'est pas deja présent en bd
	 Modifier_proposition($numprop,$contenuprop);

	
				$msg ="La proposition à bien été modifié ";
		   		header("location:../Vue/propositions.php?propok=" .$msg);
			 	  
}
else
{
				$msg ="Vous devez remplir la proposition ";
		   		header("location:../Vue/propositions.php?propno=" .$msg);
			 	  
}

?>
