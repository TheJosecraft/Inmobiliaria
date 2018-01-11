<?php
include '../funciones.php';
sesiones();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mis inmuebles</title>
    <?php
    cabecera();
    ?>
</head>
<body>
    <?php
    menu(0);
    ?>
    <div class="container" id="wrap">
       <h1>Mis citas</h1>
        <div class="panel-group" id="accordion">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#cita1">Cita 1</a>
                    </h4>
                </div>
                <div id="cita1" class="panel-collapse collapse">
                    <div class="panel-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas sit dicta veritatis maxime repellat ducimus ab enim, dolores nam! Odio eum perspiciatis dignissimos voluptate modi magni labore officiis harum eos.
                    </div>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#cita2">Cita 1</a>
                    </h4>
                </div>
                <div id="cita2" class="panel-collapse collapse">
                    <div class="panel-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas sit dicta veritatis maxime repellat ducimus ab enim, dolores nam! Odio eum perspiciatis dignissimos voluptate modi magni labore officiis harum eos.
                    </div>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#cita3">Cita 1</a>
                    </h4>
                </div>
                <div id="cita3" class="panel-collapse collapse">
                    <div class="panel-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas sit dicta veritatis maxime repellat ducimus ab enim, dolores nam! Odio eum perspiciatis dignissimos voluptate modi magni labore officiis harum eos.
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
