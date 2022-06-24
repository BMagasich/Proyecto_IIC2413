<?php include('../templates/header.html'); ?>


    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php"> Empresa: XXXXXXXX </a>
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
            <div class="col-md-offset-1 col-md-6">
                <div class="panel">
                    <div class="panel-heading" align="center">
                            <div class="col col-sm-3 col-xs-12">
                                <h4 class="title"> Vuelos Aprobados </h4>
                            </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <thead>
                                <!-- Aqui van el nombre de cada atributo de la tabla -->
                                <tr>
                                    <th>Vuelo</th>
                                    <th>Elige</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Primer valor de la tabla -->
                                <tr>
                                    <td>Vuelo 1</td>
                                    <td><form method="get" action="consultas/consulta1.php"> <button type="submit" class="btn btn-secondary">VER</button></form></td>
                                </tr>

                                <tr>
                                    <td>Vuelo 2</td>
                                    <td><form method="get" action="consultas/consulta1.php"> <button type="submit" class="btn btn-secondary">VER</button></form></td>
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


            <div class="col-md-offset-1 col-md-6">
                <div class="panel">
                    <div class="panel-heading" align="center">
                            <div class="col col-sm-3 col-xs-12">
                                <h4 class="title"> Vuelos Rechazados </h4>
                            </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <thead>
                                <!-- Aqui van el nombre de cada atributo de la tabla -->
                                <tr>
                                    <th>Vuelo</th>
                                    <th>Elige</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Primer valor de la tabla -->
                                <tr>
                                    <td>Vuelo 1</td>
                                    <td><form method="get" action="consultas/consulta1.php"> <button type="submit" class="btn btn-secondary">VER</button></form></td>
                                </tr>

                                <tr>
                                    <td>Vuelo 2</td>
                                    <td><form method="get" action="consultas/consulta1.php"> <button type="submit" class="btn btn-secondary">VER</button></form></td>
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