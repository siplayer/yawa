<div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1 class="mr-2">{u s=$namecontroller}</h1>
                <ul>
                    <li><a href="{$url_base}/backend/catalogue/caracteristics">Caractéristiques</a></li>
                    
                </ul>
            </div>
			
            <div class="separator-breadcrumb border-top"></div>

             <div class="row">
            
                <div class="col-md-9">
                    <div class="card o-hidden mb-4">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="w-50 float-left card-title m-0">{l s='caracteristicgestion'}</h3>
                            <div class="dropdown dropleft text-right w-50 float-right">
                                <button class="btn bg-gray-100" type="button" id="dropdownMenuButton_table1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="nav-icon i-Gear-2"></i>
                                        </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table1">
                                    <a class="dropdown-item" href="{$url_base}backend/catalogue/caracteristicadd/">{l s='caracteristicadd'}</a>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
								<div id="box"></div>
                                <table id="user_table" class="table dataTable-collapse text-center">
                                    <thead>
                                        <tr>
                                            
                                            <th scope="col">{l s='Nom'}</th>
                                            <th scope="col">{l s='Nbrattr'}</th>
                                            <th scope="col">{l s='attributs'}</th>
                                            <th scope="col">{l s='Status'}</th>
                                            <th scope="col">{l s='Description'}</th>
                                            <th scope="col">{l s="Date d'ajout"}</th>
                                            <th scope="col">{l s='Action'}</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                    {foreach key=k item=v from=$fields.caracs}
                                        
                                        <tr id="u{md5 s=$v.id_caracteristique}" onclick="redirect('{$url_base}backend/catalogue/attributs/{md5 s=$v.id_caracteristique}')">
                                        
                                        <td>{$v.name}</td>
                                        
                                        <td>{$v.nbattr}</td>

                                        <td align="center"><a href="{$url_base}backend/catalogue/attributs/{md5 s=$v.id_caracteristique}" class="text-success mr-2"><i class="nav-icon i-Split-Horizontal-2-Window"></i></a></td>

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
                                            
                                            <a href="{$url_base}backend/catalogue/caracteristicupdate/{md5 s=$v.id_caracteristique}" class="text-success mr-2">
                                                
                                            <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                            
                                            </a>

                                            <a href="#"  class="text-danger mr-2" onclick="alertSup('{md5 s=$v.id_caracteristique}','{$url_base}','sct','u')"  name="{md5 s=$v.id_caracteristique}">
                                                <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                            </a>

                                                <a href="{$url_base}backend/catalogue/attributs/{md5 s=$v.id_category}" class="text-success mr-2">
                                                    
                                                <i class="nav-icon plus font-weight-bold"></i>
                                                
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
            </div>
			
</div>

<script>

    function redirect( url ){

        console.log( "clicked" );

        location.replace( url );

    }

</script>