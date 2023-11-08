<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <title>PROGRAMACION EN AMBIENTE DE REDES</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .contenedor {
            width: 100vw;
            height: auto;   
        }

        table {
            width: 100vw;
            height: 30vw;
            border-collapse:collapse; 
            border: none;
            text-align: center;
        }

        header, footer {
            width: 100vw;
            height: 19vh;
            background-color: #fca652;
            color: #ac4b1c;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
        }

        .titulo {
            width: 100vw;
            display: flex;
            justify-content: space-around;
        }

      
        thead, tfoot {
            width: 100vw;
            height: 10vh;
            background-color: #ffd57e;
            color: #ac4b1c;
        }

        thead td, tfoot td {
            width: 40vw;
            padding: 15px;
            border: 2px solid #ac4b1c;
        }

        tbody {
            width: 100vw;
            height: 10vw;
            overflow-y: auto;
        }

        tbody td {
            width: 35vw;
        }

        .registros-Tr {
            background-color: #ffd57e;
           
        }

        .registros-Td {
            padding: 10px;
            color: #c87941;
        }

    </style>
</head>

<body>
        <div class="contenedor">
        <header>
                    <div class="titulo">
                        <h1>Resultado de Encriptación</h1>
                    </div>
        </header>
        <main>
        <?php
            if (isset($_POST['clave'])) {
                $clave = $_POST['clave']."<br>";

                echo "<table>  <thead>";
                    echo "<tr>";
                    echo    "<td> Clave</td>";
                    echo    "<td> Encriptación md5</td>";
                    echo    "<td> Encriptación sha1</td>";
                    echo "</tr> </thead>";

                    echo "<tbody>";
                        echo "<tr class='registros-Tr'>";
                        echo    "<td class= 'registros-Td'>".$clave. "</td>";
                        echo    "<td class= 'registros-Td'>".md5($clave). "</td>";
                        echo    "<td class= 'registros-Td'>".sha1($clave). "</td>";
                        echo "<tr>";
                    echo "</tbody>";
                echo "</table>"; 
            }
        ?>             
        </main>
        <footer class="titulo">Resultado de Encriptación</footer>
        </div>
</body>
</html>