<?php
include '../funciones.php';
sesiones(true);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Acceder</title>
        <?php
    cabecera();
    ?>
    </head>

    <body>
        <?php
    menu(0);
    ?>
            <div class="container" id="wrap">
                <div class="row">
                    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="panel-title">Acceder</div>
                            </div>

                            <div style="padding-top:30px" class="panel-body">

                                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                                <form method="post" action="#" id="loginform" class="form-horizontal" role="form">

                                    <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="usuario" type="text" class="form-control" name="usuario" value="" placeholder="usuario">
                                    </div>

                                    <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="contraseña">
                                    </div>



                                    <div class="input-group">
                                        <div class="checkbox">
                                            <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> No cerrar sesión
                                        </label>
                                        </div>
                                    </div>


                                    <div style="margin-top:10px" class="form-group">
                                        <!-- Button -->

                                        <div class="col-sm-12 controls">
                                            <input type="submit" name="entrar" id="btn-login" class="btn btn-success" value="Entrar">
                                        </div>
                                    </div>
                                </form>
            <?php
            if(isset($_POST['entrar'])){

                $usuario = $_POST['usuario'];
                $password = md5(md5($_POST['password']));

                $datos = db_query("select id, nombre_usuario, pass from clientes where nombre_usuario = '$usuario' and pass = '$password'");
                $fila = mysqli_fetch_array($datos);

                    if($fila['nombre_usuario'] == $usuario && $fila['pass'] == $password){
                        $_SESSION['login_ok'] = true;
                        $_SESSION['usuario'] = $usuario;
                        $_SESSION['id_cliente'] = $fila['id'];
                        if(isset($_POST['remember'])){
                            $_SESSION['login_remember'] = true;
                        }else{
                            $_SESSION['login_remember'] = false;
                        }
                        ?>
                    <meta http-equiv="refresh" content="0;url=../../index.php">
                    <?php
                    }else{

                    ?>
                        <div class="alert alert-danger">
                            El usuario o la contraseña no son correctos
                        </div>
                        <?php

                    }

            }
            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
    footer();
    ?>
    </body>

    </html>
