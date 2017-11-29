<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font-awesome.css">
</head>

<body>
    <?php
    include 'funciones.php';

    menu(3);
    ?>
        <div class="container">

            <h1>Clientes</h1>
            <div class="row">
                <div class="col-xs-6">
                    <a class="btn bg-primary" data-toggle="modal" data-target="#insCli"><span class="fa fa-user-o"></span> Nuevo Cliente</a>
                </div>

                <div class="col-xs-6 text-right">
                    <form class="form-inline" action="#" method="post">
                        <div class="input-group col-xs-6">
                            <input class="form-control" type="text" name="buscar" placeholder="Nombre, apellidos o teléfono">

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
            if(isset($_POST['enviarBuscar'])){

                $busqueda = $_POST['buscar'];

                include 'conexion.php';
                    $cons_bus_cli = "select *
                                    from clientes
                                    where nombre like '%$busqueda%'
                                    or apellidos like '%$busqueda%'
                                    or telefono1 like '%$busqueda%'
                                    or telefono2 like '%$busqueda%'
                                    and nombre not like '%disponible%'";

                    $clientes = mysqli_query($conexion, $cons_bus_cli);
                if(mysqli_num_rows($clientes) == 0){
                    ?>
                    <h2><span class="fa fa-info-circle text-info"></span> No se han encontrado resultados</h2>
                    <?php
                }else{


                ?>
                <div class="row">


                    <table class="table table-hover">
                        <thead>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Dirección</th>
                            <th>Teléfono 1</th>
                            <th>Teléfono 2</th>
                            <th>Modificar</th>
                        </thead>
                        <tbody>
                            <?php
                    while($fila = mysqli_fetch_array($clientes, MYSQLI_ASSOC)){
                        ?>

                                <tr>
                                    <td>
                                        <?php echo $fila['nombre']; ?>
                                    </td>
                                    <td>
                                        <?php echo $fila['apellidos']; ?>
                                    </td>
                                    <td>
                                        <?php echo $fila['direccion']; ?>
                                    </td>
                                    <td>
                                        <?php echo $fila['telefono1']; ?>
                                    </td>
                                    <td>
                                        <?php echo $fila['telefono2']; ?>
                                    </td>
                                    <td>
                                        <form action="includes/forms/mod_cliente.php" method="post">
                                            <input type="hidden" name=id value="<?php echo $fila['id'] ?>">
                                            <button class="btn-m" type="submit" name="enviar">
                                            <span class="fa fa-pencil"></span>
                                        </button>
                                        </form>
                                    </td>
                                </tr>

                                <?php
                    }

                    mysqli_close($conexion);
                    ?>
                        </tbody>
                    </table>
                </div>
                <?php
                }
            }else{
                ?>
                    <div class="row">
                        <table class="table table-hover">
                            <thead>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Dirección</th>
                                <th>Teléfono 1</th>
                                <th>Teléfono 2</th>
                                <th>Modificar</th>
                            </thead>
                            <tbody>
                                <?php

                    include 'conexion.php';
                    $cons_clientes = "select * from clientes
                                        where nombre not like 'disponible'";
                    $clientes = mysqli_query($conexion, $cons_clientes);
                    while($fila = mysqli_fetch_array($clientes, MYSQLI_ASSOC)){
                        ?>

                                    <tr>
                                        <td>
                                            <?php echo $fila['nombre']; ?>
                                        </td>
                                        <td>
                                            <?php echo $fila['apellidos']; ?>
                                        </td>
                                        <td>
                                            <?php echo $fila['direccion']; ?>
                                        </td>
                                        <td>
                                            <?php echo $fila['telefono1']; ?>
                                        </td>
                                        <td>
                                            <?php echo $fila['telefono2']; ?>
                                        </td>
                                        <td>
                                            <form action="includes/forms/mod_cliente.php" method="post">
                                                <input type="hidden" name=id value="<?php echo $fila['id'] ?>">
                                                <button class="btn-m" type="submit" name="enviar">
                                            <span class="fa fa-pencil"></span>
                                        </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <?php

                    }

                    mysqli_close($conexion);
                    ?>
                            </tbody>
                        </table>
                    </div>

                    <?php
            }

            include 'conexion.php';

            $cons_auto_inc = "SELECT AUTO_INCREMENT
                        FROM information_schema.TABLES
                        WHERE TABLE_SCHEMA =  'inmobiliaria'
	                    and TABLE_NAME = 'clientes'";

            if (!$cons_auto_inc)
            {
                echo "Hay errores en la consulta";
            }else{
                $fila = mysqli_query($conexion, $cons_auto_inc);
                $id = mysqli_fetch_array($fila);
            }
            ?>
                        <div class="modal fade" id="insCli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Insertar cliente</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="#" method="post">
                                            <div class="form-group">
                                                <label for="">Id</label>
                                                <input class="form-control" type="text" name="id" value="<?php echo $id[0];?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nombre</label>
                                                <input class="form-control" type="text" id="nombre" name="nombre"><span style="display:none"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Apellidos</label>
                                                <input class="form-control" type="text" name="apellidos">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Dirección</label>
                                                <input class="form-control" type="text" name="direccion">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Teléfono 1</label>
                                                <input class="form-control" type="text" name="telefono1">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Telefono 2</label>
                                                <input class="form-control" type="text" name="telefono2">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary" id="enviarInsCliente" name="enviarInsCliente">Insertar</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <?php
            mysqli_close($conexion);
    if (isset($_POST['enviarInsCliente']))
    {
        include 'conexion.php';
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $direccion = $_POST['direccion'];
        $telefono1 = $_POST['telefono1'];
        $telefono2 = $_POST['telefono2'];

        $cons_ins = "insert into clientes values (null, '$nombre', '$apellidos', '$direccion', '$telefono1', '$telefono2')";

        $insertar = mysqli_query($conexion, $cons_ins);

        echo 'Los datos se han introducido correctamente';
        mysqli_close($conexion);
        ?>
                            <meta http-equiv="refresh" content="0;url=clientes.php?e=1">

                            <?php

    }
    ?>
        </div>
        <?php
    footer();
    ?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script type="text/javascript" src="js/bootstrap.js"></script>
            <script type="text/javascript" src="js/main.js"></script>
</body>

</html>
