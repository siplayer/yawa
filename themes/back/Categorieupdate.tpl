<div class="main-content-wrap sidenav-open d-flex flex-column">

            <div class="breadcrumb">

                <h1 class="mr-2">{u s=$namecontroller}</h1>

                <ul>

                    <li><a href="{$url_base}/backend/catalogue/categories">Catégories</a></li>
                    
                    <li>{l s='categorieupdate'}</li>

                </ul>

            </div>
			
            <div class="separator-breadcrumb border-top"></div>

             <div class="row">
                
                <div class="col-md-6">
                
                    <div class="card mb-4">
                
                        <div class="card-body">
                
                            <div class="card-title mb-3">Catégorie</div>
                
                            <form method="post">
            
                            	{include file=$tpl_dir_error}
                            	
                                {include file=$tpl_dir_success}
            
                                <div class="row">
            
                                {foreach key=k item=v from=$fields.category}
            
                                    <div class="col-md-6 form-group mb-3">
                                    
                                        <label for="user"> Nom </label> 
                                    
                                        <input type="text" class="form-control" id="nom" name="nom"  required="" value = "{$v.name}" >
                                    
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                    
                                        <label for="description"> Description </label> 
                                    
                                        <textarea class = "form-control" id = "description" name = "description" > {$v.description} </textarea>
                                    
                                    </div>
                                    
                                    <div class="col-md-6 form-group mb-3">
                                        
                                        <label for="parente"> Catégorie parente </label> 

                                        <select class="form-control" id="parente" name="parente"  value = "{$v.id_parent}" >
                                        
                                        <option value = "" > --- </option>
                                        
                                        {foreach key=k item=e from=$fields.categories}

                                            {if $v.id_parent eq $e.id_category }

                                                <option value = "{$e.id_category}" selected > {$e.name} </option>

                                            {else}  

                                                {if $e.id_category neq $v.id_category }

                                                    <option value = "{$e.id_category}" > {$e.name} </option>

                                                {/if}

                                            {/if}

                                        {/foreach}

                                        </select>

                                    </div> 

                                    <div class="col-md-6 form-group mb-3">
                                        
                                        <label for="langue"> Langue </label> 

                                        <select class="form-control" id="langue" name="langue" value = "{$v.id_lang}" >
                                        
                                            <option value = "" > --- </option>
                                            
                                            {foreach key=k item=e from=$fields.langs}

                                                {if $v.id_lang eq $e.id_lang }

                                                    <option value = "{$e.id_lang}" selected > {$e.name} </option>

                                                {else}  

                                                    <option value = "{$e.id_lang}" > {$e.name} </option>

                                                {/if}

                                            {/foreach}

                                        </select>

                                    </div>

                                    <div class="col-md-6 form-group mb-3">

                                        <label for="color"> Couleur </label>

                                        <input class="form-control" type="color" id="color" name="color" value = "{$v.color}" >
                                    
                                    </div>

                					<div class="col-md-6 form-group mb-3"></div>
                
                                    <div class="col-md-6 form-group mb-3">
                
                                        <label class="switch pr-5 switch-success mr-3">
			    
                                            <span>Activer</span>

                                                {if $v.active eq 1 }

                                                    <input type="checkbox"  name="active" id="active" checked >

                                                {else}

                                                    <input type="checkbox"  name="active" id="active" >
                                                
                                                {/if}

			                                <span class="slider"></span>
			    
                                        </label>
                
                                    </div>

                                    <div class="col-md-12">
                                    
                                        <button type="submit" name="valider" id="valider" class="btn btn-primary">Soumettre</button>
                                    
                                    </div>
            
                                     {/foreach}
            
                                </div>
            
                            </form>
                           
                        </div>
                
                    </div>
                
                </div>

            </div>
			
</div>