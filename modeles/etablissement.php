<?php 
	require_once "fonctions.php";
	require_once "../config/connexion_bd.php";

	/**
	* 
	*/
	class Etablissement extends Fonctions
	{
		protected $id;
		protected $nom;
		protected $telephone;
		const nomTable = 'etablissement';
		
		function __construct() {
	        $nbParam = func_get_args();
	        switch( func_num_args() ) {
	            case 1:
	                self::__construct1($nbParam[0]);
	                break;
	            case 2:
	            //	On récupère tous le nom et le téléphone de l'établissement.
	                self::__construct2( $nbParam[0], $nbParam[1] );
	                break;
	            case 3:
	            //	On récupère tous les paramètres de l'établissement.
	                self::__construct2( $nbParam[0], $nbParam[1], $nbParam[2] );
	                break;
	            default :
	            	echo '<br/>Erreur lors de la construction de l\'objet etablissement. Nombre de paramètres inapproprié.';
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
		function __construct2($nom, $telephone)
		{
			$this->nom = $nom;
			$this->telephone = $telephone;
			/*var_dump ('Constructeur 2');*/
		}

		/**
		*
		*/	
		function __construct3($id, $nom, $telephone)
		{
			$this->id = $id;
			$this->nom = $nom;
			$this->telephone = $telephone;
			/*var_dump ('Constructeur 3');*/
		}
	}
?>