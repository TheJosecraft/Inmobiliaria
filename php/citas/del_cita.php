<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Inmueble</title>
</head>

<body>
    <?php

    include '../funciones.php';

    //Variable que almacena la id de la cita a eliminar
    $id = $_GET['id'];

    //Consulta para eliminar la cita con la id alamacenada en la variable $id
    db_query("delete from citas where id = $id");

    //Recarga de la página para devolver al usuario a la página de citas
    header("refresh:0;url=citas.php");
    ?>

</body>

</html>
