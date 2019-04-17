<?php
class Employee extends ObjectModel {
	public 	    $id;
	public 	    $profile_id;
	public	    $emp_securekey;
	public      $emp_fname;
	public      $emp_lname;
	public      $emp_login;
	public      $emp_password;
	public 	    $emp_email;
	public 	    $emp_validate = true;
	public 	    $emp_deleted = 0;
	public 	    $date_add;
	public 	    $date_upp;
	public      $remote_addr;
	protected   $table = 'employee';
	protected   $identifier = 'emp_id';
	
	public function __construct() {
		
	}
	public function getFields()
	{
		parent::validateFields();
		if (isset($this->id))
		$fields['emp_id'] = intval($this->id);
		$fields['profile_id'] = intval($this->profile_id);
		$fields['emp_securekey'] = pSQL($this->emp_securekey);
		$fields['emp_fname'] = pSQL(Tools::strtoupper($this->emp_fname));
		$fields['emp_lname'] = pSQL($this->emp_lname);
		$fields['emp_login'] = pSQL($this->emp_login);
		$fields['emp_email'] = pSQL($this->emp_email);
		$fields['emp_password'] = pSQL($this->emp_password);
		$fields['emp_validate'] = intval($this->emp_validate);
		$fields['date_add'] = pSQL($this->date_add);
		$fields['date_upp'] = pSQL($this->date_upp);
		$fields['emp_deleted'] = intval($this->emp_deleted);
		$fields['remote_addr'] = pSQL($this->remote_addr);
		return $fields;
	}
	
	public static function GetConnecte($passwd,$email){
		$result = Db::getInstance()->ExecuteS('
				SELECT *
				FROM `'._DB_PREFIX_.'employee` WHERE
				`emp_validate` = 1
				AND  `emp_email` = \''.$email.'\''.(isset($passwd) ? ' AND `emp_password` = \''.$passwd.'\'
				AND  `emp_securekey` = \''.Tools::encrypt($email,$passwd).'\' AND `emp_deleted` = 0' : ''));
		$listes = array();
		foreach ($result AS &$connect){
			$listes[$connect['emp_id']] = $connect;
		}
		return $listes;
	}
	
	static public function checkPassword($id_emp, $passwd=null)
	{
		$result = Db::getInstance()->getRow('
				SELECT `emp_id`
				FROM `'._DB_PREFIX_.'employee`
				WHERE `emp_id` = '.intval($id_emp).'');

		return ($result['emp_id']>0) ? $result['emp_id'] : false;
	}
	
	public Static function employeeAcces($nameController,$url){
		$tabs_menu = array();
		$menu   ='';
		$menu2  ='';
		$params = array();
		global $_TEMPLATES;
		if(Cookie::read("id_employee") && Cookie::read("id_employee")>0){
			
		$sqlrub=Db::getInstance()->ExecuteS('SELECT * FROM '._DB_PREFIX_.'modules AS M ,'._DB_PREFIX_.'profile_module AS P
				WHERE M.mo_id=P.mo_id
				AND P.actived=1
				AND M.mo_parente=0
				AND pro_id='.Cookie::read("profile").'
				ORDER BY M.mo_priorite ASC ');
		foreach ($sqlrub AS $rubrique){
			    $active = (strtolower($nameController)==strtolower($rubrique['mo_name'])) ? 'active' : '';
			    $menu.='<li class="nav-item '.$active.'" data-item="'.$rubrique['mo_name'].'">
					<a class="nav-item-hold" href="'.__YS_BASE_URI__.'backend/'.$rubrique['mo_lien'].'" >
						<i class="nav-icon '.$rubrique['mo_picto'].'"></i>
						<span class="nav-text">
							'.$_TEMPLATES[$rubrique['mo_name']].'
						</span>
					</a>';
				$menu.='<div class="triangle"></div>';
				$menu.='</li>';
				$sqlsrub=Db::getInstance()->ExecuteS('SELECT * FROM '._DB_PREFIX_.'modules AS M,'._DB_PREFIX_.'profile_module AS P
				WHERE M.mo_id=P.mo_id
				AND P.actived=1
				AND M.mo_show=1
				AND pro_id='.Cookie::read("profile").'
				AND M.mo_parente='.$rubrique["mo_id"].'
				ORDER BY M.mo_priorite ASC');
				if(count($sqlsrub)>0){
					foreach ($sqlsrub AS &$srubrique){
						$params[$rubrique['mo_name']][$srubrique['mo_name']]['smodule'] = $_TEMPLATES[$srubrique['mo_name']];
						$params[$rubrique['mo_name']][$srubrique['mo_name']]['icon'] = $srubrique['mo_picto'];
						$params[$rubrique['mo_name']][$srubrique['mo_name']]['lien'] = $srubrique['mo_lien'];
					}
				}
		}				
		foreach($params	as $v=>$k){
			$menu2.='<ul class="childNav" data-parent="'.$v.'">';
				foreach($k	as $i=>$j){
					$menu2.='<li class="nav-item">';
					$menu2.='<a href="'.__YS_BASE_URI__.'backend/'.$j['lien'].'">';
	                $menu2.='<i class="nav-icon '.$j['icon'].'"></i>';
	                $menu2.='<span class="item-name">'.$j['smodule'].'</span>';
	                $menu2.='</a>';
					$menu2.='</li>';		
				}
			$menu2.='</ul>'; 
		}		
		$tabs_menu['menu']      = $menu;
		$tabs_menu['sous_menu'] = $menu2;
		return $tabs_menu;
		}
	}

		public static function getAllEmployees(){
			
				$result = Db::getInstance()->ExecuteS('
				
						SELECT *
						FROM '._DB_PREFIX_.'employee
						WHERE emp_deleted = 0 
				
						');		
						
				$listes = array();
				
				foreach ( $result AS &$employee){
				
					$listes[] = $employee;
				
				}
				
				return $listes;

		}

}