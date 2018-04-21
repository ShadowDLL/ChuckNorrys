<?php
/**
 * Errors
**/
$route [ 'error_404' ] = "";

/**
 * REQUIRED
 *
 * If in the array not exists the param "Method",
 * the system will get the method index in your controller.
**/
$route [ 'default' ] = array (
	'Controller' => 'Welcome'
);

/**
 * OUTHERS
**/
$route [ 'products/edit/(:num)' ] = array (
	'Controller' => 'Products',
	'Method' => 'edit'
);