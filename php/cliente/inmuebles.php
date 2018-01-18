<?php
include '../funciones.php';
sesiones(true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
       <h1>Mis inmuebles</h1>
       <div class="row equal">
          <div class="col-xs-12">
              <?php inmuebles("select * from inmuebles where id_cliente = $_SESSION[id_cliente]") ?>
          </div>
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
