function alertSup(id,url,action,u){
	$(document).ready(function () {
		var Purl = url+'common/request.php'
		var data = {"action": action,"id":id};
		data = $(this).serialize() + "&" + $.param(data);
		var box = $('#'+u+id);
		swal({
            title: 'Êtes-vous sûr?',
            text: "Vous ne pourrez pas revenir en arrière!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0CC27E',
            cancelButtonColor: '#FF586B',
            confirmButtonText: 'Oui, supprimez-le!',
            cancelButtonText: 'Non, annuler!',
            confirmButtonClass: 'btn btn-success mr-5',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
        }).then(function () {
        	$.ajax({
				    type: "POST",
				    url: Purl,
				    data: data,
				    success: function(data) {
				    	
					   	if(data=='ok'){						
							swal(
				                'Deleted!',
				                'Your imaginary file has been deleted.',
				                'success'
				            )
				            box.css("display","none");
						}else{
							swal(
			                    'Annulé',
			                    'Votre fichier imaginaire est en sécurité :)',
			                    'error'
			                )
						}
						
					}
				});
        }, function (dismiss) {
            // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
            if (dismiss === 'cancel') {
                swal(
                    'Annulé',
                    'Votre fichier imaginaire est en sécurité :)',
                    'error'
                )
            }
        })
	})
}
function getActive(id1,id2,status,module,url){
	$(document).ready(function () {
		var Purl = url+'common/request.php'
		var data = {"action": "active","status":status,"table":module,"id1":id1,"id2":id2};
		data = $(this).serialize() + "&" + $.param(data);
		$.ajax({
			type: "POST",
				url: Purl,
				data: data,
				success: function(data) {	
					if(data=='ok'){						
						swal(
				                'Activate!',
				                'Activation avec succes.',
				            )
						}else{
							swal(
			                    'Annule',
			                    'Activation echoué',
			                )
						}
						
					}
				});
	})
}
$(document).ready(function () {
	
    $('#basic-alert').on('click', function () {
        swal("Here's a message!");
    });

    $('#with-title').on('click', function () {
        swal(
            'The Internet?',
            'That thing is still around?'
        );
    });

    $('#with-html').on('click', function () {
        swal({
            title: 'HTML <small>Title</small>!',
            text: 'A custom <span style="color:#F6BB42">html<span> message.',
            html: true,
            buttonsStyling: false,
            confirmButtonClass: 'btn btn-lg btn-primary'
        });
    });

    $('#alert-success').on('click', function () {
        swal({
            type: 'success',
            title: 'Success!',
            text: 'Your work has been saved',
            buttonsStyling: false,
            confirmButtonClass: 'btn btn-lg btn-success'
        })
    });

    $('#alert-info').on('click', function () {
        swal({
            type: 'info',
            title: 'Info Alert!',
            text: 'Here is the info alert text',
            buttonsStyling: false,
            confirmButtonClass: 'btn btn-lg btn-info'
        })
    });

    $('#alert-warning').on('click', function () {
        swal({
            type: 'warning',
            title: 'Warning',
            text: 'Here is the warning alert text',
            buttonsStyling: false,
            confirmButtonClass: 'btn btn-lg btn-warning'
        })
    });

    $('#alert-error').on('click', function () {
        swal({
            type: 'error',
            title: 'Error!',
            text: 'Something went wrong!',
            confirmButtonText: 'Dismiss',
            buttonsStyling: false,
            confirmButtonClass: 'btn btn-lg btn-danger'
        })
    });

    $('#with-image').on('click', function () {
        swal({
            title: 'Sweet!',
            text: 'Modal with a custom image.',
            imageUrl: 'https://unsplash.it/400/200',
            imageWidth: 400,
            imageHeight: 200,
            imageAlt: 'Custom image',
            buttonsStyling: false,
            confirmButtonClass: 'btn btn-lg btn-primary'
        })
    });

    $('#with-timer').on('click', function () {
        let timerInterval;
        swal({
            title: 'Auto close alert!',
            html: 'I will close in <strong>2</strong> seconds.',
            timer: 2000
        }).then((result) => {
            if (
                result.dismiss === swal.DismissReason.timer
            ) {
                console.log('I was closed by the timer')
            }
        })
    });

    $('#with-input').on('click', function () {
        swal({
            title: "An input!",
            text: "Write something:",
            input: "text",
            showCancelButton: true,
            closeOnConfirm: false,
            inputPlaceholder: "Write something"
        }).then(function (inputValue) {
            if (inputValue === false) return false;
            if (inputValue === "") {
                return false
            }
            swal("Awesome!", "You wrote: " + inputValue, "success");
        });

    });

    $('.alert-confirm').on('click', function () {
        swal({
            title: 'Êtes-vous sûr?',
            text: "Vous ne pourrez pas revenir en arrière!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0CC27E',
            cancelButtonColor: '#FF586B',
            confirmButtonText: 'Oui, supprimez-le!',
            cancelButtonText: 'Non, annuler!',
            confirmButtonClass: 'btn btn-success mr-5',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
        }).then(function () {
        	alert($(this).attr("name"))
        	/*$.ajax({
			  method: "POST",
			  url: "some.php",
			  data: { name: "John", location: "Boston" }
			})*/
            swal(
                'Deleted!',
                'Your imaginary file has been deleted.',
                'success'
            )
        }, function (dismiss) {
            // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
            if (dismiss === 'cancel') {
                swal(
                    'Annulé',
                    'Votre fichier imaginaire est en sécurité :)',
                    'error'
                )
            }
        })
    });

})