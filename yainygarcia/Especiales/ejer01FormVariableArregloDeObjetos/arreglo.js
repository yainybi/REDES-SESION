var textoJSONCedears = '{"ticketsCedears" : [' +
'{"ticket":"AMZN", "descripcion":"Amazon.com Inc. es una tienda de comercio electrónico estadounidense que ofrece una amplia gama de productos, incluyendo libros, música, películas, y computadoras. También ofrece servicios basados en la web, fabrica dispositivos electrónicos tales como Kindle y tabletas, y ofrece servicios de auto-publicación.", "tipoCedears": "Más operados"},' +
'{"ticket":"DISN", "descripcion":" Disney es internacionalmente conocido y se asocia a la fantasía infantil y al mundo del espectáculo. Se trata de una compañía líder en el sector de los medios de comunicación que se fundó en 1923 en Hollywood, cuando el cine todavía no era sonoro y las películas de animación eran una auténtica rareza.", "tipoCedears": "Entretenimiento"},' +
'{"ticket":"NIO", "descripcion":"NIO es una empresa multinacional global con sede en Shanghái, China, que diseña y desarrolla vehículos eléctricos de alto rendimiento y autónomos.", "tipoCedears": "Automotriz"},' +
'{"ticket":"BABA", "descripcion":"Alibaba Group Holding Ltd. (Alibaba) es una empresa china de comercio electrónico. Fundada en 1999, su principal negocio es la plataforma de comercio online Alibaba.com, que reune a importadores y exportadores de más de 240 países.", "tipoCedears": "Tecnología"},'+
'{"ticket":"BABA", "descripcion":"Alibaba Group Holding Ltd. (Alibaba) es una empresa china de comercio electrónico. Fundada en 1999, su principal negocio es la plataforma de comercio online Alibaba.com, que reune a importadores y exportadores de más de 240 países.", "tipoCedears": "TurismoArgentino"} ]}';

var objJson = JSON.parse(textoJSONCedears);

function crearOptiones() {
    objJson.ticketsCedears.forEach(function(valor, indice) {
        var objOpcion = document.createElement('option');
        objOpcion.setAttribute("class", "elementoOptionSelect");
        objOpcion.setAttribute("value", valor.tipoCedears);
        objOpcion.innerText = valor.tipoCedears;
        document.getElementById("listadoCedears").appendChild(objOpcion);
    });
}


$(document).ready(function() {
    crearOptiones()
});




