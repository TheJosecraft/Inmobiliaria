<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmobiliaria</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <style>


    </style>
</head>

<body>


    <?php
    include 'funciones.php';

    menu(1);
    ?>
        <div class="carousel slide" data-ride="carousel">
            <div class="carousel inner" role="listbox">
                <div class="item active">
                    <?php
                    img_random();
                    ?>
                </div>
            </div>
        </div>
        <div class="container-fluid navbar">
            <br>
            <?php ult_noticias(); ?>
        </div>

    <div class="container-fluid">
        <?php footer(); ?>
    </div>

</body>

</html>
