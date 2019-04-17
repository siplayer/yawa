<div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1 class="mr-2">{u s=$namecontroller}</h1>
                <ul>
                    <li><a href="{$url_base}/backend/administration">{u s=$namecontroller}</a></li>
                    <li>{l s='profileadd'}</li>
                </ul>
            </div>
			
            <div class="separator-breadcrumb border-top"></div>

             <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Profile</div>
                            <form method="post">
                            	{include file=$tpl_dir_error}
                            	{include file=$tpl_dir_success}
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3"> 
                                        <input type="text" class="form-control" id="nom" name="nom"  required="" >
                                    </div>
									<div class="col-md-6 form-group mb-3"></div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="switch pr-5 switch-success mr-3">
			                                <span>Activer</span>
			                                <input type="checkbox"  name="active" id="active">
			                                <span class="slider"></span>
			                            </label>
                                    </div>


                                    <div class="col-md-12">
                                        <button type="submit" name="valider" id="valider" class="btn btn-primary">Soumettre</button>
                                    </div>
                                </div>
                            </form>
                           
                        </div>
                    </div>
                </div>

               

            </div>
			
</div>