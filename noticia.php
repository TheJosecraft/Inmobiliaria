<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php

        $cons_sel_nom = "select titular from noticias
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

     $cons_sel_nom = "select * from noticias
                        where id = $_GET[id]";
        include 'conexion.php';
        $datos = mysqli_query($conexion, $cons_sel_nom);

    ?>
    <div class="container text-center">
       <?php
        while($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)){
        ?>
        <img class="img-responsive" src="img/noticias/<?php echo $fila['imagen'] ?>" alt="">
        <h1><?php echo $fila['titular'] ?></h1>
        <p class="text-left"><?php echo $fila['contenido'] ?></p>
        <?php

            }
            footer();
        ?>
    </div>
</body>
</html>
