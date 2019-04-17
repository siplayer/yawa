<?php
class LogoutController extends AdminController{
	
	public $template;
	public function __construct($action,$value) {
		$this->name = "logout";			
		$this->action=$action;
		$this->value =$value['id'];
		return $this->$action();		
	}
	public function index(){
		$cookie = new Cookie;
		$cookie->delete("Logged");
		$cookie->delete('id_employee');
		$cookie->delete('fname');
		$cookie->delete('lname');
	    $cookie->delete('Logged');
	    $cookie->delete('email');
	    $cookie->delete('profile');
		$cookie->delete('remote_addr');
		if(!$cookie->isSLogged()) $this->template="Login.tpl";
		else $this->template="Index.tpl";
		return $this->template;			                   
	}
	
}