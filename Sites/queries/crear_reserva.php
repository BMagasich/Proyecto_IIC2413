<?php
    require("../config/conection.php");
    $id = $_POST["id"];
    $id = intval($id);
    $pasaporte_comprador = $_SESSION["username"];
    $pasaporte1 = $_POST["input_p1"];
    $pasaporte2 = $_POST["input_p2"];
    $pasaporte3 = $_POST["input_p3"];

    $query = "SELECT * FROM crear_reserva($id, '$pasaporte_comprador', '$pasaporte1', '$pasaporte2', '$pasaporte3');";
    $result = $db1 -> prepare($query);
    $result -> execute();

    $data = $result -> fetchAll();

    require_once '../views/__init__.php';
    go_inicio();
?>
