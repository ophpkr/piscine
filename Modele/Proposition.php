<?php
	function Obtenir_propositions_groupe($numGroupe)
	{
		/*Précondition : $numGroupe : un entier correspondant à un numéro de groupe de proposition
		Récupère toutes les propositions du groupe $numGroupe et les renvoie.
		*/


		//connexion a la Base de donnée
		require_once("BD_connexion.php");
 		$bd=connexion();

		// chercher toute les réponse de l'utilisateur dans la table repondre
		$req = $bd->prepare('SELECT * FROM proposition WHERE numGroupe=:numGroupe');


		$req->bindParam(':numGroupe', $numGroupe);
		$req->execute();

		$reponses = $req->fetchAll();
		return $reponses;
	}


	function Modifier_proposition($numprop,$contenuprop)
	{
		/*Préconditions : 	- $numProp : un entier qui correspond à l'id d'une proposition
							- $contenuprop : une string
		Set le contenu de la proposition $numProp à $contenuprop
		*/


		//connexion a la Base de donnée
		require_once("BD_connexion.php");
 		$bd=connexion();

 		$req = $bd->prepare("UPDATE proposition SET ContenuProp =:contenuprop WHERE NumProp = :numprop");
		$req->bindParam(':numprop', $numprop);
		$req->bindParam(':contenuprop', $contenuprop);
		$req->execute();

	}