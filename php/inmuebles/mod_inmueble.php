<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar inmueble</title>
    <?php
    include '../funciones.php';
    cabecera();
    ?>
</head>

<body>

    <?php
         $cons_cliente = "select *
                            from inmuebles
                            where id = $_GET[id]";
            if (!$cons_cliente)
            {
                echo "Hay un error en la consulta";
            }?>
        <?php

        menu(4);
        ?>
            <div class="container" id="wrap">
                <h1>Modificar inmueble</h1>

                <?php
            $datos = db_query($cons_cliente);
            $datos = mysqli_fetch_array($datos, MYSQLI_ASSOC);
            db_close();
            ?>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Id</label>
                            <input class="form-control" type="text" name="id" value="<?php echo $datos['id'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Dirección</label>
                            <input class="form-control" type="text" name="direccion" id="direccion" value="<?php echo $datos['direccion'] ?>"><span style="display:none"></span><span style="display:none"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Descripción</label>
                            <textarea class="form-control" type="text" name="descripcion" id="descripcion" ><?php echo $datos['descripcion'] ?></textarea><span style="display:none"></span><span style="display:none"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Precio</label>
                            <input class="form-control" type="text" name="precio" id="precio" value="<?php echo $datos['precio'] ?>"><span style="display:none"></span><span style="display:none"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Cliente</label>
                            <select class="form-control" name="id_cliente" id="cliente">
                        <?php
                            $id_Cliente = db_query("select id, nombre, apellidos from clientes");
                            while($fila = mysqli_fetch_array($id_Cliente)){
                                if($datos['id_cliente'] == $fila['id']){
                                    echo "<option value=$fila[id] selected>$fila[nombre] $fila[apellidos]</option>";
                                }else{
                                    echo "<option value=$fila[id]>$fila[nombre] $fila[apellidos]</option>";
                                }

                            }
                            db_close();
                        ?>
                    </select><span style="display:none"></span><span style="display:none"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Imagen</label>
                            <input class="form-control" type="file" name="imagen" id="imagen">
                            <input type="hidden" name="viejaImagen" value="<?php echo $datos['imagen'] ?>"><span style="display:none"></span><span style="display:none"></span>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="ModInm" id="enviarModInmueble">
                            <input class="btn btn-default" type="reset">
                        </div>

                    </form>

                    <div class="alert alert-warning" id="warning" style="display:none">

                    </div>
                    <div class="alert alert-danger" id="alerta" style="display:none">

                    </div>

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

        $rutaImg = "../../img/";
        $rutaInmuebles = $rutaImg."inmuebles/";
        $nombreImagen = "";

        if(!preg_match('`^[a-zA-Z0-9 ,ºáéíóúÁÉÍÓÚñÑ]{1,150}$`', $direccion)){
            $direccion = "Dirección errónea";
        }

        if($imagen['name'] != ""){

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

        db_query($cons_mod);
        db_close();
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
