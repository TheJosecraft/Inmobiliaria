<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar inmueble</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.js"></script>

</head>

<body>

    <?php
        include '../../conexion.php';

         $cons_cliente = "select *
                            from inmuebles
                            where id = $_GET[id]";
            if (!$cons_cliente)
            {
                echo "Hay un error en la consulta";
            }?>
        <?php
        include 'funciones.php';

        menu(4);
        ?>
            <div class="container">
                <h1>Modificar inmueble</h1>

                <?php
            $datos = mysqli_query($conexion, $cons_cliente);
            $datos = mysqli_fetch_array($datos, MYSQLI_ASSOC);
            mysqli_close($conexion);
            ?>
                    <form action=# method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Id</label>
                            <input class="form-control" type="text" name="id" value="<?php echo $datos['id'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Dirección</label>
                            <input class="form-control" type="text" name="direccion" value="<?php echo $datos['direccion'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Descripción</label>
                            <textarea class="form-control" type="text" name="descripcion"><?php echo $datos['descripcion'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Precio</label>
                            <input class="form-control" type="text" name="precio" value="<?php echo $datos['precio'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Cliente</label>
                            <select class="form-control" name="id_cliente" id="">
                        <?php

                            include '../../conexion.php';
                            $cons_idCliente = "select id, nombre, apellidos
                                                from clientes";

                            $id_Cliente = mysqli_query($conexion, $cons_idCliente);
                            while($fila = mysqli_fetch_array($id_Cliente)){
                                echo "<option value=$fila[id]>$fila[nombre] $fila[apellidos]</option>";
                            }

                            mysqli_close($conexion);
                        ?>
                    </select>
                        </div>
                        <div class="form-group">
                            <label for="">Imagen</label>
                            <input class="form-control" type="file" name="imagen">
                            <input type="hidden" name="viejaImagen" value="<?php echo $datos['imagen'] ?>">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="ModInm">
                            <input class="btn btn-default" type="reset">
                        </div>

                    </form>

                    <?php

    if (isset($_POST['ModInm']))
    {
        $id = $_POST['id'];
        $direccion = $_POST['direccion'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $id_cliente = $_POST['id_cliente'];
        $viejaImagen = $_POST['viejaImagen'];

        $imagen = $_FILES['imagen'];

        echo $imagen['name'];

        $rutaImg = "../../img/";
        $rutaInmuebles = $rutaImg."inmuebles/";
        $nombreImagen = "";

        if($imagen['name'] != ""){

//            unlink($rutaImg.$rutaInmuebles.$viejaImagen);

            switch ($imagen['type'])
            {
                case 'image/png':
                    $nombreImagen = "inmueble".$id.".png";
                    move_uploaded_file($imagen['tmp_name'], $rutaInmuebles.$nombreImagen);
                    break;

                case 'image/jpeg':
                    $nombreImagen = "inmueble".$id.".jpg";
                    move_uploaded_file($imagen['tmp_name'], $rutaInmuebles.$nombreImagen);
                    break;
                default:
                    echo "El tipo de imagen no es correcto";
                    break;
            }

            $cons_mod = "update inmuebles
                    set direccion = '$direccion',
                    descripcion = '$descripcion',
                    precio = $precio,
                    id_cliente = $id_cliente,
                    imagen = '$nombreImagen'
                    where id = $id";

        }else{
            $cons_mod = "update inmuebles
                    set direccion = '$direccion',
                    descripcion = '$descripcion',
                    precio = $precio,
                    id_cliente = $id_cliente,
                    imagen = '$viejaImagen'
                    where id = $id";
        }


        include '../../conexion.php';
        $modificar = mysqli_query($conexion, $cons_mod);
        mysqli_close($conexion);
        ?>
        <meta http-equiv="refresh" content="0;url=inmuebles.php?e=1">
        <?php
    }

    ?>
            </div>

            <?php
    footer();
    ?>
</body>

</html>
