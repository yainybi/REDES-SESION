<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROGRAMACION EN AMBIENTE DE REDES</title>
</head>
<header><h1>Ejercicios Básicos de PHP</h1></header>
<body>
    <h2>Datos curiosos sobre PHP</h2>
    <ol>
        <li>Todo lo escrito fuera de las marcas de php es entregado en la respuesta http sin pasar por el procesador php.</li>
        <li>Acá no estamos usando un concatenador, estamos definidiendo un variable y le aplicamos estilo sobre etiquetas php.  
                <?php
                    $miVariable = "Yainybi"; 
                echo "<span style=color:red>$miVariable</span>"
                ?>
        </li>
        <li>Acá hacemos un [echo] del contenido de la variable [ <?php echo $miVariable;?> ] en php</li>


        <li> <h3>Usando Concatenadores [.] </h3>
            <ul>
                <li>
                    <?php 
                         echo "<span style=color:blue>\$miVariable</span>". " : ".$miVariable 
                    ?>
                </li>
            </ul>
        </li>

        <li><h3>Variables de tipo Boolean</h3>
            <ul>
                <li>Is TRUE
                    <?php
                        $miVariable = true;
                        echo "<span style=color:green>\$miVariable</span> : ". ($miVariable ? 'true' : 'false');
                    ?>
                </li>

                <li>Is FALSE
                    <?php
                        $miVariable = false;
                        echo "<span style=color:green>\$miVariable</span> : ". ($miVariable ? 'true' : 'false');
                    ?>
                </li>
            </ul>
        </li>

        <li><h3>Constantes </h3>
            <?php
                define(MI_CONSTANTE, "VALOR_CONSTANTE");?>
            <ul>
                <li><?php echo "<span style=color:brown>MI_CONSTANTE</span> : ".MI_CONSTANTE; ?></li>
                <li>Tipo de dato de la variable <?php echo "<span style=color:brown>MI_CONSTANTE</span> : ".gettype(MI_CONSTANTE);?> </li>
            </ul>
        </li>

        <li><h3>Arreglos</h3></li>
            <?php $aFrutas = ["Pera", "Manzana", "Cambur"];?>
            <ul>
            <?php
                echo "<li> <span style=color:purple> \$aFrutas[0] </span> : ".$aFrutas[0]."</li>";

                echo "<li> <span style=color:purple>\$aFrutas[1]</span> : ".$aFrutas[1]."</li>";

                echo "<li> <span style=color:purple>\$aFrutas[1]</span> : ".$aFrutas[2]."</li>";

                echo "<li> Tipo de Dato <span style=color:purple>\$aFrutas</span> : ".gettype($aFrutas)."</li>";

                echo "<li> Se agregaron dos elementos más, y se muestran a continuación: </li>";
                array_push($aFrutas, "Fresa");
                array_push($aFrutas, "Mandarina");

                echo "<ul>";
                foreach($aFrutas as $fruta) {
                    echo "<li>" . $fruta . "</li>";
                    }

                echo "</ul>";    
            ?>
            </ul>

        <li><h3>Tablas</h3>
            <?php
                $palabrasEspañol = ["Hola", "Adios", "Buen dia", "Buenas noches"];
                $palabrasIngles = ["Hello", "Goodbye", "Good morning", "Good night"];
                $palabrasPortugues = ["Olá", "Tchau", "bom Dia", "boa noite"];
                $palabrasFrances = ["Salut", "adieu", "Bonjour", "bonne nuit"];

                $grupoIdiomas = [];

                array_push($grupoIdiomas,  $palabrasEspañol);
                array_push($grupoIdiomas,  $palabrasIngles);
                array_push($grupoIdiomas,  $palabrasPortugues);
                array_push($grupoIdiomas,  $palabrasFrances);
            ?>

            <table border=1 style="width:50%; border-spacing: none;">
                <thead>
                    <tr>
                        <td style="background-color: #b1b7f4;"><?php echo "Español"; ?></td>
                        <td style="background-color: #b1b7f4;"><?php echo "Ingles"; ?></td>
                        <td style="background-color: #b1b7f4;"><?php echo "Portugues"; ?></td>
                        <td style="background-color: #b1b7f4;"><?php echo "Frances"; ?></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $grupoIdiomas[0][0]; ?></td>
                        <td><?php echo $grupoIdiomas[1][0]; ?></td>
                        <td><?php echo $grupoIdiomas[2][0]; ?></td>
                        <td><?php echo $grupoIdiomas[3][0]; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $grupoIdiomas[0][1]; ?></td>
                        <td><?php echo $grupoIdiomas[1][1]; ?></td>
                        <td><?php echo $grupoIdiomas[2][1]; ?></td>
                        <td><?php echo $grupoIdiomas[3][1]; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $grupoIdiomas[0][2]; ?></td>
                        <td><?php echo $grupoIdiomas[1][2]; ?></td>
                        <td><?php echo $grupoIdiomas[2][2]; ?></td>
                        <td><?php echo $grupoIdiomas[3][2]; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $grupoIdiomas[0][3];; ?></td>
                        <td><?php echo $grupoIdiomas[1][3];; ?></td>
                        <td><?php echo $grupoIdiomas[2][3];; ?></td>
                        <td><?php echo $grupoIdiomas[3][3];; ?></td>
                    </tr>
                </tbody>
            </table>
        </li>  

        <li><h3>Variables de tipo arreglo asociativo</h3>
            <?php
                $arengloDeLiquidacion = [
                    "legEmpleado" => ["c0001", "c0881", "c05151", "c0841"], 
                    "apellido" => ["Witt", "Garcia", "Ruiz", "Hernandez"], 
                    "salarioBasico" => [20000, 80000, 50000, 70000],
                    "fechaIngr" => ["02/04/2023", "02/05/2023", "08/04/2023", "07/07/2023"]
                ];

                echo "<ul>";


                echo     "<li>Codigo del empleado: ".$arengloDeLiquidacion["legEmpleado"][0]."</li>";
                echo     "<li>Apellido del empleado: ".$arengloDeLiquidacion["apellido"][0]."</li>";
                echo     "<li>Fecha de Ingreso: ".$arengloDeLiquidacion["fechaIngr"][0]."</li>";
                echo     "<li>Salario Basico: ".$arengloDeLiquidacion["salarioBasico"][0]."</li>";
                echo    "<li>Cantidad de Elementos: ".sizeof($arengloDeLiquidacion)."</li>";
                echo    "<li>Tipo de Dato: ".gettype($arengloDeLiquidacion)."</li> <hr>";

                echo    "<li>Codigo del empleado: ".$arengloDeLiquidacion["legEmpleado"][3]."</li>";
                echo    "<li>Apellido del empleado: ".$arengloDeLiquidacion["apellido"][3]."</li>";
                echo    "<li>Fecha de Ingreso: ".$arengloDeLiquidacion["fechaIngr"][3]."</li>";
                echo    "<li>Salario Basico: ".$arengloDeLiquidacion["salarioBasico"][3]."</li>";
                echo    "<li> Cantidad de Elementos: ".sizeof($arengloDeLiquidacion)."</li>";
                echo    "<li>Tipo de Dato: ".gettype($arengloDeLiquidacion)."</li>";
                echo    "</ul>";
            ?>
        </li>

        <li><h3>Expresiones Aritmeticas</h3>
            <?php
                    $x = 3;
                    $y = 4;
                        echo "<ul> <li>La variable \$x tiene el siguiente valor: ".$x."</li>";
                        echo "<li>La variable \$y tiene el siguiente valor: ".$y."</li>";
                        echo "<li>La variable \$x tiene el siguiente tipo: ".gettype($x)."</li>";
                        echo "<li>La variable \$y tiene el siguiente tipo: ".gettype($y)."</li>";
                        echo "<li>Asi se usa una expresion aritmetica, ejemplo de Suma(\$x + \$y) =".($x+$y)."</li>";
                        echo "<li>Asi se usa una expresion aritmetica, ejemplo de Multiplicación(\$x * \$y) =".($x*$y)."</li>";
                        echo "<li>Asi se usa una expresion aritmetica, ejemplo de División(\$x / \$y) =".($x/$y)."</ul>";
            ?>
        </li>
    </ol>
</body>
<footer>
    <h2>Datos del Alumno</h2>
    <div>Yainy Garcia</div>
    <div><a href="mailto:yainy.garcia@comunidad.ub.edu.ar">yainy.garcia@comunidad.ub.edu.ar</a></div>
</footer>
</html>