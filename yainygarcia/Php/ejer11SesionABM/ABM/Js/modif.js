
var idTicket;

/**
 * Buscar ticket
 */
function buscarCedears(idTicket) {
    console.log("buscarCedears- id: " + idTicket);

    $.ajax({
        type:"POST",
        url:"../Config/main.php",
        data: { 
            "rq": "consultar",
            "id": idTicket
        },
            
    success: function(respuestaDelServer, estado) {
        console.log("buscarCedears: " + respuestaDelServer);

        var respuestaJson = JSON.parse(respuestaDelServer);

        $("#id").val(parseInt(respuestaJson.id, 10));
        $("#ticket").val(respuestaJson.ticket);
            
        var categoria = respuestaJson.categoria;
        $("#listadoDeCategorias").empty();
        $("#listadoDeCategorias").append('<option value="' + categoria + '" disabled="false" selected="true">' + categoria + '</option>'); 
        mostrarCategorias();

        $("#precio").val(parseFloat(respuestaJson.precio));
        $("#fecha").val(respuestaJson.fecha);
        },
    });
}


 /**
 * 
 * Mostrar alerta con la informacion en parametro
 */
function mostrarJson(objetoJSON, mensaje) {
    var jsonString = JSON.stringify(objetoJSON);
    console.log(jsonString);
    alert("Desde modif - " + jsonString + " " + mensaje);
}

/**
 * Modificar ticket
 */
function modificarCedears() {
    var categoria = "";
    var ticket = $("#ticket").val(); 
    var categoria = $("#listadoDeCategorias").val();
    var precio = $("#precio").val();
    var fecha = $("#fecha").val();

    console.log("datos a enviar: " + idTicket + ", " + ticket + ", " + categoria + ", " + precio + ", " + fecha);

    $.ajax({
        type:"POST",
        url:"../Config/main.php",
        data: { 
            "rq": "modificar",
            "id": idTicket,
            "ticket": ticket,
            "categoria": categoria,
            "precio": precio,
            "fecha": fecha   
        },
            
    success: function(respuestaDelServer, estado) {
        console.log("modificarCedears - respuestaDelServer: " + respuestaDelServer);
    
        mostrarJson(respuestaDelServer, "Se modifico el ticket")
        //sessionStorage.clear();
        },
    });
}

function verificarSiParametroEsNull(parametro) {
    console.log("parametro -> " + parametro.length);
    return (parametro.length == 0);
}

/**
 * Funcion para obtener de la url iframe el id del elemento
 */
function leerUrl() {
    parejas = location.search.substr(1).split("&");
    console.log("parejas: " + parejas);
    for (var i = 0, total = parejas.length; i < total; i++) {
        var keyValuePair = parejas[i].split("=");
        var key = keyValuePair[0];
        var value = keyValuePair[1];
        window[key] = decodeURIComponent(value);

        // Agrega un console.log para verificar los valores
        console.log("desde leerUrl2 " + key + ": " + window[key]);
    }
}

/**
 * Mostrar Categorias en el select
 */
function mostrarCategorias() {
    $.ajax({
        type:"POST",
        url:"../Config/main.php",
        data: { 
            rq:"1"
        },

    success: function(respuestaDelServer, estado) {
        datos = respuestaDelServer;

        jsonDatos = JSON.parse(datos);
           
        if (!(jsonDatos === null || Object.keys(jsonDatos).length === 0)) {

            var selectElement = document.getElementById("listadoDeCategorias");


            $.each(jsonDatos, function(i, item) {
                var optionElement = document.createElement('option');

                optionElement.value = jsonDatos[i].nombre; 
                optionElement.text = jsonDatos[i].nombre;  
                selectElement.appendChild(optionElement); 
                });
        }},
    });
}

/**
 * Validacion del parametro valido
 */
function isValidoElParametroId(parametro) {
    try {
      var numero = parseInt(parametro, 10);
      if (isNaN(numero)) {
        idCedears = id;
        return false;
      } else {
        return true; 
      }
    } catch (error) {
      return false; 
    }
}

function cargarCacheConIdAModificar(key, value) {
    var idCacheado = sessionStorage.getItem(key);
    if (value != idCacheado) {
        console.log("son diferentes: value -> " + value + " idCacheado -> " + idCacheado);
        sessionStorage.setItem('id', value);
        idTicket = sessionStorage.getItem('id');
    } 
    console.log("id en cache: " + sessionStorage.getItem('id'));
}


/**
 * Datos que cargan con la pagina
 */
$(document).ready(function() {
        leerUrl();
        if (isValidoElParametroId(id)) {
            console.log('La variable está definida y no es nula. Id ' + id); 

        // Para guardar un valor en sessionStorage
        //cargarCacheConIdAModificar('id', id);

        //buscarCedears(id);

        } else {
            console.log('La variable no está definida o es nula.');
        }

});

