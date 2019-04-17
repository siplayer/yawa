<div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1 class="mr-2">{u s=$namecontroller}</h1>
                <ul>
                    <li><a href="{$url_base}/backend/catalogue/caracteristics">Caractéristiques</a></li>
                    <li>{l s='attributs'}</li>
                </ul>
            </div>
			
            <div class="separator-breadcrumb border-top"></div>

             <div class="row">
            
             {foreach key=k item=v from=$fields.attributs}
            
                <div class="col-md-3">
            
                    <div class="card card-icon-bg card-icon-bg-primary mb-4">
            
                        <div class="card-body">
                          
                            <a href="{$url_base}/backend/catalogue/attributs/{md5 s=$v.id_attribute}/{md5 s=$v.id_caracteristique}"><h3 
                            
                            class="mb-3" style="margin: 15px"><u>{$v.name}</u></h3></a>
                            
                            <div class="content">
                            
                            <label class="switch pr-5 switch-success mr-3">
	                            
                                <input type="checkbox" onchange="activate( {$v.id_attribute} , {$v.active} , '{$url_base}')" 
                                
                                {if $v.active==1}checked {/if}>
	         
                                <span class="slider"></span>
	         
                            </label>
	         	         
                            </div>
             
                        </div>
                        
             
                    </div>
             
                </div>
			 
             {/foreach}
             

            </div>
			
</div>

<script> 

function activate( id , status , url ){

    console.log( "id : "+id+"; status : "+status+" ;url : "+url );

    url = url+"backend/catalogue/activateattribute/"+id;

    console.log( url )

    $.ajax({
    
    type: "GET",
    
        url: url,
                
        success: function(data) {	
            
            /*if(data=='ok'){						
                swal(
                        'Activate!',
                        'Activation avec succes.',
                    )
                }else{
                    swal(
                        'Annule',
                        'Activation echoué',
                    )
                }*/
                
            }
    
    });

}

</script>