<?php
	require_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/modeles/famille.php";
	require_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/modeles/fonctions.php";
	require_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/config/connexion_bd.php";

	switch ($_POST['event']) {
		case 'add':
			// Vérifie que les données sont renseignées.
			if( !isset($_POST['data']) ) {
				echo json_encode('error' => 'Toutes les données ne sont pas renseignées');
				return;
			}
			// Récupère les données et les stocke dans un tableau.
			$data = explode('&', $_POST['data']);
			// Création d'un tableau pour dissocier les données de leur nom.
			foreach ($data as $param) {
			    $split = explode('=', $param);
			    $params[$split[0]] = $split[1];
			}
			$famille = new Famille($params['adhesion_id'], $params['nom'], $params['code_postal'], $params['ville'], $params['adresse'],
				$params['telephone'] );
			// Ajoute la famille ou génère une erreur si l'ajout a échoué.
			try {
				$famille->add();
			} catch (Exception $e) {
				echo json_encode('error' => $e->getMessage());
				return;
			}
			echo json_encode(true);
			return;
			break;

		case 'delete':
			// Vérifie que l'id est renseigné.
			if( !isset($_POST['id']) ) {
				echo json_encode('error' => "L'id n'est pas renseigné");
				return;
			}
			$famille = new Famille($_POST['id']);
			// Supprime la famille ou génère une erreur si la suppression a échoué.
			try {
				$famille->delete();
			} catch (Exception $e) {
				echo json_encode('error' => $e->getMessage());
				return;
			}
			break;

		case 'update':
			// Vérifie que l'id est renseigné.
			if( !isset($_POST['id']) ) {
				echo json_encode('error' => "L'id n'est pas renseigné");
				return;
			}
			if( !isset($_POST['data']) ) {
				echo json_encode('error' => 'Toutes les données ne sont pas renseignées');
				return;
			}
			$data = explode('&', $_POST['data']);
			$famille = new Famille($_POST['id'], $data['adhesion_id'], $data['nom'], $data['code_postal'], $data['ville'], $data['adresse'],
				$data['telephone']);
			// Faire un nouveau constructeur avec l'id et les data
			try {
				$famille->update();
			} catch (Exception $e) {
				echo json_encode('error' => $e->getMessage());
				return;
			}
			break;

		case 'get':
			// Instanciation par défaut de la famille pour avoir accès à l'attribut nomTable.
			$famille = new Famille();
			try {
				$famille->getAll();
			} catch (Exception $e) {
				echo json_encode('error' => $e->getMessage());
				return;
			}
	}
?>