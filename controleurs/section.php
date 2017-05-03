<?php
	require_once "../modeles/section.php";
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
			$section = new Section($data['nom']);
			// Ajoute la section ou génère une erreur si l'ajout a échoué.
			try {
				$section->add();
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
			$section = new Section($_POST['id']);
			// Supprime la section ou génère une erreur si la suppression a échoué.
			try {
				$section->delete();
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
			$section = new Section($_POST['id'], $data['nom']);
			// Faire un nouveau constructeur avec l'id et les data
			try {
				$section->update();
			} catch (Exception $e) {
				return echo json_encode('error' => $e->getMessage());
			}
			break;

		case 'get':
			// Instanciation par défaut de la section pour avoir accès à l'attribut nomTable.
			$section = new Section();
			try {
				$section->getAll();
			} catch (Exception $e) {
				return echo json_encode('error' => $e->getMessage());
			}


	}
?>