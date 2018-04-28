<?php
/**
 * @author @ShadowDLL
 * @version 0.8
 * @package ChuckFramework
**/

class CK_Database
{
	/**
	 * Db
	 *
	 * @var String
	**/
	public $db;

	/**
	 * Construct Database
	**/
	public function __construct ()
	{
		/**
		 * Check var
		**/
		if ( ! ( isset ( $this->db ) ) )
		{
			/**
			 * Connect
			**/
			$this->db = new CK_DB;
			$this->db = $this->db->connect();
		}
	}
}