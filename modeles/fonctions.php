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
				if($key == 'id')
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
			/*var_dump($reqConstructor);*/
			return $reqConstructor;
		}

		public function add()
		{
			$reqConstructor = $this->constructRequest();
			$nomTable = $this::nomTable;
			var_dump("INSERT INTO $nomTable SET $reqConstructor;");
			// Envoi de la requête vers la base de données.
			$req = DB::connect()->exec(" INSERT INTO $nomTable SET $reqConstructor; ");
			var_dump($req);
		}

		public function update()
		{
			// TODO - Faire la même chose que pour la fonction add(). C'est-à-dire construire dynamiquement la requête à l'aide des attribut de l'objet courant.
			$reqConstructor = $this->constructRequest();
			// Récupération des attributs de l'objet à modifier.
			$attributs = get_object_vars ( $this );
			$nomTable = $this::nomTable;
			$id = $this->id;
			$req = DB::connect()->exec(" UPDATE $nomTable SET $reqConstructor WHERE id = $id; ");
		}

		public function delete()
		{
			$id = $this->id;
			$nomTable = $this::nomTable;
			$req = DB::connect()->exec(" DELETE FROM $nomTable WHERE id = $id; ");
		}

		public function get()
		{
			$nomTable = $this::nomTable;
	        $params = func_get_args();
	        $reqConstructor = $params ? "WHERE id IN (".implode(', ', $params).")" : "";
			$bdd = new PDO('mysql:host=localhost;dbname=apero;charset=utf8', 'root', '');
			$req = DB::connect()->query(" SELECT * FROM $nomTable $reqConstructor ; ");
			/*// VISUALISER LA CONSTRUCTION DE LA REQUETE
			var_dump($req);*/
			$donnees = $req->fetchAll(PDO::FETCH_ASSOC);
			$req->closeCursor(); // Termine le traitement de la requête
			return $donnees;
		}
	}
?>