<?php include('../templates/header.html'); ?>

<body>
<?php
        require("../config/conection.php");

        $query = "WITH vuelos as (select nombre_compania, count(*) as cant from vuelo
        group by nombre_compania), aceptados as (select nombre_compania, count(*) as acept from vuelo
        where estado = 'aceptado' group by nombre_compania) 
        select vuelos.nombre_compania from vuelos JOIN aceptados
        on vuelos.nombre_compania=aceptados.nombre_compania
        where aceptados.acept*1.0/vuelos.cant*100 >= ALL(select aceptados.acept*1.0/vuelos.cant*100 from
        aceptados join vuelos on aceptados.nombre_compania=vuelos.nombre_compania);";
        $result = $db -> prepare($query);
        $result -> execute();

        $data = $result -> fetchAll();
    ?>

    <table align="center">
        <tr>
            <th> Nombre compañia </th>
            
        </tr>

        <?php
            foreach ($data as $d) {
                echo "<tr>
                        <td>$d[0]</td>
                        
                      </tr>";
            }
        ?>

    </table>

    <?php include('../templates/footer.html'); ?>