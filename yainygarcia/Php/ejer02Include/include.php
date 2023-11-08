<?php include('../resources/header.php') ?>
<header><h1>Aplicando Include</h1></header>     
<body>
    <p>En este ejercicio se utiliza la funcion include(), que usaremos en HEADER y contenido de la Tabla</p>
    
    <?php
        include('./example.php');

        echo "<table border=1 style=width:50%; border-spacing: none;>";

        echo "<tr>";
        echo    "<td style='background-color: #b1b7f4;'> Nombre del Ticker</td>";
        echo    "<td style='background-color: #b1b7f4;'> Descripcion</td>";
        echo    "<td style='background-color: #b1b7f4;'> Precio</td>";
        echo "</tr>";

        echo "<tr>";
        echo    "<td style='background-color: #b1b7f4;'>".$cedears -> nombreTicker. "</td>";
        echo    "<td style='background-color: #b1b7f4;'>".$cedears -> descripcion. "</td>";
        echo    "<td style='background-color: #b1b7f4;'>".$cedears -> precio. "</td>";
        echo "</tr>";
        echo "</table>"; 
    ?>
    
</body>
</html>