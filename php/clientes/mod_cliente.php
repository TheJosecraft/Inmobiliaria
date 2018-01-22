<?php
include '../funciones.php';
sesiones(true);
?>
    <!DOCTYPE html>

    <html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modificar cliente</title>
        <?php
    cabecera();
    ?>
    </head>

    <body>

        <?php

         $cons_cliente = "select *
                            from clientes
                            where id = $_GET[id]";
            if (!$cons_cliente)
            {
                echo "Hay un error en la consulta";
            }?>
            <?php
        menu(3);
        ?>
                <div class="container" id="wrap">
                    <h1>Modificar cliente</h1>
                    <div class="row">
                        <div class="col-md-12">
                            <?php
            $datos = db_query($cons_cliente);
            $datos = mysqli_fetch_array($datos, MYSQLI_ASSOC);
            ?>
                                <form action=# method=post>
                                    <div class=form-group>
                                        <?php
                                    if($_SESSION['usuario'] == "admin"){
                                        ?>
                                            <label for="id">Id</label>
                                            <input class="form-control" type="text" id="id" name="id" value="<?php echo $datos['id'] ?>" readonly>
                                            <?php
                                    }else{
                                        ?>
                                                <input class="form-control" type="hidden" id="id" name="id" value="<?php echo $datos['id'] ?>" readonly>
                                                <?php
                                    }
                                ?>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nombre">Usuario</label>
                                                <?php
                                    if($_SESSION['usuario'] == "admin"){
                                        ?>
                                                    <input class="form-control" type="text" id="usuario" name="usuario" value="<?php echo $datos['nombre_usuario'] ?>" placeholder="Usuario"><span style="display:none"></span><span style="display:none"></span>
                                                    <?php
                                    }else{
                                        ?>
                                                        <input class="form-control" type="text" id="usuario" name="usuario" value="<?php echo $datos['nombre_usuario'] ?>" placeholder="Usuario" readonly><span style="display:none"></span><span style="display:none"></span>
                                                        <?php
                                    }
                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nombre">Contraseña</label>
                                                <input class="form-control" type="password" id="password" name="password" placeholder="Contraseña"><span style="display:none"></span><span style="display:none"></span>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class=form-group>
                                                <label for="nombre">Nombre</label>
                                                <?php
                                    if($_SESSION['usuario'] == "admin"){
                                        ?>
                                                    <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $datos['nombre'] ?>"><span style="display:none"></span><span style="display:none"></span>
                                                    <?php
                                    }else{
                                        ?>
                                                        <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $datos['nombre'] ?>" readonly><span style="display:none"></span><span style="display:none"></span>
                                                        <?php
                                    }
                                ?>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class=form-group>
                                                <label for="apellidos">Apellidos</label>
                                                <?php
                                    if($_SESSION['usuario'] == "admin"){
                                        ?>
                                                    <input class="form-control" type="text" id="apellidos" name="apellidos" value="<?php echo $datos['apellidos'] ?>"><span style="display:none"></span><span style="display:none"></span>
                                                    <?php
                                    }else{
                                        ?>
                                                        <input class="form-control" type="text" id="apellidos" name="apellidos" value="<?php echo $datos['apellidos'] ?>" readonly><span style="display:none"></span><span style="display:none"></span>
                                                        <?php
                                    }
                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class=form-group>
                                        <label for="direccion">Dirección</label>
                                        <input class="form-control" type="text" id="direccion" name="direccion" value="<?php echo $datos['direccion'] ?>"><span style="display:none"></span><span style="display:none"></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class=form-group>
                                                <label for="telefono1">Teléfono 1</label>
                                                <input class="form-control" type="text" id="telefono1" name="telefono1" value="<?php echo $datos['telefono1'] ?>"><span style="display:none"></span><span style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class=form-group>
                                                <label for="telefono2">Telefono 2</label>
                                                <input class="form-control" type="text" id="telefono2" name="telefono2" value="<?php echo $datos['telefono2'] ?>"><span style="display:none"></span><span style="display:none"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <?php
                                if($_SESSION['usuario'] == "admin"){
                                  ?>
                                            <a class="pull-left" href="clientes.php">Volver</a>
                                            <?php
                                }else{
                                    ?>
                                                <a class="pull-left" href="../cliente/datos.php">Volver</a>
                                                <?php
                                }
                                ?>

                                                    <input class="btn btn-primary pull-right" type="submit" id="enviarInsCliente" name="enviarModCliente">
                                    </div>

                                </form>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning" id="warning" style="display:none;margin-top:15px">

                            </div>
                            <div class="alert alert-danger" id="alerta" style="display:none;margin-top:15px">

                            </div>
                        </div>

                    </div>

                    <?php
            db_close();

    if (isset($_POST['enviarModCliente']))
    {
        $id = $_POST['id'];
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $direccion = $_POST['direccion'];
        $telefono1 = $_POST['telefono1'];
        $telefono2 = $_POST['telefono2'];

        if(!preg_match('`^[a-zA-Z ,ºáéíóúÁÉÍÓÚñÑ]{1,50}$`', $nombre)){
            $direccion = "Nombre erróneo";
        }

        if(!preg_match('`^[a-zA-Z ,ºáéíóúÁÉÍÓÚñÑ]{1,50}$`', $apellidos)){
            $direccion = "Apellidos erróneos";
        }

        if(!preg_match('`^[0-9]{9}$`', $telefono1)){
            $telefono1 = "Teléfono erróneo";
        }

        if(!preg_match('`^[0-9]{9}$`', $telefono2) && $telefono2 != ""){
            $telefono2 = "Teléfono erróneo";
        }

        $viejaPassword = db_query("select pass from clientes where id = $_GET[id]");
        $viejaPassword = mysqli_fetch_array($viejaPassword);

        if($password != ""){
            $password = md5(md5($password));
        }else{
            $password = $viejaPassword[0];
        }
        $cons_mod = "update clientes
                    set nombre_usuario = '$usuario',
                    pass = '$password',
                    nombre = '$nombre',
                    apellidos = '$apellidos',
                    direccion = '$direccion',
                    telefono1 = '$telefono1',
                    telefono2 = '$telefono2'
                    where id = $id";

        $modificar = db_query($cons_mod);
        db_close();

        ?>
                        <meta http-equiv="refresh" content="0;url=../cliente/datos.php">
                        <?php
    }

    ?>
                </div>

                <?php
    footer();
    ?>
    </body>

    </html>
