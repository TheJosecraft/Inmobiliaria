<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Inmueble</title>
    <?php
    include '../funciones.php';
        cabecera();
    ?>
</head>

<body>
    <?php

    $id = $_GET['id'];

    $nombres = db_query("select imagen from inmuebles where id = $id");
    $nombre = mysqli_fetch_array($nombres);
    db_close();

    unlink("../../img/inmuebles/$nombre[0]");

    db_query("delete from inmuebles where id = $id");
    db_close();
    header("refresh:0;url=inmuebles.php");
    ?>

</body>

</html>
