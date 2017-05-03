<?php
	require_once "../modeles/livre.php";
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
			$livre = new Livre($data['nom_livre'], $data['prix'], $data['annee_usage']);
			// Ajoute le livre ou génère une erreur si l'ajout a échoué.
			try {
				$livre->add();
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
			$livre = new Livre($_POST['id']);
			// Supprime le livre ou génère une erreur si la suppression a échoué.
			try {
				$livre->delete();
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
			$livre = new Livre($_POST['id'], $data['nom_livre'], $data['prix'], $data['annee_usage']);
			// Faire un nouveau constructeur avec l'id et les data
			try {
				$livre->update();
			} catch (Exception $e) {
				return echo json_encode('error' => $e->getMessage());
			}
			break;

		case 'get':
			// Instanciation par défaut du livre pour avoir accès à l'attribut nomTable.
			$livre = new Livre();
			try {
				$livre->getAll();
			} catch (Exception $e) {
				return echo json_encode('error' => $e->getMessage());
			}


	}
?>