<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php

        $cons_sel_nom = "select direccion from inmuebles
                        where id = $_GET[id]";
        include 'conexion.php';
        $titulos = mysqli_query($conexion, $cons_sel_nom);
        $titulo = mysqli_fetch_array($titulos);

        echo $titulo[0];
        mysqli_close($conexion);
        ?></title>
            <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
   <?php
    include 'funciones.php';
    menu();

     $cons_sel_nom = "select * from inmuebles
                        where id = $_GET[id]";
        include 'conexion.php';
        $datos = mysqli_query($conexion, $cons_sel_nom);

    ?>
    <div class="container text-center">
       <?php
        while($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)){
        ?>
        <img class="img-responsive center-block" src="img/inmuebles/<?php echo $fila['imagen'] ?>" alt="" width="70%">
        <h1><?php echo $fila['direccion'] ?></h1>
        <div class="row">
            <div class="col-sm-3">
                <h3>3 Dormitorios</h3>
                <hr>
            </div>
            <div class="col-sm-3">
                <h3>3 Baños</h3>
                <hr>
            </div>
            <div class="col-sm-3">
                <h3>150m<sup>2</sup></h3>

                <hr>
            </div>
            <div class="col-sm-3">
                <h3><?php echo $fila['precio'] ?> €</h3>
                <hr>
            </div>


        </div>
        <p class="text-left"><?php echo $fila['descripcion'] ?></p>
        <?php

            }
            footer();
        ?>
    </div>
</body>
</html>
