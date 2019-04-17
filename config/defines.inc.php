<?php

/* Debug only */
if (!defined('_YS_MODE_DEV_')) {
	define('_YS_MODE_DEV_', True);
}

if (_YS_MODE_DEV_ === true) {
    @ini_set('display_errors', 'on');
    @error_reporting(E_ALL | E_STRICT);
    define('_YS_DEBUG_SQL_', true);
} else {
    @ini_set('display_errors', 'off');
    define('_YS_DEBUG_SQL_', false);
}
define('_YS_DISPLAY_COMPATIBILITY_WARNING_', false);
$currentDir = dirname(__FILE__);

if (!defined('PHP_VERSION_ID')) {
    $version = explode('.', PHP_VERSION);
    define('PHP_VERSION_ID', ($version[0] * 10000 + $version[1] * 100 + $version[2]));
}

if (!defined('_YS_VERSION_') && (getenv('_YS_VERSION_') || getenv('REDIRECT__PS_VERSION_'))) {
    define('_YS_VERSION_', getenv('_YS_VERSION_') ? getenv('_YS_VERSION_') : getenv('REDIRECT__YS_VERSION_'));
}

if (!defined('_YS_HOST_MODE_') && (getenv('_YS_HOST_MODE_') || getenv('REDIRECT__YS_HOST_MODE_'))) {
    define('_YS_HOST_MODE_', getenv('_YS_HOST_MODE_') ? getenv('_YS_HOST_MODE_') : getenv('REDIRECT__YS_HOST_MODE_'));
}

if (!defined('_YS_ROOT_DIR_') && (getenv('_YS_ROOT_DIR_') || getenv('REDIRECT__YS_ROOT_DIR_'))) {
    define('_YS_ROOT_DIR_', getenv('_YS_ROOT_DIR_') ? getenv('_YS_ROOT_DIR_') : getenv('REDIRECT__YS_ROOT_DIR_'));
}

/* Directories */
if (!defined('_YS_ROOT_DIR_')) {
    define('_YS_ROOT_DIR_', realpath($currentDir.'/..'));
}
define('__YS_BASE_URI__', 'http://178.128.76.44/tactill/');
define('_YS_THEMES_DIR_',        _YS_ROOT_DIR_.'/themes/');
define('_YS_CLASSES_DIR_',        _YS_ROOT_DIR_.'/classes/');
define('_YS_THEMES_FRONT_DIR_',  _YS_THEMES_DIR_.'front/');
define('_YS_THEMES_BACK_DIR_',   _YS_THEMES_DIR_.'back/');
define('_YS_CONTROLLER_DIR_',    _YS_ROOT_DIR_.'/controllers/');
define('_YS_CONTROLLER_BACK_DIR_',   _YS_CONTROLLER_DIR_.'back/');
define('_YS_CONTROLLER_FRONT_DIR_',   _YS_CONTROLLER_DIR_.'front/');

define('_YS_MAIL_DIR_',          _YS_ROOT_DIR_.'/mails/');
define('_YS_PDF_DIR_',           _YS_ROOT_DIR_.'/pdf/');
define('_YS_TRANSLATIONS_DIR_',  _YS_ROOT_DIR_.'/translate/');
define('_YS_UPLOAD_DIR_',        _YS_ROOT_DIR_.'/upload/');
define('_YS_TOOL_DIR_',          _YS_ROOT_DIR_.'/tools/');
define('_YS_IMG_DIR_',           _YS_ROOT_DIR_.'/img/');
define('_YS_WEB_DIR_',           __YS_BASE_URI__.'/web/');
define('_YS_WEB_IMG_DIR_',           _YS_WEB_DIR_.'images/');
define('_YS_WEB_JS_DIR_',           _YS_WEB_DIR_.'js/');
define('_YS_WEB_CSS_DIR_',           _YS_WEB_DIR_.'css/');


define('_YS_CAT_IMG_DIR_',           _YS_IMG_DIR_.'c/');
define('_YS_COL_IMG_DIR_',           _YS_IMG_DIR_.'co/');
define('_YS_EMPLOYEE_IMG_DIR_',      _YS_IMG_DIR_.'e/');
define('_YS_GENDERS_DIR_',           _YS_IMG_DIR_.'genders/');
define('_YS_LANG_IMG_DIR_',          _YS_IMG_DIR_.'l/');
define('_YS_MANU_IMG_DIR_',          _YS_IMG_DIR_.'m/');
define('_YS_ORDER_STATE_IMG_DIR_',   _YS_IMG_DIR_.'os/');
define('_YS_PROD_IMG_DIR_',          _YS_IMG_DIR_.'p/');
define('_YS_SCENE_IMG_DIR_',         _YS_IMG_DIR_.'scenes/');
define('_YS_SCENE_THUMB_IMG_DIR_',   _YS_IMG_DIR_.'scenes/thumbs/');
define('_YS_SHIP_IMG_DIR_',          _YS_IMG_DIR_.'s/');
define('_YS_STORE_IMG_DIR_',         _YS_IMG_DIR_.'st/');
define('_YS_SUPP_IMG_DIR_',          _YS_IMG_DIR_.'su/');
define('_YS_TMP_IMG_DIR_',           _YS_IMG_DIR_.'tmp/');

/* settings php */
define('_YS_MAGIC_QUOTES_GPC_',         get_magic_quotes_gpc());
define('_YS_MYSQL_REAL_ESCAPE_STRING_', function_exists('mysql_real_escape_string'));
define('_YS_TRANS_PATTERN_',            '(.*[^\\\\])');
define('_YS_MIN_TIME_GENERATE_PASSWD_', '360');
if (!defined('_YS_MAGIC_QUOTES_GPC_')) {
    define('_YS_MAGIC_QUOTES_GPC_',         get_magic_quotes_gpc());
}

define('_YS_SMARTY_NO_COMPILE_', 0);
define('_YS_SMARTY_CHECK_COMPILE_', 1);
define('_YS_SMARTY_FORCE_COMPILE_', 2);

define('_YS_SMARTY_CONSOLE_CLOSE_', 0);
define('_YS_SMARTY_CONSOLE_OPEN_BY_URL_', 1);
define('_YS_SMARTY_CONSOLE_OPEN_', 2);
if (!defined('_YS_CACHE_DIR_')) {
    define('_YS_CACHE_DIR_',             _YS_ROOT_DIR_.'/cache/');
}