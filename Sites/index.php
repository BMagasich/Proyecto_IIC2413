<?php
require 'views/__init__.php';
$request_method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

if ($request_method == 'POST') {

    $user = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT validacion_usuarios($user, $password);";
    $result = $db1 -> prepare($query);
    $result -> execute();

    $data = $result -> fetchAll();

    $_SESSION['user_id'] = $result;
    $_SESSION['user_name'] = $password;

    if (!empty($result)) { 
        go_inicio();
    } else {
        go_home();}
} elseif ($request_method == 'GET') {

include('templates/header.html'); ?>

<body>
	<br>  
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand"> Login </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="queries/import_users.php">Importar usuarios</a></li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <section class="section">
            <div class="container"><br><br>
                <h2 class="title text-center">Inicio de sesión</h2> 
                <div class="row justify-content-center">
                    <div class="col-sm-offset-1 col-sm-6">
                    <form class="form-signin" role="form" method="post">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                        <input type="username" id="username" class="form-control" placeholder="Username" name="username" />
                        </div>
                    
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                        <input type="password" id="password" class="form-control" placeholder="Password" name="password" />
                        </div>
                    
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">Log in</button>
                        
                        </div>
                    </form>
                    </div>
                </div>
            </div><br><br>
        </section>
<?php include('templates/footer.html'); }?>
