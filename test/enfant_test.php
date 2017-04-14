<?php
	require_once "../modeles/enfant.php";
	$enfant = new Enfant(1);
	var_dump(($enfant));
	echo $enfant->getAll();
?>