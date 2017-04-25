<?php
	require_once "../modeles/enfant.php";
	require_once "../config/connexion_bd.php";
	/**
	* 
	*/
	class Fonctions
	{
		public function constructRequest()
		{
			// Récupération des attributs de l'objet à ajouter.
			$attributs = get_object_vars ( $this );
			// Variable dans laquelle on construit une chaîne de caractère qui permettra d'exécuter une requête SQL.
			$reqConstructor = null;

			/*foreach ($attributs as $attribut) {
				// On n'ajoute pas l'id car il va être auto-incrémenté.
				if($attributs != 'id')
				{
					if($reqConstructor != null)
					{
						$reqConstructor .= "," . array_keys($attributs)[1] . "=" . $attributs[1];
					}
					else
					{
						// C'est le premier champ qu'on concatène à la variable $reqConstructor donc pas besoin de ','.
						// $reqConstructor +=  array_keys($attributs) . "=" . $attributs;
						$reqConstructor .=  'first champ';
					}
				}
			}*/
			for($cpt = 0; $cpt < count($attributs); $cpt += 1)
			{
				// On n'ajoute pas l'id car il va être auto-incrémenté.
				if(array_keys($attributs)[$cpt] != 'id')
				{
					if($reqConstructor != null)
					{
						$reqConstructor .= ", " . array_keys($attributs)[$cpt] . "='" . $attributs[array_keys($attributs)[$cpt]] . "'";
					}
					else
					{
						// C'est le premier champ que l'on concatène à la variable $reqConstructor donc pas besoin de ','.
						$reqConstructor .=  array_keys($attributs)[$cpt] . "='" . $attributs[array_keys($attributs)[$cpt]] . "'";
					}
				}
			}
			/*var_dump($reqConstructor);*/
			return $reqConstructor;
		}
		public function add()
		{
			$reqConstructor = $this->constructRequest();
			$nomTable = $this::nomTable;
			// Envoi de la requête vers la base de données.
			$req = DB::connect()->exec(" INSERT INTO $nomTable SET $reqConstructor; ");
			/*var_dump("INSERT INTO $nomTable SET $reqConstructor;");
			var_dump($req);*/
		}
		public function update()
		{
			// TODO - Faire la même chose que pour la fonction add(). C'est-à-dire construire dynamiquement la requête à l'aide des attribut de l'objet courant.
			$reqConstructor = $this->constructRequest();
			// Récupération des attributs de l'objet à modifier.
			$attributs = get_object_vars ( $this );
			$nomTable = $this::nomTable;
			$req = DB::connect()->exec(" UPDATE $nomTable () SET $reqConstructor WHERE id = $id; ");
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