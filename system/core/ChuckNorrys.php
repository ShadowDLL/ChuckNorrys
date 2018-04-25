<?php
require_once CK_SYSTEM . 'core/Core.php';
require_once CK_SYSTEM . 'core/Router.php';
require_once CK_SYSTEM . 'core/Controller.php';
require_once CK_SYSTEM . 'core/View.php';

/**
 * ChuckNorrys
 *
 * Construct FrameWork
**/

class ChuckNorrys extends Core
{
	/**
	 * URL Path
	**/
	private $path;

	/**
	 * Class Autoload
	**/
	private $file;

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
		if ( isset ( $_GET [ 'path' ] ) )
		{
			/**
			 * Addslashes
			**/
			$this->path = addslashes ( $_GET [ 'path' ] );

			/**
			 * Construct Router
			**/
			$this->uri = new Router ( $this->path );

			if ( $this->uri->controller != FALSE )
			{
				$this->controller = new Controller ();

				if ( $this->uri->method != FALSE )
				{
					$this->controller->load ( $this->uri->controller, $this->uri->method );
				}
				else
				{
					$this->controller->load ( $this->uri->controller, 'index' );
				}
			}
			else
			{
				$this->show_404 ();
			}
		}
		else
		{
			$this->uri = new Router ( 'default' );

			if ( $this->uri->controller != FALSE )
			{
				$this->controller = new Controller ();

				if ( $this->uri->method != FALSE )
				{
					$this->controller->load ( $this->uri->controller, $this->uri->method );
				}
				else
				{
					$this->controller->load ( $this->uri->controller, 'index' );
				}
			}
			else
			{
				$this->show_404 ();
			}
		}
	}
}

$chuck = new ChuckNorrys ();