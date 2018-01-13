<?php
include '../funciones.php';
sesiones(true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mis citas</title>
    <?php
    cabecera();
    ?>
    <link type="text/css" href="../../css/citas2.css" rel="stylesheet">
</head>
<body>
    <?php
    menu(0);
    ?>
    <div class="container" id="wrap">
    <h1>Mis citas</h1>
     <?php
        $fecha = time();
        $diasMesAnterior = array();

        if(isset($_GET['mesAnterior'])){
            $mes = $_GET['mesAnterior'];
            $anio = $_GET['anio'];
            calendario($anio, $mes, false);
        }elseif(isset($_GET['mesPosterior'])){
            $mes = $_GET['mesPosterior'];
            $anio = $_GET['anio'];
            calendario($anio, $mes, false);
        }elseif(isset($_GET['mesActual'])){
            $mes = $_GET['mesActual'];
            calendario($anio, $mes);
        }elseif(isset($_GET['dia'])){
            $mes = $_GET['mes'];
            $anio = $_GET['anio'];
            calendario($anio, $mes, false);
        }else if(isset($_GET['enviarBuscar'])){
            $busqueda = $_GET['buscar'];
            $consulta_busqueda = "select cit.id cit_id, cit.fecha, cit.hora, cit.motivo, cit.lugar, cit.id_cliente, cli.id, cli.nombre
                        from citas cit, clientes cli
                        where cit.id_cliente = cli.id
                        and (cit.fecha like '%$busqueda%'
                        or cli.nombre like '%$busqueda%')
                        order by fecha, hora";
            tablaCitas($consulta_busqueda);
        }else{
            calendario($anio);
        }
    ?>

    </div>
    <?php
    footer();
    ?>
</body>
</html>
