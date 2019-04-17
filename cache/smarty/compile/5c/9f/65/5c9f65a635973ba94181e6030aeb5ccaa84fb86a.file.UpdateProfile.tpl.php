<?php /* Smarty version Smarty-3.1.19, created on 2019-03-22 14:38:53
         compiled from "C:\wamp64\www\tactill\themes\back\UpdateProfile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:316145c94f37db56583-02259177%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c9f65a635973ba94181e6030aeb5ccaa84fb86a' => 
    array (
      0 => 'C:\\wamp64\\www\\tactill\\themes\\back\\UpdateProfile.tpl',
      1 => 1553178745,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '316145c94f37db56583-02259177',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'namecontroller' => 0,
    'url_base' => 0,
    'tpl_dir_error' => 0,
    'tpl_dir_success' => 0,
    'fields' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c94f37dbcf708_12995950',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c94f37dbcf708_12995950')) {function content_5c94f37dbcf708_12995950($_smarty_tpl) {?><div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1 class="mr-2"><?php echo smart_function_uperCase(array('s'=>$_smarty_tpl->tpl_vars['namecontroller']->value),$_smarty_tpl);?>
</h1>
                <ul>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
/backend/administration"><?php echo smart_function_uperCase(array('s'=>$_smarty_tpl->tpl_vars['namecontroller']->value),$_smarty_tpl);?>
</a></li>
                    <li><?php echo smarty_function_translate(array('s'=>'profileupdate'),$_smarty_tpl);?>
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
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fields']->value['profile']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                    <div class="col-md-6 form-group mb-3"> 
                                        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['pro_name'];?>
" required="" >
                                    </div>
									<div class="col-md-6 form-group mb-3"></div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="switch pr-5 switch-success mr-3">
			                                <span>Activer</span>
			                                <input type="checkbox"  <?php if ($_smarty_tpl->tpl_vars['v']->value['actived']==1) {?> checked="" <?php }?> name="active" id="active">
			                                <span class="slider"></span>
			                            </label>
                                    </div>


                                    <div class="col-md-12">
                                   		<input type="hidden" name="code" id="code" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['pro_id'];?>
"/>
                                   		
                                        <button type="submit" name="valider" id="valider" class="btn btn-primary">Soumettre</button>
                                    </div>
                                     <?php } ?>
                                </div>
                            </form>
                           
                        </div>
                    </div>
                </div>

               

            </div>
			
</div><?php }} ?>
