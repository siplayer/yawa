<div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1 class="mr-2">{u s=$namecontroller}</h1>
                <ul>
                    <li><a href="{$url_base}/backend/catalogue/categories">Catégories</a></li>                  
                </ul>
            </div>
			
            <div class="separator-breadcrumb border-top"></div>
             <div class="row">
            
                <div class="col-md-9">
                    <div class="card o-hidden mb-4">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="w-50 float-left card-title m-0">{l s='categoriegestion'}</h3>
                            <div class="dropdown dropleft text-right w-50 float-right">
                                <button class="btn bg-gray-100" type="button" id="dropdownMenuButton_table1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="nav-icon i-Gear-2"></i>
                                        </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table1">
                                    <a class="dropdown-item" href="{$url_base}backend/catalogue/categorieadd/">{l s='categorieadd'}</a>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
								<div id="box"></div>
                                <table id="user_table" class="table dataTable-collapse text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">{l s="color"}</th>
                                            <th scope="col">{l s='Nom'}</th>
                                            <th scope="col">{l s='Status'}</th>
                                            <th scope="col">{l s='Description'}</th>
                                            <th scope="col">{l s="Date d'ajout"}</th>
                                            <th scope="col">{l s='Action'}</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                    	{foreach key=k item=v from=$fields.categories}
                                        
                                        {if $fields.parents eq 1 }

                                            <tr id="u{md5 s=$v.id_category}" onclick="newpage('{$url_base}backend/catalogue/souscategories/{md5 s=$v.id_category}')"> 

                                        {else}

                                            <tr id="u{md5 s=$v.id_category}">

                                        {/if}

                                            <td> 
                                            
                                            <div style = "width:1%;padding:10px 11px; margin:0 auto;border:2px solid #a1a1a1;
                                                          border-radius:25px;background-color: {$v.color}; " >
                                            </td>
                                            
                                            <td>{$v.name}</td>
                                            
                                            <td>
                                            
                                            {if $v.active==1}
                                            
                                            	<span class="badge badge-success">Actif</span>
                                            
                                            {else}
                                            
                                            	<span class="badge badge-warning">Non actif</span>
                                            
                                            {/if}
                                            
                                            </td>

                                            <td><p _ngcontent-c8="" class="m-0 text-small text-muted" style="text-align:justify">{tr c=$v.description}</p></td>
                                            
                                            <td>{$v.date_add}</td>
                                            
                                            <td>
                                                
                                                <a href="{$url_base}backend/catalogue/categorieupdate/{md5 s=$v.id_category}" class="text-success mr-2">
                                                	
                                                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                
                                                </a>

                                                <a href="#"  class="text-danger mr-2" onclick="alertSup('{md5 s=$v.id_category}','{$url_base}','sc','u')"  name="{md5 s=$v.id_category}">
                                                    <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                </a>

                                                {if $fields.parents eq 1 }

                                                    <a href="{$url_base}backend/catalogue/souscategories/{md5 s=$v.id_category}" class="text-success mr-2">
                                                        
                                                    <i class="nav-icon i-Split-Horizontal-2-Window"></i>
                                                    
                                                    </a>

                                                {/if}

                                            </td>

                                        </tr>

                                        {/foreach}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
</div>