$(document).ready(function() {
  //toastr.success('bien');
});

$('#btniniciar').click(function () {

        var usuario = $("#usuario").val();
        var contraseña = $("#contraseña").val();;
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: app_base_url + "logear",
            data: { 
            		usuario: usuario,
            		contraseña: contraseña
            	},
            success: function (response) {
            	if(response.usuario){
            		window.location.replace(response.url);
            	}else{
            		toastr.error(response);
            	}
            },
            error: function (exception) {
                
            }
        });
    
});

function PulseAnimation()
{

}