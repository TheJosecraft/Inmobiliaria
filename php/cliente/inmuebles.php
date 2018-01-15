<?php
include '../funciones.php';
sesiones(true);
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
       <h1>Mis inmuebles</h1>
       <?php inmuebles("select * from inmuebles where id_cliente = $_SESSION[id_cliente]") ?>
       </div>
    </div>
    </div>
    <?php
    footer();
    ?>
</body>
</html>
