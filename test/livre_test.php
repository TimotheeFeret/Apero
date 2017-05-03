<?php
	require_once "../modeles/livre.php";

	// ******************** CREATION LIVRE ******************** //
	// OK
	/*echo '// ******************** CREATION LIVRE ******************** //';
	echo '<br/>// Création d\'un Livre sans attribut.';
	$livre1 = new Livre();
	var_dump($livre1);
	echo '// Création d\'un Livre avec (nom_livre, prix, annee_usage).';
	$livre2 = new Livre('Bartiméus', '20', '2003');
	var_dump($livre2);*/

	// ******************** AJOUT LIVRE ******************** //
	// OK
	/*echo '// ******************** AJOUT LIVRE ******************** //';
	echo '</br>// Création d\'un livre avec (nom_livre, prix, annee_usage).';
	$livre3 = new Livre('Bartiméus', '20', '2003');
	$livre3->add();*/

	// ******************** UPDATE LIVRE ******************** //
	// OK
	/*echo '// ******************** UPDATE LIVRE ******************** //';
	echo '<br/>// Mise à jour d\'un livre avec (id, nom_livre, prix, annee_usage).';
	$livre4 = new Livre('2', 'livre modifié', '30', '3000');
	$livre4->update();
	echo '<br/>// Requête sur le livre id = 2 suite à l''update';
	var_dump($livre4->get('2'));*/

	// ******************** AFFICHAGE LIVRE ******************** //
	// OK
	/*echo '// ******************** AFFICHAGE LIVRE ******************** //';
	$livre5 = new Livre();
	echo "<br/>SELECT DE TOUS LES LIVRES.";
	var_dump($livre5->get());
	echo "<br/>SELECT D'UN SEUL LIVRE.";
	var_dump($livre5->get('1'));
	echo "<br/>SELECT DE PLUSIEURS LIVRES.";
	var_dump($livre5->get('1', '2', '3'));*/

	// ******************** SUPPRESSION LIVRE ******************** //
	// OK
	/*echo '// ******************** SUPPRESSION LIVRE ******************** //';
	$livre6 = new Livre('8');
	echo '<br/>// Requête sur le livre id = 8 avant le delete.';
	var_dump($livre6->get('8'));
	$livre6->delete();
	echo '<br/>// Requête sur le livre id = 8 suite au delete.';
	var_dump($livre6->get('8'));*/
?>