<?php
	require_once "../modeles/section.php";

	// ******************** CREATION SECTION ******************** //
	// OK
	/*echo '// ******************** CREATION SECTION ******************** //';
	echo '<br/>// Création d\'une Section sans attribut.';
	$section1 = new Section();
	var_dump($section1);
	echo '// Création d\'une Section avec (nom).';
	$section2 = new Section('premiereS');
	var_dump($section2);*/

	// ******************** AJOUT SECTION ******************** //
	// OK
	echo '// ******************** AJOUT SECTION ******************** //';
	echo '</br>// Création d\'un section avec (nom).';
	$section3 = new Section('premiereS');
	$section3->add();

	// ******************** UPDATE SECTION ******************** //
	// OK
	/*echo '// ******************** UPDATE SECTION ******************** //';
	echo '<br/>// Mise à jour d\'une section avec (id, nom).';
	$section4 = new Section('3', 'section modifiée');
	var_dump($section4);
	$section4->update();
	echo '<br/>// Requête sur la section id = 3 suite à l\'update.';
	var_dump($section4->get('3'));*/

	// ******************** AFFICHAGE SECTION ******************** //
	// OK
	/*echo '// ******************** AFFICHAGE SECTION ******************** //';
	$section5 = new Section();
	echo "<br/>SELECT DE TOUTES LES SECTIONS.";
	var_dump($section5->get());
	echo "<br/>SELECT D'UN SEUL SECTION.";
	var_dump($section5->get('1'));
	echo "<br/>SELECT DE PLUSIEURS SECTIONS.";
	var_dump($section5->get('1', '2', '3'));*/

	// ******************** SUPPRESSION SECTION ******************** //
	// Ne fonctionne pas car il n'y a pas de constructeur pour l'id uniquement dans la classe Section.
	/*echo '// ******************** SUPPRESSION SECTION ******************** //';
	$section6 = new Section('4');
	echo '<br/>// Requête sur la section id = 4 avant le delete.';
	var_dump($section6->get('4'));
	$section6->delete();
	echo '<br/>// Requête sur la section id = 4 suite au delete.';
	var_dump($section6->get('4'));*/
?>