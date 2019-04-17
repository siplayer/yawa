<?php /* Smarty version Smarty-3.1.19, created on 2019-03-22 14:38:53
         compiled from "C:\wamp64\www\tactill\themes\back\Success.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23485c94f37dc25601-61195335%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5dcef1cc38bbf86d7ccfb514219cd07c29ab205f' => 
    array (
      0 => 'C:\\wamp64\\www\\tactill\\themes\\back\\Success.tpl',
      1 => 1553178628,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23485c94f37dc25601-61195335',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'succes' => 0,
    'nbsucces' => 0,
    'succe' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c94f37dc83208_99082513',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c94f37dc83208_99082513')) {function content_5c94f37dc83208_99082513($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['succes']->value)&&$_smarty_tpl->tpl_vars['nbsucces']->value>0) {?>
	<div class="alert alert-card alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<?php  $_smarty_tpl->tpl_vars["succe"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["succe"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['succes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["succe"]->key => $_smarty_tpl->tpl_vars["succe"]->value) {
$_smarty_tpl->tpl_vars["succe"]->_loop = true;
?>
			<?php echo $_smarty_tpl->tpl_vars['succe']->value;?>
<br />
		<?php } ?>
	</div>
<?php }?><?php }} ?>
