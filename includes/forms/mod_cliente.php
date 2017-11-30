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
    <script type="text/javascript" src="../../js/main.js"></script>

</head>

<body>

    <?php
        include '../../conexion.php';

         $cons_cliente = "select *
                            from clientes
                            where id = $_GET[id]";
            if (!$cons_cliente)
            {
                echo "Hay un error en la consulta";
            }?>
        <?php
        include 'funciones.php';

        menu(3);
        ?>
            <div class="container">
                <h1>Modificar cliente</h1>

                <?php
            $datos = mysqli_query($conexion, $cons_cliente);
            $datos = mysqli_fetch_array($datos, MYSQLI_ASSOC);
            ?>
                    <form action=# method=post>
                        <div class=form-group>
                            <label for="id">Id</label>
                            <input class="form-control" type="text" id="id" name="id" value="<?php echo $datos['id'] ?>" readonly>
                        </div>
                        <div class=form-group>
                            <label for="nombre">Nombre</label>
                            <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $datos['nombre'] ?>">
                        </div>
                        <div class=form-group>
                            <label for="apellidos">Apellidos</label>
                            <input class="form-control" type="text" id="apellidos" name="apellidos" value="<?php echo $datos['apellidos'] ?>">
                        </div>
                        <div class=form-group>
                            <label for="direccion">Dirección</label>
                            <input class="form-control" type="text" id="direccion" name="direccion" value="<?php echo $datos['direccion'] ?>">
                        </div>
                        <div class=form-group>
                            <label for="telefono1">Teléfono 1</label>
                            <input class="form-control" type="text" id="telefono1" name="telefono1" value="<?php echo $datos['telefono1'] ?>">
                        </div>
                        <div class=form-group>
                            <label for="telefono2">Telefono 2</label>
                            <input class="form-control" type="text" id="telefono2" name="telefono2" value="<?php echo $datos['telefono2'] ?>">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" id="enviar" name="enviarModCliente">
                            <input class="btn btn-default" type="reset">
                        </div>

                    </form>
                    <?php
            mysqli_close($conexion);

    if (isset($_POST['enviarModCliente']))
    {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $direccion = $_POST['direccion'];
        $telefono1 = $_POST['telefono1'];
        $telefono2 = $_POST['telefono2'];

        $cons_mod = "update clientes
                    set nombre = '$nombre',
                    apellidos = '$apellidos',
                    direccion = '$direccion',
                    telefono1 = '$telefono1',
                    telefono2 = '$telefono2'
                    where id = $id";

        include '../../conexion.php';
        $modificar = mysqli_query($conexion, $cons_mod);
        mysqli_close($conexion);

        ?>
        <meta http-equiv="refresh" content="0;url=../../clientes.php?e=1">
        <?php
    }

    ?>
            </div>

            <?php
    footer();
    ?>
</body>

</html>
