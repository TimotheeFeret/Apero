<?php 
	require_once "fonctions.php";
	require_once "../config/connexion_bd.php";

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
		
		function __construct() {
		        $argv = func_get_args();
		        switch( func_num_args() ) {
		            case 1:
		                self::__construct1($argv[0]);
		                break;
		            case 3:
		                self::__construct2( $argv[0], $argv[1], $argv[2] );
		                break;
		            case 4:
		                self::__construct3( $argv[0], $argv[1], $argv[2], $argv[3] );
		                break;
		            default :
		            	echo 'Erreur lors de la construction de l\'objet enfant. Nombre de paramètres inapproprié.';
		         }
		     }


		/**
		*
		*/		
		function __construct1($id)
		{
			$this->id = $id;
		}

		/**
		*
		*/	
		function __construct2($nom, $prenom, $date_naissance)
		{
			$this->nom = $nom;
			$this->prenom = $prenom;
			$this->date_naissance = $date_naissance;
			/*var_dump ('Constructeur 2');*/
		}

		/**
		*
		*/	
		function __construct3($id, $nom, $prenom, $date_naissance)
		{
			$this->id = $id;
			$this->nom = $nom;
			$this->prenom = $prenom;
			$this->date_naissance = $date_naissance;
			/*var_dump ('Constructeur 3');*/
		}

	}
?>