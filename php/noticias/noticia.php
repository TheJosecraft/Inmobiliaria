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

    menu(2);
        $datos = db_query("select * from noticias where id = $_GET[id]");
    ?>
    <div class="container" id="wrap">
       <?php
        while($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)){
        ?>
        <div class="row">
           <div class="col-xs-12 text-center">
               <img class="img-responsive tocenter img-rounded" src="../../img/noticias/<?php echo $fila['imagen'] ?>" alt="" width="80%">
           </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h1><?php echo $fila['titular'] ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <!--   He usado la función 'nl2br' para formatear el texto y añadir un salto de línea al final de cada párrafo.     -->
        <p class="text-justify"><?php echo nl2br($fila['contenido']) ?></p>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <?php
        footer();
    ?>
</body>
</html>
