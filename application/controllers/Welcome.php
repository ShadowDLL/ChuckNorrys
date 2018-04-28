<?php
/**
 * Controller
**/
class Welcome extends CK_Controller
{
	/**
	 * Construct Welcome
	**/
	public function __construct ()
	{
		/**
		 * Construct Parent
		**/
		parent::__construct();
	}

	/**
	 * Use Model
	**/
	private function _use ()
	{
		/**
		 * Start Database
		**/
		$this->model ( 'Main' );
	}

	/** 
	 * Index Method
	**/
	public function index ()
	{
		/**
		 * Data
		**/
		/*
		$this->data [ 'welcome' ] = "Hello World :D";
		*/

		/**
		 * Load Model
		 * Database Query
		**/
		/*
		$this->_use();
		$this->data [ 'contatos' ] = $this->db->selectAll ();
		*/

		/**
		 * Load View
		**/
		$this->load->view ( 'Welcome', $this->data );
	}
}