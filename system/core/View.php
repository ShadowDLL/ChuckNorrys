<?php

class View extends Core
{
	/**
	 * View file
	 *
	 * @var string
	**/
	private $file;

	/**
	 * Construct
	**/
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Initialize a new View
	 *
	 * @param $file
	**/
	public function view ( $file )
	{
		if ( ( isset ( $file ) ) && ( ! ( empty ( $file ) ) ) )
		{
			/**
			 * Set Attributes
			**/
			$this->file = $file;

			/**
			 * Loader
			**/
			require_once CK_APPLICATION . 'views/' . $file . '.php';
		}
		else
		{
			$this->show_404 ();
		}
	}
}