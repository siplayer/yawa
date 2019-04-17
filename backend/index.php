<?php
$timer_start = microtime(true);
if (!defined('_YS_ADMIN_DIR_')) {
    define('_YS_ADMIN_DIR_', getcwd());
}
require(_YS_ADMIN_DIR_.'/../config/config.inc.php');

$loader = new Loader($_GET);
$controller = $loader->CreateController($path);
$form_token = md5(uniqid(rand(), TRUE));

$templateController = $loader->TemplateController($controller,'template');
$erreurController   = $loader->TemplateController($controller,'errors');
$nberreurController = $loader->TemplateController($controller,'nberrors');
$sucessController   = $loader->TemplateController($controller,'succes');
$nbsucessController = $loader->TemplateController($controller,'nbsucces');
$contenuController  = $loader->TemplateController($controller,'contenu');
$fieldsController   = $loader->TemplateController($controller,'fieldsUnique');
$nameController     = $loader->TemplateController($controller,'name');

if(Cookie::read('lang')!=""){
	include(dirname(__FILE__).'/../translate/back/'.Cookie::read('lang').'.php');
}else{
	include(dirname(__FILE__).'/../translate/back/fr.php');
}

//Tools::PrintObject($controller);
require_once(_YS_ROOT_DIR_.'/config/smarty.config.inc.php');
require(_YS_CONTROLLER_BACK_DIR_.'HeaderController.php');

$smarty->assign('namecontroller', $nameController);
$smarty->assign('errors', $erreurController);
$smarty->assign('nberrors', $nberreurController);
$smarty->assign('succes', $sucessController);
$smarty->assign('nbsucces', $nbsucessController);
$smarty->assign('contenu', $contenuController);
$smarty->assign('fields', $fieldsController);

$smarty->assign(array(
	'tpl_dir' => _YS_THEMES_BACK_DIR_,
	'crsf'=> Cookie::read('srcf'),
	'tpl_dir_error'=> _YS_THEMES_BACK_DIR_.'Errors.tpl',    
	'tpl_dir_success'=> _YS_THEMES_BACK_DIR_.'Success.tpl',    
	 ));
	 
$smarty->display(_YS_THEMES_BACK_DIR_.$templateController);
require(_YS_CONTROLLER_BACK_DIR_.'FooterController.php');