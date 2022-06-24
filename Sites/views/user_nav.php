<?php include('../templates/header.html'); ?>



<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="index.php">Proyecto Grupo 92</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="tabla.php">Reserva Vuelo</a></li>
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
                        <p class="lead text-white-50 mb-4">Pasaporte: ..........</p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Features section-->

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
                                    <th>Reserva</th>
                                    <th>Descripcion</th>
                                    <th>Elige</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Primer valor de la tabla -->
                                <tr>
                                    <td>Reserva 1</td>
                                    <td>Aqui podria haber una descripcion</td>
                                    <td><form method="get" action="consultas/consulta1.php"> <button type="submit" class="btn btn-secondary">REVISAR</button></form></td>
                                </tr>

                                <tr>
                                    <td>Reserva 1</td>
                                    <td>Aqui podria haber una descripcion</td>
                                    <td><form method="get" action="consultas/consulta1.php"> <button type="submit" class="btn btn-secondary">REVISAR</button></form></td>
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