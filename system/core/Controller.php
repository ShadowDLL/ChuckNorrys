<?php
/**
 * @author @ShadowDLL
 * @version 0.8
 * @package ChuckFramework
**/

class CK_Controller extends CK_Core
{
	/**
	 * Files
	 *
	 * @var String
	**/
	private $file;

	/**
	 * Controller
	 *
	 * @var String
	**/
	private $controller;

	/**
	 * Load
	 *
	 * @var String
	**/
	public $load;

	/**
	 * Db
	 *
	 * @var String
	**/
	public $db;

	/**
	 * Data
	 *
	 * @var Array
	**/
	public $data = array ();

	/**
	 * Construct Parent
	**/
	public function __construct ()
	{
		/**
		 * Parent
		**/
		parent::__construct ();

		/**
		 * Check Load
		**/
		if ( ! ( isset ( $this->load ) ) )
		{
			/**
			 * Load View
			**/
			$this->load = new CK_View;
		}
	}

	/**
	 * Load Controller
	**/
	public function create ( $controller, $method )
	{
		/**
		 * Construct File
		**/
		$this->file = $controller . '.php';

		/**
		 * Check File
		**/
		if ( $this->fileExists ( $this->file ) != FALSE)
		{
			/**
			 * Load Controller
			**/
			require_once CK_APPLICATION . 'controllers/' . $this->file;

			/**
			 * Check Method
			**/
			if ( $method != 'index' )
			{
				/**
				 * Construct
				**/
				$this->controller = new $controller;

				/**
				 * Call Method
				**/
				$this->controller->$method ();
			}
			else
			{
				/**
				 * Construct
				**/
				$this->controller = new $controller;

				/**
				 * Call Method
				**/
				$this->controller->index ();
			}
		}
		else
		{
			/**
			 * Error
			**/
			$this->show_404 ();
		}
	}

	/**
	 * Load Model
	**/
	public function model ( $model )
	{
		/**
		 * Check Isset
		**/
		if ( isset ( $model ) )
		{
			/**
			 * Fix Model
			**/
			$this->db = $model . '.php';

			/**
			 * Check File
			**/
			if ( $this->fileExists ( $this->db, 'model' ) != FALSE )
			{
				/**
				 * Load Model
				**/
				require_once CK_APPLICATION . 'models/' . $this->db;

				/**
				 * Load Model
				**/
				$this->db = new $model;
			}
			else
			{
				/**
				 * Error
				**/
				$this->show_404 ();
			}
		}
	}
}