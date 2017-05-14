<?php
	require_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/modeles/famille.php";
	require_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/modeles/enfant.php";
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
			// Vérification des données de la famille renseignées.
			if( !isset($_POST['data']) ) {
				echo json_encode(array('error' => 'Toutes les données ne sont pas renseignées'));
				return;
			}

			// Stockage des données de la famille et des enfants dans des tableaux.
			$famille_id = $_POST['data']['id'];
			parse_str($_POST['data']['famille'], $famille_data);
			$famille_enfants_Update = json_decode($_POST['data']['enfants'], true);

			// Création de la liste des ids des enfants de la famille modifiée.
			foreach ($famille_enfants_Update as $key => $enfant) {
				// Teste si l'enfant possède l'attribut id.
				if($enfant['id'])
				{
					$listeIdEnfants_Update[$key] = $enfant['id'];
				}
				else{
					// L'enfant n'a pas d'id, on le crée en base de données.
				}
			}
			echo('<br/>AFFICHAGE DE LA FAMILLE POUR VERIFIER LES PARAMETRES DES ENFANTS.');
			var_dump($famille_enfants_Update);

			// Instanciation de l'objet famille.
			$famille = new Famille($famille_id, $famille_data['adhesion_id'], $famille_data['nom'], $famille_data['code_postal'],
				$famille_data['ville'], $famille_data['adresse'], $famille_data['telephone']);
			echo ('<br/>AFFICHAGE DE LA FAMILLE INSTANCIEE.');
			var_dump($famille);

			// Update des données de la famille modifiée.
			try {
				$famille->update();
			} catch (Exception $e) {
				echo json_encode(array('error' => $e->getMessage()));
				return;
			}

			// Récupération des enfants de la famille dans la base de données.
			try {
				$famille_enfants_DB = $famille->getEnfants();
			} catch (Exception $e) {
				echo json_encode(array('error' => $e->getMessage()));
				return;
			}
			// Création de la liste des ids des enfants de la famille à modifier.
			foreach ($famille_enfants_DB as $key => $enfant) {
				$listeIdEnfants_DB[$key] = $enfant['id'];
			}

			// Affichage des deux listes d'ids.
			echo("LISTE DES IDS DES ENFANTS MODIFIES.");
			var_dump($listeIdEnfants_Update);
			echo("LISTE DES IDS DES ENFANTS DE LA BASE.");
			var_dump($listeIdEnfants_DB);

			function key_compare_func($id_Upd, $id_Db)
			{
				// L'enfant a été modifié par l'utilisateur.
			    if ($id_Upd == $id_Db)
			        return 0;
			    else if ($id_Upd > $id_Db)
			        return 1;
			    else
			        return -1;
			}

			$listeIdEnfant_A_Modifier = array_intersect_ukey ($listeIdEnfants_Update, $listeIdEnfants_DB, 'key_compare_func');
			echo("LISTE DES IDS DES ENFANTS A MODIFIER.");
			var_dump($listeIdEnfant_A_Modifier);
			// Parcourt de la liste des ids des enfants modifiés par l'utilisateur.
			foreach ($famille_enfants_Update as $key => $enfantData) {
				// Parcourt de la liste des ids des enfants à modifier.
				foreach ($listeIdEnfant_A_Modifier as $id) {
					if($enfant['id'] == $id)
					{
						// Modification de l'enfant.
						// Instanciation de l'enfant à modifier
						echo("<br/>TOTOTOTOTOTOTO");
						var_dump($enfantData);
						$enfant = new Enfant ($enfantData['id'], $famille_id, $enfantData['classe'], $enfantData['nom'],
							$enfantData['prenom'], $enfantData['date_naissance']);
						var_dump($enfant);
						$enfant->update();
					}
				}
			}


			// Affichage des enfants de la famille récupérés en base de données.
			echo("<br/>ENFANTS EN BASE DE DONNEES");
			var_dump($famille_enfants_DB);
			// Stockage dans un tableau d'objets Enfant des données reçus par la requête AJAX.
			foreach ($famille_enfants_Update as $key => $enfant) {
				$enfants[$key] = new Enfant($enfant['id'], $enfant['nom'], $enfant['prenom'], $enfant['date_naissance'],
					$enfant['etablissement'], $enfant['classe']);
			}
			// Affichage du tableau d'objets Enfant reçu par la requête AJAX.
			echo("<br/>ENFANTS FAMILLE MODIFIEE");
			var_dump($enfants);

			// Description du comprtement souhaité :
			
			// Ajout des enfants que l'utilisateur a ajoutés.
			/*Boucle sur un tableau d'enfants $famille_enfants_Update et les comparer avec le tableau d'enfants famille_enfants_DB.
				Ajouter les enfants absents du tableau $famille_enfants_DB.
			Fin boucle*/
			echo("<br/>BOUCLE FOREACH famille_enfants_Update");
			foreach ($famille_enfants_Update as $key => $enfant) {
				var_dump($key);
				var_dump($enfant);
			}


			// Suppression des enfants que l'utilisateur a supprimés.
			/*Boucle sur un tableau d'enfants $famille_enfants_DB et les comparer avec le tableau d'enfants famille_enfants_Update.
				Supprimer les enfants absents du tableau $famille_enfants_Update.
			Fin boucle*/

			// Modification des enfants que l'utilisateur a modifiés.

			echo json_encode(true);
			return;
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