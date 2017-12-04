<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <?php
    include '../funciones.php';
    cabecera();
    ?>
</head>

<body>
    <?php
    menu(6);
    ?>

        <div class="container">
            <div class="row">
               <h1>Contacto</h1>
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_name">Nombre *</label>
                                <input id="form_name" type="text" name="name" class="form-control" placeholder="Por favor, introduce tu nombre *" required="required" data-error="El nombre es obligatorio.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_lastname">Apellidos *</label>
                                <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Por favor, introduce tus apellidos *" required="required" data-error="Los apellidos son obligatorios.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_email">Email *</label>
                                <input id="form_email" type="email" name="email" class="form-control" placeholder="Por favor, introduce tu email *" required="required" data-error="El correo es obligatorio.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_phone">Teléfono</label>
                                <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Por favor, introduce tu teléfono">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_message">Mensaje *</label>
                                <textarea id="form_message" name="message" class="form-control" placeholder="Mensaje *" rows="4" required="required" data-error="Por favor, escribe un mensaje."></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-success btn-send" value="Enviar">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-muted"><strong>*</strong> Estos campos son obligatorios.</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php
    footer();
    ?>
</body>

</html>
