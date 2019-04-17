<div class="main-content-wrap sidenav-open d-flex flex-column">
	<div class="breadcrumb">
    	<h1 class="mr-2">{u s=$namecontroller}</h1>
        <ul>
        	<li><a href="{$url_base}/backend/catalogue/articles">Liste des articles </a></li>               
        	<li><a href="#">Ajouter un article</a></li>               
        </ul>
    </div>		
    <div class="separator-breadcrumb border-top"></div>
    
	<div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                        <div class="card-title mb-3">Form Inputs</div>
                    <form>
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName1">First name</label>
                                <input type="text" class="form-control" id="firstName1" placeholder="Enter your first name">
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="lastName1">Last name</label>
                                <input type="text" class="form-control" id="lastName1" placeholder="Enter your last name">
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="phone">Phone</label>
                                <input class="form-control" id="phone" placeholder="Enter phone">
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="credit1">Cradit card number</label>
                                <input class="form-control" id="credit1" placeholder="Card">
                            </div>


                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Select</label>
                                <select class="form-control">
                                    <option>Option 1</option>
                                    <option>Option 1</option>
                                    <option>Option 1</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>