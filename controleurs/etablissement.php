<?php
	require_once "../modeles/etablissement.php";
require_once "../modeles/classe.php";
	require_once "../modeles/fonctions.php";
	require_once "../config/connexion_bd.php";

	switch ($_POST['event']) {
		case 'add':
			// Vérifie que les données sont renseignées.
			if( !isset($_POST['data']) ) {
				echo json_encode(['error' => 'Toutes les données ne sont pas renseignées']);
				return;
			}
			// Récupère les données et les stocke dans un tableau.
			parse_str($_POST['data'], $data);

			try {
				$etablissement = new Etablissement($data['nom'], $data['telephone']);
				// Ajoute l'établissement ou génère une erreur si l'ajout a échoué.
				$idEtablissement = $etablissement->add();

				foreach ($data['section_id'] as $idSection) {
					$objClasse = new Classe($idEtablissement, $idSection);
					$objClasse->add();
				}

			} catch (Exception $e) {
				echo json_encode(['error' => $e->getMessage()]);
				return;
			}

			echo json_encode(true);
			return;
			break;

		case 'delete':
			// Vérifie que l'id est renseigné.
			if( !isset($_POST['id']) ) {
				echo json_encode(['error' => "L'id n'est pas renseigné"]);
				return;
			}
			$etablissement = new Etablissement($_POST['id']);
			// Supprime l'établissement ou génère une erreur si la suppression a échoué.
			try {
				$etablissement->delete();
			} catch (Exception $e) {
				echo json_encode(['error' => $e->getMessage()]);
				return;
			}
			echo json_encode(true);
			break;

		case 'update':
			// Vérifie que l'id est renseigné.
			if( !isset($_POST['id']) ) {
				echo json_encode(['error' => "L'id n'est pas renseigné"]);
				return;
			}

			// Stockage des données de la famille et des enfants dans des tableaux.
			$idEtablissement = $_POST['id'];
			parse_str($_POST['data'], $data);

			try {
				// Modification des informations de l'établissement
				$etablissement = new Etablissement($idEtablissement, $data['nom'], $data['telephone']);
				$etablissement->update();

				$classes = $etablissement->getSections();

				// Suppression des classes
				foreach ($classes as $classe) {
					$objClasse = new Classe($classe['id']);
					$objClasse->delete();
				}

				// Ajout des nouvelles classes
				foreach ($data['section_id'] as $idSection) {
					$objClasse = new Classe($idEtablissement, $idSection);
					$objClasse->add();
				}

				echo json_encode(true);
			} catch (Exception $e) {

				echo json_encode(['error' => $e->getMessage()]);
			}

			break;

		case 'get':
			// Instanciation par défaut de etablissement pour avoir accès à l'attribut nomTable.
			$etablissement = new Etablissement();
			try {
				$etablissement->getAll();
			} catch (Exception $e) {
				echo json_encode(['error' => $e->getMessage()]);
				return;
			}
	}
?>