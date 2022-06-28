<?php

require_once __DIR__ . "/../config/data.php";

require_once __DIR__ . "/../config/conection.php";

session_start();

function go_home() {
    header("Location: " . '/~grupo25/');
    exit();
};

function go_inicio() {
    header("Location: https://codd.ing.puc.cl/~grupo25/views/user_nav.php");
    exit();
};

function go_admin() {
    header("Location: https://codd.ing.puc.cl/~grupo25/views/admin_nav.php");
    exit();
};

function go_comp() {
    header("Location: https://codd.ing.puc.cl/~grupo25/views/comp_nav.php");
    exit();
};

function go_reserva() {
    header("Location: https://codd.ing.puc.cl/~grupo25/views/reserva.php");
    exit();
};


?>