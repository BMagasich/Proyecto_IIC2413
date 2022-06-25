<?php include('../templates/header.html'); ?>

<body>
<?php
        require("../config/conection.php");

        $query = "SELECT * FROM crear_usuarios();";
        $result = $db1 -> prepare($query);
        $result -> execute();

        $data = $result -> fetchAll();
    ?>

<?php include('../templates/footer.html'); ?>