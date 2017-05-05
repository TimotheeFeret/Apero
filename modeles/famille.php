<?php 
	require_once "fonctions.php";
	require_once $_SERVER['CONTEXT_DOCUMENT_ROOT']."/config/connexion_bd.php";

	/**
	* 
	*/
	class Famille extends Fonctions
	{
		protected $id;
		protected $adhesion_id;
		protected $nom;
		protected $adresse;
		protected $telephone;
		const nomTable = 'famille';
		
		function __construct() {
	        $nbParam = func_get_args();
	        switch( func_num_args() ) {
	            case 0:
	                self::__construct1();
	                break;
	            case 1:
	            //	On récupère l'id de la famille.
	                self::__construct2($nbParam[0]);
	                break;
	            case 4:
	            //	On récupère tous les paramètres de la famille sauf l'id.
	                self::__construct3( $nbParam[0], $nbParam[1], $nbParam[2], $nbParam[3] );
	                break;
	            case 5:
	            //	On récupère tous les paramètres de la famille.
	                self::__construct4( $nbParam[0], $nbParam[1], $nbParam[2], $nbParam[3], $nbParam[4] );
	                break;
	            default :
	            	echo '<br/>Erreur lors de la construction de l\'objet famille. Nombre de paramètres inapproprié.';
	         }
	     }

		/**
		*
		*/		
		function __construct1()
		{
			// Ce constructeur est notamment utilisé pour faire un get de toutes les familes.
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
		function __construct3($adhesion_id, $nom, $adresse, $telephone)
		{
			$this->adhesion_id = $adhesion_id;
			$this->nom = $nom;
			$this->adresse = $adresse;
			$this->telephone = $telephone;
			/*var_dump ('Constructeur 3');*/
		}

		/**
		*
		*/	
		function __construct4($id, $adhesion_id, $nom, $adresse, $telephone)
		{
			$this->id = $id;
			$this->adhesion_id = $adhesion_id;
			$this->nom = $nom;
			$this->adresse = $adresse;
			$this->telephone = $telephone;
			/*var_dump ('Constructeur 4');*/
		}

	}
?>