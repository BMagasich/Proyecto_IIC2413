<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="/home/grupo92/Sites/assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

        <link href="../css/styles.css" rel="stylesheet" />
    </head>

<?php
session_start();
$msg = $_GET['msg']
?>


<body>
	<h3> Ingrese nombre de usuario y contraseña </h3>
	<br>  
        <?php echo $msg; ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand"> Login </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="./../queries/import_users.php">Importar usuarios</a></li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <section class="section">
            <div class="container"><br><br>
                <h2 class="title text-center">Inicio de sesión</h2>
                <div class="row justify-content-center">
                    <div class="col-sm-offset-1 col-sm-6">
                    <form class="form-signin" role="form" action="./../index.php" method="post">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                        <input type="username" id="username" class="form-control" placeholder="Username" />
                        </div>
                    
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                        <input type="password" id="password" class="form-control" placeholder="Password" />
                        </div>
                    
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">Log in</button>
                        
                        </div>
                    </form>
                    </div>
                </div>
            </div><br><br>
            <footer class="py-5 bg-dark">
                <div class="container px-5"><p class="m-0 text-center text-white">Copyright &copy; Grupo 25 & 92- 2022 - 1</p></div>
            </footer>
        </section>
</body>
