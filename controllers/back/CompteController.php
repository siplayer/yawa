<?php

class CompteController extends AdminController {
    public $template;
    public $fieldsUnique = array();

    public function __construct( $action , $value ) {
    
        $this->name     = "Compte";	
    
        $this->errors   = array();

        $this->succes   = array();
    
        $this->nberrors = 0;
        
        $this->nbsucces = 0;
    
        $this->action   = $action;
    
        $this->value    = ( isset( $value['id'] ) ) ? $value['id'] : 0 ;
    
        return $this->$action();		
    
    }
    public function index(){
		
		$this->template="Compte.tpl";
    
    }

}