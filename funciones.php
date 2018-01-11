<?php
function sesiones(){
    session_start();
}

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
                <a class="navbar-brand" href=".">Inmobiliaria</a>
            </div>
            <nav class="navbar-collapse collapse" id="menu">
                <div class="container-fluid">
                    <ul class="nav navbar-nav ">
                       <?php
                        if($pag == 1){
                            if(isset($_SESSION['login_ok']) && $_SESSION['usuario'] == "admin"){
                            ?>
                            <li class="active"><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="php/noticias/noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                            <li><a href="php/clientes/clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                            <li><a href="php/inmuebles/inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                            <li><a href="pho/citas/citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                            <li><a href="php/contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                        <?php
                            }else{
                            ?>
                            <li class="active"><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="php/contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>

                            <?php
                            }
                        }elseif($pag == 2){
                            ?>
                            <li><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li class="active"><a href="php/noticias/noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                            <li><a href="php/clientes/clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                            <li><a href="php/inmuebles/inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                            <li><a href="php/citas/citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                            <li><a href="php/contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                            <?php
                        }elseif($pag == 3){
                            ?>
                            <li><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="php/noticias/noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                            <li class="active"><a href="php/clientes/clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                            <li><a href="php/inmuebles/inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                            <li><a href="php/citas/citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                            <li><a href="php/contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                            <?php
                        }elseif($pag == 4){
                            ?>
                            <li><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="php/noticias/noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                            <li><a href="php/clientes/clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                            <li class="active"><a href="php/inmuebles/inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                            <li><a href="php/citas/citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                            <li><a href="php/contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                            <?php
                        }elseif($pag == 5){
                            ?>
                            <li><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="php/noticias/noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                            <li><a href="php/clientes/clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                            <li><a href="php/inmuebles/inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                            <li class="active"><a href="php/citas/citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                            <li><a href="php/contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                            <?php
                        }elseif($pag == 6){
                            ?>
                            <li><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="php/noticias/noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                            <li><a href="php/clientes/clientes.php"><i class="fa fa-user"></i> Clientes</a></li>
                            <li><a href="php/inmuebles/inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                            <li><a href="php/citas/citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                            <li class="active"><a href="php/contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
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
                                <li><a href=""><i class="fa fa-building-o"></i> Mis inmuebles</a></li>
                                <li><a href="php/cliente/datos.php"><i class="fa fa-id-card-o"></i> Datos personales</a></li>
                                <li class="divider"></li>
                                <li><a href="php/acceso/log_out.php"><i class="fa fa-sign-out"></i> Salir</a></li>
                            </ul></li>
                        <?php
                        }else{
                        ?>
                            <li><a href="php/acceso/acceder.php"><i class="fa fa-sign-in"></i> Acceder</a></li>
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
?>

    <?php
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
                   <li><a href="php/contacto/contacto.php"><i class="fa fa-envelope"></i> Contacto</a></li>
                   <li><a href="php/mapa-web/mapa-web.php"><i class="fa fa-sitemap"></i> Mapa web</a></li>
               </ul>
            </div>

        </div>
    </div>
</footer>
<?php
}
?>


        <?php
function img_random ()
{

    $imagen = db_query("select direccion, imagen from inmuebles");

    $imagenes = array();

    while($fila = mysqli_fetch_array($imagen)){
        $imagenes[] = $fila['imagen'];
        $direcciones[] = $fila['direccion'];
    }

    db_close();

    $aleatorio = rand(0, (count($imagenes) - 1));

?>
            <img class="img-responsive center-block" src="img/inmuebles/<?php echo $imagenes[$aleatorio]; ?>" alt="">
            <div class="carousel-caption">
                <h2><?php echo $direcciones[$aleatorio] ?></h2>
            </div>
            <?php
}
?>

<?php
function ult_noticias(){
    ?>

            <?php

    $fecha = date('Y-m-d');

    $noticias = db_query("select * from noticias where fecha <= '$fecha' order by fecha DESC, id DESC limit 3");
    while($fila = mysqli_fetch_array($noticias)){
        ?>
                <div class="col-xs-12 col-sm-12 col-md-4 noticia">
                    <a href="php/noticias/noticia.php?id=<?php echo $fila['id'] ?>"><img class="img-responsive img-rounded" src="img/noticias/<?php echo $fila['imagen'] ?>" alt="" width="100%" height="300px"></a>
                    <br>
                    <div class="row">
                        <div class="col-xs-12">

                              <span class="h3">
                                  <a href="php/noticias/noticia.php?id=<?php echo $fila['id'] ?>"><?php echo $fila['titular']; ?></a>
                              </span>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                       <div class="col-xs-12">
                           <p>
                        <?php echo substr($fila['contenido'], 0, 280)."...";?> <span class="pull-right"><a href="php/noticias/noticia.php?id=<?php echo $fila['id'] ?>">Leer más >></a></span></p>
                       </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <span class="pull-left"><i class="fa fa-calendar"></i> <?php $fecha = strtotime($fila['fecha']); echo date('d/m/Y', $fecha) ?></span>
                        </div>
                    </div>


                </div>
                <?php
    }
?>
    <?php
    db_close();
}

function db_connect() {


    static $conexion;

    if(!isset($connection)) {
        $conexion = mysqli_connect('localhost', 'root', '', 'inmobiliaria');
    }

    if($conexion === false) {

        return mysqli_connect_error();
    }
    mysqli_set_charset($conexion, 'utf8');
    return $conexion;
}

function db_query($consulta) {

    $conexion = db_connect();

    $resultado = mysqli_query($conexion, $consulta);

    if($resultado === false) {
        echo db_error();
    } else {
        return $resultado;
    }

}

function db_error() {
    $conexion = db_connect();
    return mysqli_error($conexion);
}

function db_close(){
    $conexion = db_connect();
    mysqli_close($conexion);
}
?>
