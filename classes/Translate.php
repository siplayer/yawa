<?php

class Translate{
	function __construct()
	{
		
	}
	public static function getAdminTranslation($string, $addslashes = false, $htmlentities = true, $sprintf = null)
    {
        
		global $_LANGADM;
       
        if (file_exists(_YS_TRANSLATIONS_DIR_.$iso.'/admin.php')) {
             include_once(_PY_TRANSLATIONS_DIR_.$iso.'/admin.php');
        }

        $string = preg_replace("/\\\*'/", "\'", $string);
        $key = md5($string);
        $str = Translate::getGenericAdminTranslation($string, $key, $_LANGADM);
        

        if ($htmlentities) {
            $str = htmlspecialchars($str, ENT_QUOTES, 'utf-8');
        }
        $str = str_replace('"', '&quot;', $str);

        if ($sprintf !== null) {
            $str = Translate::checkAndReplaceArgs($str, $sprintf);
        }

        return ($addslashes ? addslashes($str) : stripslashes($str));
    }
    public static function checkAndReplaceArgs($string, $args)
    {
        if (preg_match_all('#(?:%%|%(?:[0-9]+\$)?[+-]?(?:[ 0]|\'.)?-?[0-9]*(?:\.[0-9]+)?[bcdeufFosxX])#', $string, $matches) && !is_null($args)) {
            if (!is_array($args)) {
                $args = array($args);
            }

            return vsprintf($string, $args);
        }
        return $string;
    }
	public static function smartyPostProcessTranslation($string, $params)
    {
        return Translate::postProcessTranslation($string, $params);
    }
	public static function postProcessTranslation($string, $params)
    {
        // If tags were explicitely provided, we want to use them *after* the translation string is escaped.
        if (!empty($params['tags'])) {
            foreach ($params['tags'] as $index => $tag) {
                // Make positions start at 1 so that it behaves similar to the %1$d etc. sprintf positional params
                $position = $index + 1;
                // extract tag name
                $match = array();
                if (preg_match('/^\s*<\s*(\w+)/', $tag, $match)) {
                    $opener = $tag;
                    $closer = '</'.$match[1].'>';

                    $string = str_replace('['.$position.']', $opener, $string);
                    $string = str_replace('[/'.$position.']', $closer, $string);
                    $string = str_replace('['.$position.'/]', $opener.$closer, $string);
                }
            }
        }

        return $string;
    }
}