<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../funciones.php'; ?>
    <title>
       <?php
        $titulos = db_query("select direccion from inmuebles where id = $_GET[id]");
        $titulo = mysqli_fetch_array($titulos);

        echo $titulo[0];
        db_close();
        ?></title>

        <?php cabecera(); ?>
</head>
<body>
   <?php
    menu();

    $datos = db_query("select * from inmuebles where id = $_GET[id]");

    ?>
    <div class="container text-center">
       <?php
        while($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)){
        ?>
        <img class="img-responsive center-block" src="../../img/inmuebles/<?php echo $fila['imagen'] ?>" alt="" width="70%">
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
                <h3><?php echo number_format($fila['precio'], 2, ',', '.') ?> €</h3>
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
