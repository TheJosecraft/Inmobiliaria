<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../funciones.php'; ?>
    <title><?php

        $titulos = db_query("select titular from noticias where id = $_GET[id]");
        $titulo = mysqli_fetch_array($titulos);

        echo $titulo[0];
        db_close();
        ?></title>

        <?php cabecera(); ?>
</head>
<body>
   <?php

    menu();
        $datos = db_query("select * from noticias where id = $_GET[id]");
    ?>
    <div class="container text-center">
       <?php
        while($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)){
        ?>
        <img class="img-responsive" src="../../img/noticias/<?php echo $fila['imagen'] ?>" alt="">
        <h1><?php echo $fila['titular'] ?></h1>
        <p class="text-left"><?php echo $fila['contenido'] ?></p>
        <?php
        }
    footer();
        ?>
    </div>
</body>
</html>
