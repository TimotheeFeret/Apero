<?php
	require_once "../modeles/exemplaire.php";
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
			$exemplaire = new Exemplaire($data['livre_id'], $data['famille_acheteuse_id'], $data['famille_vendeuse_id'], $data['etat_id'], $data['prix']);
			// Ajoute l'exemplaire ou génère une erreur si l'ajout a échoué.
			try {
				$exemplaire->add();
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
			$exemplaire = new Exemplaire($_POST['id']);
			// Supprime l'exemplaire ou génère une erreur si la suppression a échoué.
			try {
				$exemplaire->delete();
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
			$exemplaire = new Exemplaire($_POST['id'], $data['livre_id'], $data['famille_acheteuse_id'], $data['famille_vendeuse_id'], $data['etat_id'], $data['prix']);
			// Faire un nouveau constructeur avec l'id et les data
			try {
				$exemplaire->update();
			} catch (Exception $e) {
				return echo json_encode('error' => $e->getMessage());
			}
			break;

		case 'get':
			// Instanciation par défaut de l'exemplaire pour avoir accès à l'attribut nomTable.
			$exemplaire = new Exemplaire();
			try {
				$exemplaire->getAll();
			} catch (Exception $e) {
				return echo json_encode('error' => $e->getMessage());
			}


	}
?>