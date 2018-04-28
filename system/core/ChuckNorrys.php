<?php
/**
 * @author @ShadowDLL
 * @version 0.8
 * @package ChuckFramework
**/

/**
 * Start Session
**/
session_start ();

/**
 * Load Files
**/
require_once CK_SYSTEM . 'core/Core.php';
require_once CK_SYSTEM . 'core/Router.php';
require_once CK_SYSTEM . 'core/Controller.php';
require_once CK_SYSTEM . 'core/View.php';

require_once CK_SYSTEM . 'core/database/DB.php';
require_once CK_SYSTEM . 'core/database/Database.php';

class ChuckNorrys extends CK_Core
{
	/**
	 * URL Path
	**/
	private $path;

	/**
	 * Router
	**/
	public $uri;

	/**
	 * Controller
	**/
	private $controller;

	/**
	 * Method
	**/
	private $method;

	/**
	 * Construct Parent
	 *
	 * Create ChuckNorrys
	**/
	public function __construct ()
	{
		/**
		 * Parent
		**/
		parent::__construct ();

		/**
		 * Load URL
		**/
		$this->loadUrl ();
	}

	/**
	 * Load URL
	**/
	private function loadUrl ()
	{
		/**
		 * Check Debug
		**/
		if ( ( ! ( defined ( 'CK_DEBUG' ) ) ) || ( CK_DEBUG == FALSE ) )
		{
			/**
			 * Hidden Errors
			**/
			error_reporting ( 0 );
			ini_set ( 'display_errors', 0 );
		}
		else
		{
			/**
			 * Display Errors
			**/
			error_reporting ( E_ALL );
			ini_set ( 'display_errors', 1 );
		}

		/**
		 * Check URL
		**/
		if ( isset ( $_GET [ 'path' ] ) )
		{
			/**
			 * Addslashes
			**/
			$this->path = addslashes ( $_GET [ 'path' ] );

			/**
			 * Construct CK_Router
			**/
			$this->uri = new CK_Router ( $this->path );

			/**
			 * Check Controller
			**/
			if ( $this->uri->controller != FALSE )
			{
				/**
				 * Load CK_Controller
				**/
				$this->controller = new CK_Controller ();

				/**
				 * Check Method
				**/
				if ( $this->uri->method != FALSE )
				{
					/**
					 * Construct Object
					**/
					$this->controller->create ( $this->uri->controller, $this->uri->method );
				}
				else
				{
					/**
					 * Construct Object
					**/
					$this->controller->create ( $this->uri->controller, 'index' );
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
		else
		{
			/**
			 * Load CK_Router
			**/
			$this->uri = new CK_Router ( 'default' );

			/**
			 * Check Controller
			**/
			if ( $this->uri->controller != FALSE )
			{
				/**
				 * Load CK_Controller
				**/
				$this->controller = new CK_Controller ();

				/**
				 * Check Method
				**/
				if ( $this->uri->method != FALSE )
				{
					/**
					 * Construct Object
					**/
					$this->controller->create ( $this->uri->controller, $this->uri->method );
				}
				else
				{
					/**
					 * Construct Object
					**/
					$this->controller->create ( $this->uri->controller, 'index' );
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
	}
}

/**
 * Load ChuckNorrys
**/
$chuck = new ChuckNorrys ();