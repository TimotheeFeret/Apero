<?php 
	require_once "fonctions.php";
	require_once "../config/connexion_bd.php";

	/**
	* 
	*/
	class Enfant extends Fonctions
	{
		protected $id;
		protected $famille_id;
		protected $section_id;
		protected $nom;
		protected $prenom;
		protected $date_naissance;
		const nomTable = 'enfant';
		
		function __construct() {
	        $nbParam = func_get_args();
	        switch( func_num_args() ) {
	            case 1:
	                self::__construct1($nbParam[0]);
	                break;
	            case 5:
	            //	On récupère tous les paramètres de l'enfant sauf l'id.
	                self::__construct2( $nbParam[0], $nbParam[1], $nbParam[2], $nbParam[3], $nbParam[4] );
	                break;
	            case 6:
	            //	On récupère tous les paramètres de l'enfant.
	                self::__construct3( $nbParam[0], $nbParam[1], $nbParam[2], $nbParam[3], $nbParam[4], $nbParam[5] );
	                break;
	            default :
	            	echo '<br/>Erreur lors de la construction de l\'objet enfant. Nombre de paramètres inapproprié.';
	         }
	     }

		/**
		*
		*/		
		function __construct1($id)
		{
			$this->id = $id;
			/*var_dump ('Constructeur 1');*/
		}

		/**
		*
		*/	
		function __construct2($famille_id, $section_id, $nom, $prenom, $date_naissance)
		{
			$this->famille_id = $famille_id;
			$this->section_id = $section_id;
			$this->nom = $nom;
			$this->prenom = $prenom;
			$this->date_naissance = $date_naissance;
			/*var_dump ('Constructeur 2');*/
		}

		/**
		*
		*/	
		function __construct3($id, $famille_id, $section_id, $nom, $prenom, $date_naissance)
		{
			$this->id = $id;
			$this->famille_id = $famille_id;
			$this->section_id = $section_id;
			$this->nom = $nom;
			$this->prenom = $prenom;
			$this->date_naissance = $date_naissance;
			/*var_dump ('Constructeur 3');*/
		}

	}
?>