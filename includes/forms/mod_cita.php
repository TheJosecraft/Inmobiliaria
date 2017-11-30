<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.js"></script>

</head>

<body>

    <?php
        include '../../conexion.php';

         $cons_cita = "select *
                            from citas
                            where id = $_GET[id]";
            if (!$cons_cita)
            {
                echo "Hay un error en la consulta";
            }?>
    <?php
        include 'funciones.php';

        menu(5);

        $datos = mysqli_query($conexion, $cons_cita);
            $datos = mysqli_fetch_array($datos, MYSQLI_ASSOC);
            mysqli_close($conexion);
        ?>
        <div class="container">
        <h1>Modificar cita</h1>

                    <form action=# method="post" enctype="multipart/form-data">
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

                            include '../../conexion.php';
                            $cons_idCliente = "select id, nombre, apellidos
                                                from clientes
                                                where id > 0";

                            $id_Cliente = mysqli_query($conexion, $cons_idCliente);
                            while($fila = mysqli_fetch_array($id_Cliente)){
                                echo "<option value=$fila[id]>$fila[nombre] $fila[apellidos]</option>";
                            }

                            mysqli_close($conexion);
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

//        echo $nombre.'</br>';
//        echo $apellidos.'</br>';
//        echo $direccion.'</br>';
//        echo $telefono1.'</br>';
//        echo $telefono2.'</br>';

        $cons_mod = "update citas
                    set motivo = '$motivo',
                    lugar = '$lugar',
                    cliente = $cliente,
                    hora = '$hora',
                    fecha = '$fecha'
                    where id = $id";

        include '../../conexion.php';
        $modificar = mysqli_query($conexion, $cons_mod);
        mysqli_close($conexion);

        echo '<h2 class=text-center>Los datos se han actualizado correctamente</h2>';
        header("refresh:2;url=../../citas.php");
    }

    ?>
        </div>

    <?php
    footer();
    ?>
</body>

</html>
