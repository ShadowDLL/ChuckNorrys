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
	private $load;

	/**
	 * For Layout
	 *
	 * @var String
	 * @var Array
	**/
	private $view;
	private $data;

	/**
	 * Files
	 *
	 * @var String
	**/
	private $file;

	/**
	 * Construct Parent
	**/
	public function __construct ( $options = array() )
	{
		/**
		 * Parent
		**/
		parent::__construct ();

		/**
		 * Check Controller
		**/
		if ( ! ( empty ( $options ) ) )
		{
			$this->loadController ();
		}
		else
		{
			$this->welcome ();
		}
	}

	/**
	 * 
	 *
	 *
	**/
	private function welcome ()
	{
		$this->load->view('Welcome');
	}
}