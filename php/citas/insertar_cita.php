<?php
include '../funciones.php';
sesiones();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Insertar cita</title>
        <?php cabecera() ?>
    </head>

    <body>
        <?php menu(5); ?>

        <div class="container" id="wrap">
           <h1>Insertar cita</h1>
        <?php
            $cons_auto_inc = "SELECT AUTO_INCREMENT
                        FROM information_schema.TABLES
                        WHERE TABLE_SCHEMA =  'inmobiliaria'
	                    and TABLE_NAME = 'citas'";
            if (!$cons_auto_inc)
            {
                echo "Hay errores en la consulta";
            }else{
                $fila = db_query($cons_auto_inc);
                $id = mysqli_fetch_array($fila);
            }
        ?>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="">Id</label>
                        <input class="form-control" type="text" name="id" value="<?php echo $id[0];?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Motivo</label>
                        <input class="form-control" type="text" name="motivo" id="motivo"><span style="display:none"></span><span style="display:none"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Lugar</label>
                        <input class="form-control" type="text" name="lugar" id="lugar"><span style="display:none"></span><span style="display:none"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Cliente</label>
                        <select class="form-control" name="cliente" id="cliente">
                                        <?php
                                            db_close();
                                            $id_Cliente = db_query("select id, nombre, apellidos from clientes where nombre not like 'Disponible'");
                                            while($fila = mysqli_fetch_array($id_Cliente)){
                                                echo "<option value=$fila[id]>$fila[nombre] $fila[apellidos]</option>";
                                            }
                                            db_close();
                                        ?>
                                </select><span style="display:none"></span><span style="display:none"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Hora</label>
                        <input class="form-control" type="time" name="hora" id="hora"><span style="display:none"></span><span style="display:none"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Fecha</label>
                        <input class="form-control" type="date" name="fecha" id="fecha"><span style="display:none"></span><span style="display:none"></span>
                    </div>
                    <div class="modal-footer">
                        <a class="pull-left" href="citas.php">Volver</a>
                        <button type="submit" class="btn btn-primary" name="enviarInsCita" id="enviarInsCita">Insertar</button>
                    </div>
                    <div class="alert alert-warning" id="warning" style="display:none">

                    </div>
                    <div class="alert alert-danger" id="alerta" style="display:none">

                    </div>
                </form>
            </div>
            <?php
            if(isset($_POST['enviarInsCita'])){
                //Motivo de la cita
                $motivo = $_POST['motivo'];

                //Lugar de la cita
                $lugar = $_POST['lugar'];

                //Id de cliente
                $cliente = $_POST['cliente'];

                //Hora de la cita
                $hora = $_POST['hora'];

                //Fecha de la cita
                $fecha = $_POST['fecha'];


                if(!preg_match('`^[a-zA-Z0-9 ,ºáéíóúÁÉÍÓÚñÑ]{1,150}$`', $lugar)){
                    $lugar = "Lugar erróneo";
                }

                if(!preg_match('`^[a-zA-Z ,ºáéíóúÁÉÍÓÚñÑ]{1,100}$`', $motivo)){
                    $motivo = "Motivo erróneo";
                }

                //Inserción de datos en la base de datos
                db_query("insert into citas values (null, '$fecha', '$hora', '$motivo', '$lugar', $cliente)");
                db_close();
                ?>
<!--                   Recarga de la página para apreciar los cambios-->
                       <meta http-equiv="refresh" content="0;url=citas.php?e=2">

                        <?php
            }
        ?>

        <?php footer(); ?>
    </body>

    </html>
