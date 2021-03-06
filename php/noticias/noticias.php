<?php
include '../funciones.php';
sesiones();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <?php
     cabecera();
    ?>
</head>

<body>

    <?php

    menu(2);
    ?>

        <div class="container" id="wrap">
            <div class="row">
                <div class="col-md-12" id="ver">
                    <h1>Noticias</h1>
                    <div class="row">
                        <div class="col-sm-6 col-md-7 col-lg-8 hidden-xs">
                            <a class="btn bg-primary" data-toggle="modal" data-target="#insNot"><span class="fa fa-newspaper-o"></span> Nueva noticia</a>
                        </div>
                        <div class="col-xs-12 hidden-sm hidden-md hidden-lg" id="btn-xs-ins">
                            <a class="btn bg-primary btn-block" data-toggle="modal" data-target="#insNot"><span class="fa fa-newspaper-o"></span> Nueva noticia</a>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4 text-right">
                            <form action="#" method="get">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="buscar" placeholder="Titular">

                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit" name="enviarBuscar">
                                    <i class="fa fa-search"></i>
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
                noticias("select * from noticias where fecha <= '$fecha' order by fecha DESC limit $limite, 6", $numNoticias);

            }elseif(isset($_GET['pagSiguiente'])){

                $pag = $_GET['pagSiguiente'];

                $limite = 6 * $pag;

                noticias("select * from noticias where fecha <= '$fecha' order by fecha DESC limit $limite, 6", $numNoticias);

            }elseif(isset($_GET['enviarBuscar'])){
                $busqueda = $_GET['buscar'];

                noticias("select * from noticias where fecha <= '$fecha' and titular like '%$busqueda%' order by fecha DESC limit 6", $numNoticias);
            }else{

                noticias("select * from noticias where fecha <= '$fecha' order by fecha DESC limit 6", $numNoticias);
            }

            $pagAnterior = $pag - 1;
            $pagSiguiente = $pag + 1;
            ?>
                <div class="row">
                   <div class="col-md-12 text-center">
                       <ul class="pagination ">
                        
                           <?php
                            if($pagAnterior < 0){
                                $pagAnterior = 0;
                            }else{
                                ?>
                                <li>
                                <a href="?pagAnterior=<?php echo $pagAnterior ?>"><span class="fa fa-arrow-left"></span> Anterior</a>
                                <?php
                            }
                            ?>
                           </li>
                        
                        <?php
                            $limite = 6 * ($pag + 1);
                            $select = db_query("select * from noticias where fecha <= '$fecha' order by id DESC limit $limite, 6");
                            if($numNoticias == 6 && mysqli_num_rows($select) > 0){
                               ?>
                               <li>
                               <a href="?pagSiguiente=<?php echo $pagSiguiente ?>">Siguiente <span class="fa fa-arrow-right"></span></a></li>
                                <?php
                            }

                        ?>

                    </ul>
                   </div>

                </div>
            </div>
        <?php

            $cons_auto_inc = "SELECT AUTO_INCREMENT
                        FROM information_schema.TABLES
                        WHERE TABLE_SCHEMA =  'inmobiliaria'
	                    and TABLE_NAME = 'noticias'";

            if (!$cons_auto_inc)
            {
                echo "Hay errores en la consulta";
            }else{
                $fila = db_query($cons_auto_inc);
                $id = mysqli_fetch_array($fila);
            }
            db_close();
        ?>

<!--        Modal insertar noticia-->
        <div class="modal fade" id="insNot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Insertar noticia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                            </div>
                            <div class="modal-body">
                                <form action="#" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="">Id</label>
                                        <input class="form-control" type="text" name="id" value="<?php echo $id[0];?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Titular</label>
                                        <input class="form-control" type="text" name="titular" id="titular"><span style="display:none"></span><span style="display:none"></span>
                                        </div>
                                    <div class="form-group">
                                        <label for="">Contenido</label>
                                        <textarea class="form-control" name="contenido" maxlength="1500" rows="15" id="contenido"></textarea><span style="display:none"></span><span style="display:none"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Imagen</label>
                                        <input class="form-control" type="file" name="imagen" id="imagen"><span style="display:none"></span><span style="display:none"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Fecha</label>
                                        <input class="form-control" type="date" name="fecha" id="fecha"><span style="display:none"></span><span style="display:none"></span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary" name="enviarInsNoticia" id="enviarInsNoticia">Insertar</button>
                                    </div>

                                    <div class="alert alert-warning" id="warning" style="display:none">

                                    </div>

                                    <div class="alert alert-danger" id="alerta" style="display:none">

                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
        <?php
    if (isset($_POST['enviarInsNoticia']))
    {
        $id = $_POST['id'];
        $titular = $_POST['titular'];
        $contenido = $_POST['contenido'];
        $imagen = $_FILES['imagen'];
        $fecha = $_POST['fecha'];

        $rutaImg = "../../img/";
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


        db_query($cons_ins_noticia);
        db_close($conexion);

        ?>
        <meta http-equiv="refresh" content="0;url=noticias.php?e=1">
        <?php
    }

    function noticias($cons, &$numNoticias){
        ?>
<div class="row text-left">
    <?php
        $fecha = date('Y-m-d');
        $noticias = db_query($cons);

    if(mysqli_num_rows($noticias) == 0){
        ?>
        <h2><span class="fa fa-info-circle text-info"></span> No se han encontrado noticias</h2>
        <?php
    }else{

        while($fila = mysqli_fetch_array($noticias)){
                            ?>
                <div class="col-lg-6 col-md-12">
                    <div class="noticia">
                        <div>
                            <a href="noticia.php?id=<?php echo $fila['id'] ?>"><img class="img-responsive img-rounded" src="../../img/noticias/<?php echo $fila['imagen']; ?>" alt=""></a>
                            <br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <span class="h3"><a href="noticia.php?id=<?php echo $fila['id'] ?>"><?php echo $fila['titular']; ?> </a></span>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>
                                        <?php echo substr($fila['contenido'], 0, 280); ?>
                                    </p>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <span class="fa fa-calendar"></span>
                                    <?php $fecha = strtotime($fila['fecha']); echo date('d/m/Y', $fecha) ?>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <a href="noticia.php?id=<?php echo $fila['id'] ?>">Leer más >></a>
                                </div>
                            </div>
                            <hr>
                            <div class="row text-center">
                                <div class="col-xs-6">
                                    <a data-toggle="tooltip" title="Modifica esta noticia" class="btn-m" href="mod_noticia.php?id=<?php echo $fila['id'] ?>"><span class="fa fa-pencil"></span> Modificar</a>
                                </div>
                                <div class="col-xs-6">
                                    <a class="btn-r" href="del_noticia.php?id=<?php echo $fila['id'] ?>" title="Elimina esta noticia" data-toggle="tooltip"><span class="fa fa-trash"></span> Eliminar</a>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>

    <?php
        $numNoticias++;
        }
    }

    ?>
</div>
                <?php
    }

    footer();
    ?>
</body>

</html>
