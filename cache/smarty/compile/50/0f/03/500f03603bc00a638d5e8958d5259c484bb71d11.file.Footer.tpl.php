<?php /* Smarty version Smarty-3.1.19, created on 2019-03-22 15:26:46
         compiled from "C:\wamp64\www\tactill\themes\back\Footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:299125c94feb6b3b006-10457087%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '500f03603bc00a638d5e8958d5259c484bb71d11' => 
    array (
      0 => 'C:\\wamp64\\www\\tactill\\themes\\back\\Footer.tpl',
      1 => 1552902020,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '299125c94feb6b3b006-10457087',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'js_files' => 0,
    'js_uri' => 0,
    'logged' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c94feb6b7d685_26629771',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c94feb6b7d685_26629771')) {function content_5c94feb6b7d685_26629771($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['js_files']->value)) {?>	
	<?php  $_smarty_tpl->tpl_vars['media'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['media']->_loop = false;
 $_smarty_tpl->tpl_vars['js_uri'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['js_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['media']->key => $_smarty_tpl->tpl_vars['media']->value) {
$_smarty_tpl->tpl_vars['media']->_loop = true;
 $_smarty_tpl->tpl_vars['js_uri']->value = $_smarty_tpl->tpl_vars['media']->key;
?>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_uri']->value;?>
" ></script>
	<?php } ?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['logged']->value==1) {?>
</div>
<?php }?>
</body>

</html><?php }} ?>
