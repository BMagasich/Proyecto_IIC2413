<?php include('../templates/header.html'); ?>

<body>
<?php
        require("../config/conection.php");
        $compania = $_POST["compania"];
        $compania = strtoupper($compania);

        $query = "SELECT DISTINCT(estado), COUNT(*) as cantidad
                  FROM vuelo
                  WHERE nombre_compania LIKE '%$compania%' 
                  GROUP BY estado";
        $result = $db -> prepare($query);
        $result -> execute();

        $data = $result -> fetchAll();
    ?>

    <table align="center">
        <tr>
            <th> Estado </th>
            <th> Cantidad de vuelos </th>
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