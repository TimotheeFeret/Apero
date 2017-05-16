<?php
	require_once "fonctions.php";
	require_once $_SERVER['CONTEXT_DOCUMENT_ROOT']."/config/connexion_bd.php";

	/**
	 *
	*/
	class Exemplaire extends Fonctions
	{
		protected $id;
		protected $livre_id;
		protected $famille_acheteuse_id;
		protected $famille_vendeuse_id;
		protected $etat_id;
		protected $prix;
		protected $date_depot;
		protected $date_achat;
		protected $nomTable = 'exemplaire_occasion';

		function __construct() {
	        $nbParam = func_get_args();
	        switch( func_num_args() ) {
	            case 0:
	                self::__construct1();
	                break;
	            case 1:
	            //	On récupère tous les paramètres de l'exemplaire sauf l'id.
	                self::__construct2($nbParam[0]);
	                break;
				case 3:
	            //	On récupère l'id de la famille, l'id du livre et la famille acheteuse.
					self::__construct3($nbParam[0], $nbParam[1], $nbParam[2]);
	                break;
	            case 7:
	            //	On récupère tous les paramètres de l'exemplaire sauf l'id.
	                self::__construct4( $nbParam[0], $nbParam[1], $nbParam[2], $nbParam[3], $nbParam[4], $nbParam[5], $nbParam[6] );
	                break;
	            case 8:
	            //	On récupère tous les paramètres de l'exemplaire.
	                self::__construct5( $nbParam[0], $nbParam[1], $nbParam[2], $nbParam[3], $nbParam[4], $nbParam[5], $nbParam[6], $nbParam[7] );
	                break;
	            default :
	            	echo '<br/>Erreur lors de la construction de l\'objet exemplaire. Nombre de paramètres inapproprié.';
	         }
	     }

		/**
		*
		 */
		function __construct1()
		{
			// Ce constructeur est notamment utilisé pour faire un get de tous les exemplaires.
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
		function __construct3($id, $famille_acheteuse_id, $date_achat)
		{
			$this->id = $id;
			$this->famille_acheteuse_id = $famille_acheteuse_id;
			$this->date_achat = $date_achat;
			/*var_dump ('Constructeur 2');*/
		}

		/**
		*
		*/
		function __construct4($livre_id, $famille_acheteuse_id, $famille_vendeuse_id, $etat_id, $prix, $date_depot, $date_achat)
		{
			$this->livre_id = $livre_id;
			$this->famille_acheteuse_id = $famille_acheteuse_id;
			$this->famille_vendeuse_id = $famille_vendeuse_id;
			$this->etat_id = $etat_id;
			$this->prix = $prix;
			$this->date_depot = $date_depot;
			$this->date_achat = $date_achat;
			/*var_dump ('Constructeur 3');*/
		}

		/**
		*
		 */
		function __construct5($id, $livre_id, $famille_acheteuse_id, $famille_vendeuse_id, $etat_id, $prix, $date_depot, $date_achat)
		{
			$this->id = $id;
			$this->livre_id = $livre_id;
			$this->famille_acheteuse_id = $famille_acheteuse_id;
			$this->famille_vendeuse_id = $famille_vendeuse_id;
			$this->etat_id = $etat_id;
			$this->prix = $prix;
			$this->date_depot = $date_depot;
			$this->date_achat = $date_achat;
			/*var_dump ('Constructeur 4');*/
		}

	}
?>