<?php
include '../funciones.php';
sesiones();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Insertar Cliente</title>
        <?php
    cabecera();
    ?>
    </head>

    <body>
        <?php
    menu(3);
    ?>
            <div class="container" id="wrap">
                <?php
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
    <h1>Insertar cliente</h1>
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="id">Id</label>
                            <input class="form-control" type="text" name="id" value="<?php echo $id[0];?>" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                            <label for="nombre">Usuario</label>
                            <input class="form-control" type="text" id="usuario" name="usuario" placeholder="Usuario"><span style="display:none"></span><span style="display:none"></span>
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
                                <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre"><span style="display:none"></span><span style="display:none"></span>
                        </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="apellidos">Apellidos</label>
                                <input class="form-control" type="text" id="apellidos" name="apellidos" placeholder="Apellidos"><span style="display:none"></span><span style="display:none"></span>
                        </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input class="form-control" type="text" id="direccion" name="direccion" placeholder="Dirección"><span style="display:none"></span><span style="display:none"></span>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                               <div class="form-group">
                            <label for="telefono1">Teléfono 1</label>
                            <input class="form-control" type="text" id="telefono1" name="telefono1" placeholder="Teléfono"><span style="display:none"></span><span style="display:none"></span>
                        </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                            <label for="telefono2">Teléfono 2 *</label>
                            <input class="form-control" type="text" id="telefono2" name="telefono2" placeholder="Teléfono"><span style="display:none"></span><span style="display:none"></span>
                        </div>
                           </div>
                       </div>


                        <p class="text-muted">* Estos campos son opcionales</p>
                        <div class="modal-footer">
                            <a href="clientes.php" class="pull-left">Volver</a>
                            <button type="submit" class="btn btn-primary" id="enviarInsCliente" name="enviarInsCliente">Insertar</button>
                        </div>
                        <div class="alert alert-warning" id="warning" style="display:none">

                        </div>
                        <div class="alert alert-danger" id="alerta" style="display:none">

                        </div>
                    </form>
            </div>
            <?php
    footer();
    ?>
    </body>

    </html>
