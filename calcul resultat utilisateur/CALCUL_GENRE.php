<?php
class CALCUL_GENRE ;

public static function calcul_genre($id_user, $genre)
{

	$resultat1 = $bdd->query('
	SELECT SUM (Rreponse1)
	FROM repondre R, proposition PR
	WHERE :id_user = RNumUser AND $genre = PRNumProfil AND PRNumprop = RNumprop;
	');

	$resultat2 = $bdd->query('
	SELECT SUM (Rreponse2)
	FROM repondre R, proposition PR
	WHERE :id_user = RNumUser AND $genre = PRNumProfil AND PRNumprop = RNumprop;
	');

	$resultat3 = $bdd->query('
	SELECT SUM (Rreponse3)
	FROM repondre R, proposition PR
	WHERE :id_user = RNumUser AND $genre = PRNumProfil AND PRNumprop = RNumprop;
	');

	$score = $resultat1 * 3 ;
	$score += $resultat2 * 2 ; 
	$score += $resultat3 * 1 ;

	return $score ;
}