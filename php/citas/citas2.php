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

    //Variable que almacena el mes actual
    $mes = date('m');

    //Variable que almacena el año actual
    $anio = date('Y');

    //Función que dibuja un calendario con los datos del año y mes que se le pasan como argumentos
    function calendario($a, $m = 1, $activo = true){
        if($activo){
            $mes = date('m');
        }else{
            $mes = $m;
        }
        $anio = $a;

        //Color para los días laborables
        $colorLaborales = "#2c3e50";

        //Color para los fines de semana
        $colorFines = "#95a5a6";

        //Color para los días con cita
        $colorCitas = "#DF5757";

        //Color para el día actual
        $colorActual = "#18bc9c";
        $celdas = 0;
        $cont = 0;
            ?>
            <div class="row">
                <div class="col-md-3">
                    <ul class="pagination" id="calendar-pag">
                        <li><a href="?mesAnterior=<?php echo ($mes != 1 ? $mes - 1 : 12);?>&anio=<?php echo ($mes != 1 ? $anio : $anio - 1) ?>"><span class="fa fa-arrow-left"></span> Anterior</a></li>
                        <li><a href="?mesPosterior=<?php echo ($mes != 12 ? $mes + 1 : 1);?>&anio=<?php echo ($mes != 12 ? $anio : $anio + 1) ?>">Siguiente <span class="fa fa-arrow-right"></span></a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-md-offset-2">
                    <h2>
                        <?php echo nombreMes($mes).' '.$anio; ?>
                    </h2>
                </div>
                <div class="col-md-1">
                    <ul class="pagination" id="calendar-pag">
                        <li><a href="?mesActual=<?php echo date('m'); ?>">Actual</a></li>
                    </ul>
                </div>
            </div>
            <table class="table table-responsive table-bordered calendario">
               <thead>
                <tr>
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miércoles</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                    <th>Sábado</th>
                    <th>Domingo</th>
                </tr>
                </thead>
                <tbody>
                <tr>
<?php
        for ($i = 0; $i < diasMes($mes - 1, $anio); $i++)
        {
            $diasMesAnterior[$i] = $i + 1;
        }
        rsort($diasMesAnterior);
        for ($i = diaSemana($mes, $anio); $i > 1; $i--){
            ?>
    <td class="prev-month">
        <?php echo $diasMesAnterior[$i - 2] ?>
    </td>

<?php
            $celdas++;
            $cont++;
        }
        for ($i = 1; $i <= diasMes($mes, $anio); $i++){
            if ($cont < 5){
                if (isCita($anio, $mes, $i)) {
                    celda($colorCitas, $i, $anio, $mes, "festivo");
                }elseif(date('d') == $i && date('m') == $mes){
                    celda($colorActual, $i, $anio, $mes, "actual");
                }
                else{
                    celda($colorLaborales, $i, $anio, $mes);
                }
                $celdas++;
                $cont++;
            }else{
                if (isCita($anio, $mes, $i)){
                    celda($colorCitas, $i, $anio, $mes, "festivo");
                }elseif(date('d') == $i && date('m') == $mes){
                    celda($colorActual, $i, $anio, $mes);
                }else{
                    celda($colorFines, $i, $anio, $mes);
                }
               $celdas++;
               $cont++;
            }
            if($cont % 7 == 0){
                echo '</tr></tr>';
                $cont = 0;
            }
        }
        if($celdas < 42){
            $dia = 1;
                for ($i = $celdas; $i < 42; $i++)
                {
                    ?>
    <td class="next-month">
        <span class="pull-right"><?php echo $dia ?></span>
    </td>

    <?php
                    $dia++;
                    $cont++;
                    if($cont % 7 == 0){
                        echo '</tr></tr>';
                        $cont = 0;
                }
            }
        }
        ?>
        <tr>
            </tbody>
            </table>
            <?php
    }

        //Función que devuelve cuántos dias tiene el mes que recibe
    function diasMes ($m, $a){
        $marca = mktime(0, 0, 0, $m, 1, $a);
        return date('t', $marca);
    }

    //Función que devuelve si un día hay cita o no
    function isCita($a, $m, $d){
        $c = array();
        $fechas = db_query("select fecha from citas");
        while($fila = mysqli_fetch_array($fechas)){
            $fecha = strtotime($fila['fecha']);
            $anio = date('Y', $fecha);
            $mes = date('m', $fecha);
            $mes = ltrim($mes, '0');
            $dia = date('d', $fecha);
            $c[$anio][$mes][] = $dia;
        }
        if(array_key_exists($a, $c)){
            if(array_key_exists($m, $c[$a])){
                for($i = 0; $i < count($c[$a][$m]); $i++){
                if ($c[$a][$m][$i] == $d)
                {
                    return true;
                }
            }
            }
        }
    }

    //Función que devuelve el día de la semana en el que empieza el mes
    function diaSemana ($m, $a)
    {
        $marca = mktime(0, 0, 0, $m, 1, $a);
        return date('N', $marca);
    }

    function celda($color, $i, $anio, $mes, $clase = ""){
        ?>
            <td class="<?php echo $clase ?>" bgcolor="<?php echo $color ?>">
               <div class="row">
                   <div class="col-md-12">
                       <span class="pull-right" href="?dia=<?php echo $i ?>&mes=<?php echo $mes ?>&anio=<?php echo $anio ?>">
                    <?php echo $i ?>
                </span>
                   </div>
               </div>
               <?php
//                    $anio = $_GET['anio'];
//                    $mes = $_GET['mes'];
//                    $fecha = mktime(0,0,0, $mes, $anio);
//                    $fecha = date('Y-m-d', $fecha);
                ?>
                <div class="scroll">
                    <?php
                        $fecha = mktime(0, 0, 0, $mes, $i, $anio);
                        $fecha = date('Y-m-d', $fecha);
//                        echo "select * from citas where fecha = '$fecha' order by hora";
                        cita("select * from citas where fecha = '$fecha' order by hora");
                    ?>

                </div>

            </td>
    <?php
    }

    function cita($cons){
        ?>
        <div class="row">
            <?php

            $datos_cons = db_query($cons);
                 while($fila = mysqli_fetch_array($datos_cons, MYSQLI_ASSOC)){
                    $nombres = db_query("select nombre, apellidos from clientes where id = $fila[id_cliente]");
                    $nombre = mysqli_fetch_array($nombres);
                    db_close();

                    $telefonos = db_query("select telefono1, telefono2 from clientes where id = $fila[id_cliente]");
                    $telefono = mysqli_fetch_array($telefonos);
                    db_close();

                     if($telefono['telefono2'] != ""){
                        $contenido = "$fila[motivo] <br><i class='fa fa-map-marker'></i> $fila[lugar] <br><i class='fa fa-user'></i> $nombre[nombre] $nombre[apellidos] <br><i class='fa fa-phone'></i> $telefono[telefono1] <br><i class='fa fa-mobile-phone'></i> $telefono[telefono2]";
                     }else{
                        $contenido = "$fila[motivo] <br><i class='fa fa-map-marker'></i> $fila[lugar] <br><i class='fa fa-user'></i> $nombre[nombre] $nombre[apellidos] <br><i class='fa fa-phone'></i> $telefono[telefono1]";
                     }

                    ?>
                    <div class="col-xs-8 col-xs-offset-2 celdac citajs">
                    <span class="fa fa-clock-o"></span><a href="#" data-toggle="popover" title="Información" data-html="true" data-content="<?php echo $contenido ?>"> <?php echo substr($fila['hora'], 0, 5);?></a>
                    </div>
                     <?php
                    }
                    ?>
        <?php
        db_close();
    }
            ?>
        </div>
        <div class="flyout hidden">&nbsp;</div>
        <?php
function tablaCitas($cons){
    ?>
    <br>
    <div class="row">
       <div class="col-sm-12">
           <div class="table-responsive">
            <table class="table table-bordered table-hover">
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
                                    <i class="glyphicon glyphicon-search"></i>
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
