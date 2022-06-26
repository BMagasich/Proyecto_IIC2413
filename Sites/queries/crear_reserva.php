<?php
    require("../config/conection.php");

    $query = "SELECT * FROM validacion_usuarios();";
    $result = $db1 -> prepare($query);
    $result -> execute();

    $data = $result -> fetchAll();

    require_once '../views/__init__.php';
    go_home();
?>
