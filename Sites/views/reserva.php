<?php
require '__init__.php';
$request_method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

if ($request_method == 'POST') {

    $ciudad_salida = $_POST["ciudad_salida"];
    $ciudad_llegada = $_POST["ciudad_llegada"];
    $fecha = $_POST["fecha_despegue"];

    $query = "SELECT *
            FROM vuelo  
            WHERE aerodromo_salida_id = '$ciudad_salida' AND aerodromo_llegada_id = '$ciudad_llegada' AND fecha_salida = '$fecha' AND estado = 'aceptado';";
    $result = $db1 -> prepare($query);
    $result -> execute();
    $data = $result -> fetchAll();

    $_SESSION["filtrado"] = $data;

} elseif ($request_method == 'GET') {
    include('../templates/header.html'); ?>
<body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="user_nav.php">Proyecto Grupo 92 </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="user_nav.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="logout.php">Cerrar Sesion</a></li>
                    </ul>
                </div>
            </div>
        </nav>

<?php
        require("../config/conection.php");

        $query = "SELECT aerodromos.ciudad, aerodromos.id FROM vuelos JOIN aerodromos ON aerodromo_salida = aerodromo_id WHERE estado = 'aceptado';";
        $result = $db2 -> prepare($query);
        $result -> execute();
        $salida = $result -> fetchAll();

        $query = "SELECT aerodromos.ciudad, aerodromos.id FROM vuelos JOIN aerodromos ON aerodromo_llegada = aerodromo_id WHERE estado = 'aceptado';";
        $result = $db2 -> prepare($query);
        $result -> execute();
        $llegada = $result -> fetchAll();
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="panel">
                    <div class="panel-heading" align="center">
                    <form method="post">
                    <div class="input-group mb-3">
                        <select name="ciudad_salida">
                            <?php
                            foreach ($salida as $s) {
                                echo "<option value=$s[1]>$s[0]</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Ciudad Salida
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <?php
                                foreach ($salida as $s) {?>
                                    <a class="dropdown-item" value=<?php echo "$s[1]"?>> <?php echo "$s[0]"?></a><?php;
                                }
                                ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <select name="ciudad_llegada">
                            <?php
                            foreach ($llegada as $l) {
                                echo "<option value=$l[1]>$l[0]</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="fecha_despegue" class="form-control" placeholder="dd/mm/yyyy" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Filtrar</button>
                    </div>
                    </form>
                    </div>
                    <div class="panel-body table-responsive">
                    <table class="table">
                        <?php if (isset($_SESSION["filtrado"])) { 
                            $data = $_SESSION["filtrado"];?>
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
                                    <?php echo "<tr>"?>
                                    <form method="post" action="../queries/crear_reserva.php">
                                    <?php echo "
                                        <td>$d[0]</td>
                                        <td>$d[4]</td>
                                        <td>$d[12]</td>
                                        <td>$d[6]</td>
                                        <td>$d[7]</td>
                                        <td>$d[5]</td>
                                        <td>$d[1]</td>
                                        <td>$d[2]</td>" ?>
                                        <td>
                                        <div class="input-group mb-3">
                                        <input type="text" name="input_p1" class="form-control" placeholder="pasaporte 1" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <input type="text" name="input_p2" class="form-control" placeholder="pasaporte 2" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <input type="text" name="input_p3" class="form-control" placeholder="pasaporte 3" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                        <button type="submit" class="btn btn-secondary">Reservar</button>
                                        </div>
                                        </div>
                                        </form>
                                        </td>
                                        <?php echo"
                                        </tr>
                                        </form>";
                                    }?>
                            </tbody>
                            <?php } else {?>
                            <thead>
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
                            </tbody>
                            <?php ;}?>
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