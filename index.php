<?php
/**
 * @author @ShadowDLL
 * @version 0.1
 * @package ChuckNorrys
**/

/**
 * BASE URL
 *
 * Example: http://127.0.0.1/ChuckNorrys/
**/
define ( 'CK_URI', 'http://localhost/ChuckFrame/' );

/**
 * Directory Seperator
**/
define ( 'DS', '/' );

/**
 * Root Directory
**/
define ( 'CK_ROOT', str_replace ( '\\', DS, dirname ( __FILE__ ) ) . DS );

/**
 * Application Directory
**/
define ( 'CK_APPLICATION', CK_ROOT . 'application' . DS );

/**
 * System Directory
**/
define ( 'CK_SYSTEM', CK_ROOT . 'system' . DS );

/**
 * Upload Directory
**/
define ( 'CK_UPLOAD', CK_ROOT . 'view/_upload' . DS );

/**
 * Debug Mode
**/
define ( 'CK_DEBUG', TRUE );

/**
 * Initialize Loder
**/
require_once CK_SYSTEM . 'core/ChuckNorrys.php';