<?php

/**
  * config.inc.php
  * @category config Scriptes
  *
  * @author Younes aboutaib
  * @version 1.0
  * @copyright YABSOLUTION
  */

/* PHP configuration*/
$currentDir = dirname(__FILE__);

require_once($currentDir.'/defines.inc.php');

$start_time = microtime(true);

/* SSL configuration */
define('_YS_SSL_PORT_', 443);

/* Improve PHP configuration to prevent issues */
ini_set('default_charset', 'utf-8');
ini_set('magic_quotes_runtime', 0);
ini_set('magic_quotes_sybase', 0);

if (!headers_sent()) {
    header('Content-Type: text/html; charset=utf-8');
}
function __autoload($className)
{
	if (!class_exists($className, false))
		if(file_exists(dirname(__FILE__).'/../classes/'.$className.'.php')){
			require_once(dirname(__FILE__).'/../classes/'.$className.'.php');
		}
}

/* No settings file? goto installer... */
if (!file_exists(_YS_ROOT_DIR_.'/config/settings.inc.php')) {
    die('Error: "Settings" file is missing');
    exit;
}

require_once(_YS_ROOT_DIR_.'/config/settings.inc.php');

if (Tools::convertBytes(ini_get('upload_max_filesize')) < Tools::convertBytes('100M')) {
    ini_set('upload_max_filesize', '100M');
}

if (Tools::isPHPCLI() && isset($argc) && isset($argv)) {
    Tools::argvToGET($argc, $argv);
}
$path = (defined('_YS_ADMIN_DIR_') && _YS_ADMIN_DIR_!='') ? 1 : 0;

