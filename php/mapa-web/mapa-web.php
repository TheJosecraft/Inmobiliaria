<?php
include '../funciones.php';
sesiones(true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Mapa web</title>
    <?php
cabecera();
?>
</head>

<body>
    <?php menu(0); ?>
    <div class="container" id="wrap">
        <h1>Mapa web</h1>
        <div class="row center-block">
            <div class="col-sm-6 col-md-4 text-center"><h1><a href="../../index.php"><i class="fa fa-file-o"></i> Inicio</a></h1></div>
            <div class="col-sm-6 col-md-4 text-center"><h1><a href="../inmuebles/inmuebles.php"><i class="fa fa-file-o"></i> Inmuebles</a></h1></div>
            <div class="col-sm-12 col-md-4 text-center"><h1><a href="../contacto/contacto.php"><i class="fa fa-file-o"></i> Contacto</a></h1></div>
        </div>
    </div>
    <?php footer(); ?>
</body>

</html>
