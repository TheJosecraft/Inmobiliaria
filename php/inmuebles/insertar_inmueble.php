<?php include('../funciones.php'); sesiones() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar inmueble</title>
    <?php cabecera() ?>
</head>

<body>
    <?php menu(3) ?>
    <?php
    $cons_auto_inc = "SELECT AUTO_INCREMENT
                FROM information_schema.TABLES
                WHERE TABLE_SCHEMA =  'inmobiliaria'
                and TABLE_NAME = 'inmuebles'";
    if (!$cons_auto_inc)
    {
        echo "Hay errores en la consulta";
    }else{
        $fila = db_query($cons_auto_inc);
        $id = mysqli_fetch_array($fila);
    }
    ?>
        <div class="container" id="wrap">
            <div class="row">
                <h1>Insertar inmueble</h1>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input class="form-control" type="text" name="id" value="<?php echo $id[0];?>" readonly><span style="display:none"></span><span style="display:none"></span>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Introduce la dirección del inmueble"><span style="display:none"></span><span style="display:none"></span>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" name="descripcion" maxlength="560" rows="8" id="descripcion" placeholder="Introduce la descripción del inmueble"></textarea><span style="display:none"></span><span style="display:none"></span>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input class="form-control" type="text" name="precio" id="precio" placeholder="Introduce el precio del inmueble"><span style="display:none"></span><span style="display:none"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cliente">Cliente</label>
                                <select class="form-control" name="cliente" id="cliente">
                                    <?php
                                        db_close();
                                        $id_Cliente = db_query("select id, nombre, apellidos from clientes");
                                        while($fila = mysqli_fetch_array($id_Cliente)){
                                            echo "<option value=$fila[id]>$fila[nombre] $fila[apellidos]</option>";
                                        }
                                        db_close();
                                    ?>
                    </select><span style="display:none"></span><span style="display:none"></span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input class="form-control" type="file" name="imagen" id="imagen"><span style="display:none"></span><span style="display:none"></span>
                    </div>
                    <div class="modal-footer">
                        <a href="inmuebles.php" class="pull-left">Volver</a>
                        <button type="submit" class="btn btn-primary" name="enviarInsInmueble" id="enviarInsInmueble">Insertar</button>
                    </div>
                    <div class="alert alert-warning" id="warning" style="display:none">

                    </div>
                    <div class="alert alert-danger" id="alerta" style="display:none">

                    </div>
                </form>
            </div>
        </div>
        <?php
    if (isset($_POST['enviarInsInmueble'])){
        $id = $_POST['id'];
        $direccion = $_POST['direccion'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $cliente = $_POST['cliente'];
        $imagen = $_FILES['imagen'];
        $rutaImg = "../../img/";
        $rutaInmuebles = $rutaImg."inmuebles/";
        $nombreImagen = "";
        //Se comprueba la dirección introducida
        if(!preg_match('`^[a-zA-Z0-9 ,ºáéíóúÁÉÍÓÚñÑ]{1,150}$`', $direccion)){
            $direccion = "Dirección errónea";
        }
        //Se comprueba el precio introducido
        if(!preg_match('`^[0-9]{1,12}$`', $precio)){
            $precio = "Precio erróneo";
        }
        if (!file_exists($rutaImg))
        {
            mkdir($rutaImg);
        }
        if (!file_exists($rutaInmuebles))
        {
            mkdir($rutaInmuebles);
        }
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
        $cons_ins_inmueble = "insert into inmuebles values (null,
                                                            '$direccion',
                                                            '$descripcion',
                                                            $precio,
                                                            $cliente,
                                                            '$nombreImagen')";
        db_query($cons_ins_inmueble);
        db_close();
        ?>
            <meta http-equiv="refresh" content="0;url=inmuebles.php?e=1">
            <?php
    }
    ?>
                <?php footer() ?>
</body>

</html>
