<div class="main-content-wrap sidenav-open d-flex flex-column">
    <div class="breadcrumb">
        <h1 class="mr-2">{u s=$namecontroller}</h1>
        <ul>
            <li><a href="{$url_base}/backend/catalogue/reduction">{l s='reduction'}</a></li>                  
            <li><a href="#">{l s='addreduction'}</a></li>                  
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
            
                <div class="col-md-5">
                	
                    <div class="card o-hidden mb-4">
                        <div class="card-body">
							<div class="col-md-12 form-group mb-3">
							<div class=col-md-12"><center><img src="{$url_img}coupon-reduction.png" width="150"/></center></div>
								<p></p>
                               <input type="text" class="form-control" id="firstName1" placeholder="Nom">
                             <br/>   
                           	<div style="margin-top:20px;">
							<div class="col-md-3"><p>Type</p></div>
							<div class="col-md-4"> <label class="radio radio-primary">
                                <input type="radio" name="radio" value="0">
                                <span>Pourcentage</span>
                                <span class="checkmark"></span>
                            </label>
                            </div>
							<div class="col-md-4"><label class="radio radio-primary">
                                <input type="radio" name="radio" value="0">
                                <span>Montant</span>
                                <span class="checkmark"></span>
                            </label>
							</div>
							<input type="text" class="form-control" id="firstName1" placeholder="Valeur">
							<p> Laissez le champ vide pour indiquer le prix lors de la vente </p>
							<label class="switch pr-5 switch-primary mr-3">
                           		<p> <strong>Accès restreint </strong><br/>
                           		 Les employés doivent entrer le code PIN correct pour ’appliquer une réduction</p>
                           		<input type="checkbox" checked="checked">
                           		<span class="slider"></span>
						   		
                    		</label>
							</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5" style="margin-bottom:20px; float: right !important;text-align: right;">
				<button type="button" class="btn btn-outline-secondary m-1">ANNULER</button>
				<button type="button" class="btn btn-success m-1">ENREGISTRER</button>
			</div>
</div>
