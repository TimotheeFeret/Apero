<?php
	require_once "../modeles/enfant.php";

	// ******************** CREATION ENFANT ******************** //
	// OK
	echo '// ******************** CREATION ENFANT ******************** //';
	echo '<br/>// Création d\'un Enfant avec un id.';
	$enfant0 = new Enfant();
	var_dump($enfant0);
	$enfant1 = new Enfant(1);
	var_dump($enfant1);
	echo '// Création d\'un Enfant avec (famille_id, section_id, nom, prenom, date_naissance).';
	$enfant2 = new Enfant('1', '1', 'nom_Toto', 'Toto', '2017-04-01');
	var_dump($enfant2);
	echo '// Création d\'un Enfant avec (id, famille_id, section_id, nom, prenom, date_naissance).';
	$enfant2a = new Enfant('100', '1', '1', 'nom_Toto', 'Toto', '2017-04-01');
	var_dump($enfant2a);

	// ******************** AJOUT ENFANT ******************** //
	// OK
	echo '// ******************** AJOUT ENFANT ******************** //';
	echo '</br>// Création d\'un enfant avec (famille_id, section_id, nom, prenom, date_naissance).';
	$enfant3 = new Enfant('126', '5', 'JeanJean', 'Jedusor', '2017-04-01');
	$enfant3->add();

	// ******************** UPDATE ENFANT ******************** //
	// OK
	echo '// ******************** UPDATE ENFANT ******************** //';
	echo '<br/>// Mise à jour d\'un enfant avec (id, famille_id, section_id, nom, prenom, date_naissance).';
	$enfant4 = new Enfant('300', '126', '5', 'JeanJean', 'Tutu', '2017-04-01');
	$enfant4->update();
	echo "<br/>// Requête sur l'enfant id = 300 suite à l'update";
	var_dump($enfant4->get('300'));

	// ******************** AFFICHAGE ENFANT ******************** //
	// OK
	echo '// ******************** AFFICHAGE ENFANT ******************** //';
	$enfant5 = new Enfant();
	echo "<br/>SELECT D'UN SEUL ENFANT.";
	var_dump($enfant5->get('200'));
	echo "<br/>SELECT DE PLUSIEURS ENFANTS.";
	var_dump($enfant5->get('200', '201', '202'));
	echo "<br/>SELECT DE TOUS LES ENFANTS.";
	var_dump($enfant5->get());

	// ******************** SUPPRESSION ENFANT ******************** //
	// 
	echo '// ******************** SUPPRESSION ENFANT ******************** //';
	$enfant6 = new Enfant('300');
	echo("<br/>AFFICHAGE DE L'ENFANT AVANT SUPPRESSION.");
	var_dump($enfant6->get('300'));
	echo("<br/>SUPPRESSION DE L'ENFANT.");
	$enfant6->delete();
	echo("<br/>AFFICHAGE DE L'ENFANT QUI A ETE SUPPRIME.");
	var_dump($enfant6->get('300'));
?>