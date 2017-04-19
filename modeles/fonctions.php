<?php
	require_once "../modeles/enfant.php";
	require_once "../config/connexion_bd.php";
	/**
	* 
	*/
	class Fonctions
	{
		
		public function add()
		{

			// Récupération des attributs de l'objet à ajouter.
			$attributs = get_object_vars ( $this );
			/*var_dump($attributs['id'], $attributs['nom'], $attributs['prenom'], $attributs['date_naissance']);*/
			$nomTable = Enfant::nomTable;
			$req = DB::connect()->exec("
				INSERT INTO $nomTable (famille_id, section_id, nom, prenom, date_naissance)
				VALUES(1, 1, '".$attributs['nom']."', '".$attributs['prenom']."',  '".$attributs['date_naissance']."');
			");
		}
		public function update()
		{

		}
		public function delete()
		{
			$id = $this->id;
			$nomTable = Enfant::nomTable;
			$req = $bdd->query(" DELETE FROM $nomTable WHERE id = $id; ");
			$req->closeCursor(); // Termine le traitement de la requête.
		}

		public function getAll()
		{
			$attributs = get_object_vars ( $this );
			$nomTable = Enfant::nomTable;
			// TODO - APPELER LA VARIABLE BDD DU FICHIER connexion_bd.php
			$bdd = new PDO('mysql:host=localhost;dbname=apero;charset=utf8', 'root', '');
			$req = $bdd->query(" SELECT * FROM $nomTable; ");
			$donnees = $req->fetchAll(PDO::FETCH_ASSOC);
			$req->closeCursor(); // Termine le traitement de la requête
			return $donnees;
		}
	}
?>