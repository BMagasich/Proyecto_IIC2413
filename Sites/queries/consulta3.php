<?php include('../templates/header.html'); ?>

<body>
<?php
    require("../config/conection.php");
    $reserva = $_POST["reserva"];
    $reserva = strtoupper($reserva);


    $query = "SELECT reserva.numero_ticket, pasajero.nombre, vuelo.valor 
    FROM reserva JOIN ticket ON reserva.numero_ticket = ticket.numero
    JOIN pasajero ON ticket.pasaporte_pasajero = pasajero.pasaporte
    JOIN vuelo ON ticket.vuelo_id = vuelo.vuelo_id 
    WHERE codigo_reserva LIKE '%$reserva%';";

    $result = $db -> prepare($query);
    $result -> execute();

    $data = $result -> fetchAll();
    ?>

    <table align="center">
        <tr>
            <th> numero_ticket </th>
            <th> nombre </th>
            <th> valor </th>
        </tr>

        <?php
            foreach ($data as $d) {
                echo "<tr>
                        <td>$d[0]</td>
                        <td>$d[1]</td>
                        <td>$d[2]</td>
                      </tr>";
            }
        ?>

    </table>

    <?php include('../templates/footer.html'); ?>
