<?php

class Loader extends ObjectModel {
	private $controller;
	private $action;
	private $value;
	private $notif;
	private $urlvalues;
	
	
	public function __construct($urlvalues) {
		//teste la connexion 
		$this->urlvalues = $urlvalues;
		//Tools::PrintObject($this->urlvalues);
		//Tools::PrintObject(Cookie::isSLogged());
		if(!Cookie::isSLogged()){	
			$this->controller = "LoginController";
			if (!isset($this->urlvalues['action']) || $this->urlvalues['action'] == "") {
				$this->action = "index";
			} else {
				$this->action = $this->urlvalues['action'];
			}
		}else{
				$verifcontroller = false;
				$verifaction     = false;
				if ($this->urlvalues['controller'] == "") {
					$this->controller = "RapportController";
				} 
				elseif($this->urlvalues['controller']=="logout"){
					$this->controller =ucfirst($this->urlvalues['controller']).'Controller';
				}
				else {
					foreach($this->chekaccess() as $v=>$k){
						$tab=$k['mo_name'];
						if($tab==$this->urlvalues['controller']){
							$verifcontroller = true;
						}
					}
					
					if($verifcontroller == true){
						$this->controller =ucfirst($this->urlvalues['controller']).'Controller';
					}else{
						$this->controller =ucfirst('RapportController');
					}
					$this->controller =ucfirst($this->urlvalues['controller']).'Controller';
				}
				if ($this->urlvalues['action'] == "") {
					$this->action = "index";
				}else {
					foreach($this->chekaccess() as $v=>$k){				
						$table=$k['mo_name'];
						if(isset($table) && $table!='' && $table==$this->urlvalues['action'] ){
							$verifaction = true;
						}
					}
					if($verifaction == true){
						$this->action = $this->urlvalues['action'];
					}else{
						$this->action = 'erreur';
					}
					
					//$this->action = $this->urlvalues['action'];
				}
				$this->value = $this->urlvalues['id'];
				
			
			
		}

	}
	
	
	public function CreateController($path=false) {
		$path = (isset($path) && $path==1) ? 'back' : 'front';
		if(file_exists('../controllers/'.$path.'/'.$this->controller.'.php')){
			require_once('../controllers/'.$path.'/'.$this->controller.'.php');
			if (class_exists($this->controller)) {
				 if (method_exists($this->controller,$this->action)) {
					return new $this->controller(ucfirst($this->action),$this->urlvalues);
				} else {
					return new $this->controller(ucfirst("index"),$this->urlvalues);
				}
			}else{
				return new Error("badUrl",$this->urlvalues);
			}
		}else{
			require_once('../controllers/'.$path.'/ErreurController.php');
			return new ErreurController('index',$this->urlvalues);
		}
		
	}

	
	public function TemplateController($controller,$affiche){
		$template = '';
		foreach($controller as $key => $value) {
			if($key==$affiche){
				$template = $value;
			}	
		}
		return $template;
	}
	
	public function chekaccess(){
		$result = Db::getInstance()->ExecuteS('SELECT DISTINCT(mo_name) FROM '._DB_PREFIX_.'modules AS M,'._DB_PREFIX_.'profile_module AS P
		WHERE M.mo_id=P.mo_id
		AND P.pro_id='.Cookie::read("profile").'
		AND P.actived=1
		order by M.mo_priorite ASC');
		$listes = array();
		foreach ($result AS &$liens){
			$listes[] = $liens;
		}
		return $listes;
	}
	
	
	
}

?>