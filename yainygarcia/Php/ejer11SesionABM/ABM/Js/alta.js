/**
 * 
 * Mostrar alerta con la informacion en parametro
 */
function mostrarJson(objetoJSON, mensaje) {
    alert("ALTA \n" + 
    mensaje + "\n" + 
    objetoJSON);
}

/**
 * Alta de nuevo ticket
 */
function altaCedears() {
    var ticket = $("#ticket").val(); 
    var categoria = $("#listadoDeCategorias").val(); 
    var precio = $("#precio").val(); 
    var fecha = $("#fecha").val(); 
    var icono = $("#icono").val(); 

    $.ajax({
        type:"POST",
        url:"../Config/main.php",
        data: { 
            "rq": "insertar",
            "ticket": ticket,
            "categoria": categoria,
            "precio": precio,
            "fecha": fecha,
            "icono": icono  
        },
            
    success: function(respuestaDelServer, estado) {
        console.log("ALTA - altaCedears: " + respuestaDelServer);

        mostrarJson(respuestaDelServer)
        },
    });
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
        mostrarJson(respuestaDelServer, "CATEGORIAS");

        jsonDatos = JSON.parse(respuestaDelServer);
           
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
 * Datos que cargan con la pagina
 */
$(document).ready(function() {
   mostrarCategorias($("#categoria"))
});