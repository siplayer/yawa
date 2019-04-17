<div class="main-content-wrap sidenav-open d-flex flex-column">
<!--            <div class="breadcrumb">
                <h1 class="mr-2">{u s=$namecontroller}</h1>
            </div>

            <div class="separator-breadcrumb border-top"></div>
-->
            <div class="row">
            	<div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Add-User"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">{l s='Clients'}</p>
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
                                <p class="text-muted mt-2 mb-0">{l s='Ventes'}</p>
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
                                <p class="text-muted mt-2 mb-0">{l s='Ordres'}</p>
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
                                <p class="text-muted mt-2 mb-0">{l s='Frais'}</p>
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
                            <h3 class="w-50 float-left card-title m-0">{l s='Gestion rôles'}</h3>
                            <div class="dropdown dropleft text-right w-50 float-right">
                                <button class="btn bg-gray-100" type="button" id="dropdownMenuButton_table1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="nav-icon i-Gear-2"></i>
                                        </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table1">
                                    <a class="dropdown-item" href="{$url_base}backend/administration/profileadd/">{l s='Ajouter un profile'}</a>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
								<div id="box"></div>
                                <table id="user_table" class="table dataTable-collapse text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">{l s='ID'}</th>
                                            <th scope="col">{l s='Nom'}</th>
                                            <th scope="col">{l s='Accèss'}</th>
                                            <th scope="col">{l s='Status'}</th>
                                            <th scope="col">{l s='Action'}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	{foreach key=k item=v from=$fields.profiles}
                                        <tr id="u{md5 s=$v.pro_id}">
                                            <th scope="row">{$v.pro_id}</th>
                                            <td>{$v.pro_name}</td>
                                            <td align="center"><a href="{$url_base}backend/administration/profileaccess/{md5 s=$v.pro_id}" class="text-success mr-2"><i class="nav-icon i-Split-Horizontal-2-Window"></i></a></td>
                                            <td>
                                            {if $v.actived==1}
                                            	<span class="badge badge-success">Actif</span>
                                            {else}
                                            	<span class="badge badge-warning">Non actif</span>
                                            {/if}
                                            </td>
                                            <td>
                                                <a href="{$url_base}backend/administration/profileupdate/{md5 s=$v.pro_id}" class="text-success mr-2">
                                                	
                                                    <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                </a>
                                                <a href="#"  class="text-danger mr-2" onclick="alertSup('{md5 s=$v.pro_id}','{$url_base}','sp','u')"  name="{md5 s=$v.pro_id}">
                                                    <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        {/foreach}
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
                            <h3 class="w-50 float-left card-title m-0">{l s='Gestion modules'}</h3>
                            <div class="dropdown dropleft text-right w-50 float-right">
                                <button class="btn bg-gray-100" type="button" id="dropdownMenuButton_table2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="nav-icon i-Gear-2"></i>
                                        </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table2">
                                    <a class="dropdown-item" href="{$url_base}backend/administration/moduleadd/">{l s='Ajouter un module'}</a>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">

                            <div class="table-responsive">

                                <table id="sales_table" class="table dataTable-collapse">
                                    <thead>
                                        <tr>
                                            <th scope="col">{l s='ID'}</th>
                                            <th scope="col">{l s='Nom'}</th>
                                            <th scope="col" align="center">{l s='Sous module'}</th>
                                            <th scope="col">{l s='Status'}</th>
                                            <th scope="col">{l s='Action'}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    {foreach key=k item=v from=$fields.modules}
                                        <tr>
                                            <td>{$v.mo_id}</td>
                                            <td>{$v.mo_name}</td>
                                            <td align="center"><a href="{$url_base}backend/administration/sousmodule/{md5 s=$v.mo_id}"><i class="nav-icon i-Split-Horizontal-2-Window"></i></a></td>
                                            <td>
                                            {if $v.active==1}
                                            <span class="badge badge-success">Actif</span>
                                            {else}
                                            <span class="badge badge-warning">Non actif</span>
                                            {/if}
                                            </td>
                                            <td>
                                                <a href="{$url_base}backend/administration/moduleupdate/{md5 s=$v.mo_id}" class="text-success mr-2">
                                                    <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                </a>
                                                <a href="#" class="text-danger mr-2">
                                                    <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                </a>
                                            </td>
                                        </tr>
                            		{/foreach}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of col-->
            </div>
</div>