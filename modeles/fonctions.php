<?php
	include_once $_SERVER['CONTEXT_DOCUMENT_ROOT']."/config/connexion_bd.php";
	/**
	* 
	*/
	class Fonctions
	{
		public function constructRequest()
		{
			// $event = debug_backtrace()[1]['function'];

			// Récupération des attributs de l'objet à ajouter.
			$attributs = get_object_vars ( $this );
			// Variable dans laquelle on construit une chaîne de caractère qui permettra d'exécuter une requête SQL.
			$reqConstructor = null;
			foreach ($attributs as $key => $attribut) {
				// On n'ajoute pas l'id car il va être auto-incrémenté.
				if ($key == 'id' || $key == 'nomTable' || empty($attribut))
				{
					continue;
				}
				
				if($reqConstructor != null)
				{
					$reqConstructor .= ", " . $key . "='" . $attribut . "'";
				}
				else
				{
					// C'est le premier champ que l'on concatène à la variable $reqConstructor donc pas besoin de ','.
					$reqConstructor .=  $key . "='" . $attribut . "'";
				}
			}
			return $reqConstructor;
		}

		public function add()
		{
			$reqConstructor = $this->constructRequest();
			$nomTable = $this->nomTable;

			// Envoi de la requête vers la base de données.
			$conn = DB::connect();

			$req = $conn->exec(" INSERT INTO $nomTable SET $reqConstructor; ");

			if ($req === false)
				throw new Exception($conn->errorInfo()[2]);

			return $conn->lastInsertId();
		}

		public function update()
		{
			// TODO - Faire la même chose que pour la fonction add(). C'est-à-dire construire dynamiquement la requête à l'aide des attribut de l'objet courant.
			$reqConstructor = $this->constructRequest();
			// Récupération des attributs de l'objet à modifier.
			$attributs = get_object_vars ( $this );
			$nomTable = $this->nomTable;
			$id = $this->id;
			$conn = DB::connect();
			$req = $conn->exec(" UPDATE $nomTable SET $reqConstructor WHERE id = $id; ");
			if ($req === false)
				throw new Exception($conn->errorInfo()[2]);
		}

		public function delete()
		{
			$id = $this->id;
			$nomTable = $this->nomTable;
			$conn = DB::connect();
			$req = $conn->exec(" DELETE FROM $nomTable WHERE id = $id; ");

			if ($req === false)
				throw new Exception($conn->errorInfo()[2]);
		}

		public function get()
		{
			$nomTable = $this->nomTable;
	        $params = func_get_args();
	        $reqConstructor = $params ? "WHERE id IN (".implode(', ', $params).")" : "";
			$bdd = new PDO('mysql:host=localhost;dbname=apero;charset=utf8', 'root', '');
			$conn = DB::connect();

			try {
				$req = $conn->query(" SELECT * FROM $nomTable $reqConstructor ; ");

				if ($req === false)
					throw new Exception;

			} catch (Exception $e) {
				return $conn->errorInfo()[2];
			}
			$donnees = $req->fetchAll(PDO::FETCH_ASSOC);
			$req->closeCursor(); // Termine le traitement de la requête
			return $donnees;
		}

		public function setNomTable($nomTable)
		{
			$this->nomTable = $nomTable;
		}
	}
?>