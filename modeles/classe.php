<?php 
	require_once "fonctions.php";
	require_once $_SERVER['CONTEXT_DOCUMENT_ROOT']."/config/connexion_bd.php";

	/**
	* 
	*/
	class Classe extends Fonctions
	{
		protected $id;
		protected $etablissement_id;
		protected $section_id;
		protected $nomTable = 'classe';
		
		function __construct() {
	        $nbParam = func_get_args();
	        switch( func_num_args() ) {
	            case 0:
	                self::__construct1();
	                break;
	            case 1:
	            //	On récupère uniquement l'id de la classe.
	                self::__construct2($nbParam[0]);
	                break;
	            case 2:
	            //	On récupère tous les paramètres de la classe sauf l'id.
	                self::__construct3( $nbParam[0], $nbParam[1] );
	                break;
	            case 3:
	            //	On récupère tous les paramètres de la classe.
	                self::__construct3( $nbParam[0], $nbParam[1], $nbParam[2] );
	                break;
	            case 4:
	            default :
	            	echo '<br/>Erreur lors de la construction de l\'objet classe. Nombre de paramètres inapproprié.';
	         }
	     }

		/**
		*
		*/		
		function __construct1()
		{
			// Ce constructeur est notamment utilisé pour faire un get de toutes les classes.
			/*var_dump ('Constructeur 1');*/
		}

		/**
		*
		*/		
		function __construct2($id)
		{
			$this->id = $id;
			/*var_dump ('Constructeur 2');*/
		}

		/**
		*
		*/	
		function __construct3($etablissement_id, $section_id)
		{
			$this->etablissement_id = $etablissement_id;
			$this->section_id = $section_id;
			/*var_dump ('Constructeur 3');*/
		}

		/**
		*
		*/	
		function __construct4($id, $etablissement_id, $section_id)
		{
			$this->id = $id;
			$this->etablissement_id = $etablissement_id;
			$this->section_id = $section_id;
			/*var_dump ('Constructeur 4');*/
		}

	}
?>