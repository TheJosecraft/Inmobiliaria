<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <?php include '../funciones.php';
        cabecera();
    ?>
</head>

<body>
    <div class="row">
    <?php
    menu(3);
    ?>
    </div>
        <div class="container">
            <div class="row">
               <h1>Clientes</h1>
                <div class="col-xs-6">
                    <a class="btn bg-primary" data-toggle="modal" data-target="#insCli"><span class="fa fa-user-o"></span> Nuevo Cliente</a>
                </div>

                <div class="col-xs-6 text-right">
                    <form class="form-inline" action="#" method="get">
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
            if(isset($_GET['enviarBuscar'])){
                $busqueda = $_GET['buscar'];

                $cons_bus_cli = "select *
                                    from clientes
                                    where nombre like '%$busqueda%'
                                    or apellidos like '%$busqueda%'
                                    or telefono1 like '%$busqueda%'
                                    or telefono2 like '%$busqueda%'
                                    and nombre not like '%disponible%'";
                $clientes = db_query($cons_bus_cli);
                if(mysqli_num_rows($clientes) == 0){
                    ?>
                    <h2><span class="fa fa-info-circle text-info"></span> No se han encontrado resultados</h2>
                    <?php
                }else{
                    tablaClientes($cons_bus_cli, $busqueda);
                }
            }else{
                $cons_clientes = "select * from clientes
                                        where nombre not like 'disponible'";
                tablaClientes($cons_clientes);
            }
            $cons_auto_inc = "SELECT AUTO_INCREMENT
                        FROM information_schema.TABLES
                        WHERE TABLE_SCHEMA =  'inmobiliaria'
	                    and TABLE_NAME = 'clientes'";
            if (!$cons_auto_inc)
            {
                echo "Hay errores en la consulta";
            }else{
                $fila = db_query($cons_auto_inc);
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
                                                <label for="id">Id</label>
                                                <input class="form-control" type="text" name="id" value="<?php echo $id[0];?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre">Nombre</label>
                                                <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Introduce el nombre del cliente *"><span style="display:none"></span><span style="display:none"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="apellidos">Apellidos</label>
                                                <input class="form-control" type="text" id="apellidos" name="apellidos" placeholder="Introduce los apellidos del cliente *"><span style="display:none"></span><span style="display:none"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="direccion">Dirección</label>
                                                <input class="form-control" type="text" id="direccion" name="direccion" placeholder="Introduce la dirección del cliente *"><span style="display:none"></span><span style="display:none"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="telefono1">Teléfono 1</label>
                                                <input class="form-control" type="text" id="telefono1" name="telefono1" placeholder="Introduce el teléfono *"><span style="display:none"></span><span style="display:none"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="telefono2">Teléfono 2</label>
                                                <input class="form-control" type="text" id="telefono2" name="telefono2" placeholder="Introduce el teléfono"><span style="display:none"></span><span style="display:none"></span>
                                            </div>
                                            <p class="text-muted">* Estos campos son obligatorios</p>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary" id="enviarInsCliente" name="enviarInsCliente">Insertar</button>
                                            </div>
                                            <div class="alert alert-danger" id="alerta" style="display:none">
                                              <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <?php
            db_close();
    if (isset($_POST['enviarInsCliente']))
    {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $direccion = $_POST['direccion'];
        $telefono1 = $_POST['telefono1'];
        $telefono2 = $_POST['telefono2'];
        $cons_ins = "insert into clientes values (null, '$nombre', '$apellidos', '$direccion', '$telefono1', '$telefono2')";
        $insertar = db_query($cons_ins);
        echo 'Los datos se han introducido correctamente';
        db_close();
        ?>
                            <meta http-equiv="refresh" content="0;url=clientes.php?e=1">

                            <?php
    }
    function tablaClientes($cons, $busq = ""){
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

                    $clientes = db_query($cons);
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
                                            <a class="btn-m" href="mod_cliente.php?id=<?php echo $fila['id'] ?>">
                                            <span class="fa fa-pencil"></span></a>
                                        </td>
                                    </tr>

                                    <?php
                    }
                    db_close();
                    ?>
                            </tbody>
                        </table>
                    </div>

                    <?php
    }
    ?>
        </div>
        <div class="row">
        <?php
    footer();
    ?>
    </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script type="text/javascript" src="js/bootstrap.js"></script>
            <script type="text/javascript" src="js/main.js"></script>
</body>

</html>
