<?php
include '../funciones.php';
sesiones(true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    menu(4);

    $datos = db_query("select * from inmuebles where id = $_GET[id]");

    ?>
    <div class="container text-center" id="wrap">
       <?php
        while($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)){
        ?>
        <img class="img-responsive tocenter img-rounded" src="../../img/inmuebles/<?php echo $fila['imagen'] ?>" alt="" width="70%">
        <h1><?php echo $fila['direccion'] ?></h1>
        <div class="row">
           <!--Genero números aleatorios para generar información del inmueble de forma dinámica.-->
            <div class="col-xs-6 col-md-3">
                <h3><?php echo rand(2, 9); ?> Dormitorios</h3>
                <hr>
            </div>
            <div class="col-xs-6 col-md-3">
                <h3><?php echo rand(2, 4); ?> Baños</h3>
                <hr>
            </div>
            <div class="col-xs-6 col-md-3">
                <h3><?php echo rand(100, 1500); ?>m<sup>2</sup></h3>

                <hr>
            </div>
            <div class="col-xs-6 col-md-3">
                <h3><?php echo number_format($fila['precio'], 2, ',', '.') ?> €</h3>
                <hr>
            </div>


        </div>
        <!--   He usado la función 'nl2br' para formatear el texto y añadir un salto de línea al final de cada párrafo.     -->
        <p class="text-left"><?php echo nl2br($fila['descripcion']) ?></p>
        <?php

            }
        ?>
    </div>
    <?php
    footer();
    ?>
</body>
</html>
