<?php
/**
 * ChuckNorrys
 *
 * Construct FrameWork
**/

require_once CK_SYSTEM . 'core/Core.php';

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
	 * Load Core
	**/
	/**
	private function __autoload ($file)
	{
		$this->file = CK_SYSTEM . 'core/' . $file . '.php';

		if ( ! ( file_exists ( $this->file ) ) )
		{
			return FALSE;
		}

		require_once $this->file;
	}
	**/

	/**
	 * Load URL
	**/
	private function loadUrl ()
	{
		require_once CK_SYSTEM . 'core/Controller.php';
		require_once CK_SYSTEM . 'core/View.php';

		if ( isset ( $_GET [ 'path' ] ) )
		{
			require_once  CK_SYSTEM . 'core/Router.php';

			$this->path = addslashes ( $_GET [ 'path' ] );
			$this->uri = new Router ( $this->path );

			if ( $this->uri != FALSE )
			{

			}
		}
		else
		{
			$this->controller = new Controller;
		}
	}
}

$chuck = new ChuckNorrys ();