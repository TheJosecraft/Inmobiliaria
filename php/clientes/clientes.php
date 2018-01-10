<?php
include '../funciones.php';
sesiones();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <?php
        cabecera();
    ?>
</head>

<body>
    <div class="row">
    <?php
    menu(3);
    ?>
    </div>
        <div class="container" id="wrap">
            <div class="row">
               <h1>Clientes</h1>
                <div class="col-sm-6 col-md-7 col-lg-8 hidden-xs">
                    <a href="insertar_cliente.php" class="btn bg-primary"><span class="fa fa-user-o"></span> Nuevo Cliente</a>
                </div>

                <div class="col-xs-12 hidden-sm hidden-md hidden-lg" id="btn-xs-ins">
                    <a class="btn bg-primary btn-block" data-toggle="modal" data-target="#insCli"><span class="fa fa-user-o"></span> Nuevo Cliente</a>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4 text-right">
                    <form action="#" method="get">
                        <div class="input-group">
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
                                    where id > 0
                                    and (nombre like '%$busqueda%'
                                    or apellidos like '%$busqueda%'
                                    or telefono1 like '%$busqueda%'
                                    or telefono2 like '%$busqueda%')
                                    order by nombre";
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
                                        where id > 0
                                        order by nombre";
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
<!--                      Modal para insertar usuario-->
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
                                                <label for="nombre">Usuario</label>
                                                <input class="form-control" type="text" id="usuario" name="usuario" placeholder="Usuario"><span style="display:none"></span><span style="display:none"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre">Contraseña</label>
                                                <input class="form-control" type="password" id="password" name="password" placeholder="Contraseña"><span style="display:none"></span><span style="display:none"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre">Nombre</label>
                                                <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre"><span style="display:none"></span><span style="display:none"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="apellidos">Apellidos</label>
                                                <input class="form-control" type="text" id="apellidos" name="apellidos" placeholder="Apellidos"><span style="display:none"></span><span style="display:none"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="direccion">Dirección</label>
                                                <input class="form-control" type="text" id="direccion" name="direccion" placeholder="Dirección"><span style="display:none"></span><span style="display:none"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="telefono1">Teléfono 1</label>
                                                <input class="form-control" type="text" id="telefono1" name="telefono1" placeholder="Teléfono"><span style="display:none"></span><span style="display:none"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="telefono2">Teléfono 2*</label>
                                                <input class="form-control" type="text" id="telefono2" name="telefono2" placeholder="Teléfono"><span style="display:none"></span><span style="display:none"></span>
                                            </div>
                                            <p class="text-muted">* Estos campos son opcionales</p>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary" id="enviarInsCliente" name="enviarInsCliente">Insertar</button>
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
            db_close();
    if (isset($_POST['enviarInsCliente']))
    {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $direccion = $_POST['direccion'];
        $telefono1 = $_POST['telefono1'];
        $telefono2 = $_POST['telefono2'];

        if(!preg_match('`^[a-zA-Z ,ºáéíóúÁÉÍÓÚñÑ]{1,50}$`', $nombre)){
            $nombre = "Nombre erróneo";
        }

        if(!preg_match('`^[a-zA-Z ,ºáéíóúÁÉÍÓÚñÑ]{1,50}$`', $apellidos)){
            $apellidos = "Apellidos erróneos";
        }

        if(!preg_match('`^[0-9]{9}$`', $telefono1)){
            $telefono1 = "Teléfono erróneo";
        }

        if(!preg_match('`^[0-9]{9}$`', $telefono2) && $telefono2 != ""){
            $telefono2 = "Teléfono erróneo";
        }

        $password = md5(md5($password));

        $insertar = db_query("insert into clientes values (null, '$nombre', '$apellidos', '$direccion', '$telefono1', '$telefono2', '$usuario', '$password')");
        echo 'Los datos se han introducido correctamente';
        db_close();
        ?>
                            <meta http-equiv="refresh" content="0;url=clientes.php?e=1">

                            <?php
    }

    //Función que genera una tabla con los clientes según la consulta que se le pase como parámetro.
    function tablaClientes($cons){
        ?>
                   <div class="panel panel-primary">
                       <div class="panel-heading">
                           Tabla de clientes
                       </div>
                       <div class="panel-body">



                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Dirección</th>
                                <th>Teléfono 1</th>
                                <th>Teléfono 2</th>
                                <th>Acciones</th>
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
                                            <span class="fa fa-pencil"></span> Modificar</a>
                                        </td>
                                    </tr>

                                    <?php
                    }
                    db_close();
                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                    <ul class="pagination">
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href="">5</a></li>
                        <li><a href="">6</a></li>
                        <li><a href="">7</a></li>
                        <li><a href="">8</a></li>
                        <li><a href="">9</a></li>
                        <li><a href="">10</a></li>
                    </ul>
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
