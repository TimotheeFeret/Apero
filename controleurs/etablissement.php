<?php
	require_once "../modeles/etablissement.php";
	require_once "../modeles/fonctions.php";
	require_once "../config/connexion_bd.php";

	switch ($_POST['event']) {
		case 'add':
			// Vérifie que les données sont renseignées.
			if( !isset($_POST['data']) ) {
				return echo json_encode('error' => 'Toutes les données ne sont pas renseignées');
			}
			// Récupère les données et les stocke dans un tableau.
			$data = explode('&', $_POST['data']);
			$etablissement = new Etablissement($data['nom'], $data['telephone']);
			// Ajoute l'établissement ou génère une erreur si l'ajout a échoué.
			try {
				$etablissement->add();
			} catch (Exception $e) {
				return echo json_encode('error' => $e->getMessage());
			}
			return echo json_encode(true);
			break;

		case 'delete':
			// Vérifie que l'id est renseigné.
			if( !isset($_POST['id']) ) {
				return echo json_encode('error' => 'L''id n''est pas renseigné');
			}
			$etablissement = new Etablissement($_POST['id']);
			// Supprime l'établissement ou génère une erreur si la suppression a échoué.
			try {
				$etablissement->delete();
			} catch (Exception $e) {
				return echo json_encode('error' => $e->getMessage());
			}
			break;

		case 'update':
			// Vérifie que l'id est renseigné.
			if( !isset($_POST['id']) ) {
				return echo json_encode('error' => 'L''id n''est pas renseigné');
			}
			if( !isset($_POST['data']) ) {
				return echo json_encode('error' => 'Toutes les données ne sont pas renseignées');
			}
			$data = explode('&', $_POST['data']);
			$etablissement = new Etablissement($_POST['id'], $data['nom'], $data['telephone']);
			// Faire un nouveau constructeur avec l'id et les data
			try {
				$etablissement->update();
			} catch (Exception $e) {
				return echo json_encode('error' => $e->getMessage());
			}
			break;

		case 'get':
			// Instanciation par défaut de etablissement pour avoir accès à l'attribut nomTable.
			$etablissement = new Etablissement();
			try {
				$etablissement->getAll();
			} catch (Exception $e) {
				return echo json_encode('error' => $e->getMessage());
			}
	}
?>