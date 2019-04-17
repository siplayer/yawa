<?php /* Smarty version Smarty-3.1.19, created on 2019-03-22 15:26:42
         compiled from "C:\wamp64\www\tactill\themes\back\Administration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1595c94feb2799500-78099637%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95be60272578399f1ab846c152321fc0ef236dbd' => 
    array (
      0 => 'C:\\wamp64\\www\\tactill\\themes\\back\\Administration.tpl',
      1 => 1553265667,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1595c94feb2799500-78099637',
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
  'unifunc' => 'content_5c94feb2937601_34951938',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c94feb2937601_34951938')) {function content_5c94feb2937601_34951938($_smarty_tpl) {?><div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1 class="mr-2"><?php echo smart_function_uperCase(array('s'=>$_smarty_tpl->tpl_vars['namecontroller']->value),$_smarty_tpl);?>
</h1>
            </div>

            <div class="separator-breadcrumb border-top"></div>

            <div class="row">
            	<div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Add-User"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0"><?php echo smarty_function_translate(array('s'=>'Clients'),$_smarty_tpl);?>
</p>
                                <p class="text-primary text-24 line-height-1 mb-2">205</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Financial"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0"><?php echo smarty_function_translate(array('s'=>'Ventes'),$_smarty_tpl);?>
</p>
                                <p class="text-primary text-24 line-height-1 mb-2">$4021</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Checkout-Basket"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0"><?php echo smarty_function_translate(array('s'=>'Ordres'),$_smarty_tpl);?>
</p>
                                <p class="text-primary text-24 line-height-1 mb-2">80</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Money-2"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0"><?php echo smarty_function_translate(array('s'=>'Frais'),$_smarty_tpl);?>
</p>
                                <p class="text-primary text-24 line-height-1 mb-2">$1200</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="row">
                <div class="col-md-6">
                    <div class="card o-hidden mb-4">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="w-50 float-left card-title m-0"><?php echo smarty_function_translate(array('s'=>'Gestion rôles'),$_smarty_tpl);?>
</h3>
                            <div class="dropdown dropleft text-right w-50 float-right">
                                <button class="btn bg-gray-100" type="button" id="dropdownMenuButton_table1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="nav-icon i-Gear-2"></i>
                                        </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table1">
                                    <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
backend/administration/profileadd/"><?php echo smarty_function_translate(array('s'=>'Ajouter un profile'),$_smarty_tpl);?>
</a>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
								<div id="box"></div>
                                <table id="user_table" class="table dataTable-collapse text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col"><?php echo smarty_function_translate(array('s'=>'ID'),$_smarty_tpl);?>
</th>
                                            <th scope="col"><?php echo smarty_function_translate(array('s'=>'Nom'),$_smarty_tpl);?>
</th>
                                            <th scope="col"><?php echo smarty_function_translate(array('s'=>'Accèss'),$_smarty_tpl);?>
</th>
                                            <th scope="col"><?php echo smarty_function_translate(array('s'=>'Status'),$_smarty_tpl);?>
</th>
                                            <th scope="col"><?php echo smarty_function_translate(array('s'=>'Action'),$_smarty_tpl);?>
</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fields']->value['profiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                        <tr id="u<?php echo smart_function_md5(array('s'=>$_smarty_tpl->tpl_vars['v']->value['pro_id']),$_smarty_tpl);?>
">
                                            <th scope="row"><?php echo $_smarty_tpl->tpl_vars['v']->value['pro_id'];?>
</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['pro_name'];?>
</td>
                                            <td align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
backend/administration/profileaccess/<?php echo smart_function_md5(array('s'=>$_smarty_tpl->tpl_vars['v']->value['pro_id']),$_smarty_tpl);?>
" class="text-success mr-2"><i class="nav-icon i-Split-Horizontal-2-Window"></i></a></td>
                                            <td>
                                            <?php if ($_smarty_tpl->tpl_vars['v']->value['actived']==1) {?>
                                            	<span class="badge badge-success">Actif</span>
                                            <?php } else { ?>
                                            	<span class="badge badge-warning">Non actif</span>
                                            <?php }?>
                                            </td>
                                            <td>
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
backend/administration/profileupdate/<?php echo smart_function_md5(array('s'=>$_smarty_tpl->tpl_vars['v']->value['pro_id']),$_smarty_tpl);?>
" class="text-success mr-2">
                                                	
                                                    <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                </a>
                                                <a href="#"  class="text-danger mr-2" onclick="alertSup('<?php echo smart_function_md5(array('s'=>$_smarty_tpl->tpl_vars['v']->value['pro_id']),$_smarty_tpl);?>
','<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
','sp','u')"  name="<?php echo smart_function_md5(array('s'=>$_smarty_tpl->tpl_vars['v']->value['pro_id']),$_smarty_tpl);?>
">
                                                    <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of col-->

                <div class="col-md-6">
                    <div class="card o-hidden mb-4">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="w-50 float-left card-title m-0"><?php echo smarty_function_translate(array('s'=>'Gestion modules'),$_smarty_tpl);?>
</h3>
                            <div class="dropdown dropleft text-right w-50 float-right">
                                <button class="btn bg-gray-100" type="button" id="dropdownMenuButton_table2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="nav-icon i-Gear-2"></i>
                                        </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table2">
                                    <a class="dropdown-item" href="#"><?php echo smarty_function_translate(array('s'=>'Ajouter un profile'),$_smarty_tpl);?>
</a>
                                    <a class="dropdown-item" href="#"><?php echo smarty_function_translate(array('s'=>'Ajouter un module'),$_smarty_tpl);?>
</a>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">

                            <div class="table-responsive">

                                <table id="sales_table" class="table dataTable-collapse">
                                    <thead>
                                        <tr>
                                            <th scope="col"><?php echo smarty_function_translate(array('s'=>'ID'),$_smarty_tpl);?>
</th>
                                            <th scope="col"><?php echo smarty_function_translate(array('s'=>'Nom'),$_smarty_tpl);?>
</th>
                                            <th scope="col" align="center"><?php echo smarty_function_translate(array('s'=>'Sous module'),$_smarty_tpl);?>
</th>
                                            <th scope="col"><?php echo smarty_function_translate(array('s'=>'Status'),$_smarty_tpl);?>
</th>
                                            <th scope="col"><?php echo smarty_function_translate(array('s'=>'Action'),$_smarty_tpl);?>
</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fields']->value['modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['mo_id'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['mo_name'];?>
</td>
                                            <td align="center"><a href=""><i class="nav-icon i-Split-Horizontal-2-Window"></i></a></td>
                                            <td>
                                            <?php if ($_smarty_tpl->tpl_vars['v']->value['active']==1) {?>
                                            <span class="badge badge-success">Actif</span>
                                            <?php } else { ?>
                                            <span class="badge badge-warning">Non actif</span>
                                            <?php }?>
                                            </td>
                                            <td>
                                                <a href="#" class="text-success mr-2">
                                                    <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                </a>
                                                <a href="#" class="text-danger mr-2">
                                                    <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                </a>
                                            </td>
                                        </tr>
                            		<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of col-->
            </div>
</div><?php }} ?>
