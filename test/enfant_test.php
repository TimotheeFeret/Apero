<?php
	require_once "../modeles/enfant.php";
	/*echo '// Création d\'un Enfant avec un id.';
	$enfant1 = new Enfant(1);
	var_dump($enfant1);*/
	echo '// Création d\'un enfant avec nom, prenom, date_naissance.';
	$enfant2 = new Enfant('nom_Toto', 'Toto', '2017-04-01');
	var_dump($enfant2);
	$enfant2->add();
	/*echo '// Récupération de tous les enfants dans un tableau.';
	var_dump($enfant1->getAll());*/
	/*var_dump($enfant2->getAll());*/
	// Insérer l'id de l'enfant pour pouvoir le supprimer.
	var_dump($enfant2['id']);
	if ($this->id != null)
	{
		var_dump($enfant2->delete());
		var_dump('Test de passage.');
	}
	var_dump($enfant2->getAll());
?>