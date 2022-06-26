<?php
        require("../config/conection.php");

        $query = "DELETE FROM usuarios;";

        $query = "SELECT * FROM crear_usuarios();";
        $result = $db1 -> prepare($query);
        $result -> execute();

        $data = $result -> fetchAll();

        require_once '__init__.php';
        go_home();
    ?>
