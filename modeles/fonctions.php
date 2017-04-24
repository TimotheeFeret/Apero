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
			$nomTable = $this::nomTable;
			$req = DB::connect()->exec("
				INSERT INTO $nomTable (famille_id, section_id, nom, prenom, date_naissance)
				VALUES(1, 1, '".$attributs['nom']."', '".$attributs['prenom']."',  '".$attributs['date_naissance']."');
			");
		}
		public function update()
		{
			// Récupération des attributs de l'objet à modifier.
			$attributs = get_object_vars ( $this );
			$nomTable = $this::nomTable;
			$req = DB::connect()->exec("
				UPDATE $nomTable () SET WHERE id = $id;
			");
		}
		public function delete()
		{
			$id = $this->id;
			$nomTable = $this::nomTable;
			$req = DB::connect()->exec(" DELETE FROM $nomTable WHERE id = $id; ");
		}

		public function getAll()
		{
			$attributs = get_object_vars ( $this );
			$nomTable = $this::nomTable;
			// TODO - APPELER LA VARIABLE BDD DU FICHIER connexion_bd.php
			$bdd = new PDO('mysql:host=localhost;dbname=apero;charset=utf8', 'root', '');
			$req = DB::connect()->query(" SELECT * FROM $nomTable; ");
			$donnees = $req->fetchAll(PDO::FETCH_ASSOC);
			$req->closeCursor(); // Termine le traitement de la requête
			return $donnees;
		}
	}
?>