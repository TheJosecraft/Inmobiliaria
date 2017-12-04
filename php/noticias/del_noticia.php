<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Inmueble</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.js"></script>
</head>

<body>
    <?php
    include '../../conexion.php';

    $id = $_GET['id'];

    include '../../conexion.php';
    $cons_del_inm = "delete from noticias where id = $id";

    mysqli_query($conexion, $cons_del_inm);
    header("refresh:0;url=../../noticias.php");
    ?>

</body>

</html>
