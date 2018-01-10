<?php
include '../funciones.php';
sesiones();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Datos personales</title>
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
        <h1>Datos personales</h1>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >

          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Sheena Shrestha</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="../../img/usuario.png" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 ">
                 <?php
                    $datos = db_query("select * from clientes where id = $_SESSION[id_cliente]");
                    $datos = mysqli_fetch_array($datos, MYSQLI_ASSOC);
                ?>
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Nombre</td>
                        <td><?php echo $datos['nombre'] ?></td>
                      </tr>
                      <tr>
                        <td>Apellidos</td>
                        <td><?php echo $datos['apellidos'] ?></td>
                      </tr>
                      <tr>
                        <td>Dirección</td>
                        <td><?php echo $datos['direccion'] ?></td>
                      </tr>
                    <tr>
                      <tr>
                        <td>Usuario</td>
                        <td><?php echo $datos['nombre_usuario'] ?></td>
                      </tr>
                        <td>Teléfonos</td>
                        <td><?php echo $datos['telefono1'] ?><br><br><?php echo $datos['telefono2'] ?>
                        </td>

                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="../clientes/mod_cliente.php?id=<?php echo $datos['id'] ?>" data-original-title="Modifica los datos" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                        </span>
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