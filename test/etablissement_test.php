<?php
	require_once "../modeles/etablissement.php";

	// ******************** CREATION ETABLISSEMENT ******************** //
	// OK
	/*echo '// ******************** CREATION ETABLISSEMENT ******************** //';
	echo '<br/>// Création d\'un Etablissement avec un id.';
	$etablissement1 = new Etablissement(1);
	var_dump($etablissement1);
	echo '<br/>// Création d\'un Etablissement avec (nom, telephone).';
	$etablissement2 = new Etablissement('Lycée Etienne-Mimard', '0477596554');
	var_dump($etablissement2);*/

	// ******************** AJOUT ETABLISSEMENT ******************** //
	// OK
	/*echo '// ******************** AJOUT ETABLISSEMENT ******************** //';
	echo '</br>// Création d\'un Etablissement avec (nom, telephone).';
	$etablissement3 = new Etablissement('Lycée Toto', '0000000000');
	$etablissement3->add();*/

	// ******************** UPDATE ETABLISSEMENT ******************** //
	/*echo '// ******************** UPDATE ETABLISSEMENT ******************** //';
	echo '<br/>// Mise à jour d\'un enfant (id, nom, telephone).';*/
	/*$etablissement4 = new Etablissement('8', 'Lycée modification nom', 'tel modif 0477598521');
	var_dump($etablissement4->update());
	$etablissement4->update();
	echo '<br/>// Requête sur l''établissement id = 8 suite à l''update';
	var_dump($etablissement4->get('8'));*/

	// ******************** AFFICHAGE ETABLISSEMENT ******************** //
	// OK
	/*echo '// ******************** AFFICHAGE ETABLISSEMENT ******************** //';
	$etablissement5 = new Etablissement();
	echo "<br/>SELECT DE TOUS LES ETABLISSEMENTS.";
	var_dump($etablissement5->get());
	echo "<br/>SELECT D'UN SEUL ETABLISSEMENT.";
	var_dump($etablissement5->get('1'));
	echo "<br/>SELECT DE PLUSIEURS ETABLISSEMENTS.";
	var_dump($etablissement5->get('1', '2'));*/

	// ******************** SUPPRESSION ETABLISSEMENT ******************** //
	// OK
	/*echo '// ******************** SUPPRESSION ETABLISSEMENT ******************** //';
	$etablissement6 = new Etablissement('7');
	$etablissement6->delete();*/
?>