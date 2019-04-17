<?php
class RapportController extends AdminController {
	
	public $template;
	public function __construct($action,$value) {
		$this->name = "Rapport";	
		$this->errors = array();
		$this->nberrors = 0;		
		$this->action=$action;
		$this->value =(isset($value['id'])) ? $value['id'] :0 ;
		return $this->$action();		
	}	
	public function index(){
		
		$this->template="Rapport.tpl";
	}
	public function recapeventes(){
	
		$this->template="RecapeVentes.tpl";
	}
}
