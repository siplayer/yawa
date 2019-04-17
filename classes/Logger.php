<?php
class Logger extends ObjectModel
{

    public $id;
    public $severity;
    public $error_code;
    public $message;
    public $object_type;
    public $object_id;
    public $id_employee;
    public $date_add;
    public $date_upd;
    
    
    protected   $table = 'log';
	protected   $identifier = 'log_id';
	
	public function getFields()
	{
		parent::validateFields();
		if (isset($this->id))
		$fields['log_id'] = intval($this->id);
		$fields['severity'] = intval($this->severity);
		$fields['error_code'] = pSQL($this->error_code);
		$fields['message'] = pSQL($this->message);
		$fields['object_type'] = pSQL($this->object_type);
		$fields['object_id'] = pSQL($this->object_id);
		$fields['id_employee'] = intval($this->id_employee);
		$fields['date_add'] = pSQL($this->date_add);
		$fields['date_upd'] = pSQL($this->date_upd);
		return $fields;
	}
	
	public static function addLog($message, $severity = 1, $error_code = null, $object_type = null, $object_id = null, $allow_duplicate = false, $id_employee = null){
		$log = new Logger();	
		$log->severity   = (int)$severity;
        $log->error_code = (int)$error_code;
        $log->message    = pSQL($message);
        $log->date_add   = date('Y-m-d H:i:s');
        $log->date_upd   = date('Y-m-d H:i:s');
        
        if ($id_employee !== null) {
            $log->id_employee = (int)$id_employee;
        }
        
        if (!empty($object_type) && !empty($object_id)) {
            $log->object_type = pSQL($object_type);
            $log->object_id = (int)$object_id;
        }
        
        if ($allow_duplicate || !$log->_isPresent()) {
            $res = $log->add();
            if ($res) {
                return true;
            }
        }
        return false;
	}
	
}
?>