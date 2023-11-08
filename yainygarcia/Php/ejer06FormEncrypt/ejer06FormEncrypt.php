<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROGRAMACION EN AMBIENTE DE REDES</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .contenedor {
            width: 100vw;
            height: 100vh;
            background-color: #ebd4d4;
            display: flex;    
            flex-wrap: wrap;       
        }

        header, footer{
            width: 100vw;
            height: 10vh;
            background-color: #0f3057;
            color: #e7e7de;
            font-weight: bold;
            font-size: 2em;
            display: flex;
            justify-content: center;
            align-items: center;
        }


        main {
            width: 100vw;
            height: 80vh;  
            padding: 5%;       
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;         
        }

        

        input, select {
            width: 25vw;
            height: 8vh;
            border: 1px solid black;
            text-align: center;
            font-size: 1em;
    
            
        }
        
        label {
            width: 25vw;
            height: 8vh;
            font-size: 1.5em;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color:  #008891;
            color: #e7e7de;
            border: 1px solid black
            
        }

        .elementoOptionSelect {
            color: #709fb0;
            background-color: #d9ecf2;
            height: 10vh;
            font-size: 1em;
            font-weight: bold;

            
        }

       #boton {
           
           font-size: 1em;    
           border: 1px solid black;
       }

       #boton:hover {
           background-color: #008891;
           color: #e7e7de;
           font-weight: bold;
       }
    </style>
</head>

<body>
    <div class="contenedor">
        <header>Formulario de Encriptación</header>
        <main>
            <form action="index.php" method="POST" id="formulario">
                <label for="clave">Ingrese la clave a encriptar</label><br>
                <input type="text" name="clave"><br>
                <input type="submit" value="ENCRIPTAR" id="boton">
            </form>
        </main>
        <footer>Formulario de Encriptación</footer>
    </div>
</body>
</html>