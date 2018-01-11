<?php
function sesiones(){
    session_start();
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
                            if(isset($_SESSION['login_ok']) && $_SESSION['nombre_usuario'] == "admin"){
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
                        ?>
                            <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li class="active"><a href="../noticias/noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                            <li><a href="../clientes/clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                            <li><a href="../inmuebles/inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                            <li><a href="../citas/citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                            <li><a href="../contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                                <?php
                        }elseif($pag == 3){
                        ?>
                            <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="../noticias/noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                            <li class="active"><a href="../clientes/clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                            <li><a href="../inmuebles/inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                            <li><a href="../citas/citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                            <li><a href="../contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                        <?php
                        }elseif($pag == 4){
                            ?>
                            <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="../noticias/noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                            <li><a href="../clientes/clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                            <li class="active"><a href="../inmuebles/inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                            <li><a href="../citas/citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                            <li><a href="../contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                        <?php
                        }elseif($pag == 5){
                        ?>
                            <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="../noticias/noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                            <li><a href="../clientes/clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                            <li><a href="../inmuebles/inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                            <li class="active"><a href="../citas/citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                            <li><a href="../contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                        <?php
                        }elseif($pag == 6){
                        ?>
                            <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="../noticias/noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                            <li><a href="../clientes/clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                            <li><a href="../inmuebles/inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                            <li><a href="../citas/citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                            <li class="active"><a href="../contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                        <?php
                        }elseif($pag == 0){
                        ?>
                            <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="../noticias/noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                            <li><a href="../clientes/clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                            <li><a href="../inmuebles/inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                            <li><a href="../citas/citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                            <li><a href="../contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                        <?php
                        }
                        ?>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                       <?php
                        if(isset($_SESSION['login_ok']) && $_SESSION['login_ok'] == true){
                        ?>
                            <li><a href="#" data-toggle="dropdown"><i class="fa fa-user-circle-o"></i> Bienvenido, <?php echo $_SESSION['usuario'] ?> <span class="caret"></span></a><ul class="dropdown-menu">
                                <li><a href=""><i class="fa fa-calendar"></i> Mis citas</a></li>
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
    session_unset();
    session_destroy();

    header("location:../../index.php");
    exit();
}
