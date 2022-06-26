<?php
    require("../config/conection.php");

    $query = "SELECT * FROM admin_propuestas();";
    $result = $db1 -> prepare($query);
    $result -> execute();

    $data = $result -> fetchAll();

    require_once '__init__.php';
    go_home();
?>
