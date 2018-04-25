<?php
/**
 * CK_Router
 *
 * Generate URL Routes
*/
class Router extends Core
{
	/**
	 * URL Path
	**/
	public $path;
	public $method;
	public $controller;

	/**
	 * For Load
	**/
	private $url;
	private $router = array ();

	/**
	 * Construct Router
	**/
	public function __construct ( $path )
	{
		$this->path = $path;

		if ( ! ( empty ( $this->path ) ) )
		{
			$this->uri ();
		}
		else
		{
			$this->show_404 ();
		}
	}

	/**
	 * Get data in url
	**/
	private function uri ()
	{
		/**
		 * Check Config
		**/
		if ( $this->fileExists ('routes.php', 'config') != FALSE )
		{
			/**
			 * Load Routes.php
			**/
			require_once CK_APPLICATION . 'config/routes.php';

			/**
			 * Check URL
			**/
			if ( isset ( $this->path ) )
			{
				/**
				 * 1 - Remove the '/' from the end of the $this->path
				 * 2 - Remove invalid chars in $this->path
				**/
				$this->path = rtrim ( $this->path, '/' );
				$this->path = filter_var ( $this->path, FILTER_SANITIZE_URL );

				/**
				 * Generate a Array from $this->path
				**/
				$this->path = explode ( '/' , $this->path );

				/**
				 * Verifica se existem parâmetros númeriicos na url
				**/
				for ( $i = 0; $i < count ($this->path); $i++ )
				{
					if ( is_numeric ( $this->path[$i] ) )
					{
						$this->path[$i] = "(:num)/";
					}
					else
					{
						$this->path[$i] = $this->path[$i] . '/';
					}

					$this->url .= $this->path[$i];
				}

				/**
				 * 1 - Remove the '/' from the end of the $this->path
				**/
				$this->path = rtrim ( $this->url, '/' );

				/**
				 * Check Array
				**/
				if ( isset ( $route [ $this->path ] ) )
				{
					/**
					 * Create Router
					**/
					$this->router = $route [ $this->path ];

					/**
					 * Check Controller
					**/
					if ( isset ( $this->router [ 'Controller' ] ) )
					{
						/**
						 * Construct Controller
						**/
						$this->controller = $this->router [ 'Controller' ];

						/**
						 * Construct Method
						**/
						if ( isset ( $this->router [ 'Method' ] ) )
						{
							$this->method = $this->router [ 'Method' ];
						}
						else
						{
							$this->method = FALSE;
						}
					}
					else
					{
						$this->controller = FALSE;
					}
				}
				else
				{
					$this->controller = FALSE;
				}
			}
			else
			{
				$this->show_404 ();
			}
		}
		else
		{
			$this->show_404 ();
		}
	}
}