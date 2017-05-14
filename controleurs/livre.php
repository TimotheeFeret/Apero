<?php
	require_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "modeles/livre.php";
	require_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "modeles/fonctions.php";
	require_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "config/connexion_bd.php";

	switch ($_POST['event']) {
		case 'add':
			// Vérifie que les données sont renseignées.
			if( !isset($_POST['data']) ) {
				echo json_encode(array('error' => 'Toutes les donnees ne sont pas renseignees'));
				return;
			}
			// Récupère les données et les stocke dans un tableau.
			$data = explode('&', $_POST['data']);
			// Création d'un tableau pour dissocier les données de leur nom.
			foreach ($data as $param) {
			    $split = explode('=', $param);
			    $params[$split[0]] = $split[1];
			}
			$livre = new Livre($params['isbn'], $params['nom_livre'], $params['prix'], $params['annee_usage']);
			// Ajoute le livre ou génère une erreur si l'ajout a échoué.
			try {
				$livre->add();
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
			$livre = new Livre($_POST['id']);
			// Supprime le livre ou génère une erreur si la suppression a échoué.
			try {
				$livre->delete();
			} catch (Exception $e) {
				echo json_encode(array('error' => $e->getMessage()));
				return;
			}
			break;

		case 'update':
			// Vérifie que l'id est renseigné.
			if( !isset($_POST['id']) ) {
				echo json_encode(array('error' => "L'id n'est pas renseigné"));
				return;
			}
			if( !isset($_POST['data']) ) {
				echo json_encode(array('error' => 'Toutes les données ne sont pas renseignées'));
				return;
			}
			// Récupère les données et les stocke dans un tableau.
			$data = explode('&', $_POST['data']);
			// Création d'un tableau pour dissocier les données de leur nom.
			foreach ($data as $param) {
			    $split = explode('=', $param);
			    $params[$split[0]] = $split[1];
			}
			var_dump($params);
			$livre = new Livre($_POST['id'], $params['isbn'], $params['nom_livre'], $params['prix'], $params['annee_usage']);
			// Faire un nouveau constructeur avec l'id et les data
			try {
				$livre->update();
			} catch (Exception $e) {
				echo json_encode(array('error' => $e->getMessage()));
				return;
			}
			break;

		case 'get':
			// Instanciation par défaut du livre pour avoir accès à l'attribut nomTable.
			$livre = new Livre();
			try {
				$livre->get();
			} catch (Exception $e) {
				echo json_encode(array('error' => $e->getMessage()));
				return;
			}


	}
?>