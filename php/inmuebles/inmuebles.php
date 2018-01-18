<?php
include '../funciones.php';
sesiones(true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmuebles</title>
    <?php
        cabecera();
    ?>

</head>

<body>
    <?php
    menu(4);
    ?>
        <div class="container" id="wrap">
            <div class="row equal">
                <div class="col-md-12" id="ver">
                    <h1>Inmuebles</h1>
                    <div class="row">
                       <?php
                        if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == "admin"){
                            ?>
                        <div class="col-sm-6 col-md-7 col-lg-8 hidden-xs">
                            <a class="btn bg-primary" href="insertar_inmueble.php"><span class="fa fa-building-o"></span> Nuevo Inmueble</a>
                        </div>

                        <div class="col-xs-12 hidden-sm hidden-md hidden-lg" id="btn-xs-ins">
                            <a class="btn bg-primary btn-block" data-toggle="modal" data-target="#insInm"><span class="fa fa-building-o"></span> Nuevo Inmueble</a>
                        </div>
                            <?php
                        }
                        ?>

                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4 text-right">
                            <form action="#" method="post">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="buscar" placeholder="Dirección, cliente, precio">

                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit" name="enviarBuscar">
                                    <i class="fa fa-search"></i>
                                </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    <?php
            if(isset($_POST['buscar'])){
                $busqueda = $_POST['buscar'];
                inmuebles("select inm.id id_inm, inm.direccion, inm.descripcion, inm.precio, inm.id_cliente, inm.imagen, cli.nombre
                                from inmuebles inm, clientes cli
                                where inm.id_cliente = cli.id
                                and (inm.direccion like '%$busqueda%'
                                or cli.nombre like '%$busqueda%'
                                or inm.precio like '%$busqueda%')
                                order by precio");
            }else{
                inmuebles("select * from inmuebles order by precio");
            }
        ?>
                </div>
            </div>
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
        </div>
    </div>
    <?php
    footer();
    ?>
</body>

</html>
