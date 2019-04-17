<?php /* Smarty version Smarty-3.1.19, created on 2019-03-22 14:38:07
         compiled from "C:\wamp64\www\tactill\themes\back\AddProfile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:63765c94f34fa1dd83-03137962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8fcb2a66ada346d421d8e17657fc8887e24f5b1d' => 
    array (
      0 => 'C:\\wamp64\\www\\tactill\\themes\\back\\AddProfile.tpl',
      1 => 1553178992,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63765c94f34fa1dd83-03137962',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'namecontroller' => 0,
    'url_base' => 0,
    'tpl_dir_error' => 0,
    'tpl_dir_success' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c94f34fa60403_18877499',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c94f34fa60403_18877499')) {function content_5c94f34fa60403_18877499($_smarty_tpl) {?><div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1 class="mr-2"><?php echo smart_function_uperCase(array('s'=>$_smarty_tpl->tpl_vars['namecontroller']->value),$_smarty_tpl);?>
</h1>
                <ul>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
/backend/administration"><?php echo smart_function_uperCase(array('s'=>$_smarty_tpl->tpl_vars['namecontroller']->value),$_smarty_tpl);?>
</a></li>
                    <li><?php echo smarty_function_translate(array('s'=>'profileadd'),$_smarty_tpl);?>
</li>
                </ul>
            </div>
			
            <div class="separator-breadcrumb border-top"></div>

             <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Profile</div>
                            <form method="post">
                            	<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['tpl_dir_error']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                            	<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['tpl_dir_success']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3"> 
                                        <input type="text" class="form-control" id="nom" name="nom"  required="" >
                                    </div>
									<div class="col-md-6 form-group mb-3"></div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="switch pr-5 switch-success mr-3">
			                                <span>Activer</span>
			                                <input type="checkbox"  name="active" id="active">
			                                <span class="slider"></span>
			                            </label>
                                    </div>


                                    <div class="col-md-12">
                                        <button type="submit" name="valider" id="valider" class="btn btn-primary">Soumettre</button>
                                    </div>
                                </div>
                            </form>
                           
                        </div>
                    </div>
                </div>

               

            </div>
			
</div><?php }} ?>
