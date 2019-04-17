<?php
	
	
    if(Cookie::read('Logged')==1){
    	$menu = Employee::employeeAcces($nameController,__YS_BASE_URI__);
    	$css_files['https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900'] = 'all';
    	$css_files[_YS_WEB_DIR_.'styles/vendor/datatables.min.css'] = 'all';
    	$css_files[_YS_WEB_DIR_.'styles/css/themes/lite-purple.min.css'] = 'all';
		$css_files[_YS_WEB_DIR_.'styles/vendor/perfect-scrollbar.css'] = 'all';
		$css_files[_YS_WEB_DIR_.'styles/vendor/sweetalert2.min.css'] = 'all';
    	$smarty->assign(array(
			'logged' => 1,
			'url_base' => __YS_BASE_URI__,
			'url_img'=>_YS_WEB_IMG_DIR_,
			'fname' => Cookie::read('fname')." ".Cookie::read('lname'),
			'menu'=>$menu['menu'],
			'smenu'=>$menu['sous_menu']
		));
	}else{
		$css_files['https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900'] = 'all';
    	$css_files[_YS_WEB_DIR_.'styles/css/themes/lite-purple.min.css'] = 'all';
		$smarty->assign(array(
			'url_base' => __YS_BASE_URI__,
			'url_img'=>_YS_WEB_IMG_DIR_,
			'logged' => 0
		));
	}
    if(isset($nameController) && $nameController=="Rapport"){
		$js_files_header[_YS_WEB_JS_DIR_.'charts/Chart.min.js'] = 'all';
		$js_files_header[_YS_WEB_JS_DIR_.'charts/utils.js'] = 'all';
		if(isset($js_files_header) AND !empty($js_files_header)) $smarty->assign('js_files_header', $js_files_header);
	}
    
    if(isset($css_files) AND !empty($css_files)) $smarty->assign('css_files', $css_files);
    
    $smarty->display(_YS_THEMES_BACK_DIR_.'Header.tpl');
