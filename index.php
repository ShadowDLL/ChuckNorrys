<?php
/**
 * @author @ShadowDLL
 * @version 0.8
 * @package ChuckFramework
**/

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
 * Debug Mode
**/
define ( 'CK_DEBUG', TRUE );

/**
 * Initialize Loder
**/
require_once CK_SYSTEM . 'core/ChuckNorrys.php';