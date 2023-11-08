$(document).ready(function () {
    $("#formulario").bind("submit",function(){
        // Capturamnos el boton de envío
        var btnEnviar = $("#btn-int");
        $("#resultado").empty();
        $("#resultado").html("<h2 style='color:red'>Esperando respuesta ..</h2>");
        
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data:$(this).serialize(),

            success: function(data){
                setTimeout(function(){ 
                $("#resultado").html(data);
            }, 2000);
        }
           
        });
        return false;
    });
});