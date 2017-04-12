<?php
	require_once "../modeles/enfant.php";

	switch ($_POST['event']) {
		case 'add':

			// Vérifie que les données sont renseignées
			if( !isset($_POST['data']) ) {
				return echo json_encode('error' => 'Toutes les données ne sont pas renseignées');
			}

			// Récupère les données et les stocke dans un tableau
			$data = explode('&', $_POST['data']);

			$enfant = new Enfant();

			// Ajoute l'enfant ou génère une erreur si l'ajout a échoué
			try {
				$enfant->add($data['nom'], $data['prenom'], $data['date_naissance']);
			} catch (Exception $e) {
				return echo json_encode('error' => $e->getMessage());
			}

			return echo json_encode(true);
			break;
	}