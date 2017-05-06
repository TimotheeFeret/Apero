<?php 
	require_once "fonctions.php";
	require_once $_SERVER['CONTEXT_DOCUMENT_ROOT']."/config/connexion_bd.php";

	/**
	* 
	*/
	class Section extends Fonctions
	{
		protected $id;
		protected $nom;
		protected $nomTable = 'section';
		
		function __construct() {
	        $nbParam = func_get_args();
	        switch( func_num_args() ) {
	            case 0:
	                self::__construct1();
	                break;
	            case 1:
	            //	On récupère le nom de la section.
	                self::__construct2($nbParam[0]);
	                break;
	            case 2:
	            //	On récupère tous les paramètres de la section.
	                self::__construct3( $nbParam[0], $nbParam[1] );
	                break;
	            default :
	            	echo '<br/>Erreur lors de la construction de l\'objet section. Nombre de paramètres inapproprié.';
	         }
	     }

		/**
		*
		*/		
		function __construct1()
		{
			// Ce constructeur est notamment utilisé pour faire un get de tous les enfants.
			/*var_dump ('Constructeur 1');*/
		}

		/**
		*
		*/		
		function __construct2($nom)
		{
			$this->nom = $nom;
			/*var_dump ('Constructeur 2');*/
		}

		/**
		*
		*/	
		function __construct3($id, $nom)
		{
			$this->id = $id;
			$this->nom = $nom;
			/*var_dump ('Constructeur 3');*/
		}

	}
?>