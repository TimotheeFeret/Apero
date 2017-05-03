<?php
	require_once "../modeles/enfant.php";

	// ******************** CREATION ENFANT ******************** //
	// OK
	/*echo '// ******************** CREATION ENFANT ******************** //';
	echo '<br/>// Création d\'un Enfant avec un id.';
	$enfant1 = new Enfant(1);
	var_dump($enfant1);
	echo '// Création d\'un Enfant avec (famille_id, section_id, nom, prenom, date_naissance).';
	$enfant2 = new Enfant('1', '1', 'nom_Toto', 'Toto', '2017-04-01');
	var_dump($enfant2);*/

	// ******************** AJOUT ENFANT ******************** //
	// OK
	/*echo '// ******************** AJOUT ENFANT ******************** //';
	echo '</br>// Création d\'un enfant avec (famille_id, section_id, nom, prenom, date_naissance).';
	$enfant3 = new Enfant('1', '1', 'Tom', 'Jedusor', '2017-04-01');
	$enfant3->add();*/

	// ******************** UPDATE ENFANT ******************** //
	// OK
	/*echo '// ******************** UPDATE ENFANT ******************** //';
	echo '<br/>// Mise à jour d\'un enfant avec (id, famille_id, section_id, nom, prenom, date_naissance).';
	$enfant4 = new Enfant('19', '1', '1', 'enfant modifié', 'enfant modifié', '2017-04-01');
	$enfant4->update();
	echo '<br/>// Requête sur l''enfant id = 19 suite à l''update';
	var_dump($enfant4->get('19'));*/

	// ******************** AFFICHAGE ENFANT ******************** //
	// OK
	/*echo '// ******************** AFFICHAGE ENFANT ******************** //';
	$enfant5 = new Enfant();
	echo "<br/>SELECT DE TOUS LES ENFANTS.";
	var_dump($enfant5->get());
	echo "<br/>SELECT D'UN SEUL ENFANT.";
	var_dump($enfant5->get('17'));
	echo "<br/>SELECT DE PLUSIEURS ENFANTS.";
	var_dump($enfant5->get('17', '18', '80'));*/

	// ******************** SUPPRESSION ENFANT ******************** //
	// OK
	/*echo '// ******************** SUPPRESSION ENFANT ******************** //';
	$enfant6 = new Enfant('90');
	$enfant6->delete();*/
?>