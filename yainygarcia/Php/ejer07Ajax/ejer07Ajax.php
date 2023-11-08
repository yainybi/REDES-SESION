<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROGRAMACION EN AMBIENTE DE REDES</title>
</head>
<body>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <title>Ejercicio Ajax</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .contenedor {
            width: 80vw;
            height: 70vh;
            margin: auto;
            background-color: lightblue;
            display: flex;
            flex-wrap: wrap;
            
        }

        button img {
            width: 10vw;  
        }

        
        #uno {
            background-color: gray;
            padding: 5px;
            width: 27vw;
            height: 35vh;
        }

        #uno input {
            display: block;
            height: 5vh;
            margin: 5%;
            font-size: 1.5em;

        }
        #dos {
            background-color: blue;
            padding: 5px;
            width: 27vw;
            height: 35vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;            
            align-items: center;        
        }

        #dos button{
            border: solid black 2px;
           
        }
        #resultado {
            background-color: yellow;
            padding: 5px;
            width: 26vw;
            height: 35vh;
        }


        #estado{
            background-color: lightsalmon;
            padding: 5px;
            width: 27vw;
            height: 35vh;
        }

        #estado h1 {
            
        }

        #dos a:hover {
            visibility: auto;

        }

        .estiloRecibiendo {
            color:red;
        }


    </style>
</head>
<body>
    <div class="contenedor">
        <div id="uno">
            <h1>Dato de entrada:</h1>
            <input type="text" id="clave">
        </div>
        <div id="dos">
            <h1>Encriptar</h1>
            <button id="btn"><img src="boton.webp" alt="boton"></button>
        </div>
        <div id="resultado">
            <h1>Resultado:</h1>
        </div>
        <div id="estado">
            <h1>Estado del requerimiento:</h1>
        </div>
        <div></div>
    </div>

    <script>
        $("#btn").click(function() {
            $("#resultado").empty();
            $("#resultado").html("<h2>Esperando respuesta ..</h2>");
            $("#estado").empty(); 
            $("#estado").append("<h1>Estado del requerimiento: </h1><br>");
        
            $.ajax({
                type:"POST",
                url: 'index.php',
                data: { 
                    clave: $("#clave").val()
                    },

                success: function(respuestaDelServer, estado) {
                    setTimeout(function(){ 
                        $("#resultado").html("<h4>"+respuestaDelServer+"</h4>");
                        $("#estado").append("<h4>"+estado+"</h4>");
                        }, 2000);                    
                }
            });
        });
    </script>
</body>
</html>
</body>
</html>