<?php 
require '__init__.php';
include('../templates/header.html'); 

?>




<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="user_nav.php">Proyecto Grupo 92</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="logout.php">Cerrar Sesion</a></li>
                    <li class="nav-item"><a class="nav-link" href="reserva.php">Reserva Vuelo</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header Inicio-->
    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center my-5">
                        <h1 class="display-5 fw-bolder text-white mb-2">Usuario XX</h1>
                        <p class="lead text-white-50 mb-4">Pasaporte: <?php echo $_SESSION["username"]?></p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Features section-->
    <?php
        require("../config/conection.php");

        $usuario = $_SESSION["username"];
        // $query = "SELECT *
        $query = "SELECT *
                  FROM reserva
                  WHERE pasaporte_comprador = $usuario;"; // Crear la consulta
        $result = $db1 -> prepare($query);
        $result -> execute();
        $data = $result -> fetchAll();
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="panel">
                    <div class="panel-heading" align="center">
                            <div class="col col-sm-3 col-xs-12">
                                <h4 class="title"> Reservas </h4>
                            </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">
                        <thead>
                                <!-- Aqui van el nombre de cada atributo de la tabla -->
                                <tr>
                                    <th>id</th>
                                    <th>codigo</th>
                                    <th>n° ticket</th>
                                    <th>pasaporte</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php
                                foreach ($data as $d) {
                                    echo "<tr>
                                            <td>$d[0]</td>
                                            <td>$d[1]</td>
                                            <td>$d[2]</td>
                                            <td>$d[3]</td>
                                        </tr>";
                                    }
                            ?>
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