<?php
	if(Cookie::read('Logged')==1){
		$js_files[_YS_WEB_JS_DIR_.'vendor/jquery-3.3.1.min.js'] = 'all';
		$js_files[_YS_WEB_JS_DIR_.'vendor/bootstrap.bundle.min.js'] = 'all';
	    $js_files[_YS_WEB_JS_DIR_.'vendor/perfect-scrollbar.min.js'] = 'all';
	    $js_files[_YS_WEB_JS_DIR_.'vendor/sweetalert2.min.js'] = 'all';
	    $js_files[_YS_WEB_JS_DIR_.'vendor/echarts.min.js'] = 'all';
	    $js_files[_YS_WEB_JS_DIR_.'vendor/datatables.min.js'] = 'all';
	    $js_files[_YS_WEB_JS_DIR_.'sweetalert.script.js'] = 'all';
	    $js_files[_YS_WEB_JS_DIR_.'es5/echart.options.min.js'] = 'all';
	    $js_files[_YS_WEB_JS_DIR_.'es5/dashboard.v2.script.min.js'] = 'all';
	    $js_files[_YS_WEB_JS_DIR_.'es5/script.min.js'] = 'all';
	    $js_files[_YS_WEB_JS_DIR_.'es5/sidebar.large.script.min.js'] = 'all';
	    $js_files[_YS_WEB_JS_DIR_.'form.validation.script.js'] = 'all';    
	}else{
		$js_files[_YS_WEB_JS_DIR_.'vendor/jquery-3.3.1.min.js'] = 'all';
		$js_files[_YS_WEB_JS_DIR_.'vendor/bootstrap.bundle.min.js'] = 'all';
		$js_files[_YS_WEB_JS_DIR_.'es5/script.min.js'] = 'all';
	}
	if(isset($js_files) AND !empty($js_files)) $smarty->assign('js_files', $js_files);
	$smarty->display(_YS_THEMES_BACK_DIR_.'Footer.tpl');
