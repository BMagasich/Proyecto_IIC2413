<?php include('../templates/header.html'); 
require '__init__.php';?>


    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="comp_nav.php"> Empresa: <?php echo $_SESSION['username'] ?> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="logout.php">Cerrar Sesion</a></li>
                    </ul>
                </div>
            </div>
        </nav>

<?php
require("../config/conection.php");

// $query = "SELECT *
$query = "SELECT *
        FROM vuelo
        WHERE lower(estado) = 'aceptado';"; // Crear la consulta
$result = $db1 -> prepare($query);
$result -> execute();

$data = $result -> fetchAll();
?>

    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-6">
                <div class="panel">
                    <div class="panel-heading" align="center">
                            <div class="col col-sm-3 col-xs-12">
                                <h4 class="title">Vuelos aceptados</h4>
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
                                            <td name= "codigo"><?php echo "$d[4]" ?></td>
                                            <?php echo"
                                            <td>$d[12]</td>
                                            <td>$d[6]</td>
                                            <td>$d[7]</td>
                                            <td>$d[5]</td>
                                            <td>$d[1]</td>
                                            <td>$d[2]</td>" ?>
                                            <td>
                                            </form>
                                            </td>
                                            <?php echo"
                                        </tr>
                                        </form>";
                                    }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    
<?php
$query = "SELECT *
        FROM vuelo
        WHERE lower(estado) = 'rechazado';"; // Crear la consulta
$result = $db1 -> prepare($query);
$result -> execute();

$data = $result -> fetchAll();
?>

            <div class="col-md-offset-1 col-md-6">
                <div class="panel">
                    <div class="panel-heading" align="center">
                            <div class="col col-sm-3 col-xs-12">
                                <h4 class="title">Vuelos rechazados</h4>
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
                                            <td name= "codigo"><?php echo "$d[4]" ?></td>
                                            <?php echo"
                                            <td>$d[12]</td>
                                            <td>$d[6]</td>
                                            <td>$d[7]</td>
                                            <td>$d[5]</td>
                                            <td>$d[1]</td>
                                            <td>$d[2]</td>" ?>
                                            <td>
                                            </form>
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
    
<?php include('../templates/footer.html'); ?>