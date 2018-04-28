<?php
/**
 * Main
**/
class Main extends CK_Database
{
	/**
	 * Construct Main
	**/
	public function __construct ()
	{
		/**
		 * Construct Parent
		**/
		parent::__construct();
	}

	/**
	 * SelectAll
	**/
	public function selectAll ()
	{
		$stmt = $this->db->query (' SELECT * FROM contatos ');
		return $stmt->fetchAll ();
	}
}