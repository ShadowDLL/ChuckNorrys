<?php
/**
 * @author @ShadowDLL
 * @version 0.8
 * @package ChuckFramework
**/

class CK_DB extends CK_Core
{
	/**
	 * Variável que guarda a conexão PDO.
	**/
	private $db;

	/**
	 * Variável de configuração PDO.
	**/
	private $db_driv;
	private $db_host;
	private $db_data;
	private $db_user;
	private $db_pass;
	private $db_char;

	private $db_conn;

	/**
	 * Impede Construct
	**/
	public function __construct ()
	{}

	public function connect ()
	{
		/**
		 * Constroi parentesco
		**/
		parent::__construct();

		/**
		 * Requisita as configurações
		**/
		require_once CK_APPLICATION . 'config/database.php';

		/**
		 * Informa as configurações
		**/
		$this->db_driv = DB_DBDRIVER;
		$this->db_host = DB_HOSTNAME;
		$this->db_data = DB_DATABASE;
		$this->db_user = DB_USERNAME;
		$this->db_pass = DB_PASSWORD;
		$this->db_char = DB_CHAR_SET;

		/**
		 * Check
		**/
		if ( ! ( empty ( $this->db_data ) ) )
		{
			/**
			 * Try connection
			**/
			try
			{
				/**
				 * Atribui à váriável $this->db_conn parte da configuração de conexão
				 * Atribui o objeto PDO à variável $this->db.
				**/
				$this->db_conn = $this->db_driv . ":host=" . $this->db_host . ";dbname=" . $this->db_data;
				$this->db = new PDO ( $this->db_conn, $this->db_user, $this->db_pass );

				/**
				 * Garante que o PDO lance exceções durante erros.
				**/
				$this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

				/**
				 * Garante que os dados sejam armazenados com codificação UFT-8.
				**/
				$this->db->exec( 'SET NAMES ' . $this->db_char );
			}
			catch ( PDOException $e )
			{
				/**
				 * Então não carrega nada mais da página.
				**/
				die ( 'Connection Error: ' . $e->getMessage () );
			}
		}

		/**
		 * Return
		**/
		return $this->db;
	}
}