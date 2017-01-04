<?php 

	$num=$_POST["numero"];
	echo $_POST["numero"];
	echo $_POST["reponse1"];
	echo $_POST["reponse2"];
	echo $_POST["reponse3"];




	header("location:../Vue/homepage_user.php?numero=" .$num);
?>