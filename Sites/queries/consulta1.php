<?php include('../templates/header.html'); ?>

<body>
<?php
        require("../config/conection.php");

        $query = "SELECT *
                  FROM vuelo
                  WHERE estado LIKE 'pendiente';";
        $result = $db -> prepare($query);
        $result -> execute();

        $data = $result -> fetchAll();
    ?>

    <table align ='center'>
        <tr>
            <th> vuelo_id </th>
            <th> aerodromo_salida_id </th>
            <th> aerodromo_llegada_id </th>
            <th> ruta_id </th>
            <th> codigo_vuelo </th>
            <th> codigo_aeronave </th>
            <th> fecha_salida </th>
            <th> fecha_llegada </th>
            <th> velocidad </th>
            <th> altitud </th>
            <th> estado </th>
            <th> valor </th>
            <th> nombre_compania </th>
        </tr>

        <?php
            foreach ($data as $d) {
                echo "<tr>
                        <td>$d[0]</td>
                        <td>$d[1]</td>
                        <td>$d[2]</td>
                        <td>$d[3]</td>
                        <td>$d[4]</td>
                        <td>$d[5]</td>
                        <td>$d[6]</td>
                        <td>$d[7]</td>
                        <td>$d[8]</td>
                        <td>$d[9]</td>
                        <td>$d[10]</td>
                        <td>$d[11]</td>
                        <td>$d[12]</td>
                        <td>$d[13]</td>
                      </tr>";
            }
        ?>

    </table>
    
    <?php include('../templates/footer.html'); ?>
