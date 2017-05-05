<?php
	require_once "../modeles/famille.php";
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
			$famille = new Famille($data['adhesion_id'], $data['nom'], $data['adresse'], $data['telephone'] );
			// Ajoute la famille ou génère une erreur si l'ajout a échoué.
			try {
				$famille->add();
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
			$famille = new Famille($_POST['id']);
			// Supprime la famille ou génère une erreur si la suppression a échoué.
			try {
				$famille->delete();
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
			$famille = new Famille($_POST['id'], $data['adhesion_id'], $data['nom'], $data['adresse'], $data['telephone']);
			// Faire un nouveau constructeur avec l'id et les data
			try {
				$famille->update();
			} catch (Exception $e) {
				return echo json_encode('error' => $e->getMessage());
			}
			break;

		case 'get':
			// Instanciation par défaut de la famille pour avoir accès à l'attribut nomTable.
			$famille = new Famille();
			try {
				$famille->getAll();
			} catch (Exception $e) {
				return echo json_encode('error' => $e->getMessage());
			}


	}
?>