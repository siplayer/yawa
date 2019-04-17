<?php


define('_YS_SMARTY_DIR_', _YS_TOOL_DIR_.'smarty/');

require_once(_YS_SMARTY_DIR_.'Smarty.class.php');


global $smarty;

$smarty = new Smarty();

//$smarty->setTemplateDir(_YS_THEMES_BACK_DIR_);
$smarty->setCompileDir(_YS_CACHE_DIR_.'smarty/compile');
$smarty->setCacheDir(_YS_CACHE_DIR_.'smarty/cache');
if (!Tools::getSafeModeStatus()) {
    $smarty->use_sub_dirs = true;
}
$smarty->setConfigDir(_YS_SMARTY_DIR_.'configs');
$smarty->caching = false;
/*if (Configuration::get('YS_SMARTY_CACHING_TYPE') == 'mysql') {
    include(_YS_CLASS_DIR_.'/SmartyCacheResourceMysql.php');
    $smarty->caching_type = 'mysql';
}*/
$smarty->force_compile = true ;
$smarty->compile_check = true;
$smarty->debug_tpl = _YS_THEMES_DIR_.'debug.tpl';

/* Use this constant if you want to load smarty without all PrestaShop functions */
if (defined('_YS_SMARTY_FAST_LOAD_') && _YS_SMARTY_FAST_LOAD_) {
    return;
}
function smarty_function_mois_nom ($params) {
	extract($params);
	if (!empty($type))
	{
	$moin_number=array(1=>"Janvier",2=>"Février",3=>"Mars",4=>"Avril",5=>"Mai",6=>"Juin",7=>"Juillet",8=>"Aôut",9=>"Septembre",10=>"Octobre",11=>"Novembre",12=>"Décembre");
	return $moin_number[$type];
	}
}
function smarty_function_tags ($params) {
	extract($params);
	return strip_tags($chaine);
}
function smart_function_uperCase($params){
	extract($params);
	$string = str_replace('\'', '\\\'', $params['s']);
	if(isset($string) && strlen($string)>1){
		return ucfirst($string);
	}else{
		return false;
	}
}
function smart_function_md5($params){
	extract($params);
	$string = str_replace('\'', '\\\'', $params['s']);
	if(isset($string) && $string!=''){
		return md5($string);
	}else{
		return false;
	}
}
function smart_function_crypte($params){
	extract($params);
	$string = str_replace('\'', '\\\'', $params['s']);
	if(isset($string) && $string!=''){
		return Tools::crypte($string,_COOKIE_IV_);
	}else{
		return false;
	}
}
function smarty_function_translate($params)
{
	/*
	 * Warning : 2 lines have been added to the Smarty class.
	 * "public $currentTemplate = null;" into the class itself
	 * "$this->currentTemplate = substr(basename($resource_name), 0, -4);" into the "display" method
	 */
	global $_TEMPLATES;
    extract($params);
	$string = str_replace('\'', '\\\'', $params['s']);
	$msg = (is_array($_TEMPLATES)) ?  stripslashes($_TEMPLATES[$params['s']]) : $params['s'];
            return Tools::htmlentitiesUTF8($msg);
}
function smarty_function_utf($params)
{
    extract($params);
	$string = str_replace('\'', '\\\'', $params['c']);
    return html_entity_decode($string);
	//return htmlentities('iso-8859-1',$string);
}
function smarty_function_stripslash($params)
{
        extract($params);
        return stripslashes($params['n']);
}
function smarty_function_trancher($params){
	$longeur=90;
	extract($params);
	return (strlen($params['c'])>$longeur)?substr($params['c'],0,$longeur-3)."...":$params['c'];
}
function smarty_format_review($params){
	return explode(",", $params['c']);
} 

smartyRegisterFunction($smarty, 'function', 't', 'smartyTruncate'); // unused
smartyRegisterFunction($smarty, 'function', 'm', 'smarty_function_mois_nom'); // unused
smartyRegisterFunction($smarty, 'function', 'p', 'smarty_function_tags'); // Debug only
smartyRegisterFunction($smarty, 'function', 'd', 'smarty_function_utf'); // Debug only
smartyRegisterFunction($smarty, 'function', 'l', 'smarty_function_translate', false);
smartyRegisterFunction($smarty, 'function', 'u', 'smart_function_uperCase', false);
smartyRegisterFunction($smarty, 'function', 'md5', 'smart_function_md5', false);
smartyRegisterFunction($smarty, 'function', 'cry', 'smart_function_crypte');


function smartyDieObject($params, &$smarty)
{
    return Tools::d($params['var']);
}

function smartyShowObject($params, &$smarty)
{
    return Tools::p($params['var']);
}

function smartyMaxWords($params, &$smarty)
{
    Tools::displayAsDeprecated();
    $params['s'] = str_replace('...', ' ...', html_entity_decode($params['s'], ENT_QUOTES, 'UTF-8'));
    $words = explode(' ', $params['s']);

    foreach ($words as &$word) {
        if (Tools::strlen($word) > $params['n']) {
            $word = Tools::substr(trim(chunk_split($word, $params['n']-1, '- ')), 0, -1);
        }
    }

    return implode(' ',  Tools::htmlentitiesUTF8($words));
}

