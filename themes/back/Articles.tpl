<div class="main-content-wrap sidenav-open d-flex flex-column">
	<div class="breadcrumb">
    	<h1 class="mr-2">{u s=$namecontroller}</h1>
        <ul>
        	<li><a href="{$url_base}/backend/catalogue/articles">Listes des articles</a></li>               
        </ul>
    </div>		
    <div class="separator-breadcrumb border-top"></div>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6">
			<a href="{$url_base}backend/catalogue/articlesadd/"><button type="button" class="btn btn-success btn-lg m-1">+ AJOUTER L'ARTICLE</button></a>
            <button type="button" class="btn btn-secondary m-1">IMPORTER</button>
            <button type="button" class="btn btn-secondary m-1">EXPORTER</button>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6">
			<div class="input-group mb-3">
		            <div class="input-group-prepend">
		                <label class="input-group-text" for="theme_selector">Catégorie</label>
		            </div>
		            <select id="theme_selector" class="custom-select col-lg-6 col-sm-12">
		                <option value="default">Tous les articles</option>
		                <option value="arrows">arrows</option>
		                <option value="circles">circles</option>
		                <option value="dots">dots</option>
		            </select>
				    <div class="input-group-prepend">
		                <label class="input-group-text" for="theme_selector">Alerte de stock</label>
		            </div>
		            <select id="theme_selector" class="custom-select col-lg-6 col-sm-12">
		                <option value="default">Tous les articles</option>
		                <option value="arrows">arrows</option>
		                <option value="circles">circles</option>
		                <option value="dots">dots</option>
		            </select>
		    </div>
		</div>
	</div>
	
	<div class="row mt-4">
		<div class="col-md-12">
			<div class="card text-left">
			
                <div class="card-header d-flex align-items-center">
                    <h3 class="w-50 float-left card-title m-0">Liste produits</h3>
                            
                </div>
            
			<div class="card-body">
                 <div class="table-responsive">
					<div id="box"></div>
                    <table id="user_table" class="table dataTable-collapse text-center">
                        <thead>
                            <tr>
                            	<th scope="col">
                            		<label class="checkbox checkbox-success">
		                                <input type="checkbox" checked="checked">
		                                <span class="checkmark"></span>
		                            </label>
                            	</th>
                                <th scope="col">Nom de l'article</th>
                                <th scope="col">Catégorie</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Prix de revient</th>
                                <th scope="col">Marge</th>
                                <th scope="col">En stock</th>
                            </tr>
                        </thead>
                        <tbody>
                             <tr>
                             	<td>
                             		<label class="checkbox checkbox-success">
		                                <input type="checkbox" checked="checked">
		                                <span class="checkmark"></span>
		                            </label>
                             	</td>
                             	<td></td>
                             	<td></td>
                             	<td></td>
                             	<td></td>
                             	<td></td>
                             	<td></td>
                             </tr>     	
                        </tbody>
                    </table>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>