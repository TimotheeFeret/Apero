<?php
	require_once "../modeles/livre.php";

	// ******************** CREATION LIVRE ******************** //
	// 
	echo '// ******************** CREATION LIVRE ******************** //';
	echo '<br/>// Création d\'un Livre avec un id.';
	$livre1 = new Livre(1);
	var_dump($livre1);
	echo '// Création d\'un Livre avec (nom_livre, prix, annee_usage).';
	$livre2 = new Livre('Bartiméus', '20', '2003');
	var_dump($livre2);*

	// ******************** AJOUT LIVRE ******************** //
	// 
	/*echo '// ******************** AJOUT LIVRE ******************** //';
	echo '</br>// Création d\'un livre avec (nom_livre, prix, annee_usage).';
	$livre3 = new Livre('Bartiméus', '20', '2003');
	$livre3->add();*/

	// ******************** UPDATE LIVRE ******************** //
	// 
	/*echo '// ******************** UPDATE LIVRE ******************** //';
	echo '<br/>// Mise à jour d\'un livre avec (id, nom_livre, prix, annee_usage).';
	$livre4 = new Livre('19', '1', '1', 'livre modifié', 'livre modifié', '2017-04-01');
	$livre4->update();*/

	// ******************** AFFICHAGE LIVRE ******************** //
	/*// 
	echo '// ******************** AFFICHAGE LIVRE ******************** //';
	$livre5 = new Livre();
	echo "<br/>SELECT DE TOUS LES LIVRES.";
	var_dump($livre5->get());
	echo "<br/>SELECT D'UN SEUL LIVRE.";
	var_dump($livre5->get('78'));
	echo "<br/>SELECT DE PLUSIEURS LIVRES.";
	var_dump($livre5->get('78', '79', '80'));*/

	// ******************** SUPPRESSION LIVRE ******************** //
	// 
	/*echo '// ******************** SUPPRESSION LIVRE ******************** //';
	$livre6 = new Livre('90');
	$livre6->delete();*/
?>