function smartyTruncate($params, &$smarty)
{
    Tools::displayAsDeprecated();
    $text = isset($params['strip']) ? strip_tags($params['text']) : $params['text'];
    $length = $params['length'];
    $sep = isset($params['sep']) ? $params['sep'] : '...';

    if (Tools::strlen($text) > $length + Tools::strlen($sep)) {
        $text = Tools::substr($text, 0, $length).$sep;
    }

    return (isset($params['encode']) ? Tools::htmlentitiesUTF8($text, ENT_NOQUOTES) : $text);
}

function smarty_modifier_truncate($string, $length = 80, $etc = '...', $break_words = false, $middle = false, $charset = 'UTF-8')
{
    if (!$length) {
        return '';
    }

    $string = trim($string);

    if (Tools::strlen($string) > $length) {
        $length -= min($length, Tools::strlen($etc));
        if (!$break_words && !$middle) {
            $string = preg_replace('/\s+?(\S+)?$/u', '', Tools::substr($string, 0, $length+1, $charset));
        }
        return !$middle ? Tools::substr($string, 0, $length, $charset).$etc : Tools::substr($string, 0, $length/2, $charset).$etc.Tools::substr($string, -$length/2, $length, $charset);
    } else {
        return $string;
    }
}

function smarty_modifier_htmlentitiesUTF8($string)
{
    return Tools::htmlentitiesUTF8($string);
}
function smartyMinifyHTML($tpl_output, &$smarty)
{
    $context = Context::getContext();
    if (isset($context->controller) && in_array($context->controller->php_self, array('pdf-invoice', 'pdf-order-return', 'pdf-order-slip'))) {
        return $tpl_output;
    }
    $tpl_output = Media::minifyHTML($tpl_output);
    return $tpl_output;
}

function smartyPackJSinHTML($tpl_output, &$smarty)
{
    $context = Context::getContext();
    if (isset($context->controller) && in_array($context->controller->php_self, array('pdf-invoice', 'pdf-order-return', 'pdf-order-slip'))) {
        return $tpl_output;
    }
    $tpl_output = Media::packJSinHTML($tpl_output);
    return $tpl_output;
}

function smartyRegisterFunction($smarty, $type, $function, $params, $lazy = true)
{
    if (!in_array($type, array('function', 'modifier', 'block'))) {
        return false;
    }

    // lazy is better if the function is not called on every page
    if ($lazy) {
        $lazy_register = SmartyLazyRegister::getInstance();
        $lazy_register->register($params);

        if (is_array($params)) {
            $params = $params[1];
        }

        // SmartyLazyRegister allows to only load external class when they are needed
        $smarty->registerPlugin($type, $function, array($lazy_register, $params));
    } else {
        $smarty->registerPlugin($type, $function, $params);
    }
}

function smartyHook($params, &$smarty)
{
    if (!empty($params['h'])) {
        $id_module = null;
        $hook_params = $params;
        $hook_params['smarty'] = $smarty;
        if (!empty($params['mod'])) {
            $module = Module::getInstanceByName($params['mod']);
            if ($module && $module->id) {
                $id_module = $module->id;
            } else {
                return '';
            }
            unset($hook_params['mod']);
        }
        unset($hook_params['h']);
        return Hook::exec($params['h'], $hook_params, $id_module);
    }
}

function smartyCleanHtml($data)
{
    // Prevent xss injection.
    if (Validate::isCleanHtml($data)) {
        return $data;
    }
}

function toolsConvertPrice($params, &$smarty)
{
    return Tools::convertPrice($params['price'], Context::getContext()->currency);
}

/**
 * Used to delay loading of external classes with smarty->register_plugin
 */
class SmartyLazyRegister
{
    protected $registry = array();
    protected static $instance;

    /**
     * Register a function or method to be dynamically called later
     * @param string|array $params function name or array(object name, method name)
     */
    public function register($params)
    {
        if (is_array($params)) {
            $this->registry[$params[1]] = $params;
        } else {
            $this->registry[$params] = $params;
        }
    }

    /**
     * Dynamically call static function or method
     *
     * @param string $name function name
     * @param mixed $arguments function argument
     * @return mixed function return
     */
    public function __call($name, $arguments)
    {
        $item = $this->registry[$name];

        // case 1: call to static method - case 2 : call to static function
        if (is_array($item[1])) {
            return call_user_func_array($item[1].'::'.$item[0], array($arguments[0], &$arguments[1]));
        } else {
            $args = array();

            foreach ($arguments as $a => $argument) {
                if ($a == 0) {
                    $args[] = $arguments[0];
                } else {
                    $args[] = &$arguments[$a];
                }
            }

            return call_user_func_array($item, $args);
        }
    }

    public static function getInstance()
    
    {
        if (!self::$instance) {
            self::$instance = new SmartyLazyRegister();
        }
        return self::$instance;
    }
}
