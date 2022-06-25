<?php
    include("templates/header.html");
?>

<body>
    <h1 align = 'center'> Plataforma de gestión comercial de vuelos </h1>
    <h2 style='text-align:center'>Aquí encontrarás información sobre vuelos, 
        aeropuertos, aerolineas, reservas y más. </h2>

    <br>
    <br>
    <h3 align='center'> ¿Que vuelos están pendientes de ser aprobados por la DGCA?</h3>
    <form align="center" action="./../queries/consulta1.php" method="post">
        <input type="submit" name="Buscar">
    </form>


    <br>
    <br>
    <h3 align='center'> Vuelos aceptados de una aerolinea que tenga como destino
        el aerodromo con el siguiente codigo ICAO.
    </h3>

    <?php
    require("config/conection.php");
    $query = "SELECT DISTINCT nombre FROM compania"; // Crear la consulta
    $result = $db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll();
    ?>

    <form align="center" action="queries/consulta2.php" method="post">
        Seleccionar aerolínea:
        <select name='nombre'>
            <?php
            foreach ($dataCollected as $d) {
                echo "<option value=$d[0]>$d[0]</option>";
                        
            }
            ?>
        </select>
        Codigo ICAO:
        <input type='text' name='codigo_ICAO'>
        <br><br>
        <input type="submit" name="Buscar">
    </form>


    <br>
    <br>
    <h3 align='center'> Ingrese su código de reserva
         para ver sus tickets, pasajeros y costos.
    </h3>
    <form align="center" action="queries/consulta3.php" method="post">
        Codigo de reserva:
        <input type='text' name="reserva">
        <br><br>
        <input type="submit" name="Buscar">
    </form>


    <br>
    <br>
    <h3 align='center'> Cliente con más tickets comprados 
        por cada aerolínea.
    </h3>
    <form align="center" action="queries/consulta4.php" method="post">
        <input type="submit" name="Buscar">
    </form>

    <br>
    <br>
    <h3 align='center'> Ingrese el nombre de una aerolínea para
        ver la cantidad de vuelos agrupados por estado.
    </h3>
    <form align="center" action="queries/consulta5.php" method="post">
        Nombre aerolínea:
        <input type='text' name='compania'>
        <br><br>
        <input type="submit" name="Buscar">
    </form>

    <br>
    <br>
    <h3 align='center'> Aerolínea con mayor porcentaje de
        vuelos aceptados.
    </h3>
    <form align="center" action="queries/consulta6.php" method="post">
        <input type="submit" name="Buscar">
    </form>
</body>

</html>
