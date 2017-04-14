<?php
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
			$nomTable = $this->$nomTable;
			$req = $bdd->query(" INSERT INTO $nomTable () VALUES (); ");
			$req->closeCursor(); // Termine le traitement de la requête.
		}
		public function update()
		{

		}
		public function delete()
		{
			$id = $this->id;
			$nomTable = $this->$nomTable;
			$req = $bdd->query(" DELETE FROM $nomTable WHERE id = $id; ");
			$req->closeCursor(); // Termine le traitement de la requête.
		}

		public function getAll()
		{
			$attributs = get_object_vars ( $this );
			var_dump($attributs);
			var_dump($this);
			$nomTable = self::nomTable;
			$req = $bdd->query(" SELECT * FROM $nomTable; ");
			$donnees = $req->fetchAll(PDO::FETCH_ASSOC);
			$req->closeCursor(); // Termine le traitement de la requête
			return $donnees;
		}
	}
?>