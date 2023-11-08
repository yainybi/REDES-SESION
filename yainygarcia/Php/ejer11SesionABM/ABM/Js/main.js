var objTbDatos = document.getElementById('tbody');
$('#mostrar').click(mostrarData);
$('#alta').click(abrirVentana);
$('#vaciar').click(vaciarDatos);
$('#limpiar').click(limpiarFiltros);
$('#destruir').click(cerrarSesion);
//$('#iniciar-sesion').click(getSesion);
var campoAFiltrar = null;
var filtroPalabra = null;


/**
 * 
 * Mostrar alerta con la informacion en parametro
 */
function mostrarJson(objetoJSON, metodo) {
    var jsonString = JSON.stringify(objetoJSON);
    console.log(jsonString);
    alert("Desde index - " + metodo + "\n" + jsonString);
}

/**
 * Mostrar informacion desde el boton "Cargar Data"
 */
function mostrarData() {
    $("#tbody").empty();
    $("#tbody").html("<p>Esperando respuesta aca...</p>");

    var criterioOrdenacion = $("#ordenar").val(); 
    var filtroCategoria = $("#listadoDeCategorias").val(); 

    if (criterioOrdenacion === null || criterioOrdenacion.length === 0) {
        criterioOrdenacion = "id";
    }
    console.log("CRITERIO ORDEN [" + criterioOrdenacion + "] FILTRO CATEG [" + filtroCategoria + "] CAMPO [" + campoAFiltrar + "] PALABRA [" + filtroPalabra + "]");

    $.ajax({
    method:"POST",
    url:"../Config/main.php",
    data: { 
        rq:"2",
        "criterioOrden": criterioOrdenacion,
        "filtroCategoria": filtroCategoria,
        "campoAFiltrar": campoAFiltrar,
        "filtroPorPalabra" : filtroPalabra
    },

    success: function(respuestaDelServer, estado) {
        setTimeout(function(){ 
            $("#tbody").empty();
            datos = respuestaDelServer;

            jsonDatos = JSON.parse(datos);

            if (!(jsonDatos === null || Object.keys(jsonDatos).length === 0)) {
                mostrarJson(jsonDatos, "mostrarData");

                $.each(jsonDatos, function(i, item) {

                    var objTr = document.createElement("tr");

                    var objTd1 = document.createElement("td");
                    objTd1.setAttribute("campo-dato","id");
                    objTd1.setAttribute("class","registros-Td");
                    objTd1.innerHTML = jsonDatos[i].id;
                    objTr.appendChild(objTd1);

                    var objTd3 = document.createElement("td");
                    objTd3.setAttribute("campo-dato","ticket");
                    objTd3.setAttribute("class","registros-Td");
                    objTd3.innerHTML = jsonDatos[i].ticket;
                    objTr.appendChild(objTd3);

                    var objTd4 = document.createElement("td");
                    objTd4.setAttribute("campo-dato","categoria");
                    objTd4.setAttribute("class","registros-Td");
                    objTd4.innerHTML = jsonDatos[i].categoria;
                    objTr.appendChild(objTd4);

                    var objTd5 = document.createElement("td");
                    objTd5.setAttribute("campo-dato","precio");
                    objTd5.setAttribute("class","registros-Td");
                    objTd5.innerHTML = jsonDatos[i].precio;
                    objTr.appendChild(objTd5);

                    var objTd6 = document.createElement("td");
                    objTd6.setAttribute("campo-dato","fecha");
                    objTd6.setAttribute("class","registros-Td");
                    objTd6.innerHTML = jsonDatos[i].fecha;
                    objTr.appendChild(objTd6);

                    var objTd7 = document.createElement("td");
                    objTd7.setAttribute("campo-dato","icono");
                    objTd7.setAttribute("class","registros-Td");
                    objTd7.innerHTML = "icono";
                    objTr.appendChild(objTd7);

                    var objTd8 = document.createElement("td");
                    objTd8.setAttribute("campo-dato","modificar");
                    objTd8.setAttribute("class","registros-Td");
                    var id = jsonDatos[i].id
                    objTd8.innerHTML =
                    '<button class="boton-abm" id="modificar" onclick="abrirVentanaModif(\'' + id + '\')">Modificar</button>';
                    objTr.appendChild(objTd8);

                    var objTd9 = document.createElement("td");
                    objTd9.setAttribute("campo-dato","eliminar");
                    objTd9.setAttribute("class","registros-Td");
                    objTd9.innerHTML = '<button class="boton-abm" id="eliminar" onclick="eliminar(\'' + id + '\')">Eliminar</button>';
                    objTr.appendChild(objTd9);
                
                    objTbDatos.appendChild(objTr);
                    
                });
            }
            $("#totalRegistros").html("Nro de registros: " + jsonDatos.length);
        }, 2000);
    }
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
        datos = respuestaDelServer;
        console.log("INDEX - mostrarCategorias: " + datos);

        jsonDatos = JSON.parse(datos);
           
        if (!(jsonDatos === null || Object.keys(jsonDatos).length === 0)) {
            mostrarJson(jsonDatos, "mostrarCategorias");

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
 * Eliminar ticket
 */
function eliminar(id) {
    if (window.confirm("¿Estas seguro que desea elimnar el registro con id: " + id + "?")) {
        var idTicket = id;
    console.log("eliminar() - id: " + idTicket);

    $.ajax({
        type:'POST',
        url:'../Config/main.php',
        data: { 
            "rq": "eliminar",
            "id": idTicket
        },
            
    success: function(respuestaDelServer, estado) {
        console.log("eliminar() - respuestaDelServer" + respuestaDelServer);
        },
    });
    }
}


/**
 * Funcion para vaciar:
 *  -tabla
 *  -filtros
 *  -criterio orden
 */
function vaciarDatos() {
    $("#tbody").empty();
    $("#totalRegistros").empty();
    $(".filtroPalabras").empty();
    limpiarCriterioOrdenacion();
    limpiarFiltroCategoria();
    mostrarCategorias(); 
}

/**
 * Funcion para limpiar:
 *  -filtros
 *  -criterio orden
 */
function limpiarFiltros() {
    $(".filtroPalabras").empty();
    limpiarCriterioOrdenacion();
    limpiarFiltroCategoria();
    mostrarCategorias(); 
}

/**
 * Funcion para limpiar select de categorias
 */
function limpiarFiltroCategoria() {
    $("#listadoDeCategorias").empty();
    $("#listadoDeCategorias").append('<option value="" selected="true" disabled></option>');
}

/**
 * Funcion para limpiar input criterio orden
 */
function limpiarCriterioOrdenacion() {
    $("#ordenar").empty(); 
    $("#ordenar").append('<input type="text" name="ordenar" id="ordenar" placeholder="criterio de orden" disabled>');
}

// FUNCIONES PARA ORDENAR Y FILTRAR //

/**
 * 
 * Funcion para mostrar en el input ordenar el criterio de ordenacion
 */
function ordernarPor(elemento) {
    $("#ordenar").empty();
    $("#ordenar").val(elemento); 
}

function obtenerCampoAFiltrar(elemento, valorInput) {
    var campo = elemento.split("-")[0];
   console.log("aplicar filtro para el campo: " + campo + " valorInput: " + valorInput);
   campoAFiltrar = campo;
   filtroPalabra = valorInput;
   ordernarPor(campo);
}


// FUNCIONES PARA ORDENAR Y FILTRAR //



//VENTANAS MODAL//
/**
 * Abrir ventana alta
 */
function abrirVentana() {
    document.getElementById('ventana-alta').style.display = 'block';
    //document.getElementById('contenedor').style.pointerEvents = 'none';
    //document.getElementById('contenedor').style.opacity = 0.3;
}

/**
 * Cerrar ventana alta
 */
function cerrarVentana() {
    document.getElementById('ventana-alta').style.display = 'none';
    document.getElementById('contenedor').style.pointerEvents = 'auto';
    document.getElementById('contenedor').style.opacity = 0.3;
}

/**
 * Abrir ventana modif
 */
function abrirVentanaModif(id) {
    var url = "../Html/modif.html?id=" + id;
    result = document.querySelector("iframe[name='fcontenidoModif']").src = url;
    console.log("abrirVentanaModif result: "+ result);
    document.getElementById('ventana-modificar').style.display = 'block';
    //document.getElementById('contenedor').style.pointerEvents = 'none';
    //document.getElementById('contenedor').style.opacity = 0.3;
}

/**
 * Cerrar ventana modif
 */
function cerrarVentanaModif() {
    document.getElementById('ventana-modificar').style.display = 'none';
    //document.getElementById('contenedor').style.pointerEvents = 'auto';
    //document.getElementById('contenedor').style.opacity = 0.3;
}

//VENTANAS MODAL//


/**
 * Funcion para el control de sesion del user
 */
function getSesion() {
        $.ajax({
            statusCode: {
                401: function() {
                    window.location.href = "../Html/login.html";
                },
                200: function() {
                    window.location.href = "../Html/index.html"
                }
            },
            type:"POST",
            url:"../Config/main.php",
            data: { 
                rq:"0"
            },

            success: function(respuestaDelServer, estado) {
            datos = respuestaDelServer;
            console.log("INDEX - respuestaDelServer: " + datos);
            }
    });
}

/**
 * Funcion para el control de sesion del user
 */
function cerrarSesion() {
    $.ajax({
        statusCode: {
            401: function() {
                window.location.href = "../Html/login.html"
            },
            200: function() {
                window.location.href = "../Html/index.html"
            }
        },
        type:"POST",
        url:"../Config/main.php",
        data: { 
            rq:"-1"
        },

        success: function(respuestaDelServer, estado) {
            datos = respuestaDelServer;
            console.log("INDEX - respuestaDelServer: " + datos);
        }
    })
}


/**
 * Datos que cargan con la pagina
 */
$(document).ready(function() {
    getSesion();
    //mostrarCategorias();

    $('.criterio-orden').click((event) => {
        var idDelBoton = event.target.id; // Obtiene el valor del atributo 'id' del botón clickeado
        console.log('El botón que se toco es: ' + idDelBoton);
        ordernarPor(idDelBoton);
    });

    $('.filtroPalabras').on('input', function() {
        var nombreId = event.target.id; // Obtiene el valor del atributo 'id' del botón clickeado
        var valorInput = $("#"+nombreId).val();
        obtenerCampoAFiltrar(nombreId, valorInput);
    });
});


