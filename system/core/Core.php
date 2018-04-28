<?php
/**
 * @author @ShadowDLL
 * @version 0.8
 * @package ChuckFramework
**/

class CK_Core
{
	/**
	 * File
	 *
	 * @var string
	**/
	private $file;

	/**
	 * Type
	 *
	 * @var string
	**/
	private $type;

	/**
	 * Error HTML5
	 *
	 * @var string;
	 * @var string;
	**/
	private $msg;

	/**
	 * Construct
	**/
	public function __construct()
	{}

	/**
	 * Verify
	**/
	function fileExists ( $file, $type = '' )
	{
		/**
		 * Check
		 *
		 * @return boolean
		**/
		if ( ( isset ( $type ) ) && ( isset ( $file ) ) )
		{
			/**
			 * Set Attributes
			**/
			$this->file = $file;
			$this->type = $type;

			/**
			 * Get Type
			**/
			if ( $this->type == 'view' )
			{
				$this->file = CK_APPLICATION . 'views/' . $this->file;
			}
			else if ( $this->type == 'error' )
			{
				$this->file = CK_APPLICATION . 'views/error/' . $this->file;
			}
			else if ( $this->type == 'config' )
			{
				$this->file = CK_APPLICATION . 'config/' . $this->file;
			}
			else if ( $this->type == 'model' )
			{
				$this->file = CK_APPLICATION . 'models/' . $this->file;
			}
			else if ( empty ( $yhis->type ) )
			{
				$this->file = CK_APPLICATION . 'controllers/' . $this->file;
			}

			/**
			 * Check File
			 *
			 * @return booolean
			**/
			if ( file_exists ( $this->file ) )
			{
				return TRUE;
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

	/**
	 * Show 404
	 *
	 * @return file
	**/
	public function show_404 ()
	{
		$this->html ( 'Page not found!' );
	}

	/**
	 * Error HTML
	 *
	 * @return html
	**/
	public function html ( $msg )
	{
		$this->msg = $msg;

		echo '
			<style type="text/css">
			*
			{
				padding: 0;
				margin: 0;
			}
			.box
			{
				font-family: Verdana;
				width: 100%;
				height: 20px;
				text-align: center;
				padding: 20px 0;
				font-weight: bold;
			}
			.warning
			{
				background-color: #FFF484;
				border-color: #DCC600;
			}
			</style>

			<div class="warning box">
				' . $this->msg . '
			</div>
		';
	}
}