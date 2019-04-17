<?php /* Smarty version Smarty-3.1.19, created on 2019-03-22 15:26:46
         compiled from "C:\wamp64\www\tactill\themes\back\AccessProfile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19795c94feb6a39304-03179006%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e2154333b8250730eeb15c1f9c0667af921419d' => 
    array (
      0 => 'C:\\wamp64\\www\\tactill\\themes\\back\\AccessProfile.tpl',
      1 => 1553268241,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19795c94feb6a39304-03179006',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'namecontroller' => 0,
    'url_base' => 0,
    'fields' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c94feb6b00682_60281341',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c94feb6b00682_60281341')) {function content_5c94feb6b00682_60281341($_smarty_tpl) {?><div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1 class="mr-2"><?php echo smart_function_uperCase(array('s'=>$_smarty_tpl->tpl_vars['namecontroller']->value),$_smarty_tpl);?>
</h1>
                <ul>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
/backend/administration"><?php echo smart_function_uperCase(array('s'=>$_smarty_tpl->tpl_vars['namecontroller']->value),$_smarty_tpl);?>
</a></li>
                    <li><?php echo smarty_function_translate(array('s'=>'Droits'),$_smarty_tpl);?>
</li>
                </ul>
            </div>
			
            <div class="separator-breadcrumb border-top"></div>

             <div class="row">
             <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fields']->value['modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                <div class="col-md-3">
                    <div class="card card-icon-bg card-icon-bg-primary mb-4">
                        <div class="card-body">
                        	<i class="<?php echo $_smarty_tpl->tpl_vars['v']->value['picto'];?>
"></i>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
/backend/administration/profilesousaccess/<?php echo smart_function_md5(array('s'=>$_smarty_tpl->tpl_vars['v']->value['module_id']),$_smarty_tpl);?>
/<?php echo smart_function_md5(array('s'=>$_smarty_tpl->tpl_vars['v']->value['profile_id']),$_smarty_tpl);?>
"><h3 class="mb-3" style="margin: 15px"><u><?php echo smarty_function_translate(array('s'=>$_smarty_tpl->tpl_vars['v']->value['module']),$_smarty_tpl);?>
</u></h3></a>
                            <div class="content">
                            
                            <label class="switch pr-5 switch-success mr-3">
	                            <input type="checkbox" onchange="getActive(<?php echo $_smarty_tpl->tpl_vars['v']->value['profile_id'];?>
,<?php echo $_smarty_tpl->tpl_vars['v']->value['module_id'];?>
,<?php echo $_smarty_tpl->tpl_vars['v']->value['status'];?>
,1,'<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
')" <?php if ($_smarty_tpl->tpl_vars['v']->value['status']==1) {?>checked<?php }?>>
	                            <span class="slider"></span>
	                        </label>
	                        <small class="text-muted"><?php echo $_smarty_tpl->tpl_vars['v']->value['desc'];?>
</small>
	                        </div>
                        </div>
                        
                    </div>
                </div>
			 <?php } ?>
             

            </div>
			
</div><?php }} ?>
