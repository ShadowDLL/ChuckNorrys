<?php
/**
 * CK_Router
 *
 * Generate URL Routes
*/
class Router
{
	/**
	 * URL Path
	**/
	public $path;
	public $action;
	public $controller;

	/**
	 * Construct Router
	**/
	public function __construct ( $path )
	{
		$this->path = $path;

		if ( ! ( empty ( $this->path ) ) )
		{
			$this->urlData ();
		}
	}

	/**
	* Get data in url
	*
	* If the url is != from base_url, them this system
	* will verify the param in routes config using this
	* method:
	*
	* Example:
	*
	* base_url: http://127.0.0.1/ChuckNorrys/
	* current_url: http://127.0.0.1/ChuckNorrys/products/add/1
	*
	* The system  will verify the param: products/add/1
	* in routes config and will fild this var:
	* $route[ 'products/add/(:num)' ] = "Product/AddProduct/$1";
	*
	* When the system find this route in the config, the system
	* will explode the param and explode "Product/AddProduct/$1", 
	* and return
	*
	* # URL products/add/1
	*
	* [0] => "products",
	* [1] => "add",
	* [2] => 1
	*
	* # ROUTE ARRAY "Product/AddProduct/$1"
	*
	* [0] => "",
	* [1] => "",
	* [2] => ""
	*
	*
	*
	*
	*
	*
	**/
	private function urlData ()
	{
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
			 * Load Config's
			 *
			 * 1 - Load Controller
			 * 2 - Create Action
			**/
			$this->controller 	= $this->path [ 0 ];
			$this->action 		= $this->path [ 1 ];

			/**
			 * Generate a Configuration from Paramns
			**/
			if ( isset ( $this->path [ 2 ] ) )
			{
				/**
				 * Destroy the datas inside the Array
				 *
				 * 1 - Destroy the Controller
				 * 2 - Destroy the Method
				**/
				unset ( $this->path [ 0 ] );
				unset ( $this->path [ 1 ] );
				
				/**
				 * Return all values from Array
				**/
				$this->param = array_values ( $this->path );
			}

			// DEBUG
			//
			// echo $this->controller . '<br>';
			// echo $this->action . '<br>';
			// echo '<pre>';
			// print_r( $this->param );
			// echo '</pre>';
		}
	}

	/**
	 * Get Segment
	 *
	 * The sistem will count the array in $this->param
	 * and if exists any value, the sistem will return this.
	**/
	public function segment ( $position = '' )
	{
		if ( isset ( $this->param ) )
		{
			if ( ! ( empty ( $position ) ) || ( $position == 0 ) )
			{
				if ( sizeof ( $this->param ) > 0 )
				{
					if ( in_array ( $position, $this->param ) )
					{
						return $this->param [ $position ];
					}
					else
					{
						return FALSE;
					}
				}
				else
				{
					return FALSE;
				}
			}
			else
			{
				return FALSE;
			}
		}
		else
		{
			return FALSE;
		}
	}
}