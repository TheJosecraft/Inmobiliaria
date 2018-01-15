<?php
function sesiones($permiso = false){
    session_start();

    if(isset($_COOKIE['datos'])){
        session_decode($_COOKIE['datos']);
    }

    $datos_sesion = session_encode();

    if(isset($_SESSION['login_remember']) && $_SESSION['login_remember'] == true){
        echo "<script>console.log( 'Debug Objects: " . $_SESSION['login_remember'] . "' );</script>";
        setcookie('datos', $datos_sesion, time()+(365*24*60*60), '/');

    }

    if($permiso == false && $_SESSION['usuario'] != "admin"){
        header("location:../../index.php");
    }

}
?>
<?php
function menu ($pag = 1)
{
    ?>
    <div class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
               <span class="sr-only">Mostrar menú</span>
               <span style="color:white">Menú</span>
           </button>
                <a class="navbar-brand" href="#">Inmobiliaria</a>
            </div>
            <nav class="navbar-collapse collapse" id="menu">
                <div class="container-fluid">
                    <ul class="nav navbar-nav ">
                        <?php
                        if($pag == 1){
                            if(isset($_SESSION['login_ok']) && $_SESSION['usuario'] == "admin"){
                            ?>
                            <li class="active"><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="../noticias/noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                            <li><a href="../clientes/clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                            <li><a href="../inmuebles/inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                            <li><a href="../citas/citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                            <li><a href="../contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                        <?php
                            }else{
                            ?>
                            <li class="active"><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="../contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                        <?php
                            }
                        }elseif($pag == 2){
                        if(isset($_SESSION['login_ok']) && $_SESSION['usuario'] == "admin"){
                            ?>
                            <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li class="active"><a href="../noticias/noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                            <li><a href="../clientes/clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                            <li><a href="../inmuebles/inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                            <li><a href="../citas/citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                            <li><a href="../contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                        <?php
                            }else{
                            ?>
                            <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="../contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                        <?php
                            }
                        }elseif($pag == 3){
                        if(isset($_SESSION['login_ok']) && $_SESSION['usuario'] == "admin"){
                            ?>
                            <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="../noticias/noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                            <li class="active"><a href="../clientes/clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                            <li><a href="../inmuebles/inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                            <li><a href="../citas/citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                            <li><a href="../contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                        <?php
                            }else{
                            ?>
                            <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="../contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                        <?php
                            }
                        }elseif($pag == 4){
                           if(isset($_SESSION['login_ok']) && $_SESSION['usuario'] == "admin"){
                            ?>
                            <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="../noticias/noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                            <li><a href="../clientes/clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                            <li class="active"><a href="../inmuebles/inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                            <li><a href="../citas/citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                            <li><a href="../contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                        <?php
                            }else{
                            ?>
                            <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="../contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                        <?php
                            }
                        }elseif($pag == 5){
                        if(isset($_SESSION['login_ok']) && $_SESSION['usuario'] == "admin"){
                            ?>
                            <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="../noticias/noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                            <li><a href="../clientes/clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                            <li><a href="../inmuebles/inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                            <li class="active"><a href="../citas/citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                            <li><a href="../contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                        <?php
                            }else{
                            ?>
                            <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="../contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                        <?php
                            }
                        }elseif($pag == 6){
                        if(isset($_SESSION['login_ok']) && $_SESSION['usuario'] == "admin"){
                            ?>
                            <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="../noticias/noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                            <li><a href="../clientes/clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                            <li><a href="../inmuebles/inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                            <li><a href="../citas/citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                            <li class="active"><a href="../contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                        <?php
                            }else{
                            ?>
                            <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li class="active"><a href="../contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                        <?php
                            }
                        }elseif($pag == 0){
                        if(isset($_SESSION['login_ok']) && $_SESSION['usuario'] == "admin"){
                            ?>
                            <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="../noticias/noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                            <li><a href="../clientes/clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                            <li><a href="../inmuebles/inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                            <li><a href="../citas/citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                            <li><a href="../contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                        <?php
                            }else{
                            ?>
                            <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="../contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                        <?php
                            }
                        }
                        ?>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                       <?php
                        if(isset($_SESSION['login_ok']) && $_SESSION['login_ok'] == true && $_SESSION['usuario'] == "admin"){
                        ?>
                            <li><a href="#" data-toggle="dropdown"><i class="fa fa-user-circle-o"></i> Bienvenido, <?php echo $_SESSION['usuario'] ?> <span class="fa fa-caret-square-o-down"></span></a><ul class="dropdown-menu">
                                <li><a href="../cliente/datos.php"><i class="fa fa-id-card-o"></i> Datos personales</a></li>
                                <li class="divider"></li>
                                <li><a href="../acceso/log_out.php"><i class="fa fa-sign-out"></i> Salir</a></li>
                            </ul></li>
                        <?php
                        }elseif(isset($_SESSION['login_ok']) && $_SESSION['login_ok'] == true){
                        ?>
                            <li><a href="#" data-toggle="dropdown"><i class="fa fa-user-circle-o"></i> Bienvenido, <?php echo $_SESSION['usuario'] ?> <span class="fa fa-caret-square-o-down"></span></a><ul class="dropdown-menu">
                                <li><a href="../cliente/citas.php"><i class="fa fa-calendar"></i> Mis citas</a></li>
                                <li><a href="../cliente/inmuebles.php"><i class="fa fa-building-o"></i> Mis inmuebles</a></li>
                                <li><a href="../cliente/datos.php"><i class="fa fa-id-card-o"></i> Datos personales</a></li>
                                <li class="divider"></li>
                                <li><a href="../acceso/log_out.php"><i class="fa fa-sign-out"></i> Salir</a></li>
                            </ul></li>
                        <?php
                        }else{
                        ?>
                            <li><a href="../acceso/acceder.php"><i class="fa fa-sign-in"></i> Acceder</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <?php
}

function footer ()
{
    ?>
<footer class="text-center footer">
    <div class="container-fluid text-center">
        <div class="row">
          <div class="col-xs-12 col-md-4">
                <p>Realizado por José Carlos Raya León ©
                    <?php echo date('Y') ?> EAG.</p>
            </div>
           <div class="col-xs-12 col-md-4">
                <ul class="list-inline">
                    <li><a href="http://instagram.com"><i class="fa fa-instagram fa-2x"></i></a></li>
                    <li><a href="http://facebook.com"><i class="fa fa-facebook fa-2x"></i></a></li>
                    <li><a href="http://twitter.com"><i class="fa fa-twitter fa-2x"></i></a></li>
                    <li><a href="http://plus.google.com"><i class="fa fa-google-plus fa-2x"></i></a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-md-4">
               <ul class="list-inline">
                   <li><i class="fa fa-phone"></i> 958625452</li>
                   <li><a href="../contacto/contacto.php"><i class="fa fa-envelope"></i> Contacto</a></li>
                   <li><a href="../mapa-web/mapa-web.php"><i class="fa fa-sitemap"></i> Mapa web</a></li>
               </ul>
            </div>

        </div>
    </div>
</footer>
<script src="../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.js"></script>
<script type="text/javascript" src="../../js/main.js"></script>
    <?php
}

function cabecera(){
?>
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/main.css">
<link rel="stylesheet" href="../../css/font-awesome.css">
<?php
}

function db_connect() {

    // Define connection as a static variable, to avoid connecting more than once
    static $conexion;

    // Try and connect to the database, if a connection has not been established yet
    if(!isset($connection)) {
        $conexion = mysqli_connect('localhost', 'root', '', 'inmobiliaria');
    }

    // If connection was not successful, handle the error
    if($conexion === false) {
        // Handle error - notify administrator, log to a file, show an error screen, etc.
        return mysqli_connect_error();
    }
    mysqli_set_charset($conexion, 'utf8');
    return $conexion;
}

//Función para hacer consultas a la base de datos
function db_query($consulta) {
    // Conexión a la base de datos
    $conexion = db_connect();

    // Consulta a la base de datos
    $resultado = mysqli_query($conexion, $consulta);

    if($resultado === false) {
        echo db_error();
    } else {
        return $resultado;
    }

}

//Función que muestra los errores de la base de datos
function db_error() {
    $conexion = db_connect();
    return mysqli_error($conexion);
}

//Función para cerrar la conexión a la base de datos
function db_close(){
    $conexion = db_connect();
    mysqli_close($conexion);
}

function fecha($f){
    return date('d/m/Y', strtotime($f));
}

function log_out(){
    session_start();

    $_SESSION = array();

    session_unset();
    session_destroy();

    setcookie('datos', "", time() - 7, '/');

    header("location:../../index.php");
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
        $colorCitas = "#18bc9c";

        //Color para el día actual
        $colorActual = "#18bc9c";
        $celdas = 0;
        $cont = 0;
            ?>
            <div class="row">
                <div class="col-sm-5 col-md-3">
                    <ul class="pagination" id="calendar-pag">
                        <li><a href="?mesAnterior=<?php echo ($mes != 1 ? $mes - 1 : 12);?>&anio=<?php echo ($mes != 1 ? $anio : $anio - 1) ?>"><span class="fa fa-arrow-left"></span> Anterior</a></li>
                        <li><a href="?mesPosterior=<?php echo ($mes != 12 ? $mes + 1 : 1);?>&anio=<?php echo ($mes != 12 ? $anio : $anio + 1) ?>">Siguiente <span class="fa fa-arrow-right"></span></a></li>
                    </ul>
                </div>
                <div class="col-sm-5 col-md-6 col-md-offset-2">
                    <h2>
                        <?php echo nombreMes($mes).' '.$anio; ?>
                    </h2>
                </div>
                <div class="col-sm-2 col-md-1">
                    <ul class="pagination" id="calendar-pag">
                        <li><a href="?mesActual=<?php echo date('m'); ?>">Actual</a></li>
                    </ul>
                </div>
            </div>
            <div class="table-responsive overflow">
                <table class="table table-bordered calendario">
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
            </div>
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
        if($_SESSION['usuario'] != "admin"){
            $fechas = db_query("select fecha from citas where id_cliente = $_SESSION[id_cliente]");
        }else{
            $fechas = db_query("select fecha from citas");
        }
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
                <div class="scroll">
                    <?php
                        $fecha = mktime(0, 0, 0, $mes, $i, $anio);
                        $fecha = date('Y-m-d', $fecha);
//                        echo "select * from citas where fecha = '$fecha' order by hora";
                        if($_SESSION['usuario'] != "admin"){
                            cita("select * from citas where fecha = '$fecha' and id_cliente = $_SESSION[id_cliente] order by hora");
                        }else{
                            cita("select * from citas where fecha = '$fecha' order by hora");
                        }

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

                    $fechaHoy = date('Y-m-d H:i:s');
                    $fechaCita = $fila['fecha']." ".$fila['hora'];
                     if($telefono['telefono2'] != ""){
                         if(strtotime($fechaHoy) <= strtotime($fechaCita) && $_SESSION['usuario'] == "admin"){
                             $contenido = "$fila[motivo] <br><i class='fa fa-map-marker'></i> $fila[lugar] <br><i class='fa fa-user'></i> $nombre[nombre] $nombre[apellidos] <br><i class='fa fa-phone'></i> $telefono[telefono1] <br><i class='fa fa-mobile-phone'></i> $telefono[telefono2] <br> <a class='btn-m' href='mod_cita.php?id=$fila[id]'><i class='fa fa-pencil'></i> Modificar</a> <a class='btn-r' href='del_cita.php?id=$fila[id]'><i class='fa fa-trash'></i> Eliminar</a>";
                         }else{
                             $contenido = "$fila[motivo] <br><i class='fa fa-map-marker'></i> $fila[lugar] <br><i class='fa fa-user'></i> $nombre[nombre] $nombre[apellidos] <br><i class='fa fa-phone'></i> $telefono[telefono1] <br><i class='fa fa-mobile-phone'></i> $telefono[telefono2]";
                         }

                     }else{
                         if(strtotime($fechaHoy) <= strtotime($fechaCita) && $_SESSION['usuario'] == "admin"){
                            $contenido = "$fila[motivo] <br><i class='fa fa-map-marker'></i> $fila[lugar] <br><i class='fa fa-user'></i> $nombre[nombre] $nombre[apellidos] <br><i class='fa fa-phone'></i> $telefono[telefono1] <br> <a class='btn-m' href='mod_cita.php?id=$fila[id]'><i class='fa fa-pencil'></i> Modificar</a> <a class='btn-r' href='del_cita.php?id=$fila[id]'><i class='fa fa-trash'></i> Eliminar</a>";
                         }else{
                            $contenido = "$fila[motivo] <br><i class='fa fa-map-marker'></i> $fila[lugar] <br><i class='fa fa-user'></i> $nombre[nombre] $nombre[apellidos] <br><i class='fa fa-phone'></i> $telefono[telefono1]";
                         }

                     }

                    ?>
                    <div class="col-xs-8 col-xs-offset-2 celdac citajs">
                    <span class="fa fa-clock-o"></span><a href="#" data-toggle="popover" title="Información" data-html="true" data-content="<?php echo $contenido ?>"> <?php echo substr($fila['hora'], 0, 5);?></a>
                    </div>
                     <?php
                    }
                    ?>
        </div>
        <?php
        db_close();
    }

