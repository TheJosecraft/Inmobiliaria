<?php
function menu ($pag = 1)
{
    ?>

    <div class="navbar navbar-default navbar-fixed-top">
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
                    <ul class="nav navbar-nav">
                       <?php
                            if($pag == 1){
                                ?>
                                <li class="active"><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                                <li><a href="../../noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                                <li><a href="../../clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                                <li><a href="../../inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                                <li><a href="../../citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                                <li><a href="../../contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                                <?php
                            }elseif($pag == 2){
                                ?>
                                <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                                <li class="active"><a href="../../noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                                <li><a href="../../clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                                <li><a href="../../inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                                <li><a href="../../citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                                <li><a href="../../contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                                <?php
                            }elseif($pag == 3){
                                ?>
                                <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                                <li><a href="../../noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                                <li class="active"><a href="../../clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                                <li><a href="../../inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                                <li><a href="../../citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                                <li><a href="../../contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                                <?php
                            }elseif($pag == 4){
                                ?>
                                <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                                <li><a href="../../noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                                <li><a href="../../clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                                <li class="active"><a href="../../inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                                <li><a href="../../citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                                <li><a href="../../contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                                <?php
                            }elseif($pag == 5){
                                ?>
                                <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                                <li><a href="../../noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                                <li><a href="../../clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                                <li><a href="../../inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                                <li class="active"><a href="../../citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                                <li><a href="../../contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
                                <?php
                            }elseif($pag == 6){
                                ?>
                                <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                                <li><a href="../../noticias.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
                                <li><a href="../../clientes.php"><i class="fa fa-user-o"></i> Clientes</a></li>
                                <li><a href="../../inmuebles.php"><i class="fa fa-building-o"></i> Inmuebles</a></li>
                                <li><a href="../../citas.php"><i class="fa fa-calendar"></i> Citas</a></li>
                                <li class="active"><a href="../../contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
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
        <p><strong>&copy;</strong> EAG 2017</p>
    </footer>

    <?php
}
?>
