<?php
/**
 * @author @ShadowDLL
 * @version 0.1
 * @package ChuckFramework
**/

class Controller extends Core
{
	/**
	 * Load
	 *
	 * @var String
	**/
	public $load;

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
	 * Construct Parent
	**/
	public function __construct ()
	{
		/**
		 * Parent
		**/
		parent::__construct ();

		/**
		 * Load
		**/
		if ( ! ( isset ( $this->load ) ) )
		{
			$this->load = new View;
		}
	}

	/**
	 * Load Controller
	**/
	public function load ( $controller, $method )
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
			 * Load View
			**/
			$this->load = new View;

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
			$this->show_404 ();
		}
	}
}