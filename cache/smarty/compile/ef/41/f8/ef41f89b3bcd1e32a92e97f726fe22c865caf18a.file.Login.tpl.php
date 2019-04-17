<?php /* Smarty version Smarty-3.1.19, created on 2019-03-22 14:54:52
         compiled from "C:\wamp64\www\tactill\themes\back\Login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:303285c94f73c1a1f87-82394766%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef41f89b3bcd1e32a92e97f726fe22c865caf18a' => 
    array (
      0 => 'C:\\wamp64\\www\\tactill\\themes\\back\\Login.tpl',
      1 => 1552901102,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '303285c94f73c1a1f87-82394766',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url_img' => 0,
    'errors' => 0,
    'nberrors' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c94f73c217284_44413775',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c94f73c217284_44413775')) {function content_5c94f73c217284_44413775($_smarty_tpl) {?>
    <div class="auth-layout-wrap" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['url_img']->value;?>
photo-wide-4.jpg)">
        <div class="auth-content">
            <div class="card o-hidden">
                <div class="row">
                    <div class="col-md-6">
                        <div class="p-4">
                            <div class="auth-logo text-center mb-4">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['url_img']->value;?>
logo.png" alt="">
                            </div>
                            <h1 class="mb-3 text-18"><?php echo smarty_function_translate(array('s'=>'Sign In'),$_smarty_tpl);?>
</h1>
                            <form method="post">
 
								
								<?php if (isset($_smarty_tpl->tpl_vars['errors']->value)&&$_smarty_tpl->tpl_vars['nberrors']->value>0) {?>
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
								<?php }?>
								
                                <div class="form-group">
                                    <label for="email"><?php echo smarty_function_translate(array('s'=>'Email address'),$_smarty_tpl);?>
</label>
                                    <input id="email" name="email" class="form-control form-control-rounded" type="email">
                                </div>
                                <div class="form-group">
                                    <label for="password"><?php echo smarty_function_translate(array('s'=>'Password'),$_smarty_tpl);?>
</label>
                                    <input id="password" name="password" class="form-control form-control-rounded" type="password">
                                </div>
                                <button type="submit" name="connect" class="btn btn-rounded btn-primary btn-block mt-2"><?php echo smarty_function_translate(array('s'=>'Sign In'),$_smarty_tpl);?>
</button>
                            </form>

                            
                        </div>
                    </div>
                    <div class="col-md-6" style="background-size: cover;background-image: url(<?php echo $_smarty_tpl->tpl_vars['url_img']->value;?>
photo-long-3.jpg)">
                        <div class="p-4" style="margin-top: 120px">
                            
                            <h1 class="mb-3 text-18"><?php echo smarty_function_translate(array('s'=>'Forgot Password'),$_smarty_tpl);?>
</h1>
                            <form action="">
                                <div class="form-group">
                                    <label for="email"><?php echo smarty_function_translate(array('s'=>'Email address'),$_smarty_tpl);?>
</label>
                                    <input id="email" class="form-control form-control-rounded" type="email">
                                </div>
                                <button class="btn btn-primary btn-block btn-rounded mt-3"><?php echo smarty_function_translate(array('s'=>'Reset Password'),$_smarty_tpl);?>
</button>

                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }} ?>
