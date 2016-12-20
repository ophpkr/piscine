<?php
class RESULTAT_USER ;

public static function resultat_user($id_user)
{
	$g1 = "aaaa" ;
	$g2 = "bbbb" ;
	$g3 = "cccc" ;
	$g4 = "dddd" ;
	$g5 = "eeee" ;
	$g6 = "ffff" ;

	$score1 = calcul_genre($id_user, $g1) / (71 * 3) ;
	$score2 = calcul_genre($id_user, $g2) / (71 * 3) ;
	$score3 = calcul_genre($id_user, $g3) / (71 * 3) ;
	$score4 = calcul_genre($id_user, $g4) / (71 * 3) ;
	$score5 = calcul_genre($id_user, $g5) / (71 * 3) ;
	$score6 = calcul_genre($id_user, $g6) / (71 * 3) ;

	$resultats = [$score1, $score2, $score3, $score4, $score5, $score6] ;

	print(max($score1, $score2, $score3, $score4, $score5, $score6)) ;

	return $resultats ;

}