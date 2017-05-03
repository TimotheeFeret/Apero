<?php 
	require_once "fonctions.php";
	require_once "../config/connexion_bd.php";

	/**
	* 
	*/
	class Livre extends Fonctions
	{
		protected $id;
		protected $nom_livre;
		protected $prix;
		protected $annee_usage;
		const nomTable = 'livre';
		
		function __construct() {
	        $nbParam = func_get_args();
	        switch( func_num_args() ) {
	            case 1:
	                self::__construct1($nbParam[0]);
	                break;
	            case 5:
	            //	On récupère tous les paramètres du livre sauf l'id.
	                self::__construct2( $nbParam[0], $nbParam[1], $nbParam[2] );
	                break;
	            case 6:
	            //	On récupère tous les paramètres du livre.
	                self::__construct3( $nbParam[0], $nbParam[1], $nbParam[2], $nbParam[3] );
	                break;
	            default :
	            	echo '<br/>Erreur lors de la construction de l\'objet livre. Nombre de paramètres inapproprié.';
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
		function __construct2($nom_livre, $prix, $annee_usage)
		{
			$this->nom_livre = $nom_livre;
			$this->prix = $prix;
			$this->annee_usage = $annee_usage;
			/*var_dump ('Constructeur 2');*/
		}

		/**
		*
		*/	
		function __construct3($id, $nom_livre, $prix, $annee_usage)
		{
			$this->id = $id;
			$this->nom_livre = $nom_livre;
			$this->prix = $prix;
			$this->annee_usage = $annee_usage;
			/*var_dump ('Constructeur 3');*/
		}

	}
?>