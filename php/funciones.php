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
                            <li class="active"><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="../noticias/noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                            <li><a href="../clientes/clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                            <li><a href="../inmuebles/inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                            <li><a href="../citas/citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                            <li><a href="../contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                            <?php
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
        <script type="text/javascript" src="../../js/main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="../../js/bootstrap.js"></script>
        <footer class="text-center footer navbar-fixed-bottom">
            <p><strong>&copy;</strong> EAG 2017 - Realizado por José Carlos Raya León</p>
        </footer>
        <?php
}
?>


        <?php
function img_random ()
{
    include 'conexion.php';

    $cons_gen_img = "select direccion, imagen from inmuebles";

    $imagen = mysqli_query($conexion, $cons_gen_img);

    $imagenes = array();

    while($fila = mysqli_fetch_array($imagen)){
        $imagenes[] = $fila['imagen'];
        $direcciones[] = $fila['direccion'];
    }

    mysqli_close($conexion);

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
    include 'conexion.php';

    $fecha = date('Y-m-d');

    $cons_ult_not = "select * from noticias
                    where fecha <= '$fecha'
                    order by id DESC
                    limit 3";

    $noticias = mysqli_query($conexion, $cons_ult_not);
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
                        <?php echo substr($fila['contenido'], 0, 280); ?> <a href="noticia.php?id=<?php echo $fila['id'] ?>">Leer más...</a> </p>

                </div>
                <?php
    }
?>
        </div>
    </div>
    <?php
}

function cabecera(){
    ?>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <?php
}
?>
