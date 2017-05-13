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
		protected $code_postal;
		protected $ville;
		protected $adresse;
		protected $telephone;
		protected $nomTable = 'famille';
		
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
	            case 6:
	            //	On récupère tous les paramètres de la famille sauf l'id.
	                self::__construct3( $nbParam[0], $nbParam[1], $nbParam[2], $nbParam[3], $nbParam[4], $nbParam[5] );
	                break;
	            case 7:
	            //	On récupère tous les paramètres de la famille.
	                self::__construct4( $nbParam[0], $nbParam[1], $nbParam[2], $nbParam[3], $nbParam[4], $nbParam[5], $nbParam[6] );
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
		function __construct3($adhesion_id, $nom, $code_postal, $ville, $adresse, $telephone)
		{
			$this->adhesion_id = $adhesion_id;
			$this->nom = $nom;
			$this->code_postal = $code_postal;
			$this->ville = $ville;
			$this->adresse = $adresse;
			$this->telephone = $telephone;
			/*var_dump ('Constructeur 3');*/
		}

		/**
		*
		*/	
		function __construct4($id, $adhesion_id, $nom, $code_postal, $ville, $adresse, $telephone)
		{
			$this->id = $id;
			$this->adhesion_id = $adhesion_id;
			$this->nom = $nom;
			$this->code_postal = $code_postal;
			$this->ville = $ville;
			$this->adresse = $adresse;
			$this->telephone = $telephone;
			/*var_dump ('Constructeur 4');*/
		}

		public function getEnfants()
		{
			$sql = "SELECT * FROM v_enfant WHERE famille_id=" . $this->id;
			$conn = DB::connect();

			try {
				$req = $conn->query($sql);

				if ($req === false)
					throw new Exception;

			} catch (Exception $e) {
				return $conn->errorInfo()[2];
			}

			return $req->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getExemplairesDeposes()
		{
			$sql = "SELECT * FROM v_exemplaire WHERE famille_vendeuse_id=" . $this->id . " ORDER BY date_depot DESC";
			$conn = DB::connect();

			try {
				$req = $conn->query($sql);

				if ($req === false)
					throw new Exception;

			} catch (Exception $e) {
				return $conn->errorInfo()[2];
			}

			return $req->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getExemplairesAchetes()
		{
			$sql = "SELECT * FROM v_exemplaire WHERE famille_acheteuse_id=" . $this->id . " ORDER BY date_achat DESC";
			$conn = DB::connect();

			try {
				$req = $conn->query($sql);

				if ($req === false)
					throw new Exception;

			} catch (Exception $e) {
				return $conn->errorInfo()[2];
			}

			return $req->fetchAll(PDO::FETCH_ASSOC);
		}

	}
?>