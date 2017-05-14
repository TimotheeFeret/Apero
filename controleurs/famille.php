<?php
	require_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/modeles/famille.php";
	require_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/modeles/fonctions.php";
	require_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/config/connexion_bd.php";

	switch ($_POST['event']) {
		case 'add':
			// Vérifie que les données sont renseignées.
			if( !isset($_POST['data']) ) {
				echo json_encode(array('error' => 'Toutes les données ne sont pas renseignées'));
				return;
			}
			// Récupère les données et les stocke dans un tableau.
			parse_str($_POST['data'], $data);
			$famille = new Famille($data['adhesion_id'], $data['nom'], $data['code_postal'], $data['ville'], $data['adresse'],
				$data['telephone'] );
			// Ajoute la famille ou génère une erreur si l'ajout a échoué.
			try {
				$famille->add();
			} catch (Exception $e) {
				echo json_encode(array('error' => $e->getMessage()));
				return;
			}
			echo json_encode(true);
			return;
			break;

		case 'delete':
			// Vérifie que l'id est renseigné.
			if( !isset($_POST['id']) ) {
				echo json_encode(array('error' => "L'id n'est pas renseigné"));
				return;
			}
			$famille = new Famille($_POST['id']);
			// Supprime la famille ou génère une erreur si la suppression a échoué.
			try {
				$famille->delete();
			} catch (Exception $e) {
				echo json_encode(array('error' => $e->getMessage()));
				return;
			}
			break;

		case 'update':
			// Vérifie que les données de la famille sont renseignées.
			if( !isset($_POST['data']) ) {
				echo json_encode(array('error' => 'Toutes les données ne sont pas renseignées'));
				return;
			}
			// Récupère les données et les stocke dans un tableau.
			parse_str($_POST['data'], $data);
			var_dump($_POST['id']);
			var_dump($data);
			$data = explode('&', $_POST['data']);
			$famille = new Famille($_POST['id'], $data['adhesion_id'], $data['nom'], $data['code_postal'], $data['ville'], $data['adresse'],
				$data['telephone']);
			// Faire un nouveau constructeur avec l'id et les data
			try {
				$famille->update();
			} catch (Exception $e) {
				echo json_encode(array('error' => $e->getMessage()));
				return;
			}
			break;

		case 'get':
			// Instanciation par défaut de la famille pour avoir accès à l'attribut nomTable.
			$famille = new Famille();
			try {
				$famille->getAll();
			} catch (Exception $e) {
				echo json_encode(array('error' => $e->getMessage()));
				return;
			}
	}
?>