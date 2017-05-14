<?php
	require_once "../modeles/exemplaire.php";
	require_once "../modeles/fonctions.php";
	require_once "../config/connexion_bd.php";

	switch ($_POST['event']) {
		case 'add':
			// Vérifie que les données sont renseignées.
			if( !isset($_POST['data']) && !isset($_POST['exemplaires']) ) {
				echo json_encode(array('error' => 'Toutes les données ne sont pas renseignées'));
				return;
			}
			// Récupère les données et les stocke dans un tableau.
			parse_str($_POST['data'], $famille_vendeuse_id);
			$famille_vendeuse_id = $famille_vendeuse_id['famille_vendeuse_id'];
			$exemplaires = json_decode($_POST['exemplaires'], true);
			foreach ($exemplaires as $key => $exemplaire) {
				// Instanciation d'un nouvel exemplaire.
				$exemplaire = new Exemplaire($exemplaire['livre_id'], null, $famille_vendeuse_id, $exemplaire['etat_id'],
					$exemplaire['prix'], date("Y-m-d"), null);
				// Ajoute l'exemplaire ou génère une erreur si l'ajout a échoué.
				try {
					$exemplaire->add();
				} catch (Exception $e) {
					echo json_encode(array('error' => $e->getMessage()));
					return;
				}
			}
			echo json_encode(true);
			return;
			break;

		case 'delete':
			// Vérifie que l'id est renseigné.
			if( !isset($_POST['id']) ) {
				echo json_encode(array('error' => "L'id nest pas renseigné"));
				return;
			}
			$exemplaire = new Exemplaire($_POST['id']);
			// Supprime l'exemplaire ou génère une erreur si la suppression a échoué.
			try {
				$exemplaire->delete();
			} catch (Exception $e) {
				echo json_encode(array('error' => $e->getMessage()));
				return;
			}
			break;

		case 'update':
			// Vérifie que les données sont renseignées.
			if( !isset($_POST['data']) && !isset($_POST['exemplaires']) ) {
				echo json_encode(array('error' => 'Toutes les données ne sont pas renseignées'));
				return;
			}
			// Récupère les données et les stocke dans un tableau.
			parse_str($_POST['data'], $famille_acheteuse_id);
			$famille_acheteuse_id = $famille_acheteuse_id['famille_acheteuse_id'];
			// Stockage dans un tableau des attributs des exemplaires.
			$exemplaires = json_decode($_POST['exemplaires'], true);
			// Boucle sur la liste des exemplaires achetés par la famille.
			foreach ($exemplaires as $key => $exemplaireItem) {
				// Instanciation d'un nouvel exemplaire.
				$exemplaire = new Exemplaire($exemplaireItem['livre_id'], $famille_acheteuse_id);
				// Ajoute l'exemplaire ou génère une erreur si l'ajout a échoué.
				try {
					$exemplaire->update();
				} catch (Exception $e) {
					echo json_encode(array('error' => $e->getMessage()));
					return;
				}
			}
			echo json_encode(true);
			return;
			break;

		case 'get':
			// Instanciation par défaut de l'exemplaire pour avoir accès à l'attribut nomTable.
			$exemplaire = new Exemplaire();
			try {
				$exemplaire->get();
			} catch (Exception $e) {
				echo json_encode(array('error' => $e->getMessage()));
				return;
			}


	}
?>