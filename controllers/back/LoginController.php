<?php
class LoginController extends AdminController {
	
	public $template;
	public function __construct($action,$value) {
		$this->name = "login";	
		$this->errors = array();
		$this->nberrors = 0;		
		$this->action=$action;
		$this->value =(isset($value['id'])) ? $value['id'] :0 ;
		return $this->$action();		
	}
	public function index(){
		if (Tools::isSubmit('connect'))
		{
			$passwd = trim(Tools::getValue('password'));
	        $email = trim(Tools::getValue('email'));
	        if (empty($email)) {
	            $this->errors[] = Tools::displayError('Email is empty.',1);
	        } elseif (!Validate::isEmail($email)) {
	            $this->errors[] = Tools::displayError('Invalid email address.',1);
	        }

	        if (empty($passwd)) {
	            $this->errors[] = Tools::displayError('The password field is empty.',1);
	        } elseif (!Validate::isPasswd($passwd)) {
	            $this->errors[] = Tools::displayError('Incorrect password.',1);
	        }
			
			if (!count($this->errors)) {
				$this->employee = new Employee();
				$result  = Employee::GetConnecte(trim($passwd),trim($email));
				if(!$result) $this->errors[]= Tools::displayError('Authentication failed',1);
				else {
					Logger::addLog(sprintf($this->l('Back Office connection from %s', 'AdminTab', false, false), Tools::getRemoteAddr()), 1, null, '', 0, true, (int)$this->employee->id);
					
					$this->employee->remote_addr = (int)ip2long(Tools::getRemoteAddr());
					$cookie = new Cookie;
					foreach ($result as $k => $v) {
						$cookie->write('id_employee',$v['emp_id']);
						$cookie->write('fname',$v['emp_fname']);
						$cookie->write('lname',$v['emp_lname']);
	                	$cookie->write('Logged',1);
	                	$cookie->write('email',$v['emp_email']);
	                	$cookie->write('profile',$v['pro_id']);
	                	$cookie->write('remote_addr',$this->employee->remote_addr);
                	}
                	Tools::redirect('backend/rapport');
				}
			}
			
			$this->nberrors = count($this->errors);
		}
		$this->template="Login.tpl";
		
	}
	
}
?>