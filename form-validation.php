<!DOCTYPE html>
<html lang="en">
<head>
  <title>Validación de Forms con JQuery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>

<div class="container">


<div class="row">
<div class="col-xs-10">
		<div class="col-xs-9 col-xs-offset-3">
			<h2>Nuevo usuario</h2>
		</div>
	<form class="form-horizontal" id="myform">
    <div class="form-group has-feedback">
        <label class="control-label col-xs-3">Email:</label>
        <div class="col-xs-9">
            <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
			<span class="form-control-feedback glyphicon"></span>
			<span class="help-block"></span>
        </div>
    </div>

    <div class="form-group has-feedback">
        <label class="control-label col-xs-3">Password:</label>
        <div class="col-xs-9">
            <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
			<span class="form-control-feedback glyphicon"></span>
			<span class="help-block"></span>
        </div>
    </div>
    <div class="form-group has-feedback">
        <label class="control-label col-xs-3">Confirmar Password:</label>
        <div class="col-xs-9">
            <input type="password" class="form-control" id="inputPassword2" name="inputPassword2" placeholder="Confirmar Password">
			<span class="form-control-feedback glyphicon"></span>
			<span class="help-block"></span>
        </div>
    </div>
    <div class="form-group has-feedback">
        <label class="control-label col-xs-3">Nombre:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Nombre">
			<span class="form-control-feedback glyphicon"></span>
			<span class="help-block"></span>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-3" >Teléfono:</label>
        <div class="col-xs-9">
            <input type="tel" class="form-control" placeholder="Teléfono">
        </div>
    </div>


    <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            <label class="checkbox-inline" >
                <input type="checkbox" value="agree" id="acepto" name="acepto">  Acepto <a href="#">Términos y condiciones</a>.
				<span class="help-block"></span>
            </label>
        </div>
    </div>
    <br>
    <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            <input type="submit" class="btn btn-primary" value="Enviar">
            <input type="reset" class="btn btn-default" value="Limpiar">
        </div>
    </div>
</form>
</div>
</div>
</div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/validaciones.js"></script>

</body>
</html>
