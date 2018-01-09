<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mapa web</title>
    <?php include '../funciones.php';
    cabecera();
    ?>
</head>
<body>
    <?php menu(0); ?>
    <div class="container" id="wrap">
       <h1>Mapa web</h1>
            <li><a href="../../index.php">Inicio</a></li>
            <div class="col-sm-6 col-md-3">
                <li><a href="../noticias/noticias.php"><span class="fa fa-folder"></span> Noticias</a></li>
                <ul class="folder">
                    <li><a href="../noticias/noticias.php"><span class="fa fa-file-o"></span> Nueva noticias</a></li>
                    <li><a href="../noticias/noticias.php"><span class="fa fa-file-o"></span> Buscar noticia</a></li>
                    <li><a href="../noticias/noticias.php"><span class="fa fa-file-o"></span> Modificar noticia</a></li>
                    <li><a href="../noticias/noticias.php"><span class="fa fa-file-o"></span> Borrar noticia</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-3">
                <li><a href="../clientes/clientes.php"><span class="fa fa-folder"></span> Clientes</a></li>
                <ul class="folder">
                    <li><a href="../clientes/clientes.php"><span class="fa fa-file-o"></span> Nuevo cliente</a></li>
                    <li><a href="../clientes/clientes.php"><span class="fa fa-file-o"></span> Buscar cliente</a></li>
                    <li><a href="../clientes/clientes.php"><span class="fa fa-file-o"></span> Modificar cliente</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-3">
                <li><a href="../inmuebles/inmuebles.php"><span class="fa fa-folder"></span> Inmuebles</a></li>
                <ul class="folder">
                    <li><a href="../inmuebles/inmuebles.php"><span class="fa fa-file-o"></span> Nuevo inmueble</a></li>
                    <li><a href="../inmuebles/inmuebles.php"><span class="fa fa-file-o"></span> Buscar inmueble</a></li>
                    <li><a href="../inmuebles/inmuebles.php"><span class="fa fa-file-o"></span> Modificar inmueble</a></li>
                    <li><a href="../inmuebles/inmuebles.php"><span class="fa fa-file-o"></span> Borrar inmueble</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-3">

                   <li><a href="../citas/citas.php"><span class="fa fa-folder"></span> Citas</a></li>
                   <ul class="folder">
                    <li><a href="../citas/citas.php"><span class="fa fa-file-o"></span> Nueva cita</a></li>
                    <li><a href="../citas/citas.php"><span class="fa fa-file-o"></span> Buscar cita</a></li>
                    <li><a href="../citas/citas.php"><span class="fa fa-file-o"></span> Modificar cita</a></li>
                    <li><a href="../citas/citas.php"><span class="fa fa-file-o"></span> Borrar cita</a></li>
                </ul>
            </div>



    </div>
    <?php footer(); ?>
</body>
</html>
