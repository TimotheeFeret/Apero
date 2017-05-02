<?php
	require_once "../modeles/enfant.php";
	// ******************** CREATION ENFANT ******************** //
	/*echo '// ******************** CREATION ENFANT ******************** //';
	echo '// Création d\'un Enfant avec un id.';
	$enfant1 = new Enfant(1);
	var_dump($enfant1);
	echo '// Création d\'un Enfant avec un famille_id, section_id, nom, prenom, date_naissance.';
	$enfant2 = new Enfant('1', '1', 'nom_Toto', 'Toto', '2017-04-01');
	var_dump($enfant2);*/
	// ******************** AJOUT ENFANT ******************** //
	/*echo '// ******************** AJOUT ENFANT ******************** //';
	echo '// Création d\'un enfant avec famille_id, section_id, nom, prenom, date_naissance.';
	$enfant3 = new Enfant('1', '1', 'nom_Toto', 'Toto', '2017-04-01');
	$enfant3->add();*/
	// ******************** UPDATE ENFANT ******************** //
	/*echo '// ******************** UPDATE ENFANT ******************** //';
	echo '// Mise à jour d\'un enfant avec id, famille_id, section_id, nom, prenom, date_naissance.';*/
	// ******************** AFFICHAGE ENFANTS ******************** //
	/*echo '// ******************** AFFICHAGE ENFANTS ******************** //';*/
	// echo '// Récupération de tous les enfants dans un tableau.';
	$enfant4 = new Enfant('1');
	// echo "<br/>SELECT DE TOUS LES ENFANTS.";
	// var_dump($enfant4->get());
	echo "<br/>SELECT D'UN SEUL ENFANT.";
	var_dump($enfant4->get('79', '78'));
	// echo "<br/>SELECT DE PLUSIEURS ENFANTS.";
	// var_dump($enfant4->get('79', '80'));

	echo '// Création d\'un Enfant avec un famille_id, section_id, nom, prenom, date_naissance.';
	$enfant2 = new Enfant('91');
	$enfant2->delete();
?>