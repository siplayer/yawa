<?php

/**
 * MySQL class, MySQL.php
 * Tools
 *
 * @ l'auteur Younes ABOUTAIB
 * @version 1.0
 *
 */

// ini_set('mbstring.internal_encoding', 'UTF-8');

class Tools
{
	/**
	 * G?rateur mot de passe
	 */
	static public function passwdGen($length = 8)
	{
		$str = 'abcdefghijkmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		for ($i = 0, $passwd = ''; $i < $length; $i++)
			$passwd .= Tools::substr($str, mt_rand(0, Tools::strlen($str) - 1), 1);
		return $passwd;
	}
	static public function persian_log2vis(&$str)
	{
	     include_once('bidi.php');
	    
	    $bidi = new bidi();
	    
	    $text = explode("\n", $str);
	    
	    $str = array();
	    
	    foreach($text as $line){
	        $chars = $bidi->utf8Bidi($bidi->UTF8StringToArray($line), 'R');
	        $line = '';
	        foreach($chars as $char){
	            $line .= $bidi->unichr($char);
	        }
	        
	        $str[] = $line;
	    }
	    
	    $str = implode("\n", $str);
	}
	static public function keyGen($apiKey){
 
	   $secretKey = "VV5SmGaSmyspBNG8qh4vyj10xiXe1s8HLLQd2CrMyt38y8nq4ADQ8Vks";

	   $salt = mt_rand();
	 
	   $signature = hash_hmac('sha256', $salt, $secretKey, true);

	   $encodedSignature = base64_encode($signature);

	   $encodedSignature = urlencode($encodedSignature);
	 
	   return $encodedSignature;
	}
	/**
	 * Redireger ver une page
	 *
	 * @param string $url URL disirer
	 * @param string $baseUri Base URI (optional)
	 */
	static public function redirect($url, $baseUri =__YS_BASE_URI__ )
	{
		if (isset($_SERVER['HTTP_REFERER']) AND ($url == $_SERVER['HTTP_REFERER']))
			header('Location: '.$_SERVER['HTTP_REFERER']);
		else
			header('Location: '.$baseUri.$url);
		exit;
	}
	static public function cvf_convert_object_to_array($data) {

	    if (is_object($data)) {
	        $data = get_object_vars($data);
	    }

	    if (is_array($data)) {
	        return array_map(__FUNCTION__, $data);
	    }
	    else {
	        return $data;
	    }
	}
	static public function redirectabsolut($url)
	{
		if (isset($url))
			header('Location: '.$url);
		else
			return false;
		exit;
	}
	static public function imagethumb( $image_src , $image_dest = NULL , $max_size = 200, $expand = FALSE, $square = FALSE )
{
	if( !file_exists($image_src) ) return FALSE;

	// R?p? les infos de l'image
	$fileinfo = getimagesize($image_src);
	if( !$fileinfo ) return FALSE;

	$width     = $fileinfo[0];
	$height    = $fileinfo[1];
	$type_mime = $fileinfo['mime'];
	$type      = str_replace('image/', '', $type_mime);

	if( !$expand && max($width, $height)<=$max_size && (!$square || ($square && $width==$height) ) )
	{
		// L'image est plus petite que max_size
		if($image_dest)
		{
			return copy($image_src, $image_dest);
		}
		else
		{
			header('Content-Type: '. $type_mime);
			return (boolean) readfile($image_src);
		}
	}

	// Calcule les nouvelles dimensions
	$ratio = $width / $height;

	if( $square )
	{
		$new_width = $new_height = $max_size;

		if( $ratio > 1 )
		{
			// Paysage
			$src_y = 0;
			$src_x = round( ($width - $height) / 2 );

			$src_w = $src_h = $height;
		}
		else
		{
			// Portrait
			$src_x = 0;
			$src_y = round( ($height - $width) / 2 );

			$src_w = $src_h = $width;
		}
	}
	else
	{
		$src_x = $src_y = 0;
		$src_w = $width;
		$src_h = $height;

		if ( $ratio > 1 )
		{
			// Paysage
			$new_width  = $max_size;
			$new_height = round( $max_size / $ratio );
		}
		else
		{
			// Portrait
			$new_height = $max_size;
			$new_width  = round( $max_size * $ratio );
		}
	}

	// Ouvre l'image originale
	$func = 'imagecreatefrom' . $type;
	if( !function_exists($func) ) return FALSE;

	$image_src = $func($image_src);
	$new_image = imagecreatetruecolor($new_width,$new_height);

	// Gestion de la transparence pour les png
	if( $type=='png' )
	{
		imagealphablending($new_image,false);
		if( function_exists('imagesavealpha') )
			imagesavealpha($new_image,true);
	}

	// Gestion de la transparence pour les gif
	elseif( $type=='gif' && imagecolortransparent($image_src)>=0 )
	{
		$transparent_index = imagecolortransparent($image_src);
		$transparent_color = imagecolorsforindex($image_src, $transparent_index);
		$transparent_index = imagecolorallocate($new_image, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
		imagefill($new_image, 0, 0, $transparent_index);
		imagecolortransparent($new_image, $transparent_index);
	}

	// Redimensionnement de l'image
	imagecopyresampled(
		$new_image, $image_src,
		0, 0, $src_x, $src_y,
		$new_width, $new_height, $src_w, $src_h
	);

	// Enregistrement de l'image
	$func = 'image'. $type;
	if($image_dest)
	{
		$func($new_image, $image_dest);
	}
	else
	{
		header('Content-Type: '. $type_mime);
		$func($new_image);
	}

	// Lib?tion de la m?ire
	imagedestroy($new_image); 

	return TRUE;
}

	public static function uniord($u) {
    	$k = mb_convert_encoding($u, 'UCS-2LE', 'UTF-8');
	    $k1 = ord(substr($k, 0, 1));
	    $k2 = ord(substr($k, 1, 1));
	    return $k2 * 256 + $k1;
	}
	
	static public function trancher($chaine,$longeur){
		
		return (strlen($chaine)>$longeur)?substr($chaine,0,$longeur-3)."...":$chaine;
	}
	public static function getHttpHost($http = false, $entities = false)
	{
		$host = (isset($_SERVER['HTTP_X_FORWARDED_HOST']) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : $_SERVER['HTTP_HOST']);
		if ($entities)
			$host = htmlspecialchars($host, ENT_COMPAT, 'UTF-8');
		
		return $host;
	}
	
	
	public static function historiquePage(){
		
		$pagearray = $_GET;
		if($pagearray['controller']!='login' && $pagearray['controller']!='logout'){
			$pagecourant = $pagearray['controller'].'/'.$pagearray['action'].'/'.$pagearray['id'];
			Cookie::write("page", $pagecourant);
			return true;
		}
		return false;
	}
	
	/**
	 * URL de redirection pour deja JET_BASE_URI
	 *
	 * @ Param string $ url URL d?r?	 * */
	static public function redirectLink($url)
	{
		header('Location: '.$url);
		exit;
	}
        //open url
		function array_random($arr, $num = 1) {
		    shuffle($arr);
		   
		    $r = array();
		    for ($i = 0; $i < $num; $i++) {
		        $r[] = $arr[$i];
		    }
		    return $num == 1 ? $r[0] : $r;
		}

	static public function redirectAdmin($url)
	{
		header('Location: '.$url);
		exit;
	}
	/**
	 * N?yer une chaine comme nom de fichier
	 *
	 * @ Param string name of file 
	 */
	/*Static public function simpleName($chaine){
		//      les accents
		$chaine = trim(str_replace(array("'",'"'),array("",""),$chaine));

?a??????????????????????????","aaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn");
		//      les carac?es sp?aux (autres que lettres et chiffres en fait)
		$chaine = preg_replace('/([^.a-z0-9]+)/i', '', $chaine);
		$chaine = strtolower($chaine);
		return $chaine;
	}
	/**
	 * Obtenez une valeur de $_POST / $_GET
	 * En cas d'indisponibilit?prendre une valeur par d?ut
	 *
	 * @ Param string $ key valeur de la cl?	 * @ Param mixed $ defaultValue (facultatif)
	 * Valeur @ return mixed
	 */
	static public function getValue($key, $defaultValue = false)
	{
		if (!isset($key) OR empty($key) OR !is_string($key))
			return false;
		$ret = (isset($_POST[$key]) ? $_POST[$key] : (isset($_GET[$key]) ? $_GET[$key] : $defaultValue));

		if (is_string($ret) === true)
			$ret = urldecode(preg_replace('/((\%5C0+)|(\%00+))/i', '', urlencode($ret)));
		return !is_string($ret)? $ret : stripslashes($ret);
	}
	static public function RedirectPage($num,$url){
	   		static $http = array (
		       100 => "HTTP/1.1 100 Continue",
		       101 => "HTTP/1.1 101 Switching Protocols",
		       200 => "HTTP/1.1 200 OK",
		       201 => "HTTP/1.1 201 Created",
		       202 => "HTTP/1.1 202 Accepted",
		       203 => "HTTP/1.1 203 Non-Authoritative Information",
		       204 => "HTTP/1.1 204 No Content",
		       205 => "HTTP/1.1 205 Reset Content",
		       206 => "HTTP/1.1 206 Partial Content",
		       300 => "HTTP/1.1 300 Multiple Choices",
		       301 => "HTTP/1.1 301 Moved Permanently",
		       302 => "HTTP/1.1 302 Found",
		       303 => "HTTP/1.1 303 See Other",
		       304 => "HTTP/1.1 304 Not Modified",
		       305 => "HTTP/1.1 305 Use Proxy",
		       307 => "HTTP/1.1 307 Temporary Redirect",
		       400 => "HTTP/1.1 400 Bad Request",
		       401 => "HTTP/1.1 401 Unauthorized",
		       402 => "HTTP/1.1 402 Payment Required",
		       403 => "HTTP/1.1 403 Forbidden",
		       404 => "HTTP/1.1 404 Not Found",
		       405 => "HTTP/1.1 405 Method Not Allowed",
		       406 => "HTTP/1.1 406 Not Acceptable",
		       407 => "HTTP/1.1 407 Proxy Authentication Required",
		       408 => "HTTP/1.1 408 Request Time-out",
		       409 => "HTTP/1.1 409 Conflict",
		       410 => "HTTP/1.1 410 Gone",
		       411 => "HTTP/1.1 411 Length Required",
		       412 => "HTTP/1.1 412 Precondition Failed",
		       413 => "HTTP/1.1 413 Request Entity Too Large",
		       414 => "HTTP/1.1 414 Request-URI Too Large",
		       415 => "HTTP/1.1 415 Unsupported Media Type",
		       416 => "HTTP/1.1 416 Requested range not satisfiable",
		       417 => "HTTP/1.1 417 Expectation Failed",
		       500 => "HTTP/1.1 500 Internal Server Error",
		       501 => "HTTP/1.1 501 Not Implemented",
		       502 => "HTTP/1.1 502 Bad Gateway",
		       503 => "HTTP/1.1 503 Service Unavailable",
		       504 => "HTTP/1.1 504 Gateway Time-out"
		   );
		   header($http[$num]);
		   header ("Location: $url");
	}
	
	static public function getIsset($key)
	{
		if (!isset($key) OR empty($key) OR !is_string($key))
			return false;
		return isset($_POST[$key]) ? true : (isset($_GET[$key]) ? true : false);
	}
	

	
	/**
	 * Display date regarding to language preferences
	 *
	 * @param array $params Date, format...
	 * @param object $smarty Smarty object for language preferences
	 * @return string Date
	 */
	static public function dateFormat($params, &$smarty)
	{
		return Tools::displayDate($params['date'], $params['full']);
	}

	/**
	 * Display date regarding to language preferences
	 *
	 * @param string $date Date to display format UNIX
	 * @param integer $id_lang Language id
	 * @param boolean $full With time or not (optional)
	 * @return string Date
	 */
	static public function displayDate($date,$full = false, $separator='-')
	{
		if (!$date OR !strtotime($date))
			return $date;
		if (!Validate::isDate($date) OR !Validate::isBool($full))
			die (Tools::displayError('date incorrecte'));
		$tmpTab = explode($separator, substr($date, 0, 10));
		$hour = ' '.substr($date, -8);
	 return ($tmpTab[2].'-'.$tmpTab[1].'-'.$tmpTab[0].($full ? $hour : ''));
	  
	}
	static public function getStrlen($chaine){
		$chaine = trim(strip_tags($chaine));
		//return strlen($chaine);
		$chaine = preg_replace('/[ \t]+/', ' ', preg_replace('/[\r\n]+/', "\n", $chaine));
		$chaine = preg_replace('/[ \t]+/', ' ', preg_replace('/\s*$^\s*/m', "\n", $chaine));
		
		return mb_strlen($chaine, 'UTF-8');
	}
	static public function getNbMt($chaine){
		$chaine = trim(strip_tags($chaine));
		$totla=ceil($chaine/(160*1));
		return $totla;
	}

	/**
	 * Sanitize a string
	 *
	 * @param string $string String to sanitize
	 * @param boolean $full String contains HTML or not (optional)
	 * @return string Sanitized string
	 */
	static public function safeOutput($string, $html = false)
	{
		if (!$html)
			$string = @htmlentities(strip_tags($string), ENT_QUOTES, 'utf-8');
		return $string;
	}

	static public function htmlentitiesUTF8($string, $type = ENT_QUOTES)
	{
		if (is_array($string))
			return array_map(array('Tools', 'htmlentitiesUTF8'), $string);
		return htmlentities($string, $type, 'utf-8');
	}

	static public function htmlentitiesDecodeUTF8($string)
	{
		if (is_array($string))
			return array_map(array('Tools', 'htmlentitiesDecodeUTF8'), $string);
		return html_entity_decode($string, ENT_QUOTES, 'utf-8');
	}

	static public function safePostVars()
	{
		$_POST = array_map(array('Tools', 'htmlentitiesUTF8'), $_POST);
	}

	/**
	 * Delete directory and subdirectories
	 *
	 * @param string $dirname Directory name
	 */
	static public function deleteDirectory($dirname)
	{
		$files = scandir($dirname);
		foreach ($files as $file)
			if ($file != '.' AND $file != '..')
			{
				if (is_dir($file))
					self::deleteDirectory($file);
				elseif (file_exists($file))
				unlink($file);
				else
					echo 'Unable to delete '.$file;
			}
			rmdir($dirname);
	}

	/**
	 * Display an error according to an error code
	 *
	 * @param integer $code Error code
	 */
	static public function displayError($string = 'tentative de piratage',$env=false, $htmlentities = true)
	{
		$path = (isset($env) && $env==1) ? 'back'  : 'front' ;
		if(Cookie::read('lang')!='')
			@include(_YS_TRANSLATIONS_DIR_.$path.'/'.Cookie::read('lang').'.php');
		else
			@include(_YS_TRANSLATIONS_DIR_.$path.'/fr.php');
		//d(debug_backtrace());
		if (!is_array($_ERRORS)){
			if($_ERRORS[$string]!='') return $_ERRORS[$string];
		}	
		$key = str_replace('\'', '\\\'', $string);
		$str = (isset($_ERRORS) AND is_array($_ERRORS) AND key_exists($key, $_ERRORS)) ? $_ERRORS[$key] : $string;
		return str_replace('"', '&quot;', stripslashes($str));
	}
	
	static public function displayMessage($string = 'tentative de piratage',$env=false, $htmlentities = true)
	{
		$path = (isset($env) && $env==1) ? 'back'  : 'front' ;
		if(Cookie::read('lang')!='')
			@include(_YS_TRANSLATIONS_DIR_.$path.'/'.Cookie::read('lang').'.php');
		else
			@include(_YS_TRANSLATIONS_DIR_.$path.'/fr.php');
		//d(debug_backtrace());
		if (!is_array($_TITLES)){
			if($_TITLES[$string]!='') return $_TITLES[$string];
		}	
		$key = str_replace('\'', '\\\'', $string);
		$str = (isset($_TITLES) AND is_array($_TITLES) AND key_exists($key, $_TITLES)) ? $_TITLES[$key] : $string;
		return str_replace('"', '&quot;', stripslashes($str));
	}
	
	
	public static function getRemoteAddr()
    {
        if (function_exists('apache_request_headers')) {
            $headers = apache_request_headers();
        } else {
            $headers = $_SERVER;
        }

        if (array_key_exists('X-Forwarded-For', $headers)) {
            $_SERVER['HTTP_X_FORWARDED_FOR'] = $headers['X-Forwarded-For'];
        }

        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] && (!isset($_SERVER['REMOTE_ADDR'])
            || preg_match('/^127\..*/i', trim($_SERVER['REMOTE_ADDR'])) || preg_match('/^172\.16.*/i', trim($_SERVER['REMOTE_ADDR']))
            || preg_match('/^192\.168\.*/i', trim($_SERVER['REMOTE_ADDR'])) || preg_match('/^10\..*/i', trim($_SERVER['REMOTE_ADDR'])))) {
            if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',')) {
                $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                return $ips[0];
            } else {
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }
	/**
	 * Display an error with detailed object
	 *
	 * @param object $object Object to display
	 */
	static public function dieObject($object, $kill = true)
	{
		echo '<pre style="text-align: left;">';
		print_r($object);
		echo '</pre><br />';
		if ($kill)
			die('END');
	}
	static public function PrintObject($object, $kill = true)
	{
		echo '<pre style="text-align: left;">';
		print_r($object);
		echo '</pre><br />';
		
	}
	
	static public function str_replace_deep($search, $replace, $subject)
	{
	    if (is_array($subject))
	    {
	        foreach($subject as &$oneSubject)
	            $oneSubject = str_replace_deep($search, $replace, $oneSubject);
	        unset($oneSubject);
	        return $subject;
	    } else {
	        return str_replace($search, $replace, $subject);
	    }
	} 	
	/**
	 * ALIAS OF dieObject() - Display an error with detailed object
	 *
	 * @param object $object Object to display
	 */
	static public function d($object, $kill = true)
	{
		self::dieObject($object, $kill = true);
	}

	/**
	 * ALIAS OF dieObject() - Display an error with detailed object but don't stop the execution
	 *
	 * @param object $object Object to display
	 */
	static public function p($object)
	{
		self::dieObject($object, false);
	}
	/**
	 * ALIAS OF dieObject() - Display an error with detailed object but don't stop the execution
	 *
	 * @param object $object Object to display
	 */
	static public function GetHeures($var){
		$date=date('G');
		if($date=='00' and $var==1){
			$heur=2;
		}
		else{
			$heur=$date;
		}
		return $heur;
	}
	/**
	 * Check if submit has been posted
	 *
	 * @param string $submit submit name
	 */
	static public function isSubmit($submit)
	{
		return (
				isset($_POST[$submit]) OR isset($_POST[$submit.'_x']) OR isset($_POST[$submit.'_y'])
				OR isset($_GET[$submit]) OR isset($_GET[$submit.'_x']) OR isset($_GET[$submit.'_y'])
		);
	}
	static public function PageCourant($param){
		global $_TEMPLATES;
		if(isset($param) && is_array($param)){
			$pagecourant = '';
			if($param['action']==''){
				$result = Db::getInstance()->ExecuteS('SELECT ru_libelle AS Page FROM `'._DB_PREFIX_.'menus` WHERE ru_lien="'.$param['controller'].'" ORDER BY ru_libelle asc');
			}else{
				$result = Db::getInstance()->ExecuteS('SELECT sr_libelle AS Page FROM `'._DB_PREFIX_.'smenus` WHERE sr_lien="'.$param['controller'].'/'.$param['action'].'" ORDER BY sr_libelle asc');			
			}
			foreach ($result AS &$page){
				$pagecourant = $page['Page'];
			}
			if(isset($_TEMPLATES[$pagecourant]) && $_TEMPLATES[$pagecourant]!=''){
				return $_TEMPLATES[$pagecourant];
			}
			
		}
			return false;
	}

    static public function FileArrienne($param){
		global $_TEMPLATES;
		$file = '<ul class="page-breadcrumb breadcrumb">';
		//controller via rubrique
		$result = Db::getInstance()->ExecuteS('SELECT * FROM `'._DB_PREFIX_.'menus` WHERE ru_lien="'.$param['controller'].'" ORDER BY ru_libelle asc');
		$file.='<li>
				<i class="fa fa-home"></i>
				<a href="'.__YS_BASE_URI__.'/home">'
								.$_TEMPLATES['Accueil'].
				'</a>
				<i class="fa fa-angle-right"></i>
				</li>';
				
		foreach ($result AS &$filearr){
			if(isset($param['controller']) && $param['controller']==$filearr['ru_lien']){
				$file.=' <li>
						<a href="'.__YS_BASE_URI__.'/'.$filearr['ru_lien'].'">
								'.$_TEMPLATES[$filearr['ru_libelle']].'
						</a>';
				$resultS = Db::getInstance()->ExecuteS('SELECT * FROM `'._DB_PREFIX_.'smenus` C JOIN `'._DB_PREFIX_.'menus` R ON C.ru_code=R.ru_code WHERE C.ru_code='.$filearr['ru_code'].' ORDER BY sr_libelle asc');
				if(isset($resultS) && count($resultS)>0){
					foreach ($resultS AS &$filearrs){
						$filearrs['id'] = (isset($param['id'])) ? $param['id'] :  ''; 
						$filearrs['sr_lien']=str_replace(array($filearrs['ru_lien'],'/'),array('',''),$filearrs['sr_lien']);
						if(isset($param['action']) && $param['action']==$filearrs['sr_lien']){
							$file.=' <i class="fa fa-angle-right"></i>';
							$file.=' </li>';
							$file.=' <li>
										<a href="'.__YS_BASE_URI__.'/'.$filearrs['ru_lien'].'/'.$filearrs['sr_lien'].'/'.$filearrs['id'].'">
											'.$_TEMPLATES[$filearrs['sr_libelle']].'
										</a>
									 </li>';
						}else{
							$file.='';
						}
					}
				}else{
					$file.=' </li>';
				}
				
			}else{
				$file.='';
			}
		
			
			
		}
		$file .='</ul>' ;
		
		return $file;
		
	}


	/**
	 * Encrypt password
	 *
	 * @param object $object Object to display
	 */
	static public function encrypt($passwd,$login)
	{
		return md5($login.$passwd);		
	}

	/**
	 * Get token to prevent CSRF
	 *
	 * @param string $token token to encrypt
	 */
	static public function getToken($page = true)
	{
		global $cookie;
		if ($page === true)
			return (Tools::encrypt($cookie->id_customer.$cookie->passwd.$_SERVER['SCRIPT_NAME']));
		else
			return (Tools::encrypt($cookie->id_customer.$cookie->passwd.$page));
	}

	/**
	 * Encrypt password
	 *
	 * @param object $object Object to display
	 */
	static public function getAdminToken($string)
	{
		return !empty($string) ? Tools::encrypt($string) : false;
	}

	

	/*
	 ** Historyc translation function kept for compatibility
	** Removing soon
	*/
	static public function historyc_l($key, $translations)
	{
		global $cookie;
		if (!$translations OR !is_array($translations))
			die(Tools::displayError());
		$iso = strtoupper(Language::getIsoById($cookie->id_lang));
		$lang = key_exists($iso, $translations) ? $translations[$iso] : false;
		return (($lang AND is_array($lang) AND key_exists($key, $lang)) ? stripslashes($lang[$key]) : $key);
	}

	static public function link_rewrite($str, $utf8_decode = false)
	{
		$purified = '';
		$length = Tools::strlen($str);
		if ($utf8_decode)
			$str = utf8_decode($str);
		for ($i = 0; $i < $length; $i++)
		{
			$char = Tools::substr($str, $i, 1);
			if (Tools::strlen(htmlentities($char)) > 1)
			{
				$entity = htmlentities($char, ENT_COMPAT, 'UTF-8');
				$purified .= $entity{1};
			}
			elseif (preg_match('|[[:alpha:]]{1}|u', $char))
			$purified .= $char;
			elseif (preg_match('<[[:digit:]]|-{1}>', $char))
			$purified .= $char;
			elseif ($char == ' ')
			$purified .= '-';
		}
		return trim(self::strtolower($purified));
	}

	/**
	 * Truncate strings
	 *
	 * @param string $str
	 * @param integer $maxLen Max length
	 * @param string $suffix Suffix optional
	 * @return string $str truncated
	 */
	/* CAUTION : Use it only on module hookEvents.
	 ** For other purposes use the smarty function instead */
	static public function truncate($str, $maxLen, $suffix = '...')
	{
		if (Tools::strlen($str) <= $maxLen)
			return $str;
		$str = utf8_decode($str);
		return (utf8_encode(substr($str, 0, $maxLen - Tools::strlen($suffix)).$suffix));
	}

	/**
	 * Generate date form
	 *
	 * @param integer $year Year to select
	 * @param integer $month Month to select
	 * @param integer $day Day to select
	 * @return array $tab html data with 3 cells :['days'], ['months'], ['years']
	 *
	 */
	static public function dateYears()
	{
		for ($i = date('Y') - 10; $i >= 1900; $i--)
			$tab[] = $i;
		return $tab;
	}

	static public function dateDays()
	{
		for ($i = 1; $i != 32; $i++)
			$tab[] = $i;
		return $tab;
	}

	static public function dateMonths()
	{
		for ($i = 1; $i != 13; $i++)
			$tab[$i] = date('F', mktime(0, 0, 0, $i, date('m'), date('Y')));
		return $tab;
	}

	static public function hourGenerate($hours, $minutes, $seconds)
	{
		return implode(':', array($hours, $minutes, $seconds));
	}

	static public function dateFrom($date)
	{
		$tab = explode(' ', $date);
		if (!isset($tab[1]))
			$date .= ' ' . Tools::hourGenerate(0, 0, 0);
		return $date;
	}

	static public function dateTo($date)
	{
		$tab = explode(' ', $date);
		if (!isset($tab[1]))
			$date .= ' ' . Tools::hourGenerate(23, 59, 59);
		return $date;
	}

	static public function getExactTime()
	{
		return time()+microtime();
	}

	static function strtolower($str)
	{
		if (is_array($str))
			return false;
		if (function_exists('mb_strtolower'))
			return mb_strtolower($str, 'utf-8');
		return strtolower($str);
	}

	static function strlen($str)
	{
		if (is_array($str))
			return false;
		if (function_exists('mb_strlen'))
			return mb_strlen($str, 'utf-8');
		return strlen($str);
	}

	static function stripslashes($string)
	{
		if (_PS_MAGIC_QUOTES_GPC_)
			$string = stripslashes($string);
		return $string;
	}

	static function strtoupper($str)
	{
		if (is_array($str))
			return false;
		if (function_exists('mb_strtoupper'))
			return mb_strtoupper($str, 'utf-8');
		return strtoupper($str);
	}
       
	static function substr($str, $start, $length = false, $encoding = 'utf-8')
	{
		if (is_array($str))
			return false;
		if (function_exists('mb_substr'))
			return mb_substr($str, intval($start), ($length === false ? Tools::strlen($str) : intval($length)), $encoding);
		return substr($str, $start, $length);
	}
        


	static function ucfirst($str)
	{
		return self::strtoupper(Tools::substr($str, 0, 1)).Tools::substr($str, 1);
	}


	


	/**
	 * DEPRECATED FUNCTION
	 * DO NOT USE IT
	 **/
	static public function jet_set_magic_quotes_runtime($var)
	{
		if (function_exists('set_magic_quotes_runtime'))
			@set_magic_quotes_runtime($var);
	}


	public function creerFichier($fichierChemin, $fichierNom, $fichierExtension, $fichierContenu, $droit=""){
		$fichierCheminComplet = Prod_verssion.$fichierChemin."/".$fichierNom;
		if($fichierExtension!=""){
			$fichierCheminComplet = $fichierCheminComplet.".".$fichierExtension;
		}

		// cr?ion du fichier sur le serveur
		$leFichier = fopen($fichierCheminComplet, "wb");
		fwrite($leFichier,$fichierContenu);
		fclose($leFichier);

		// la permission
		if($droit==""){
			$droit="0777";
		}

		// on v?fie que le fichier a bien ? cr?
		$t_infoCreation['fichierCreer'] = false;
		if(file_exists($fichierCheminComplet)==true){
			$t_infoCreation['fichierCreer'] = true;
		}

		// on applique les permission au fichier cr?
		$retour = chmod($fichierCheminComplet,intval($droit,8));
		$t_infoCreation['permissionAppliquer'] = $retour;
                $t_infoCreation['FICHIER'] =$fichierCheminComplet;
		return $t_infoCreation;;
	}
	public function int2str($a){
		//verifier c'est le nombre contien unp
        if ($a<0) return 'moins '.$this->int2str(-$a);
        if ($a<17){
                switch ($a){
                        case 0: return 'zero';
                        case 1: return 'un';
                        case 2: return 'deux';
                        case 3: return 'trois';
                        case 4: return 'quatre';
                        case 5: return 'cinq';
                        case 6: return 'six';
                        case 7: return 'sept';
                        case 8: return 'huit';
                        case 9: return 'neuf';
                        case 10: return 'dix';
                        case 11: return 'onze';
                        case 12: return 'douze';
                        case 13: return 'treize';
                        case 14: return 'quatorze';
                        case 15: return 'quinze';
                        case 16: return 'seize';
                }
        } else if ($a<20){
                return 'dix-'.($a-10);
        } else if ($a<100){
                if ($a%10==0){
                        switch ($a){
                                case 20: return 'vingt';
                                case 30: return 'trente';
                                case 40: return 'quarante';
                                case 50: return 'cinquante';
                                case 60: return 'soixante';
                                case 70: return 'soixante-dix';
                                case 80: return 'quatre-vingt';
                                case 90: return 'quatre-vingt-dix';
                        }
                } else if ($a<70){
                        return $this->int2str($a-$a%10).' '.$this->int2str($a%10);
                } else if ($a<80){
                        return $this->int2str(60).' '.$this->int2str($a%20);
                } else{
                        return $this->int2str(80).' '.$this->int2str($a%20);
                }
        } else if ($a==100){
                return 'cent';
        } else if ($a<200){
                return $this->int2str(100).' '.$this->int2str($a%100);
        } else if ($a<1000){
                return $this->int2str((int)($a/100)).' '.$this->int2str(100).' '.$this->int2str($a%100);
        } else if ($a==1000){
                return 'mille';
        } else if ($a<2000){
                return $this->int2str(1000).' '.$this->int2str($a%1000).' ';
        } else if ($a<1000000){
                return $this->int2str((int)($a/1000)).' '.$this->int2str(1000).' '.$this->int2str($a%1000);
        }  
        
}
	public static function getConnectServeur($ip,$port){
		$fp = @fsockopen($ip,$port,$errno, $errstr, 30);
		if (!$fp) {
			echo "$errstr ($errno)<br />\n";
		} else {
			$out = "GET / HTTP/1.1\r\n";
			$out .= "Host: www.example.com\r\n";
			$out .= "Connection: Close\r\n\r\n";
		 
			fwrite($fp, $out);
			while (!feof($fp)) {
				fgets($fp, 128);
			}
			fclose($fp);
			return true;
		}
	}
	//la date du mois pr?dent suite a la date du jour
	public function GetDatePre(){
		return $date = strftime("%Y-%m-%d", mktime(0, 0, 0, date('m'), date('d')-30, date('y')));
	}
	//fonction extraire les contenu du flux twitter jetpsh fichier JASON
	  
   public function pSQL($string, $htmlOK = false)
	{
		if (_YS_MAGIC_QUOTES_GPC_)
			$string = stripslashes($string);
		if (!is_numeric($string))
		{
			$string = _YS_MYSQL_REAL_ESCAPE_STRING_ ? mysql_real_escape_string($string) : addslashes($string);
			if (!$htmlOK)
				$string = strip_tags(nl2br2($string));
		}

		return $string;
	}
	public function nl2br2($string)
	{
		return str_replace(array("\r\n", "\r", "\n"), '<br />', $string);
	}
	
	public static function convertBytes($value)
    {
        if (is_numeric($value)) {
            return $value;
        } else {
            $value_length = strlen($value);
            $qty = (int)substr($value, 0, $value_length - 1);
            $unit = Tools::strtolower(substr($value, $value_length - 1));
            switch ($unit) {
                case 'k':
                    $qty *= 1024;
                    break;
                case 'm':
                    $qty *= 1048576;
                    break;
                case 'g':
                    $qty *= 1073741824;
                    break;
            }
            return $qty;
        }
    }

	public static function isPHPCLI()
    {
        return (defined('STDIN') || (Tools::strtolower(php_sapi_name()) == 'cli' && (!isset($_SERVER['REMOTE_ADDR']) || empty($_SERVER['REMOTE_ADDR']))));
    }
	
	public static function getSafeModeStatus()
    {
        if (!$safe_mode = @ini_get('safe_mode')) {
            $safe_mode = '';
        }
        return in_array(Tools::strtolower($safe_mode), array(1, 'on'));
    }
	public static function toCamelCase($str, $catapitalise_first_char = false)
    {
        $str = Tools::strtolower($str);
        if ($catapitalise_first_char) {
            $str = Tools::ucfirst($str);
        }
        return preg_replace_callback('/_+([a-z])/', create_function('$c', 'return strtoupper($c[1]);'), $str);
    }
    
    
    public static function crypte($Texte,$Cle)
	{
		srand((double)microtime()*1000000);
		$CleDEncryptage = md5(rand(0,32000) );
		$Compteur=0;
		$VariableTemp = "";
		for ($Ctr=0;$Ctr<strlen($Texte);$Ctr++)
		{
			if ($Compteur==strlen($CleDEncryptage))
				$Compteur=0;
			$VariableTemp.= substr($CleDEncryptage,$Compteur,1).(substr($Texte,$Ctr,1) ^ substr($CleDEncryptage,$Compteur,1) );
			$Compteur++;
		}
		return urlencode(base64_encode(Tools::GenerationCle($VariableTemp,$Cle)));
	}
	public static function generationCle($Texte,$CleDEncryptage)
	{
		$CleDEncryptage = md5($CleDEncryptage);
		$Compteur=0;
		$VariableTemp = "";
		for ($Ctr=0;$Ctr<strlen($Texte);$Ctr++)
		{
			if ($Compteur==strlen($CleDEncryptage))
				$Compteur=0;
			$VariableTemp.= substr($Texte,$Ctr,1) ^ substr($CleDEncryptage,$Compteur,1);
			$Compteur++;
		}
		return $VariableTemp;
	}
	public static function decrypte($Texte,$Cle)
	{
		$Texte = Tools::GenerationCle(base64_decode($Texte),$Cle);
		$VariableTemp = "";
		for ($Ctr=0;$Ctr<strlen($Texte);$Ctr++)
		{
			$md5 = substr($Texte,$Ctr,1);
			$Ctr++;
			$VariableTemp.= (substr($Texte,$Ctr,1) ^ $md5);
		}
		return $VariableTemp;
	}
    
    
    
}




?>