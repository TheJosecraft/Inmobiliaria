<?php
include '../funciones.php';
sesiones();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmuebles</title>
    <?php
        cabecera();
    ?>

</head>

<body>
    <?php
    menu(4);
    ?>
        <div class="container" id="wrap">
            <div class="row equal">
                <div class="col-md-12" id="ver">
                    <h1>Inmuebles</h1>
                    <div class="row">
                        <div class="col-sm-6 col-md-7 col-lg-8 hidden-xs">
                            <a class="btn bg-primary" data-toggle="modal" data-target="#insInm"><span class="fa fa-building-o"></span> Nuevo Inmueble</a>
                        </div>

                        <div class="col-xs-12 hidden-sm hidden-md hidden-lg" id="btn-xs-ins">
                            <a class="btn bg-primary btn-block" data-toggle="modal" data-target="#insInm"><span class="fa fa-building-o"></span> Nuevo Inmueble</a>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4 text-right">
                            <form action="#" method="post">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="buscar" placeholder="Dirección, cliente, precio">

                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit" name="enviarBuscar">
                                    <i class="fa fa-search"></i>
                                </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    <?php
            if(isset($_POST['buscar'])){

                $busqueda = $_POST['buscar'];
                inmuebles("select inm.id id_inm, inm.direccion, inm.descripcion, inm.precio, inm.id_cliente, inm.imagen, cli.nombre
                                from inmuebles inm, clientes cli
                                where inm.id_cliente = cli.id
                                and (inm.direccion like '%$busqueda%'
                                or cli.nombre like '%$busqueda%'
                                or inm.precio like '%$busqueda%')
                                order by precio");
            }else{
                inmuebles("select * from inmuebles order by precio");
            }
        ?>
                </div>
            </div>
            <?php

            $cons_auto_inc = "SELECT AUTO_INCREMENT
                        FROM information_schema.TABLES
                        WHERE TABLE_SCHEMA =  'inmobiliaria'
	                    and TABLE_NAME = 'inmuebles'";

    if (!$cons_auto_inc)
    {
        echo "Hay errores en la consulta";
    }else{
        $fila = db_query($cons_auto_inc);
        $id = mysqli_fetch_array($fila);
    }
            ?>
                <div class="modal fade" id="insInm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <label for="id">Id</label>
                                        <input class="form-control" type="text" name="id" value="<?php echo $id[0];?>" readonly><span style="display:none"></span><span style="display:none"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="direccion">Dirección</label>
                                        <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Introduce la dirección del inmueble"><span style="display:none"></span><span style="display:none"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <textarea class="form-control" name="descripcion" maxlength="560" rows="15" id="descripcion" placeholder="Introduce la descripción del inmueble"></textarea><span style="display:none"></span><span style="display:none"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="precio">Precio</label>
                                        <input class="form-control" type="text" name="precio" id="precio" placeholder="Introduce el precio del inmueble"><span style="display:none"></span><span style="display:none"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="cliente">Cliente</label>
                                        <select class="form-control" name="cliente" id="cliente">
                                            <?php
                                                db_close();

                                                $id_Cliente = db_query("select id, nombre, apellidos from clientes");
                                                while($fila = mysqli_fetch_array($id_Cliente)){
                                                    echo "<option value=$fila[id]>$fila[nombre] $fila[apellidos]</option>";
                                                }

                                                db_close();
                                            ?>
                                        </select><span style="display:none"></span><span style="display:none"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="imagen">Imagen</label>
                                        <input class="form-control" type="file" name="imagen" id="imagen"><span style="display:none"></span><span style="display:none"></span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary" name="enviarInsInmueble" id="enviarInsInmueble">Insertar</button>
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
        </div>
        <?php
    if (isset($_POST['enviarInsInmueble']))
    {
        $id = $_POST['id'];
        $direccion = $_POST['direccion'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $cliente = $_POST['cliente'];

        $imagen = $_FILES['imagen'];

        $rutaImg = "../../img/";
        $rutaInmuebles = $rutaImg."inmuebles/";
        $nombreImagen = "";

        //Se comprueba la dirección introducida
        if(!preg_match('`^[a-zA-Z0-9 ,ºáéíóúÁÉÍÓÚñÑ]{1,150}$`', $direccion)){
            $direccion = "Dirección errónea";
        }

        //Se comprueba el precio introducido
        if(!preg_match('`^[0-9]{1,12}$`', $precio)){
            $precio = "Precio erróneo";
        }

        if (!file_exists($rutaImg))
        {
            mkdir($rutaImg);
        }

        if (!file_exists($rutaInmuebles))
        {
            mkdir($rutaInmuebles);
        }

        switch ($imagen['type'])
        {
            case 'image/png':
                $nombreImagen = "inmueble".$id.".png";
                move_uploaded_file($imagen['tmp_name'], $rutaInmuebles.$nombreImagen);
                break;

            case 'image/jpeg':
                $nombreImagen = "inmueble".$id.".jpg";
                move_uploaded_file($imagen['tmp_name'], $rutaInmuebles.$nombreImagen);
                break;
            default:
                echo "El tipo de imagen no es correcto";
                break;
        }

        $cons_ins_inmueble = "insert into inmuebles values (null,
                                                            '$direccion',
                                                            '$descripcion',
                                                            $precio,
                                                            $cliente,
                                                            '$nombreImagen')";


        db_query($cons_ins_inmueble);
        db_close();

        ?>
        <meta http-equiv="refresh" content="0;url=inmuebles.php?e=1">
        <?php
    }

    function inmuebles($cons){
 ?>
<div class="row">
    <?php
            $inmuebles = db_query($cons);
            $cont = 0;
        if(mysqli_num_rows($inmuebles) == 0){
             ?>
            <h2><span class="fa fa-info-circle text-info"></span> No se han encontrado inmuebles</h2>
            <?php
        }else{


            while($fila = mysqli_fetch_array($inmuebles, MYSQLI_ASSOC)){

                ?>

        <div class="col-md-4 inmueble">
            <div class="card inmueble">
                <a href="inmueble.php?id=<?php echo $fila['id'] ?>">
                    <div class="row imagen-inmueble" style="background-image: url(../../img/inmuebles/<?php echo $fila['imagen']; ?>);">

                    </div>
                </a>
<!--                <img src="../../img/inmuebles/<?php /*echo $fila['imagen'];*/ ?>" alt="Card image" style="width: 100%">-->
                <?php

                    if($fila['id_cliente'] == 0){ ?>

                    <div class="disponibilidad" style="background-color:palegreen">
                        <strong>Disponible</strong>
                    </div>

                    <?php }else{ ?>

                        <div class="disponibilidad" style="background-color:#FA5858">
                            <strong>Vendido</strong>
                        </div>
                    <?php
                        }
                        ?>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="card-title text-center">
                                            <a href="inmueble.php?id=<?php echo $fila['id'] ?>">
                                                <?php echo $fila['direccion']; ?>
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <br>
                                <div class="row text-center">
                                    <h4>
                                        <?php echo number_format($fila['precio'], 0, ',', '.'); ?> €</h4>
                                </div>
                                <div class="row text-center">
                                    <?php
                                    $nombres = db_query("select nombre, apellidos from clientes where id = $fila[id_cliente]");
                                    $nombre = mysqli_fetch_array($nombres);


                                    if($fila['id_cliente'] != 0){
                                    ?>
                                        <h5>
                                            <?php echo $nombre['nombre']." ".$nombre['apellidos'] ?>
                                        </h5>
                                        <?php
                                    }else{
                                        echo '<h5>&nbsp</h5>';
                                    }
                                ?>
                                </div>
                                <hr>
                                <div class="row center-block">
                                    <div class="col-xs-12">

                                        <div class="col-xs-6 col-md-12 col-lg-6 text-center"><span>
                                                        <a class="btn-m" href="mod_inmueble.php?id=<?php echo $fila['id'] ?>" title="Modificar">
                                                        <span class="fa fa-pencil"></span> Modificar</a>
                                            </span>
                                        </div>
                                        <div class="col-xs-6 col-md-12 col-lg-6 text-center">
                                            <a class="btn-r" href="del_inmueble.php?id=<?php echo $fila['id'] ?>" title="Eliminar">
                                                        <span class="fa fa-trash"></span> Eliminar</a>
                                        </div>
                                        <!--
                                                    <div class="col-xs-4 text-center">
                                                            <a class="btn-e" href="inmueble.php?id=<?php echo $fila['id'] ?>">
                                                            <span class="fa fa-eye"></span></a>
                                                    </div>
-->
                                    </div>
                                </div>
                            </div>
            </div>
        </div>
        <?php
                $cont++;
                if ($cont % 3 == 0){
                ?>
                    </div>
                    <div class="row">
                        <?php
                }
            }
        }
            db_close();
    }
    ?>
            </div>
    <?php
    footer();
    ?>
</body>

</html>
