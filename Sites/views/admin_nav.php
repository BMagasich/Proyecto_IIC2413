<?php 
require 'views/__init__.php';
$request_method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

if ($request_method == 'POST') {

    $code = $_POST["codigo"];

    if (isset($_POST["aceptado"])) {
        $respuesta = "aceptado";

        $query = "SELECT * FROM admin_propuestas($code, $respuesta);";
        $result = $db1 -> prepare($query);
        $result -> execute();} 
        else {
            $respuesta = "rechazado";
            $query = "SELECT * FROM admin_propuestas($code, $respuesta);";
            $result = $db1 -> prepare($query);
            $result -> execute();
    }
    go_admin();
} elseif ($request_method == 'GET') {
include('../templates/header.html'); ?>


    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">Proyecto Grupo 92: Cuenta de Administrador</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="tabla.php">Consultas</a></li>
                    </ul>
                </div>
            </div>
        </nav>

<?php
require("../config/conection.php");

// $query = "SELECT *
$query = "SELECT *
        FROM vuelos
        WHERE lower(estado) = 'pendiente';"; // Crear la consulta
$result = $db2 -> prepare($query);
$result -> execute();

$data = $result -> fetchAll();
?>

        <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="panel">
                    <div class="panel-heading" align="center">
                            <div class="col col-sm-3 col-xs-12">
                                <h4 class="title">Propuestas Pendientes</h4>
                            </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <thead>
                                <!-- Aqui van el nombre de cada atributo de la tabla -->
                                <tr>
                                    <th>id</th>
                                    <th>codigo</th>
                                    <th>compañía</th>
                                    <th>fecha_salida</th>
                                    <th>fecha_llegada</th>
                                    <th>aeronave</th>
                                    <th>aerodromo_salida</th>
                                    <th>aerodromo_llegada</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php
                                foreach ($data as $d) { ?>
                                <form method="post">
                                    <?php echo "<tr>
                                            <td>$d[0]</td>" ?>
                                            <td name= "codigo"><?php echo "$d[1]" ?></td>
                                            <?php echo"
                                            <td>$d[2]</td>
                                            <td>$d[3]</td>
                                            <td>$d[4]</td>
                                            <td>$d[5]</td>
                                            <td>$d[6]</td>
                                            <td>$d[7]</td>" ?>
                                            <td>
                                            <button type="submit" name="aceptado" class="btn btn-secondary">ACEPTAR</button>
                                            <button type="submit" name="rechazado" class="btn btn-secondary">RECHAZAR</button></form>
                                            </td>
                                            <?php echo"
                                        </tr>
                                        </form>";
                                    }?>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col col-sm-6 col-xs-6"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
    

    <?php include('../templates/footer.html'); }?>