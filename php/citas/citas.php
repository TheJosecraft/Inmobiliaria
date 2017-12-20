<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    <link rel="stylesheet" type="text/css" href="../../css/citas.css">
    <?php include '../funciones.php';
    cabecera();
    ?>
</head>

<body>
    <?php

    menu(5);

    //Variable que almacena el mes actual
    $mes = date('m');

    //Variable que almacena el año actual
    $anio = date('Y');
    ?>
        <div class="container" id="wrap">
            <div class="row">
                <div class="col-md-3">
                    <div class="calendar">

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
        }else{
            calendario($anio);
        }
    ?>

        <div class="text-center">
            <div class="row">
                <ul class="pagination">
                    <li><a href="?mesAnterior=<?php echo ($mes != 1 ? $mes - 1 : 12);?>&anio=<?php echo ($mes != 1 ? $anio : $anio - 1) ?>"><span class="fa fa-arrow-left"></span> Anterior</a></li>
                    <li><a href="?mesActual=<?php echo date('m'); ?>">Actual</a></li>
                    <li><a href="?mesPosterior=<?php echo ($mes != 12 ? $mes + 1 : 1);?>&anio=<?php echo ($mes != 12 ? $anio : $anio + 1) ?>">Siguiente <span class="fa fa-arrow-right"></span></a></li>
                </ul>
            </div>
        </div>

    <?php
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
            <header>
                <h2><?php echo nombreMes($mes).' '.$anio; ?></h2>
            </header>

            <table class="table text-center square">
               <tr>
                <th>L</th>
                <th>M</th>
                <th>X</th>
                <th>J</th>
                <th>V</th>
                <th>S</th>
                <th>D</th>
               </tr>

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
        for ($i = 1; $i <= diasMes($mes, $anio); $i++)
        {
            if ($cont < 5)
            {
                if (isCita($anio, $mes, $i))
                {
                    ?><td class="festivo" bgcolor="<?php echo $colorCitas ?>"><a href="?dia=<?php echo "$i&mes=$mes"?>&anio=<?php echo $anio ?>"><?php echo $i ?></a></td><?php
                }
                elseif(date('d') == $i && date('m') == $mes){
                    ?><td class="actual" bgcolor="<?php echo $colorActual ?>"><a href="?dia=<?php echo $i ?>&mes=<?php echo $mes ?>&anio=<?php echo $anio ?>"><?php echo $i ?></a></td><?php
                }
                else{
                    ?><td bgcolor="<?php echo $colorLaborales ?>"><a href="?dia=<?php echo $i ?>&mes=<?php echo $mes ?>&anio=<?php echo $anio ?>"><?php echo $i ?></a></td><?php
                }
                $celdas++;
                $cont++;
            }else{
                if (isCita($anio, $mes, $i))
                {
                    ?><td class="festivo" bgcolor="<?php echo $colorCitas ?>"><a href="?dia=<?php echo "$i&mes=$mes"?>&anio=<?php echo $anio ?>"><?php echo $i ?></a></td><?php
                }elseif(date('d') == $i && date('m') == $mes){
                    ?><td class="overlay" bgcolor="<?php echo $colorActual ?>"><a href="?dia=<?php echo $i ?>&mes=<?php echo $mes ?>&anio=<?php echo $anio ?>"><?php echo $i ?></a></td><?php
                }
                else
                {
                    ?><td bgcolor="<?php echo $colorFines ?>"><a href="?dia=<?php echo $i ?>&mes=<?php echo $mes ?>&anio=<?php echo $anio ?>"><?php echo $i ?></a></td><?php
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
                        <?php echo $dia ?>
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
            </table>
    <?php
    }

    //Función que devuelve cuántos dias tiene el mes que recibe
    function diasMes ($m, $a){
        $marca = mktime(0, 0, 0, $m, 1, $a);
        return date('t', $marca);
    }

    //Función que devuelve el nombre del mes en español
    function nombreMes ($m){
        switch($m){
            case 1:
                return "Enero";
                break;
            case 2:
                return "Febrero";
                break;
            case 3:
                return "Marzo";
                break;
            case 4:
                return "Abril";
                break;
            case 5:
                return "Mayo";
                break;
            case 6:
                return "Junio";
                break;
            case 7:
                return "Julio";
                break;
            case 8:
                return "Agosto";
                break;
            case 9:
                return "Septiembre";
                break;
            case 10:
                return "Octubre";
                break;
            case 11:
                return "Noviembre";
                break;
            case 12:
                return "Diciembre";
                break;
        }
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
    ?>
<!--               Leyenda que muestra los colores que representan los días en el calendario-->
                <div class="row">
                    <div class="col-md-12 center-block">
                        <ul class="legend">
                            <li><span class="laborales"></span> Laborales</li>
                            <li><span class="fines"></span> Fines de Semana</li>
                            <li><span class="cita"></span> Días con cita</li>
                            <li><span class="actual"></span> Día actual *</li>
                        </ul>
                    </div>

                </div>
                <div class="row">
                    <h6>* Si hay una o más citas el color será el de días con cita</h6>
                </div>
                </div>
                </div>
                <div class="col-md-9">
                   <?php
                    if(isset($_GET['dia'])){
                        $anio = $_GET['anio'];
                        $mes = $_GET['mes'];
                        $dia = $_GET['dia'];
                        $fechaInfo = date('d/m/Y', strtotime("$anio-$mes-$dia"));
                        ?>
                        <h1><span class="fa fa-calendar"></span> Citas <?php echo $fechaInfo ?></h1>
                        <?php
                    }else{
                        $fechaActual = date('d/m/Y');
                        ?>
                        <h1><span class="fa fa-calendar"></span> Citas <?php echo $fechaActual ?></h1>
                        <?php
                    }
                    ?>
                    <div class="row">
                        <div class="col-sm-6 hidden-xs">
                            <a class="btn bg-primary" data-toggle="modal" data-target="#insCit"><span class="fa fa-calendar-plus-o"></span> Nueva Cita</a>
                        </div>

                        <div class="col-xs-12 hidden-sm hidden-md hidden-lg" id="btn-xs-ins">
                            <a class="btn bg-primary btn-block" data-toggle="modal" data-target="#insCit"><span class="fa fa-calendar-plus-o"></span> Nueva Cita</a>
                        </div>

                        <div class="col-xs-12 col-sm-6 text-right">
                            <form class="form-inline" action="#" method="get">
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
                    if(isset($_GET['dia'])){
                        $fecha = mktime(0,0,0, $mes, $dia, $anio);
                        $fecha = date('Y-m-d', $fecha);
                        tablaCitas("select * from citas where fecha = '$fecha' order by hora");
                    }elseif(isset($_GET['enviarBuscar'])){
                        $busqueda = $_GET['buscar'];
                        $consulta_busqueda = "select cit.id cit_id, cit.fecha, cit.hora, cit.motivo, cit.lugar, cit.id_cliente, cli.id, cli.nombre
                                    from citas cit, clientes cli
                                    where cit.id_cliente = cli.id
                                    and (cit.fecha like '%$busqueda%'
                                    or cli.nombre like '%$busqueda%')
                                    order by fecha, hora";
                        tablaCitas($consulta_busqueda);
                    }else{
                        $fecha = date('Y-m-d');
                        tablaCitas("select * from citas where fecha = '$fecha' order by hora");
                    }
                    ?>

                </div>
            </div>
            <?php
            $cons_auto_inc = "SELECT AUTO_INCREMENT
                        FROM information_schema.TABLES
                        WHERE TABLE_SCHEMA =  'inmobiliaria'
	                    and TABLE_NAME = 'citas'";
            if (!$cons_auto_inc)
            {
                echo "Hay errores en la consulta";
            }else{
                $fila = db_query($cons_auto_inc);
                $id = mysqli_fetch_array($fila);
            }
        ?>
                <!--Modal para insertar citas-->
                <div class="modal fade" id="insCit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Insertar cita</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                            </div>
                            <div class="modal-body">
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <label for="">Id</label>
                                        <input class="form-control" type="text" name="id" value="<?php echo $id[0];?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Motivo</label>
                                        <input class="form-control" type="text" name="motivo" id="motivo"><span style="display:none"></span><span style="display:none"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Lugar</label>
                                        <input class="form-control" type="text" name="lugar" id="lugar" ><span style="display:none"></span><span style="display:none"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Cliente</label>
                                        <select class="form-control" name="cliente" id="cliente">
                                        <?php
                                            db_close();
                                            $id_Cliente = db_query("select id, nombre, apellidos from clientes where nombre not like 'Disponible'");
                                            while($fila = mysqli_fetch_array($id_Cliente)){
                                                echo "<option value=$fila[id]>$fila[nombre] $fila[apellidos]</option>";
                                            }
                                            db_close();
                                        ?>
                                </select><span style="display:none"></span><span style="display:none"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Hora</label>
                                        <input class="form-control" type="time" name="hora" id="hora"><span style="display:none"></span><span style="display:none"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Fecha</label>
                                        <input class="form-control" type="date" name="fecha" id="fecha"><span style="display:none"></span><span style="display:none"></span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary" name="enviarInsCita" id="enviarInsCita">Insertar</button>
                                    </div>
                                    <div class="alert alert-danger" id="alerta" style="display:none">

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <?php
            if(isset($_POST['enviarInsCita'])){
                //Motivo de la cita
                $motivo = $_POST['motivo'];

                //Lugar de la cita
                $lugar = $_POST['lugar'];

                //Id de cliente
                $cliente = $_POST['cliente'];

                //Hora de la cita
                $hora = $_POST['hora'];

                //Fecha de la cita
                $fecha = $_POST['fecha'];


                if(!preg_match('`^[a-zA-Z0-9 ,ºáéíóúÁÉÍÓÚñÑ]{1,150}$`', $lugar)){
                    $lugar = "Lugar erróneo";
                }

                if(!preg_match('`^[a-zA-Z ,ºáéíóúÁÉÍÓÚñÑ]{1,100}$`', $motivo)){
                    $motivo = "Motivo erróneo";
                }

                //Inserción de datos en la base de datos
                db_query("insert into citas values (null, '$fecha', '$hora', '$motivo', '$lugar', $cliente)");
                db_close();
                ?>
<!--                   Recarga de la página para apreciar los cambios-->
                       <meta http-equiv="refresh" content="0;url=citas.php?e=2">

                        <?php
            }

        //Función que genera una tabla con los resultados de la consulta que se le pasan como parámetro
        function tablaCitas($cons){
                $datos = db_query($cons);
                if(mysqli_num_rows($datos) == 0){
                ?>
                    <h2><span class="fa fa-info-circle text-info"></span> No se han encontrado resultados</h2>
                <?php
            }else{
                ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th>Motivo</th>
                                    <th>Lugar</th>
                                    <th>Cliente</th>
                                    <th>Teléfono</th>
                                    <th>Hora</th>
                                    <th>Modificar</th>
                                    <th>Eliminar</th>
                                </thead>
                                <tbody>
                        <?php

                        while($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)){
                            $fechaHoy = date('Y-m-d H:i:s');
                            $fechaCita = $fila['fecha']." ".$fila['hora'];
                            ?>
                            <tr>
                                <td>
                                    <?php echo $fila['motivo']; ?>
                                </td>
                                <td>
                                    <?php echo $fila['lugar']; ?>
                                </td>
                                <td>
                                    <?php
                                        $nombres = db_query("select nombre, apellidos from clientes where id = $fila[id_cliente]");
                                        $nombre = mysqli_fetch_array($nombres);
                                            echo $nombre['nombre']." ".$nombre['apellidos'];
                                        db_close();
                                     ?>
                                </td>
                                <td>
                                    <?php
                                        $telefonos = db_query("select telefono1 from clientes where id = $fila[id_cliente]");
                                        $telefono = mysqli_fetch_array($telefonos);
                                            echo $telefono['telefono1'];
                                        db_close();
                                     ?>
                                </td>
                                <td>
                                    <?php echo substr($fila['hora'], 0, 5); ?>
                                </td>
                                <td>
                                   <?php
                                    //Comprueba la fecha para poder mostrar el botón de modificar cita
                                    if(strtotime($fechaHoy) <= strtotime($fechaCita)){
                                        ?>
                                        <a class="btn-m" href="mod_cita.php?id=<?php echo $fila['id'] ?>">
                                            <span class="fa fa-pencil"></span>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    //Comprueba la fecha para poder mostrar el botón de eliminar cita
                                    if(strtotime($fechaHoy) <= strtotime($fechaCita)){
                                       ?>
                                        <a class="btn-r" href="del_cita.php?id=<?php echo $fila['id'] ?>">
                                            <span class="fa fa-trash"></span>
                                        </a>
                                        <?php
                                    }
                                    ?>

                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                    </tbody>
                </table>
            </div>
                            <?php
            }
        }

            ?>
    </div>
    <div class="row">
            <?php
            footer();
            ?>
            </div>
</body>

</html>
