<?php /* Smarty version Smarty-3.1.19, created on 2019-03-22 14:38:53
         compiled from "C:\wamp64\www\tactill\themes\back\Errors.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104635c94f37dbdb288-91008036%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65d6843134469ce2c2fe559e9b3359ee8e7d8270' => 
    array (
      0 => 'C:\\wamp64\\www\\tactill\\themes\\back\\Errors.tpl',
      1 => 1553177638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104635c94f37dbdb288-91008036',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errors' => 0,
    'nberrors' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c94f37dc19a81_55161791',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c94f37dc19a81_55161791')) {function content_5c94f37dc19a81_55161791($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['errors']->value)&&$_smarty_tpl->tpl_vars['nberrors']->value>0) {?>
	<div class="alert alert-card alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<?php  $_smarty_tpl->tpl_vars["error"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["error"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['errors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["error"]->key => $_smarty_tpl->tpl_vars["error"]->value) {
$_smarty_tpl->tpl_vars["error"]->_loop = true;
?>
			<?php echo $_smarty_tpl->tpl_vars['error']->value;?>
<br />
		<?php } ?>
	</div>
<?php }?><?php }} ?>
