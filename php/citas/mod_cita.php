<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar cita</title>
    <?php
    include '../funciones.php';
    cabecera();
    ?>

</head>

<body>
    <?php

        menu(5);

        //Consulta que obtiene todos los datos de la cita con la id indicada
        $datos = db_query("select * from citas where id = $_GET[id]");
        $datos = mysqli_fetch_array($datos, MYSQLI_ASSOC);
        db_close();
        ?>
        <div class="container" id="wrap">
        <h1>Modificar cita</h1>

<!--                   Formulario que carga todos los datos de la cita para que puedan se modificados-->
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Id</label>
                            <input class="form-control" type="text" name="id" value="<?php echo $datos['id'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Motivo</label>
                            <input class="form-control" type="text" name="motivo" id="motivo" value="<?php echo $datos['motivo'] ?>"><span style="display:none"></span><span style="display:none"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Lugar</label>
                            <input class="form-control" type="text" name="lugar" id="lugar" value="<?php echo $datos['lugar'] ?>"><span style="display:none"></span><span style="display:none"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Cliente</label>
                            <select class="form-control" name="id_cliente" id="cliente">
                        <?php

                            $cliente = db_query("select nombre, apellidos from clientes where id > 0");
                            while($fila = mysqli_fetch_array($cliente)){
                                if ($fila['id'] == $datos['id_cliente'])
                                {
                                    echo "<option value=$fila[id] selected>$fila[nombre] $fila[apellidos]</option>";
                                }
                                else
                                {
                                    echo "<option value=$fila[id]>$fila[nombre] $fila[apellidos]</option>";
                                }

                            }

                            db_close();
                        ?>
                            </select><span style="display:none"></span><span style="display:none"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Hora</label>
                            <input class="form-control" type="time" name="hora" id="hora" value="<?php echo $datos['hora'] ?>"><span style="display:none"></span><span style="display:none"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Fecha</label>
                            <input class="form-control" type="date" name="fecha" id="fecha" value="<?php echo $datos['fecha'] ?>"><span style="display:none"></span><span style="display:none"></span>
                        </div>

                        <input class="btn btn-primary" type="submit" name="enviarModCita">
                        <input class="btn btn-default" type="reset">
                    </form>
                    <?php

    if (isset($_POST['enviarModCita']))
    {
        $id = $_POST['id'];
        $motivo = $_POST['motivo'];
        $lugar = $_POST['lugar'];
        $cliente = $_POST['id_cliente'];
        $hora = $_POST['hora'];
        $fecha = $_POST['fecha'];


        $cons_mod = "update citas
                    set motivo = '$motivo',
                    lugar = '$lugar',
                    id_cliente = $cliente,
                    hora = '$hora',
                    fecha = '$fecha'
                    where id = $id";

        db_query($cons_mod);
        db_close();

        echo '<h2 class=text-center>Los datos se han actualizado correctamente</h2>';
        ?>
        <meta http-equiv="refresh" content="2;url=citas.php?e=1">
        <?php
    }

    ?>
        </div>

    <?php
    footer();
    ?>
</body>

</html>
