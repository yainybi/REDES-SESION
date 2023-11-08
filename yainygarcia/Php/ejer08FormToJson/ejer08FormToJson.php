<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <title>PROGRAMACION EN AMBIENTE DE REDES</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        #btn {
            background-color: #1aa6b7;
            color: white;
            font-weight: bold;
            width: 20vw;
            height: 15vh;
            font-size: 1em;
            
        }

        .cerrar {
            background: #606061;
            color: #FFFFFF;
            padding: 0.5%;
            text-decoration: none;
            position: absolute;
            right: 0px;
            top: 0px;
            width: 24px;
            font-weight: bold;
        }
        .cerrar:hover {
            background: #1aa6b7;
        }

        #contenedorInt {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0,0,0,0.8);
            z-index: 1;
            display: none;
            width: 70vw;
            height: 60vh;
            border: solid 3px black;
            margin: auto;
        }

        .ventanaModal #formulario {
            width: 40vw;
            height: auto;
            height: auto;
            margin: 2% auto;
            display: flex;
            flex-direction: column;
        }

        .ventanaModal #formulario label {
            color: white;
        }
        .ventanaModal #formulario input, label {
            display: block;
            height: 4vh;
            font-size: 1.5em;
        }

        .ventanaModal #formulario #nac {
            width: 20vw;
        }
        .ventanaModal #formulario #btn-int {
            width: 15vw;
            height: 5vh;
            margin-top: 5%;
        }

        #contenedorExt {
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-wrap: wrap;
        }

        #contenedorExt footer, header {
            width: 100vw;
            height: 10vh;
            background-color: #1aa6b7;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #contenedorExt main {
            width: 100vw;
            height: 80vh;
            background-color: lightslategray;
            display: flex;
            align-items: center;
        }


    </style>
</head>
<body>
    <div id="contenedorExt">
        <header>
            <h1>Formualario JSON</h1>
        </header>
        <main>
            <button id="btn" onclick="abrirVentanaModal()">Ventana Modal</button>
        </main>
        <footer>
            <h1>Formualario JSON</h1>
        </footer>
    </div>

    <div id="contenedorInt">
            <div class="ventanaModal">
                    <a href="#" class="cerrar" title="cerrar" onclick="cerrarVentanaModal()">X</a>
                    <form action="respuesta.php" id="formulario" method="POST">
                            <label for="id">Id Usuario</label>
                            <input type="text" name="id" id="id">
                            <label for="correo">Correo</label>
                            <input type="mail" name="correo" id="correo">
                            <label for="ape">Apellido</label>
                            <input type="text" name="ape" id="ape">
                            <label for="nom">Nombre</label>
                            <input type="text" name="nom" id="nom">
                            <label for="nac">Fecha Nacimiento</label>
                            <input type="date" name="nac" id="nac">
                            <input type="submit" id="btn-int" value="Enviar">
                            
                    </form>
            </div>  
                <div style = 'color: red' id="resultado"> 
            </div>           
    </div>
    <script>
            function cerrarVentanaModal() {
                document.getElementById('contenedorInt').style.display = 'none';
                document.getElementById('contenedorExt').style.pointerEvents = 'auto';
                document.getElementById('contenedorExt').style.opacity = 1;
            }
            function abrirVentanaModal() {
                document.getElementById('contenedorInt').style.display = 'block';
                document.getElementById('contenedorExt').style.pointerEvents = 'none';
                document.getElementById('contenedorExt').style.opacity = 0.3;
            }
            
    </script>
    <script src="enviar.js"></script>   
</body>
</html>