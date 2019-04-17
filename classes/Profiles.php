<?php

class Profiles extends ObjectModel {
	
	public 	    $id;
	public 	    $pro_name;
	public      $actived;
	public      $deleted;
	public 	    $date_add;
	public 	    $date_upd;
	protected   $table = 'profile';
	protected   $identifier = 'pro_id';
	
	public function __construct() {
		
	}
	public function getFields()
	{
		parent::validateFields();
		if (isset($this->id))
		$fields['pro_id'] = intval($this->id);
		$fields['pro_name'] = pSQL($this->pro_name);
		$fields['actived'] = intval($this->actived);
		$fields['deleted'] = intval($this->deleted);
		$fields['date_add'] = pSQL($this->date_add);
		$fields['date_upd'] = pSQL($this->date_upd);
		return $fields;
	}
	
	public static function getAllProfil(){
		$result = Db::getInstance()->ExecuteS('
				SELECT *
				FROM '._DB_PREFIX_.'profile
				WHERE deleted=0 
				');		
				
		$listes = array();
		foreach ($result AS &$profile){
			$listes[] = $profile;
		}
		return $listes;
	}
	
	public static function getProfil($id){

		$result = Db::getInstance()->ExecuteS('
				SELECT *
				FROM '._DB_PREFIX_.'profile
				WHERE deleted=0 and MD5(pro_id)="'.$id.'"
				');		
				
		$listes = array();
		foreach ($result AS &$profile){
			$listes[] = $profile;
		}
		return $listes;
	}
	public static function getProfilId($id){
		if(isset($id) && $id!=''){
			$result = Db::getInstance()->getRow('
					SELECT pro_id
					FROM `'._DB_PREFIX_.'profile`  WHERE md5(pro_id)="'.$id.'"
					');
				return (isset($result['pro_id']) && $result['pro_id']>0)? $result['pro_id'] : false;
			
		}else{
			return false;
		}
	}
	public static function deleteProfile($id){
		if(isset($id) && $id!=''){
			
			if(Db::getInstance()->Execute('UPDATE `'._DB_PREFIX_.'profile` set deleted=1   WHERE MD5(pro_id)="'.$id.'"'))
				return true;
			return false;
		}else{
			return false;
		}
	}
	
	public static function existeProfil($name){
		if(isset($name) && strlen($name)>4){
			$result = Db::getInstance()->getRow('
					SELECT pro_id
					FROM `'._DB_PREFIX_.'profile` C WHERE C.pro_name like "%'.$name.'%" and C.deleted=0
					');
				return (isset($result['pro_id']) && $result['pro_id']>0)? true : false;
			
		}else{
			return false;
		}
	}
	
	public static function getAccess($id,$mo){
		if(isset($id) && $id!=''){
			$result = Db::getInstance()->getRow('
					SELECT pro_id
					FROM `'._DB_PREFIX_.'profile_module` C WHERE C.mo_id='.$mo.' AND md5(pro_id)="'.$id.'" and C.actived=1
					');
				return (isset($result['pro_id']) && $result['pro_id']>0)? true : false;
		}else{
			return false;
		}
	}
}