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
                            from noticias
                            where id = $_GET[id]";
            if (!$cons_cliente)
            {
                echo "Hay un error en la consulta";
            }?>
        <?php

        menu(2);
        ?>
            <div class="container">
                <h1>Modificar noticia</h1>

                <?php
            $datos = db_query($cons_cliente);
            $datos = mysqli_fetch_array($datos, MYSQLI_ASSOC);
            db_close();
            ?>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">ID</label>
                            <input class="form-control" type="text" value="<?php echo $datos['id'] ?>" name="id" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Titular</label>
                            <input class="form-control" type="text" value="<?php echo $datos['titular'] ?>" name="titular">
                        </div>
                        <div class="form-group">
                            <label for="">Contenido</label>
                            <textarea class="form-control" name="contenido" id="" cols="30" rows="10"><?php echo $datos['contenido'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Imagen</label>
                            <input class="form-control" type="file" name="imagen">
                            <input type="hidden" name="viejaImagen" value="<?php echo $datos['imagen'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Fecha</label>
                            <input class="form-control" type="date" name="fecha" value="<?php echo $datos['fecha'] ?>">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="enviarInsNot">
                            <input class="btn btn-default" type="reset">
                        </div>
                    </form>
                    <?php

    if (isset($_POST['enviarInsNot']))
    {
        $id = $_POST['id'];
        $titular = $_POST['titular'];
        $contenido = $_POST['contenido'];
        $imagen = $_FILES['imagen'];
        $fecha = $_POST['fecha'];
        $viejaImagen = $_POST['viejaImagen'];

        $imagen = $_FILES['imagen'];

        $rutaImg = "../../img/";
        $rutaNoticias = $rutaImg."noticias/";
        $nombreImagen = "";

        if($imagen['name'] != ""){

            switch ($imagen['type'])
            {
                case 'image/png':
                    $nombreImagen = "noticia".$id.".png";
                    move_uploaded_file($imagen['tmp_name'], $rutaNoticias.$nombreImagen);
                    break;

                case 'image/jpeg':
                    $nombreImagen = "noticia".$id.".jpg";
                    move_uploaded_file($imagen['tmp_name'], $rutaNoticias.$nombreImagen);
                    break;
                default:
                    echo "El tipo de imagen no es correcto";
                    break;
            }

            $cons_mod = "update noticias
                    set titular = '$titular',
                    contenido = '$contenido',
                    imagen = '$nombreImagen'.
                    fecha = '$fecha'
                    where id = $id";

        }else{
            $cons_mod = "update noticias
                    set titular = '$titular',
                    contenido = '$contenido',
                    imagen = '$viejaImagen',
                    fecha = '$fecha'
                    where id = $id";
        }

        db_query($cons_mod);
        db_close();
        ?>
        <meta http-equiv="refresh" content="0;url=noticias.php?e=3">
        <?php

    }

    ?>
            </div>

            <?php
    footer();
    ?>
</body>

</html>
