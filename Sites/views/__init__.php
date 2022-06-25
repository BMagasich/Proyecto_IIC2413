<?php

require_once __DIR__ . "/config/data.php";

require_once __DIR__ . "/config/conection.php";

session_start();

function go_home() {
    header("Location: " . '/~grupo25/');
    exit();
}


?>