<div class="main-content-wrap sidenav-open d-flex flex-column">
    <div class="breadcrumb">
        <h1 class="mr-2">{u s=$namecontroller}</h1>
        <ul>
            <li><a href="{$url_base}/backend/catalogue/reduction">{l s='reduction'}</a></li>                  
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
		<a href="{$url_base}backend/catalogue/reductionadd/"><button type="button" class="btn btn-success btn-lg m-1">+ AJOUTER UN REDUCTION</button></a>
		</div>
                <div class="col-md-9">
                    <div class="card o-hidden mb-4">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="w-50 float-left card-title m-0">{l s='caracteristicgestion'}</h3>
                            <div class="dropdown dropleft text-right w-50 float-right">
                                <button class="btn bg-gray-100" type="button" id="dropdownMenuButton_table1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="nav-icon i-Gear-2"></i>
                                        </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table1">
                                    <a class="dropdown-item" href="{$url_base}backend/catalogue/reductionadd/">{l s='addreduction'}</a>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
								<div id="box"></div>
                                <table id="user_table" class="table dataTable-collapse text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Valeur</th>
                                            <th scope="col">Accès restreint</th>                                        
                                        </tr>
                                    </thead>
                                    <tbody>

                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
