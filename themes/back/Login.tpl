
    <div class="auth-layout-wrap" style="background-image: url({$url_img}photo-wide-4.jpg)">
        <div class="auth-content">
            <div class="card o-hidden">
                <div class="row">
                    <div class="col-md-6">
                        <div class="p-4">
                            <div class="auth-logo text-center mb-4">
                                <img src="{$url_img}logo.png" alt="">
                            </div>
                            <h1 class="mb-3 text-18">{l s='Sign In'}</h1>
                            <form method="post">
 
								
								{if isset($errors) && $nberrors>0}
								<div class="alert alert-card alert-danger" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                            <span aria-hidden="true">&times;</span>
			                        </button>
									{foreach from=$errors item="error"}
										{$error}<br />
									{/foreach}
									
								</div>
								{/if}
								
                                <div class="form-group">
                                    <label for="email">{l s='Email address'}</label>
                                    <input id="email" name="email" class="form-control form-control-rounded" type="email">
                                </div>
                                <div class="form-group">
                                    <label for="password">{l s='Password'}</label>
                                    <input id="password" name="password" class="form-control form-control-rounded" type="password">
                                </div>
                                <button type="submit" name="connect" class="btn btn-rounded btn-primary btn-block mt-2">{l s='Sign In'}</button>
                            </form>

                            
                        </div>
                    </div>
                    <div class="col-md-6" style="background-size: cover;background-image: url({$url_img}photo-long-3.jpg)">
                        <div class="p-4" style="margin-top: 120px">
                            
                            <h1 class="mb-3 text-18">{l s='Forgot Password'}</h1>
                            <form action="">
                                <div class="form-group">
                                    <label for="email">{l s='Email address'}</label>
                                    <input id="email" class="form-control form-control-rounded" type="email">
                                </div>
                                <button class="btn btn-primary btn-block btn-rounded mt-3">{l s='Reset Password'}</button>

                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
