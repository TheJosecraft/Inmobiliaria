<?php
include '../funciones.php';
sesiones();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Citas 2</title>
        <?php
    cabecera();
    ?>
            <link type="text/css" href="../../css/citas.css" rel="stylesheet">
            <link type="text/css" href="../../css/citas2.css" rel="stylesheet">
    </head>

    <body>
        <?php
    menu(5);

function tablaCitas($cons){
    ?>
    <br>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Tabla de búsqueda
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Motivo</th>
                                <th>Lugar</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Cliente</th>
                                <th>Teléfono 1</th>
                                <th>Teléfono 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Hola</td>
                                <td>Montilla</td>
                                <td>13/01/2018</td>
                                <td>14:00</td>
                                <td>José Carlos Raya León</td>
                                <td>638564461</td>
                                <td>957655755</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
    <?php
}
    ?>


<div class="container" id="wrap">

    <h1>Citas</h1>
<div class="row">
    <div class="col-sm-6 col-md-7 col-lg-8 hidden-xs">
        <a href="insertar_cita.php" class="btn bg-primary"><span class="fa fa-calendar-plus-o"></span> Nueva Cita</a>
    </div>

    <div class="col-xs-12 hidden-sm hidden-md hidden-lg" id="btn-xs-ins">
        <a href="insertar_cita.php" class="btn bg-primary btn-block"><span class="fa fa-calendar-plus-o"></span> Nueva Cita</a>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4 text-right">
        <form action="#" method="get">
            <div class="input-group">
                <input class="form-control" type="text" name="buscar" placeholder="Fecha o cliente">

                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="enviarBuscar">
                                    <i class="fa fa-search"></i>
                                </button>
                </div>
            </div>
        </form>
    </div>
</div>
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
