<?php
	require_once "../modeles/livre.php";

	// ******************** CREATION LIVRE ******************** //
	// ok
	/*echo '// ******************** CREATION LIVRE ******************** //';
	echo '<br/>// Création d\'un Livre sans attribut.';
	$livre1 = new Livre();
	var_dump($livre1);
	echo '// Création d\'un Livre avec (isbn, nom_livre, prix, annee_usage).';
	$livre2 = new Livre('964-5-7007-8514-1', 'Bartiméus', '20', '2003');
	var_dump($livre2);*/

	// ******************** AJOUT LIVRE ******************** //
	// OK
	/*echo '// ******************** AJOUT LIVRE ******************** //';
	echo '</br>// Création d\'un livre avec (isbn, nom_livre, prix, annee_usage).';
	$livre3 = new Livre('964-5-7007-8514-1', 'Bartiméus', '20', '2003');
	$livre3->add();*/

	// ******************** UPDATE LIVRE ******************** //
	// OK
	/*echo '// ******************** UPDATE LIVRE ******************** //';
	echo '<br/>// Mise à jour d\'un livre avec (id, isbn, nom_livre, prix, annee_usage).';
	$livre4 = new Livre('3', '964-5-7007-8514-1', 'livre modifié', '30', '3000');
	$livre4->update();
	echo '<br/>// Requête sur le livre id = 3 suite à l\'update';
	var_dump($livre4->get('3'));*/

	// ******************** AFFICHAGE LIVRE ******************** //
	// OK
	/*echo '// ******************** AFFICHAGE LIVRE ******************** //';
	$livre5 = new Livre();
	echo "<br/>SELECT D'UN SEUL LIVRE.";
	var_dump($livre5->get('3'));
	echo "<br/>SELECT DE PLUSIEURS LIVRES.";
	var_dump($livre5->get('3', '4', '5'));
	echo "<br/>SELECT DE TOUS LES LIVRES.";
	var_dump($livre5->get());*/

	// ******************** SUPPRESSION LIVRE ******************** //
	// OK
	/*echo '// ******************** SUPPRESSION LIVRE ******************** //';
	$livre6 = new Livre('16');
	echo '<br/>// Requête sur le livre id = 16 avant le delete.';
	var_dump($livre6->get('16'));
	$livre6->delete();
	echo '<br/>// Requête sur le livre id = 16 suite au delete.';
	var_dump($livre6->get('16'));*/
?>