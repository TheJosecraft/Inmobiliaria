<?php
function menu ($pag = 1)
{
    ?>
    <div class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
               <span class="sr-only">Mostrar menú</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
           </button>
                <a class="navbar-brand" href=".">Inmobiliaria</a>
            </div>
            <nav class="navbar-collapse collapse" id="menu">
                <div class="container-fluid">
                    <ul class="nav navbar-nav ">
                       <?php
                        if($pag == 1){
                            ?>
                            <li class="active"><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="php/noticias/noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                            <li><a href="php/clientes/clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                            <li><a href="php/inmuebles/inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                            <li><a href="php/citas/citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                            <li><a href="php/contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                            <?php
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
                            <li><a href="php/clientes/clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                            <li><a href="php/inmuebles/inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                            <li><a href="php/citas/citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                            <li class="active"><a href="php/contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                            <?php
                        }
                        ?>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><i class="fa fa-sign-in"></i> Acceder</a></li>
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

        <footer class="text-center footer navbar-fixed-bottom">
            <p><strong>&copy;</strong> EAG 2017 - Realizado por José Carlos Raya León</p>
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
    <div class="container-fluid">
        <div class="row">
            <?php

    $fecha = date('Y-m-d');

    $noticias = db_query("select * from noticias where fecha <= '$fecha' order by id DESC limit 3");
    while($fila = mysqli_fetch_array($noticias)){
        ?>
                <div class="col-xs-12 col-sm-4">
                    <img class="img-responsive img-rounded" src="img/noticias/<?php echo $fila['imagen'] ?>" alt="" width="100%" height="300px">
                    <br>
                    <div class="row">
                        <div class="col-sm-6">

                              <span class="h3">
                                 <?php echo $fila['titular']; ?>
                              </span>
                        </div>

                        <div class="col-sm-6">
                            <span class="pull-right"><strong><i class="glyphicon glyphicon-calendar"></i> <?php $fecha = strtotime($fila['fecha']); echo date('d/m/Y', $fecha) ?></strong></span>
                        </div>
                    </div>

                    <p>
                        <?php echo substr($fila['contenido'], 0, 280); ?> <a href="php/noticias/noticia.php?id=<?php echo $fila['id'] ?>">Leer más...</a> </p>

                </div>
                <?php
    }
?>
        </div>
    </div>
    <?php
    db_close();
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

function db_query($consulta) {
    // Connect to the database
    $conexion = db_connect();

    // Query the database
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
