<?php 
	require_once "fonctions.php";

	/**
	* 
	*/
	class Enfant extends Fonctions
	{
		protected $id;
		protected $nom;
		protected $prenom;
		protected $date_naissance;
		const nomTable = 'enfant';
		
		/**
		*
		*/		
		function __construct1$id)
		{
			$this->$id = $id;
			var_dump("poi");
		}

		/**
		*
		*/	
		function __construct2($nom, $prenom, $date_naissance)
		{
			$this->$nom = $nom;
			$this->$prenom = $prenom;
			$this->$date_naissance = $date_naissance;
		}

		function __construct3($id, $nom, $prenom, $date_naissance)
		{
			$this->$id = $id;
			$this->$nom = $nom;
			$this->$prenom = $prenom;
			$this->$date_naissance = $date_naissance;
		}
	}
?>