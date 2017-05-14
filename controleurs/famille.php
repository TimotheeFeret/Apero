<?php
	require_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/modeles/famille.php";
	require_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/modeles/enfant.php";
	require_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/modeles/fonctions.php";
	require_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/config/connexion_bd.php";
require_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/assets/php/Utility.php";

	switch ($_POST['event']) {
		case 'add':
			// Vérifie que les données sont renseignées.
			if( !isset($_POST['data']) ) {
				echo json_encode(array('error' => 'Toutes les données ne sont pas renseignées'));
				return;
			}
			// Récupère les données et les stocke dans un tableau.
			parse_str($_POST['data']['famille'], $famille);
			$enfants = json_decode($_POST['data']['enfants'], true);

			$famille = new Famille($famille['adhesion_id'], $famille['nom'], $famille['code_postal'], $famille['ville'], $famille['adresse'],
				$famille['telephone']);

			$idFamille = null;
			// Ajoute la famille ou génère une erreur si l'ajout a échoué.
			try {
				$idFamille = $famille->add();
			} catch (Exception $e) {
				echo json_encode(array('error' => $e->getMessage()));
				return;
			}

			// Ajoute les enfants
			foreach ($enfants as $key => $enfant) {
				$objEnfant = new Enfant($idFamille, $enfant['classe'], $enfant['nom'], $enfant['prenom'], $enfant['date_naissance']);
				$objEnfant->add();
			}
			
			echo json_encode(true);
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
			echo json_encode(true);
			break;

		case 'update':
			// Vérification des données de la famille renseignées.
			if( !isset($_POST['data']) ) {
				echo json_encode(array('error' => 'Toutes les données ne sont pas renseignées'));
				return;
			}

			// Stockage des données de la famille et des enfants dans des tableaux.
			$idFamille = $_POST['data']['id'];
			parse_str($_POST['data']['famille'], $famille);
			$enfantsAjax = json_decode($_POST['data']['enfants'], true);

			try {
				// Modification des informations de la famille
				$famille = new Famille($idFamille, $famille['adhesion_id'], $famille['nom'], $famille['code_postal'], $famille['ville'], $famille['adresse'],
					$famille['telephone']);
				$famille->update();

				// Récupération de la famille
				$famille = new Famille($idFamille);
				$enfantsBdd = $famille->getEnfants();
				$famille = $famille->get($idFamille)[0];

				// Extraction des ID des tableaux Ajax et Bdd
				$enfantsAjaxIds = Utility::extractDataWithKey($enfantsAjax, 'id');
				$enfantsBddIds = Utility::extractDataWithKey($enfantsBdd, 'id');

				// Mise à jour des enfants de la famille
				foreach ($enfantsAjax as $enfantAjax) {

					// Si l'id ,'est pas renseigné ajoute l'enfant
					if (empty($enfantAjax['id'])) {
						$objEnfant = new Enfant($idFamille, $enfantAjax['classe'], $enfantAjax['nom'], $enfantAjax['prenom'], $enfantAjax['date_naissance']);
						$objEnfant->add();
					} else {

						// Si l'id est dans la tableau AJAX & BDD alors met à jour l'enfant
						if (array_search($enfantAjax['id'], $enfantsBddIds) > -1) {
							$objEnfant = new Enfant($enfantAjax['id'], $idFamille, $enfantAjax['classe'], $enfantAjax['nom'], $enfantAjax['prenom'], $enfantAjax['date_naissance']);
							$objEnfant->update();
						}
					}
				}

				// Supprime les enfants s'ils ne sont pas dans le tableau AJAX
				foreach ($enfantsBdd as $enfantBdd) {
					if (array_search($enfantBdd['id'], $enfantsAjaxIds) === false) {
						$objEnfant = new Enfant($enfantBdd['id']);
						$objEnfant->delete();
					}
				}

				echo json_encode(true);
			} catch (Exception $e) {

				echo json_encode(['error' => $e->getMessage()]);
			}

			break;

		case 'get':
			// Instanciation par défaut de la famille pour avoir accès à l'attribut nomTable.
			$famille = new Famille();
			try {
				$famille->get();
			} catch (Exception $e) {
				echo json_encode(array('error' => $e->getMessage()));
				return;
			}
	}
//?>