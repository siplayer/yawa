<?php
/**
 * Cookies management
 */
 include_once('Blowfish.php');
class Cookie {
	
	const DURATION	= 7200;
	
	const PATH		= '/';
	
	const DOMAIN	= '';
	
	const SECURE	= false;
	
	const HTTPONLY	= true;
	private $bf;
	private $key;
	private $iv;
	
	function __construct()
	{
		
	}
	public static function read($name){
		$key = _COOKIE_KEY_;
		$iv  = _COOKIE_IV_;
		$bf  = new Blowfish($key, $iv);
		if(isset($_COOKIE[$name]))
			return $_COOKIE[$name];
		return null;
	}
	
	public static function write($name, $value=null, $duration=null, $domain=null, $path=null, $secure=null, $httponly=null){
		if(!isset($value))
			return self::delete($name);
		if(!isset($duration))
			$duration = self::DURATION;
		if(!isset($path))
			$path = self::PATH;
		if(!isset($domain))
			$domain = self::DOMAIN;
		if(!isset($secure))
			$secure = self::SECURE;
		if(!isset($httponly))
			$httponly = self::HTTPONLY;
		
		// Expiration par seconds
		if($duration==0)
			$expire = 0;
		else
			$expire = time()+((int) $duration);
		
		// valeur string
		//$key = _COOKIE_KEY_;
		//$iv = _COOKIE_IV_;
		//$bf = new Blowfish($key, $iv);
		//$value =  $bf->encrypt($value);
		$value = (string) $value;
		// enregistrer la cookie
		setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
		$_COOKIE[$name] = $value;
	}
	
	/**
	 * Deletes a cookie
	 *
	 * @param string $name	Name of the cookie
	 */
	public static function delete($name){
		unset($_COOKIE[$name]);
		//setcookie($name, null, time()-3600*200);
		setcookie($name, null, -1, '/');
		

	}
	
	public static function isSLogged() {
		if (Cookie::read("Logged") AND Cookie::read("Logged")== 1 AND Cookie::read("id_employee") AND Validate::isUnsignedId(Cookie::read("id_employee")) AND Employee::checkPassword(intval(Cookie::read("id_employee"))))
			return true;
		return false;
	}
	
}