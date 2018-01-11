<?php
include '../funciones.php';
sesiones(true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mis citas</title>
    <?php
    cabecera();
    ?>
</head>
<body>
    <?php
    menu(0);
    ?>
    <div class="container" id="wrap">
      <?php
        $datos = db_query("select * from citas where id_cliente = $_SESSION[id_cliente] order by fecha DESC");
        $num_cita = 1;
        ?>
       <h1 class="text-center">Mis citas</h1>
       <div class="row">
           <div class="col-md-6 col-md-offset-3">
        <div class="panel-group" id="accordion">
           <?php
            while($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC)){
                $fecha = strtotime($fila['fecha']);
                $fechaHoy = date('Y-m-d H:i:s');
                $fechaCita = $fila['fecha']." ".$fila['hora'];
            ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                       <?php
                        if(strtotime($fechaHoy) <= strtotime($fechaCita)){
                        ?>
                            <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $num_cita; ?>"><i class="fa fa-calendar-o"></i> <?php echo date('d' ,$fecha) ." de ". nombreMes(date('m', $fecha)) ." de ". date('Y', $fecha)?></a>
                        <?php
                        }else{
                        ?>
                            <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $num_cita; ?>"><i class="fa fa-calendar-check-o"></i> <?php echo date('d' ,$fecha) ." de ". nombreMes(date('m', $fecha)) ." de ". date('Y', $fecha)?></a>
                        <?php
                        }
                        ?>

                    </h4>
                </div>
                <div id="<?php echo $num_cita ?>" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p><?php echo $fila['motivo'] ?></p>
                        <p><i class="fa fa-map-marker"></i> <?php echo $fila['lugar'] ?></p>
                        <p><i class="fa fa-clock-o"></i> <?php echo substr($fila['hora'], 0, 5) ?></p>
                    </div>
                </div>
            </div>
            <?php
                $num_cita++;
            }
            ?>
        </div>
    </div>
           </div>
       </div>

    <?php
    footer();
    ?>
</body>
</html>
