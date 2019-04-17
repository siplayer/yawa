<?php
class AdministrationController extends AdminController {
	
	public $template;
	public $fieldsUnique=array();
	public function __construct($action,$value) {
		$this->name = "administration";	
		$this->errors = array();
		$this->succes = array();
		$this->nberrors = 0;		
		$this->nbsucces = 0;		
		$this->action=$action;
		$this->value =(isset($value['id'])) ? $value['id'] :0 ;
		return $this->$action();
				
	}
	public function index(){
		
		//liset des module
		$liste_module = Modules::getAllModule();
		$this->fieldsUnique['modules']=$liste_module;
		//liset des profiles
		$liste_profiles = Profiles::getAllProfil();
		$this->fieldsUnique['profiles']=$liste_profiles;
		$this->template="Administration.tpl";
	}
	
	public function profileupdate(){
		if(isset($this->value) && $this->value!=''){
			
			if(Tools::isSubmit('valider')){
				$profil = new Profiles();
				$profil->id   = (isset($_POST['code']) && $_POST['code']!='') ? $_POST['code'] : '' ;
				$profil->pro_name = (isset($_POST['nom']) && $_POST['nom']!='') ? $_POST['nom'] : '' ;
				$profil->actived  = (isset($_POST['active']) && $_POST['active']=="on") ? 1 : 0;
				$profil->date_upd = date('Y-m-d H:i:s');
				if($profil->pro_name==''){
					$this->errors[] = Tools::displayError('Merci de verifier les champs obligatoir',1);
		        }
		        else{
		        	if(!$profil->update()){
						$this->errors[] = Tools::displayError('Erreur Modification',1);
					}else{
						$this->succes[] = Tools::displayError('Enregistrement avec succes',1);			
					}
		        }
		        $this->nberrors = count($this->errors);
		        $this->nbsucces = count($this->succes);
		      
			}
			$profil = Profiles::getProfil($this->value);
			$this->fieldsUnique['profile']=$profil;
			$this->template="UpdateProfile.tpl";
		}else{
			Tools::redirect('backend/administration');
		}
	}
	
	public function profileadd(){
		if(Tools::isSubmit('valider')){
			$profil = new Profiles();
			$profil->pro_name = (isset($_POST['nom']) && $_POST['nom']!='') ? $_POST['nom'] : '' ;
			$profil->actived  = (isset($_POST['active']) && $_POST['active']=="on") ? 1 : 0;
			$profil->date_add = date('Y-m-d H:i:s');
			if($profil->pro_name==''){
					$this->errors[] = Tools::displayError('Merci de verifier les champs obligatoir',1);
		    }
		    elseif(Profiles::existeProfil($profil->pro_name)){
					$this->errors[] = Tools::displayError('Ce profile est déjà existe',1);
			}
		    else{
		    	if(!$profil->add()){
					$this->errors[] = Tools::displayError('Erreur Modification',1);
				}else{
					$this->succes[] = Tools::displayError('Enregistrement avec succes',1);			
				}
		    }
		    $this->nberrors = count($this->errors);
		    $this->nbsucces = count($this->succes);
		}
		$this->template="AddProfile.tpl";
	}
	
	public function profileaccess(){
		
		$liste_modules = Modules::getAllModule();
		
		$data = array();
		
		foreach($liste_modules as $v=>$k){
			
			$data[$k['mo_id']]['module'] = $k['mo_name'];
			
			$data[$k['mo_id']]['picto']  = $k['mo_picto'];
			
			$data[$k['mo_id']]['desc']   = $k['mo_description'];
			
			$data[$k['mo_id']]['module_id']   = $k['mo_id'];
			
			$data[$k['mo_id']]['profile_id']  = Profiles::getProfilId($this->value);
			
			$status = Profiles::getAccess($this->value,$k['mo_id']);
			
			if($status){
			
				$data[$k['mo_id']]['status']  =1;
			
			}
			
			else{
				$data[$k['mo_id']]['status']  =0;
	
			}
	
		}
	
		$this->fieldsUnique['modules']=$data;
	
		$this->template="AccessProfile.tpl";
	
	}
	
}