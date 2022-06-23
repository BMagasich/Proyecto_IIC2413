<?php include('../templates/header.html'); ?>

<body>
<?php
        require("../config/conection.php");

        $query = "SELECT nombre_compania, comprador.nombre, count(*)
        from vuelo, reserva, ticket, comprador
        where vuelo.vuelo_id=ticket.vuelo_id AND ticket.numero=reserva.numero_ticket
        AND reserva.pasaporte_comprador=comprador.pasaporte
        group by nombre_compania, comprador.nombre
        having count(*) >= all (select count(*) from vuelo as vuelo2, reserva, ticket, comprador 
        where vuelo2.vuelo_id=ticket.vuelo_id AND ticket.numero=reserva.numero_ticket 
        AND reserva.pasaporte_comprador=comprador.pasaporte AND vuelo2.nombre_compania=vuelo.nombre_compania 
        group by vuelo2.nombre_compania, comprador.nombre)
        order by nombre_compania";

        $result = $db -> prepare($query);
        $result -> execute();

        $data = $result -> fetchAll();
    ?>

    <table align="center">
        <tr>
            <th> Aerolínea </th>
            <th> Cliente </th>
        </tr>

        <?php
            foreach ($data as $d) {
                echo "<tr>
                        <td>$d[0]</td>
                        <td>$d[1]</td>
                      </tr>";
            }
        ?>

    </table>

    <?php include('../templates/footer.html'); ?>