class Pagination{

    private $rpp , $page, $rows;

    function __construct($rows , $page = 1 , $rpp = 10){
        $this->rows = $rows;
        $this->page = $page;
        $this->rpp = $rpp;
    }

    function getOffset(){
        return $this->rpp * ($this->page - 1);
    }

    function getRpp(){
        return $this->rpp;
    }

    function getLast(){
        return ceil($this->rows / $this->rpp);
    }

    function getFirst(){
        return 1;
    }

    function getNext(){
        return min($this->page + 1 , $this->getLast());
    }

    function getPrevious(){
        return max($this->page - 1 , $this->getFirst());
    }

    function setRpp($rpp){
        $this->rpp = $rpp;
    }

    function getRange($range = 3){
        $rango = array();
        $last = $this->getLast();
        for ($i = $this->page - $range; $i <= $this->page + $range; $i++) {
             if($i > 0 && $i <= $last){
                 $rango[] = $i;
             }
        }
        return $rango;
    }

}

function inmuebles($cons){
 ?>
<div class="row">
    <?php
            $inmuebles = db_query($cons);
            $cont = 0;
        if(mysqli_num_rows($inmuebles) == 0){
             ?>
            <h2><span class="fa fa-info-circle text-info"></span> No se han encontrado inmuebles</h2>
            <?php
        }else{
            while($fila = mysqli_fetch_array($inmuebles, MYSQLI_ASSOC)){
                ?>

        <div class="col-md-4 inmueble">
            <div class="card inmueble">
                <a href="inmueble.php?id=<?php echo $fila['id'] ?>">
                    <div class="row imagen-inmueble" style="background-image: url(../../img/inmuebles/<?php echo $fila['imagen']; ?>);">

                    </div>
                </a>
<!--                <img src="../../img/inmuebles/<?php /*echo $fila['imagen'];*/ ?>" alt="Card image" style="width: 100%">-->
                <?php
                    if($fila['id_cliente'] == 0){ ?>

                    <div class="disponibilidad" style="background-color:palegreen">
                        <strong>Disponible</strong>
                    </div>

                    <?php }else{ ?>

                        <div class="disponibilidad" style="background-color:#FA5858">
                            <strong>Vendido</strong>
                        </div>
                    <?php
                        }
                        ?>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="card-title text-center">
                                            <a href="inmueble.php?id=<?php echo $fila['id'] ?>">
                                                <?php echo $fila['direccion']; ?>
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <br>
                                <div class="row text-center">
                                    <h4>
                                        <?php echo number_format($fila['precio'], 0, ',', '.'); ?> €</h4>
                                </div>
                                <div class="row text-center">
                                    <?php
                                    $nombres = db_query("select nombre, apellidos from clientes where id = $fila[id_cliente]");
                                    $nombre = mysqli_fetch_array($nombres);
                                    if($fila['id_cliente'] != 0){
                                    ?>
                                        <h5>
                                            <?php echo $nombre['nombre']." ".$nombre['apellidos'] ?>
                                        </h5>
                                        <?php
                                    }else{
                                        echo '<h5>&nbsp</h5>';
                                    }
                                ?>
                                </div>
                                <?php
                                if($_SESSION['usuario'] == "admin"){
                                    ?>
                                    <hr>
                                        <div class="row center-block">
                                            <div class="col-xs-12">

                                                <div class="col-xs-6 col-md-12 col-lg-6 text-center"><span>
                                                                <a class="btn-m" href="mod_inmueble.php?id=<?php echo $fila['id'] ?>" title="Modificar">
                                                                <span class="fa fa-pencil"></span> Modificar</a>
                                                    </span>
                                                </div>
                                                <div class="col-xs-6 col-md-12 col-lg-6 text-center">
                                                    <a class="btn-r" href="del_inmueble.php?id=<?php echo $fila['id'] ?>" title="Eliminar">
                                                                <span class="fa fa-trash"></span> Eliminar</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                                ?>

                            </div>
            </div>
        </div>
        <?php
                $cont++;
                if ($cont % 3 == 0){
                ?>
                    </div>
                    <div class="row">
                        <?php
                }
            }
        }
            db_close();
    }
    ?>

