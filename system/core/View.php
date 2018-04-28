<?php
/**
 * @author @ShadowDLL
 * @version 0.8
 * @package ChuckFramework
**/

class CK_View extends CK_Core
{
	/**
	 * View file
	 *
	 * @var string
	**/
	private $file;

	/**
	 * View file
	 *
	 * @var string
	**/
	public $data;

	/**
	 * Construct
	**/
	public function __construct()
	{
		/**
		 * Construct Parent
		**/
		parent::__construct();
	}

	/**
	 * Initialize a new View
	 *
	 * @param $file
	**/
	public function view ( $file, $data = '' )
	{
		if ( ( isset ( $file ) ) && ( ! ( empty ( $file ) ) ) )
		{
			/**
			 * Set Attributes
			**/
			$this->file = $file;
			$this->data = $data;

			/**
			 * Set Content
			**/
			if ( ! ( empty ( $this->data ) ) )
			{
				/**
				 * Set Clean Var
				**/
				foreach ( $this->data as $key => $val )
				{
					$$key = $val;
				}
			}

			/**
			 * Loader
			**/
			require_once CK_APPLICATION . 'views/' . $file . '.php';
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