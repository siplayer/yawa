<?php
class ErreurController {
	public $template;
	public $gabaris;
	public function __construct($action,$value) {
		return $this->$action();
	}
	public function index(){
		$this->template="Erreur.tpl";		
		return $this->template;
	}
}
