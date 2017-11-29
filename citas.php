<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/citas.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</head>

<body>
    <?php
    include 'funciones.php';
    menu(5);
    $mes = date('m');
    $anio = date('Y');
    ?>
        <div class="container">
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
    function calendario($a, $m = 1, $activo = true){
        if($activo){
            $mes = date('m');
        }else{
            $mes = $m;
        }

        $anio = $a;

        $colorLaborales = "#E8FCCF";
        $colorFines = "#96E072";
        $colorFestivos = "#FF8080";
        $colorActual = "#3DA35D";

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
                    ?><td class="festivo" bgcolor="<?php echo $colorFestivos ?>"><a href="?dia=<?php echo "$i&mes=$mes"?>&anio=<?php echo $anio ?>"><?php echo $i ?></a></td><?php

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
                    ?><td class="festivo" bgcolor="<?php echo $colorFestivos ?>"><a href="?dia=<?php echo "$i&mes=$mes"?>&anio=<?php echo $anio ?>"><?php echo $i ?></a></td><?php

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

    function diasMes ($m, $a)
    {
        $marca = mktime(0, 0, 0, $m, 1, $a);

        return date('t', $marca);
    }

     function nombreMes ($m)
    {

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

    function isCita($a, $m, $d){

        $c = array();

        include 'conexion.php';

        $cons_sel_fecha = "select fecha from citas";
        $fechas = mysqli_query($conexion, $cons_sel_fecha);
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

        function diaSemana ($m, $a)
    {
        $marca = mktime(0, 0, 0, $m, 1, $a);

        return date('N', $marca);
    }

    ?>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="legend">
                            <li><span class="laborales"></span> Laborales</li>
                            <li><span class="fines"></span> Fines de Semana</li>
                            <li><span class="cita"></span> Días con cita</li>
                            <li><span class="actual"></span> Día actual</li>
                        </ul>

                    </div>
                </div>
                </div>
                </div>
                <div class="col-md-9">
                   <?php

                    if(isset($_GET['dia'])){
                        $anio = $_GET['anio'];
                        $mes = $_GET['mes'];
                        $dia = $_GET['dia'];
                        ?>
                        <h1><span class="fa fa-calendar"></span> Citas <?php echo $dia."/".$mes."/".$anio ?></h1>
                        <?php
                    }else{
                        $fechaActual = date('d/m/Y');
                        ?>
                        <h1><span class="fa fa-calendar"></span> Citas <?php echo $fechaActual ?></h1>
                        <?php
                    }

                    ?>
<!--                    <h1>Información <?php echo $dia."/".$mes."/".$anio ?></h1>-->
                    <div class="row">
                        <div class="col-xs-6">
                            <a class="btn bg-primary" data-toggle="modal" data-target="#insCit"><span class="fa fa-calendar-plus-o"></span> Nueva Cita</a>
                        </div>

                        <div class="col-xs-6 text-right">
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
                        ?>

                        <div class="row">
                            <table class="table">
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


                        $fecha = mktime(0,0,0, $mes, $dia, $anio);

                        $fecha = date('Y-m-d', $fecha);

                        $con_sel_cit = "select * from citas
                                        where fecha = '$fecha'
                                        order by hora";


                        include 'conexion.php';

                        $datos = mysqli_query($conexion, $con_sel_cit);
                        while($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)){
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
                                        $cons_sel_cli = "select id, nombre, apellidos
                                        from clientes
                                        where id = $fila[id_cliente]";

                                        include 'conexion.php';

                                        $nombres = mysqli_query($conexion, $cons_sel_cli);
                                        $nombre = mysqli_fetch_array($nombres);
                                            echo $nombre['nombre']." ".$nombre['apellidos'];

                                        mysqli_close($conexion);
                                     ?>
                                </td>
                                <td>
                                    <?php
                                        $cons_sel_cli = "select id, telefono1
                                        from clientes
                                        where id = $fila[id_cliente]";

                                        include 'conexion.php';

                                        $nombres = mysqli_query($conexion, $cons_sel_cli);
                                        $nombre = mysqli_fetch_array($nombres);
                                            echo $nombre['telefono1'];

                                        mysqli_close($conexion);
                                     ?>
                                </td>
                                <td>
                                    <?php echo $fila['hora']; ?>
                                </td>
                                <td>
                                    <form action="includes/forms/mod_cita.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $fila['id'] ?>">
                                        <button class="btn-m" type="submit" name="enviarModCit">
                                            <span class="fa fa-pencil"></span>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <?php

                                    $fechaHoy = date('Y-m-d H:i:s');

                                    $fechaCita = $fila['fecha']." ".$fila['hora'];

                                    if(strtotime($fechaHoy) <= strtotime($fechaCita)){
                                       ?>

                                        <form action="includes/forms/del_cita.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                                            <button class="btn-r" type="submit" name="enviarDelCit">
                                                        <span class="fa fa-trash"></span>
                                                    </button>
                                        </form>

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
                            <?php

                    }elseif(isset($_GET['enviarBuscar'])){
                        ?>

                <div class="row">
                    <table class="table">
                        <thead>
                            <th>Motivo</th>
                            <th>Lugar</th>
                            <th>Cliente</th>
                            <th>Teléfono</th>
                            <th>Hora</th>
                            <th>Fecha</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody>


                                            <?php
                        $busqueda = $_GET['buscar'];
//                        $fecha = mktime(0,0,0, $mes, $dia, $anio);
//
//                        $fecha = date('Y-m-d', $fecha);

                        $con_sel_cit = "select cit.*, cli.id, cli.nombre
                                    from citas cit, clientes cli
                                    where cit.id_cliente = cli.id
                                    and (cit.fecha like '%$busqueda%'
                                    or cli.nombre like '%$busqueda%')
                                    order by hora";




                        include 'conexion.php';

                        $datos = mysqli_query($conexion, $con_sel_cit);
                        while($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)){
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
                                $cons_sel_cli = "select id, nombre, apellidos
                                from clientes
                                where id = $fila[id_cliente]";

                                include 'conexion.php';

                                $nombres = mysqli_query($conexion, $cons_sel_cli);
                                $nombre = mysqli_fetch_array($nombres);
                                    echo $nombre['nombre']." ".$nombre['apellidos'];

                                mysqli_close($conexion);
                             ?>
                                </td>
                                <td>
                                    <?php
                                $cons_sel_cli = "select id, telefono1
                                from clientes
                                where id = $fila[id_cliente]";

                                include 'conexion.php';

                                $nombres = mysqli_query($conexion, $cons_sel_cli);
                                $nombre = mysqli_fetch_array($nombres);
                                    echo $nombre['telefono1'];

                                mysqli_close($conexion);
                             ?>
                                </td>
                                <td>
                                    <?php echo $fila['hora']; ?>
                                </td>
                                <td>
                                    <?php echo $fila['fecha']; ?>
                                </td>
                                <td>
                                    <form action="includes/forms/mod_cita.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $fila['id'] ?>">
                                        <button class="btn-m" type="submit" name="enviarModCit">
                                    <span class="fa fa-pencil"></span>
                                </button>
                                    </form>
                                </td>
                                <td>
                                    <?php

                            $fechaHoy = date('Y-m-d H:i:s');

                            $fechaCita = $fila['fecha']." ".$fila['hora'];

                            if(strtotime($fechaHoy) <= strtotime($fechaCita)){
                               ?>

                                        <form action="includes/forms/del_cita.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                                            <button class="btn-r" type="submit" name="enviarDelCit">
                                                <span class="fa fa-trash"></span>
                                            </button>
                                        </form>

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
                                    <?php
                    }else{
                        ?>

                        <div class="row">
                            <table class="table">
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

                        $fecha = date('Y-m-d');

                        $con_sel_cit = "select * from citas
                                        where fecha = '$fecha'
                                        order by hora";


                        include 'conexion.php';

                        $datos = mysqli_query($conexion, $con_sel_cit);
                        while($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)){
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
                                        $cons_sel_cli = "select id, nombre, apellidos
                                        from clientes
                                        where id = $fila[id_cliente]";

                                        include 'conexion.php';

                                        $nombres = mysqli_query($conexion, $cons_sel_cli);
                                        $nombre = mysqli_fetch_array($nombres);
                                            echo $nombre['nombre']." ".$nombre['apellidos'];

                                        mysqli_close($conexion);
                                     ?>
                                </td>
                                <td>
                                    <?php
                                        $cons_sel_cli = "select id, telefono1
                                        from clientes
                                        where id = $fila[id_cliente]";

                                        include 'conexion.php';

                                        $nombres = mysqli_query($conexion, $cons_sel_cli);
                                        $nombre = mysqli_fetch_array($nombres);
                                            echo $nombre['telefono1'];

                                        mysqli_close($conexion);
                                     ?>
                                </td>
                                <td>
                                    <?php echo $fila['hora']; ?>
                                </td>
                                <td>
                                    <form action="includes/forms/mod_cita.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $fila['id'] ?>">
                                        <button class="btn-m" type="submit" name="enviarModCit">
                                            <span class="fa fa-pencil"></span>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <?php

                                    $fechaHoy = date('Y-m-d H:i:s');

                                    $fechaCita = $fila['fecha']." ".$fila['hora'];

                                    if(strtotime($fechaHoy) <= strtotime($fechaCita)){
                                       ?>

                                        <form action="includes/forms/del_cita.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                                            <button class="btn-r" type="submit" name="enviarDelCit">
                                                        <span class="fa fa-trash"></span>
                                                    </button>
                                        </form>

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
                            <?php
                    }
                    ?>

                </div>
            </div>

        </div>
    </div>
            <?php
            include 'conexion.php';

            $cons_auto_inc = "SELECT AUTO_INCREMENT
                        FROM information_schema.TABLES
                        WHERE TABLE_SCHEMA =  'inmobiliaria'
	                    and TABLE_NAME = 'citas'";

            if (!$cons_auto_inc)
            {
                echo "Hay errores en la consulta";
            }else{
                $fila = mysqli_query($conexion, $cons_auto_inc);
                $id = mysqli_fetch_array($fila);
            }
        ?>
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
                                        <input class="form-control" type="text" name="motivo">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Lugar</label>
                                        <input class="form-control" type="text" name="lugar">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Cliente</label>
                                        <select class="form-control" name="cliente" id="">
                                        <?php
                                            mysqli_close($conexion);

                                            include 'conexion.php';
                                            $cons_idCliente = "select id, nombre, apellidos
                                                                from clientes
                                                                where nombre not like 'Disponible'";

                                            $id_Cliente = mysqli_query($conexion, $cons_idCliente);
                                            while($fila = mysqli_fetch_array($id_Cliente)){
                                                echo "<option value=$fila[id]>$fila[nombre] $fila[apellidos]</option>";
                                            }

                                            mysqli_close($conexion);
                                        ?>
                                </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Hora</label>
                                        <input class="form-control" type="time" name="hora">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Fecha</label>
                                        <input class="form-control" type="date" name="fecha">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary" name="enviarInsCita">Insertar</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <?php

            include 'conexion.php';
            if(isset($_POST['enviarInsCita'])){
                $motivo = $_POST['motivo'];
                $lugar = $_POST['lugar'];
                $cliente = $_POST['cliente'];
                $hora = $_POST['hora'];
                $fecha = $_POST['fecha'];

                $cons_ins_cita = "insert into citas values (null,
                                                            '$fecha',
                                                            '$hora',
                                                            '$motivo',
                                                            '$lugar',
                                                            $cliente)";


        mysqli_query($conexion, $cons_ins_cita);
        mysqli_close($conexion);
                ?>
                       <meta http-equiv="refresh" content="0;url=citas.php?e=2">
                        <?php
            }
            footer();
            ?>
        </div>
    </div>
</body>

</html>
