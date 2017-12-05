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
         $cons_cita = "select *
                            from citas
                            where id = $_GET[id]";
            if (!$cons_cita)
            {
                echo "Hay un error en la consulta";
            }?>
    <?php

        menu(5);

        $datos = db_query($cons_cita);
        $datos = mysqli_fetch_array($datos, MYSQLI_ASSOC);
        db_close();
        ?>
        <div class="container">
        <h1>Modificar cita</h1>

                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Id</label>
                            <input class="form-control" type="text" name="id" value="<?php echo $datos['id'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Motivo</label>
                            <input class="form-control" type="text" name="motivo" value="<?php echo $datos['motivo'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Lugar</label>
                            <input class="form-control" type="text" name="lugar" value="<?php echo $datos['lugar'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Cliente</label>
                            <select class="form-control" name="id_cliente" id="">
                        <?php

                            $cliente = db_query("select id, nombre, apellidos from clientes where id > 0");
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
                    </select>
                        </div>
                        <div class="form-group">
                            <label for="">Hora</label>
                            <input class="form-control" type="time" name="hora" value="<?php echo $datos['hora'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Fecha</label>
                            <input class="form-control" type="date" name="fecha" value="<?php echo $datos['fecha'] ?>">
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
