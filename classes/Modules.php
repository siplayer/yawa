<?php

class Modules extends ObjectModel {
	
	public 	    $id;
	public 	    $mo_name;
	public	    $mo_picto;
	public      $mo_lien;
	public      $mo_priorite;
	public      $mo_parente;
	public      $active;
	public 	    $date_add;
	public 	    $date_upd;
	protected   $table = 'modules';
	protected   $identifier = 'mo_id';
	
	public function __construct() {
		
	}
	public function getFields()
	{
		parent::validateFields();
		if (isset($this->id))
		$fields['mo_id'] = intval($this->id);
		$fields['mo_name'] = intval($this->mo_name);
		$fields['mo_picto'] = pSQL($this->mo_picto);
		$fields['mo_lien'] = pSQL($this->mo_lien);
		$fields['mo_priorite'] = intval($this->mo_priorite);
		$fields['mo_parente'] = intval($this->mo_parente);
		$fields['active'] = intval($this->active);
		$fields['date_add'] = pSQL($this->date_add);
		$fields['date_upd'] = pSQL($this->date_upd);
		return $fields;
	}
	
	public static function getAllModule(){
		$result = Db::getInstance()->ExecuteS('
				SELECT *
				FROM '._DB_PREFIX_.'modules
				WHERE mo_parente=0 
				');		
				
		$listes = array();
		foreach ($result AS &$modules){
			$listes[] = $modules;
		}
		return $listes;
	}
	public static function activeModule($params){
		if(isset($params) && is_array($params)){
			echo $sql = 'INSERT INTO '._DB_PREFIX_.'profile_module (pro_id,mo_id,actived) VALUES ('.$params['id1'].','.$params['id2'].','.$params['status'].') ON DUPLICATE KEY UPDATE actived='.$params['status'].' ';
			if($result = Db::getInstance()->Execute($sql)){
					return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
}