<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Inmueble</title>
</head>

<body>
    <?php

    $id = $_GET['id'];

    db_query("delete from citas where id = $id");
    header("refresh:0;url=citas.php");
    ?>

</body>

</html>
