<?php include('../templates/header.html'); ?>

<body>
<?php
        require("../config/conection.php");
        $codigo_ICAO = $_POST["codigo_ICAO"];
        $nombre_compania = $_POST["nombre"];
        $codigo_ICAO = strtoupper($codigo_ICAO);
        $nombre_compania = strtolower($nombre_compania);

        $query = "SELECT *
                  FROM vuelo
                  WHERE lower(nombre_compania) LIKE '%$nombre_compania%' 
                  AND estado = 'aceptado' AND aerodromo_llegada_id 
                  IN (
                      SELECT id 
                      FROM aerodromo
                      WHERE codigo_ICAO LIKE '%$codigo_ICAO%'
                  );"; 
        $result = $db -> prepare($query);
        $result -> execute();

        $data = $result -> fetchAll();
    ?>

    <table align='center'>
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
    <!--  -->
    

    <?php include('../templates/footer.html'); ?>
