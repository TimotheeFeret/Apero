<?php
	require_once "../modeles/enfant.php";
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
			$enfant = new Enfant($data['famille_id'], $data['classe_id'], $data['nom'], $data['prenom'], $data['date_naissance']);
			// Ajoute l'enfant ou génère une erreur si l'ajout a échoué.
			try {
				$enfant->add();
			} catch (Exception $e) {
				return echo json_encode('error' => $e->getMessage());
			}
			return echo json_encode(true);
			break;

		case 'delete':
			// Vérifie que l'id est renseigné.
			if( !isset($_POST['id']) ) {
				return echo json_encode('error' => "L'id n'est pas renseigné);
			}
			$enfant = new Enfant($_POST['id']);
			// Supprime l'enfant ou génère une erreur si la suppression a échoué.
			try {
				$enfant->delete();
			} catch (Exception $e) {
				return echo json_encode('error' => $e->getMessage());
			}
			break;

		case 'update':
			if( !isset($_POST['data']) ) {
				return echo json_encode('error' => 'Toutes les données ne sont pas renseignées');
			}
			$data = explode('&', $_POST['data']);
			$enfant = new Enfant($data['famille_id'], $data['classe_id'], $data['nom'], $data['prenom'], $data['date_naissance']);
			// Faire un nouveau constructeur avec l'id et les data
			try {
				$enfant->update();
			} catch (Exception $e) {
				return echo json_encode('error' => $e->getMessage());
			}
			break;

		case 'get':
			// Instanciation par défaut de enfant pour avoir accès à l'attribut nomTable.
			$enfant = new Enfant();
			try {
				$enfant->getAll();
			} catch (Exception $e) {
				return echo json_encode('error' => $e->getMessage());
			}


	}
?>