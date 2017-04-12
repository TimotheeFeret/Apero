<?php 

	/**
	* 
	*/
	class Enfant extends Fonctions
	{
		private $id;
		private $nom;
		private $prenom;
		private $date_naissance;
		
		/**
		*
		*/		
		function __construct($id)
		{
			$this->$id = $id;
		}

		/**
		*
		*/	
		function __construct($nom, $prenom, $date_naissance)
		{
			$this->$nom = $nom;
			$this->$prenom = $prenom;
			$this->$date_naissance = $date_naissance;
		}
	}