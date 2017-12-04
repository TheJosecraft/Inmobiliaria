<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmuebles</title>
    <?php include '../funciones.php';
        cabecera();
    ?>

</head>

<body>
    <?php
    menu(4);
    ?>
        <div class="container">
            <div class="row equal">
                <div class="col-md-12" id="ver">
                    <h1>Inmuebles</h1>
                    <div class="row">
                        <div class="col-xs-6">
                            <a class="btn bg-primary" data-toggle="modal" data-target="#insInm"><span class="fa fa-building-o"></span> Nuevo Inmueble</a>
                        </div>

                        <div class="col-xs-6 text-right">
                            <form class="form-inline" action="#" method="post">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="buscar" placeholder="Dirección, cliente, precio">

                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit" name="enviarBuscar">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    <?php
            if(isset($_POST['buscar'])){

            include '../conexion.php';
            $busqueda = $_POST['buscar'];

                    include '../conexion.php';
                    $cons_bus_inm = "select inm.id id_inm, inm.direccion, inm.descripcion, inm.precio, inm.id_cliente, inm.imagen, cli.id, cli.nombre
                                    from inmuebles inm, clientes cli
                                    where inm.id_cliente = cli.id
                                    and (inm.direccion like '%$busqueda%'
                                    or cli.nombre like '%$busqueda%'
                                    or inm.precio like '%$busqueda%')";

                    $inmuebles = mysqli_query($conexion, $cons_bus_inm);
                  ?>
            <div class="row">
            <?php
                $cont = 0;
            while($fila = mysqli_fetch_array($inmuebles, MYSQLI_ASSOC)){
                ?>
                     <div class="col-md-4 col-sm-6 inmueble">
                                    <div class="card inmueble">

                                        <img src="../../img/inmuebles/<?php echo $fila['imagen']; ?>" alt="Card image" style="width: 100%">
                                        <?php

                                                    if($fila['id_cliente'] == 0){
                                                        ?>

                                                        <div class="disponibilidad" style="background-color:palegreen">
                                                                 <strong>Disponible</strong>
                                                        </div>

                                                        <?php
                                                    }else{
                                                        ?>

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
                                                        <?php echo $fila['direccion']; ?>
                                                    </h4>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row text-center">
                                                <h4><?php echo $fila['precio']; ?> €</h4>
                                            </div>
                                            <div class="row text-center">
                                               <?php

                                                    include '../conexion.php';
                                                        $cons_nombres = "select nombre, apellidos from clientes
                                                                            where id = $fila[id_cliente]";
                                                        $nombres = mysqli_query($conexion, $cons_nombres);
                                                        $nombre = mysqli_fetch_array($nombres);


                                                    if($fila['id_cliente'] != 0){
                                                    ?>
                                                        <h5><?php echo $nombre['nombre']." ".$nombre['apellidos'] ?></h5>
                                                        <?php
                                                    }else{
                                                        echo '<h5>&nbsp</h5>';
                                                    }
                                                ?>
                                            </div>
                                            <br>
                                            <div class="row center-block">
                                                <div class="col-xs-12">

                                                    <div class="col-xs-4 text-center"><span>
                                                        <a class="btn-m" href="mod_inmueble.php?id=<?php echo $fila['id'] ?>">
                                                        <span class="fa fa-pencil"></span></a>
                                                    </span>
                                                    </div>
                                                    <div class="col-xs-4 text-center">
                                                        <a class="btn-r" href="del_inmueble.php?id=<?php echo $fila['id'] ?>">
                                                        <span class="fa fa-trash"></span></a>
                                                    </div>
                                                    <div class="col-xs-4 text-center">
                                                            <a class="btn-e" href="inmueble.php?id=<?php echo $fila['id'] ?>">
                                                            <span class="fa fa-eye"></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                    $cont++;
                                if ($cont % 3 == 0)
                                {
                ?> </div><div class="row"> <?php
                                }
            }

            mysqli_close($conexion);
            ?>

                        <?php
            }else{

            include '../conexion.php';
            $cons_inmuebles = "select * from inmuebles";
            $inmuebles = mysqli_query($conexion, $cons_inmuebles);

            ?>
            <div class="row">
            <?php
                $cont = 0;
            while($fila = mysqli_fetch_array($inmuebles, MYSQLI_ASSOC)){

                ?>

                     <div class="col-md-4 col-sm-6 inmueble">
                                    <div class="card inmueble">

                                        <img src="../../img/inmuebles/<?php echo $fila['imagen']; ?>" alt="Card image" style="width: 100%">
                                        <?php

                                                    if($fila['id_cliente'] == 0){
                                                        ?>

                                                        <div class="disponibilidad" style="background-color:palegreen">
                                                                 <strong>Disponible</strong>
                                                        </div>

                                                        <?php
                                                    }else{
                                                        ?>

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
                                                        <?php echo $fila['direccion']; ?>
                                                    </h4>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row text-center">
                                                <h4><?php echo $fila['precio']; ?> €</h4>
                                            </div>
                                            <div class="row text-center">
                                               <?php

                                                    include '../conexion.php';
                                                        $cons_nombres = "select nombre, apellidos from clientes
                                                                            where id = $fila[id_cliente]";
                                                        $nombres = mysqli_query($conexion, $cons_nombres);
                                                        $nombre = mysqli_fetch_array($nombres);


                                                    if($fila['id_cliente'] != 0){
                                                    ?>
                                                        <h5><?php echo $nombre['nombre']." ".$nombre['apellidos'] ?></h5>
                                                        <?php
                                                    }else{
                                                        echo '<h5>&nbsp</h5>';
                                                    }
                                                ?>
                                            </div>
                                            <br>
                                            <div class="row center-block">
                                                <div class="col-xs-12">

                                                    <div class="col-xs-4 text-center"><span>
                                                        <a class="btn-m" href="mod_inmueble.php?id=<?php echo $fila['id'] ?>">
                                                        <span class="fa fa-pencil"></span></a>
                                                    </span>
                                                    </div>
                                                    <div class="col-xs-4 text-center">
                                                        <a class="btn-r" href="del_inmueble.php?id=<?php echo $fila['id'] ?>">
                                                        <span class="fa fa-trash"></span></a>
                                                    </div>
                                                    <div class="col-xs-4 text-center">
                                                            <a class="btn-e" href="inmueble.php?id=<?php echo $fila['id'] ?>">
                                                            <span class="fa fa-eye"></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                    $cont++;
                                if ($cont % 3 == 0)
                                {
                ?> </div><div class="row"> <?php
                                }

            }

            mysqli_close($conexion);
            }
        ?>
                </div>
                    <?php
                if (isset($_POST['enviarDelInm']))
                {
                    include '../conexion.php';

                    $id = $_POST['id'];

                    $cons_del_inm = "delete from inmuebles where id = $id";

                    mysqli_query($conexion, $cons_del_inm);
                    mysqli_close($conexion);

                    ?>
                       <meta http-equiv="refresh" content="0;url=inmuebles.php?e=2">
                        <?php
                }
    ?>

            </div>


            <?php

            include '../conexion.php';

            $cons_auto_inc = "SELECT AUTO_INCREMENT
                        FROM information_schema.TABLES
                        WHERE TABLE_SCHEMA =  'inmobiliaria'
	                    and TABLE_NAME = 'inmuebles'";

    if (!$cons_auto_inc)
    {
        echo "Hay errores en la consulta";
    }else{
        $fila = mysqli_query($conexion, $cons_auto_inc);
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
                                        <label for="">Id</label>
                                        <input class="form-control" type="text" name="id" value="<?php echo $id[0];?>" readonly></div>
                                    <div class="form-group">
                                        <label for="">Dirección</label>
                                        <input class="form-control" type="text" name="direccion"></div>
                                    <div class="form-group">
                                        <label for="">Descripción</label>
                                        <textarea class="form-control" name="descripcion" maxlength="280"></textarea></div>
                                    <div class="form-group">
                                        <label for="">Precio</label>
                                        <input class="form-control" type="text" name="precio"></div>
                                    <div class="form-group">
                                        <label for="">Cliente</label>
                                        <select class="form-control" name="cliente" id="">
                        <?php
                            mysqli_close($conexion);

                            include 'conexion.php';
                            $cons_idCliente = "select id, nombre, apellidos
                                                from clientes";

                            $id_Cliente = mysqli_query($conexion, $cons_idCliente);
                            while($fila = mysqli_fetch_array($id_Cliente)){
                                echo "<option value=$fila[id]>$fila[nombre] $fila[apellidos]</option>";
                            }

                            mysqli_close($conexion);
                        ?>
                    </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Imagen</label>
                                        <input class="form-control" type="file" name="imagen">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary" name="enviarInsInmueble">Insertar</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
        </div>
        <?php include '../conexion.php';
    if (isset($_POST['enviarInsInmueble']))
    {
        $id = $_POST['id'];
        $direccion = $_POST['direccion'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $cliente = $_POST['cliente'];

        $imagen = $_FILES['imagen'];

        $rutaImg = "img/";
        $rutaInmuebles = $rutaImg."inmuebles/";
        $nombreImagen = "";

        $isDireccion = false;

        if(preg_match('`^[a-zA-Z0-9 ,ºáéíóúÁÉÍÓÚñÑ]{1,50}$`', $direccion)){
            $isDireccion = true;
        }else{
            $direccion = "Dirección errónea";
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


        mysqli_query($conexion, $cons_ins_inmueble);
        mysqli_close($conexion);

        ?>
        <meta http-equiv="refresh" content="0;url=inmuebles.php?e=1">
        <?php
    }
    ?>
    </div>
            </div>


    <?php
    footer();
    ?>
</body>

</html>
