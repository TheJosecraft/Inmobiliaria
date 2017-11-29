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

    $cons_nom_img = "select imagen from inmuebles where id = $id";

    $nombres = mysqli_query($conexion, $cons_nom_img);
    $nombre = mysqli_fetch_array($nombres);
    mysqli_close($conexion);

    include '../../conexion.php';
    unlink("../../img/inmuebles/$nombre[0]");
    $cons_del_inm = "delete from inmuebles where id = $id";

    mysqli_query($conexion, $cons_del_inm);
    echo 'El registro se ha borrado correctamente';
    mysqli_close($conexion);
    header("refresh:0;url=../../inmuebles.php");
    ?>

</body>

</html>
