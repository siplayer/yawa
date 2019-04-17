<div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1 class="mr-2">{u s=$namecontroller}</h1>
                <ul>
                    <li><a href="{$url_base}/backend/administration">{u s=$namecontroller}</a></li>
                    <li>{l s='Droits'}</li>
                </ul>
            </div>
			
            <div class="separator-breadcrumb border-top"></div>

             <div class="row">
             {foreach key=k item=v from=$fields.modules}
                <div class="col-md-3">
                    <div class="card card-icon-bg card-icon-bg-primary mb-4">
                        <div class="card-body">
                        	<i class="{$v.picto}"></i>
                            <a href="{$url_base}/backend/administration/profilesousaccess/{md5 s=$v.module_id}/{md5 s=$v.profile_id}"><h3 class="mb-3" style="margin: 15px"><u>{l s=$v.module}</u></h3></a>
                            <div class="content">
                            
                            <label class="switch pr-5 switch-success mr-3">
	                            <input type="checkbox" onchange="getActive({$v.profile_id},{$v.module_id},{$v.status},1,'{$url_base}')" {if $v.status==1}checked{/if}>
	                            <span class="slider"></span>
	                        </label>
	                        <small class="text-muted">{$v.desc}</small>
	                        </div>
                        </div>
                        
                    </div>
                </div>
			 {/foreach}
             

            </div>
			
</div>