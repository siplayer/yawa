<?php
include_once('../config/config.inc.php');
if (is_ajax()) {
  if (isset($_REQUEST["action"]) && !empty($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
    switch($action) {
	  case "sp" : profil_sp_function();break;
	  case "sc" : categorie_sp_function();break;
      case "active" : active_function();break;
      case "checkpin": checkpin_function();break;
      case "enrechissement": enrechissement_function();break;
      case "desinscription": desinscription_function();break;
      case "mt": mt_function();break;
      case "charge": charge_function();break;
    }
  }
}
function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
function profil_sp_function(){
	$return = $_REQUEST;
	try{
		if (!$return["id"])
			throw new MyException("nok;001");
		if(Profiles::deleteProfile($return["id"])){
			throw new MyException("ok");
		}else{
			throw new MyException("nok;002");
		}
	}
	catch(MyException $e) {
		echo $e->getMessage();
	}
	
}
function active_function(){
	$return = $_REQUEST;
	$return['status'] = (isset($return['status']) && $return['status']==1) ? 0 : 1;
	try{
		if (!$return["id1"])
			throw new MyException("nok;001");
		if(isset($return['table']) && $return['table']==1){
			$traitement = Modules::activeModule($return);
		}
		if($traitement){
			throw new MyException("ok");
		}else{
			throw new MyException("nok;002");
		}
	}
	catch(MyException $e) {
		echo $e->getMessage();
	}
}

function categorie_sp_function(){
	
	$return = $_REQUEST;
	
	try{
	
		if ( !$return["id"] )
	
			throw new MyException( "nok;001" );
	
		if( Categories::deleteCategory( $return["id"] ) ){
			
			header("Refresh:0");

			throw new MyException( "ok" );

		}
		
		else{
	
			throw new MyException( "nok;002" );
	
		}
	
	}
	
	catch( MyException $e ) {
	
		echo $e->getMessage();
	
	}
	
}