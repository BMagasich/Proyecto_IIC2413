<?php include('../templates/header.html'); ?>


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


    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="panel">
                    <div class="panel-heading" align="center">
                            <div class="col col-sm-3 col-xs-12">
                                <h4 class="title"> Puedes elegir una Propuesta de Vuelo </h4>
                            </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <thead>
                                <!-- Aqui van el nombre de cada atributo de la tabla -->
                                <tr>
                                    <th>Vuelo</th>
                                    <th>Propuesta</th>
                                    <th>Elige</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Primer valor de la tabla -->
                                <tr>
                                    <td>Propuestas Pendientes</td>
                                    <td>Muestra todas las propuestas de vuelo pendientes de ser aprobadas por la DGAC</td>
                                    <td><form method="get" action="consultas/consulta1.php"> <button type="submit" class="btn btn-secondary">IR</button></form></td>
                                </tr>

                                <tr>
                                    <td>Propuestas Aceptadas</td>
                                    <td>Dados un código ICAO de un aeródromo de origen y de destino, muestra propuestas de vuelo aceptadas que viajan entre ellos</td>
                                    <td><form method="post" action="consultas/consulta2.php">
                                        <div class="input-group mb-3">
                                        <input type="text" name="input_icao1" class="form-control" placeholder="Código ICAO" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <input type="text" name="input_icao2" class="form-control" placeholder="Código ICAO" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-secondary">IR</button>
                                        </div>
                                        </div></form>
                                    </td>
                                </tr>

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