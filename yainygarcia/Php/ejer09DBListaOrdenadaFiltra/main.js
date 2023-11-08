var objTbDatos = document.getElementById('tbody');
            
$('#ocultarData').click(ocultarData)
$('#mostrarData').click(mostrarData)

var campoAFiltrar = null;
var filtroPalabra = null;

function mostrarData() {
    $("#tbody").empty();
    $("#tbody").html("<p>Esperando respuesta aca...</p>");

    var criterioOrdenacion = $("#ordenar").val(); 
    var filtroCategoria = $("#listadoDeCategorias").val(); 

    if (criterioOrdenacion === null || criterioOrdenacion.length === 0) {
        criterioOrdenacion = "id";
    }
    console.log("desde mostrarData CRITERIO " + criterioOrdenacion + " FILTRO " + filtroCategoria + " CAMPO " + campoAFiltrar + " PALABRA " + filtroPalabra);
    
    var objAjax = $.ajax({
    type:"POST",
    url:"output-json.php",
    data: { 
        "operacion" : [{
                "Id": "",
                "Username": "",
                "Ticker": "",
                "Categoria": "",
                "Cantidad": "",
                "Fecha": ""       
            }],
        "Criterio": criterioOrdenacion,
        "Filtro": filtroCategoria,
        "CampoAFiltrar": campoAFiltrar,
        "FiltroPalabra" : filtroPalabra
    },

    success: function(respuestaDelServer, estado) {
        setTimeout(function(){ 
            $("#tbody").empty();
            objJson = JSON.parse(respuestaDelServer);

            if (!(objJson === null || Object.keys(objJson).length === 0)) {
                mostrarJson(objJson);
                
                objJson.operacion.forEach(function(argValor, argIndice) {
                    var objTr = document.createElement("tr");

                    var objTd1 = document.createElement("td");
                    objTd1.setAttribute("campo-dato","id");
                    objTd1.setAttribute("class","registros-Td");
                    objTd1.innerHTML = argValor.Id;
                    objTr.appendChild(objTd1);

                    var objTd2 = document.createElement("td");
                    objTd2.setAttribute("campo-dato","username");
                    objTd2.setAttribute("class","registros-Td");
                    objTd2.innerHTML = argValor.Username;
                    objTr.appendChild(objTd2);

                    var objTd3 = document.createElement("td");
                    objTd3.setAttribute("campo-dato","ticker");
                    objTd3.setAttribute("class","registros-Td");
                    objTd3.innerHTML = argValor.Ticker;
                    objTr.appendChild(objTd3);

                    var objTd4 = document.createElement("td");
                    objTd4.setAttribute("campo-dato","categoria");
                    objTd4.setAttribute("class","registros-Td");
                    objTd4.innerHTML = argValor.Categoria;
                    objTr.appendChild(objTd4);

                    var objTd5 = document.createElement("td");
                    objTd5.setAttribute("campo-dato","cantidad");
                    objTd5.setAttribute("class","registros-Td");
                    objTd5.innerHTML = argValor.Cantidad;
                    objTr.appendChild(objTd5);

                    var objTd6 = document.createElement("td");
                    objTd6.setAttribute("campo-dato","fecha");
                    objTd6.setAttribute("class","registros-Td");
                    objTd6.innerHTML = argValor.Fecha;
                    objTr.appendChild(objTd6);
                

                    objTbDatos.appendChild(objTr)
                }) 
            }
            $("#totalRegistros").html("Nro de registros: " + objJson.operacion.length);
        }, 2000);
    }
});
}


function ocultarData() {
    console.log("limpiar data")
    $("#tbody").empty();
    $("#totalRegistros").empty();
    $(".filtroPalabras").empty();
    limpiarCriterioOrdenacion();
    limpiarFiltroCategoria();
    mostrarCategorias();
    
}

function limpiarFiltroCategoria() {
    $("#listadoDeCategorias").empty();
    $("#listadoDeCategorias").append('<option value="" selected="true" disabled></option>');
}

function limpiarCriterioOrdenacion() {
    $("#ordenar").empty(); 
    $("#ordenar").append('<input type="text" name="ordenar" id="ordenar" placeholder="criterio de orden" disabled>');
}

function mostrarCategorias() {
    var objAjax = $.ajax({
    type:"POST",
    url:"output-json-list.php",
    data: { "categoria" : [{
                "Nombre": ""           
    }]
    }, 

    success: function(respuestaDelServer, estado) {
            objJson = JSON.parse(respuestaDelServer);

            var selectElement = document.getElementById("listadoDeCategorias");

            objJson.categoria.forEach(function(valor, indice) {
                
                var optionElement = document.createElement('option');

                optionElement.value = valor.Nombre; 
                optionElement.text = valor.Nombre;  
                selectElement.appendChild(optionElement); 
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error en la solicitud: " + textStatus, errorThrown);
        }
    });
}


$(document).ready(function() {
    mostrarCategorias();

    $('.criterio-orden').click((event) => {
        var idDelBoton = event.target.id; // Obtiene el valor del atributo 'id' del botón clickeado
        console.log('El nombre del botón es: ' + idDelBoton);
        ordernarPor(idDelBoton);
    });

    $('.filtroPalabras').on('input', function() {
        var nombreId = event.target.id; // Obtiene el valor del atributo 'id' del botón clickeado
        var valorInput = $("#"+nombreId).val();
        obtenerCampoAFiltrar(nombreId, valorInput);
    });
});


function mostrarJson(objetoJSON) {
    var jsonString = JSON.stringify(objetoJSON);
    console.log(jsonString);
    alert(jsonString);
}

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

function obtenerInput(elemento) {
    var input = elemento.split("-")[0];
   console.log("aplicar filtro para el campo: " + campo);
   filtroPorPalabras = campo;
   ordernarPor(campo);
}