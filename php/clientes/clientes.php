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
                                    <i class="fa fa-search"></i>
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
//                    $paginacion = new Pagination(mysqli_num_rows($clientes));
//                    $limite = $paginacion->getNext();
//                    echo $limite;
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
