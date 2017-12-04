<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <?php include '../funciones.php';
     cabecera();
    ?>
</head>

<body>

    <?php

    menu(2);
    ?>

        <div class="container">
            <div class="row">
                <div class="col-md-12" id="ver">
                    <h1>Noticias</h1>
                    <div class="row">
                        <div class="col-xs-6">
                            <a class="btn bg-primary" data-toggle="modal" data-target="#insNot"><span class="fa fa-newspaper-o"></span> Nueva noticia</a>
                        </div>

                        <div class="col-xs-6 text-right">
                            <form class="form-inline" action="#" method="get">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="buscar" placeholder="Titular">

                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit" name="enviarBuscar">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <?php

            $pag = 0;

            $numNoticias = 0;

            $fecha = date('Y-m-d');

            if(isset($_GET['pagAnterior'])){
                $pag = $_GET['pagAnterior'];

                $limite = 6 * $pag;

                $cons_ult_not = "select * from noticias
                                        where fecha <= '$fecha'
                                        order by id DESC
                                        limit $limite, 6";

                noticias($cons_ult_not, $numNoticias);

            }elseif(isset($_GET['pagSiguiente'])){

                $pag = $_GET['pagSiguiente'];

                $limite = 6 * $pag;

                $cons_ult_not = "select * from noticias
                                        where fecha <= '$fecha'
                                        order by id DESC
                                        limit $limite, 6";

                noticias($cons_ult_not, $numNoticias);

            }elseif(isset($_GET['enviarBuscar'])){
                $busqueda = $_GET['buscar'];

                $cons_ult_not = "select * from noticias
                                        where fecha <= '$fecha'
                                        and titular like '%$busqueda%'
                                        order by id DESC
                                        limit 6";

                noticias($cons_ult_not, $numNoticias);
            }else{

                $cons_ult_not = "select * from noticias
                                        where fecha <= '$fecha'
                                        order by id DESC
                                        limit 6";
                noticias($cons_ult_not, $numNoticias);
            }

            $pagAnterior = $pag - 1;
            $pagSiguiente = $pag + 1;
            ?>
                <div class="row">
                   <div class="col-md-12 text-center">
                       <ul class="pagination ">
                        <li>
                           <?php
                            if($pagAnterior < 0){
                                $pagAnterior = 0;
                            }else{
                                ?>
                                <a href="?pagAnterior=<?php echo $pagAnterior ?>"><span class="fa fa-arrow-left"></span> Anterior</a>
                                <?php
                            }
                            ?>
                           </li>
                        <li>
                        <?php
                            if($numNoticias == 6){
                               ?>
                               <a href="?pagSiguiente=<?php echo $pagSiguiente ?>"><span class="fa fa-arrow-right"></span> Siguiente</a></li>
                                <?php
                            }

                        ?>

                    </ul>
                   </div>

                </div>
            </div>
        <?php
        include '../conexion.php';

            $cons_auto_inc = "SELECT AUTO_INCREMENT
                        FROM information_schema.TABLES
                        WHERE TABLE_SCHEMA =  'inmobiliaria'
	                    and TABLE_NAME = 'noticias'";

            if (!$cons_auto_inc)
            {
                echo "Hay errores en la consulta";
            }else{
                $fila = mysqli_query($conexion, $cons_auto_inc);
                $id = mysqli_fetch_array($fila);
            }
            mysqli_close($conexion);
        ?>
        <div class="modal fade" id="insNot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Insertar inmueble</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                            </div>
                            <div class="modal-body">
                                <form action="#" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="">Id</label>
                                        <input class="form-control" type="text" name="id" value="<?php echo $id[0];?>" readonly></div>
                                    <div class="form-group">
                                        <label for="">Titular</label>
                                        <input class="form-control" type="text" name="titular"></div>
                                    <div class="form-group">
                                        <label for="">Contenido</label>
                                        <textarea class="form-control" name="contenido" maxlength="1500"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Imagen</label>
                                        <input class="form-control" type="file" name="imagen">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Fecha</label>
                                        <input class="form-control" type="date" name="fecha">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary" name="enviarInsNoticia">Insertar</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
        <?php include '../conexion.php';
    if (isset($_POST['enviarInsNoticia']))
    {
        $id = $_POST['id'];
        $titular = $_POST['titular'];
        $contenido = $_POST['contenido'];
        $imagen = $_FILES['imagen'];
        $fecha = $_POST['fecha'];

        $rutaImg = "img/";
        $rutaNoticias = $rutaImg."noticias/";
        $nombreImagen = "";

        if (!file_exists($rutaImg))
        {
            mkdir($rutaImg);
        }

        if (!file_exists($rutaNoticias))
        {
            mkdir($rutaNoticias);
        }

        switch ($imagen['type'])
        {
            case 'image/png':
                $nombreImagen = "noticia".$id.".png";
                move_uploaded_file($imagen['tmp_name'], $rutaNoticias.$nombreImagen);
                break;

            case 'image/jpeg':
                $nombreImagen = "noticia".$id.".jpg";
                move_uploaded_file($imagen['tmp_name'], $rutaNoticias.$nombreImagen);
                break;
            default:
                echo "El tipo de imagen no es correcto";
                break;
        }

        $cons_ins_noticia = "insert into noticias values (null,
                                                            '$titular',
                                                            '$contenido',
                                                            '$nombreImagen',
                                                            '$fecha')";


        mysqli_query($conexion, $cons_ins_noticia);
        mysqli_close($conexion);

        ?>
        <meta http-equiv="refresh" content="0;url=noticias.php?e=1">
        <?php
    }

    function noticias($cons, &$numNoticias){
        ?>

                <div class="row text-left">
                    <?php

                        include '../conexion.php';
                        $fecha = date('Y-m-d');
                        $noticias = mysqli_query($conexion, $cons);
                        while($fila = mysqli_fetch_array($noticias)){
                        ?>
                        <div class="col-lg-6 col-md-12">
                            <div class="noticia">
                                <div>
                                    <img class="img-responsive img-rounded" src="../../img/noticias/<?php echo $fila['imagen']; ?>" alt="">
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <span class="h3"><?php echo $fila['titular']; ?> <a href="includes/forms/mod_noticia.php?id=<?php echo $fila['id'] ?>"><span class="fa fa-pencil btn-m"></span></a> <a href="includes/forms/del_noticia.php?id=<?php echo $fila['id'] ?>"><span class="fa fa-trash btn-r"></span> </a></span>
                                        </div>

                                        <div class="col-sm-4">
                                            <span class="pull-right"><strong><span class="fa fa-calendar"></span> <?php $fecha = strtotime($fila['fecha']); echo date('d/m/Y', $fecha) ?></strong></span>
                                        </div>
                                    </div>
                                    <p><?php echo substr($fila['contenido'], 0, 280); ?> <span class="pull-right"><a href="noticia.php?id=<?php echo $fila['id'] ?>">Leer más</a></span></p>
                                </div>
                                <br>
                            </div>
                        </div>

                        <?php
                        $numNoticias++;
                }

                ?>
                </div>

                <?php
    }

    footer();
    ?>
</body>

</html>