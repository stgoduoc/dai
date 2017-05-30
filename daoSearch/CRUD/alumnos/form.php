<?php
require_once "../../DAO/AlumnosDAO.php";
require_once "../../DAO/Alumno.php";

$mensajes = array();
$mensajesError = array();

// si viene para editar
if( isset($_GET["id"]) ){
	$id = intval($_GET["id"]);
	$alumno = AlumnosDAO::getById($id);
}else {
	$alumno = new Alumno(null, "", "", null, time());
}

// si se envió el formulario procesar
if( isset($_POST["nombre"]) ){
	$alumno = new Alumno(intval($_POST["id"]), $_POST["nombre"], $_POST["apellido"], $_POST["nacimiento"], time());
	$alumno = AlumnosDAO::save($alumno);
	$mensajes[] = "Alumno guardado correctamente";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Ingreso de Alumno</title>
	<meta charset="utf-8" />
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	
	<!-- jQuery UI -->
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

</head>
<body>
	
	<div class="container">
		<h1>Alumno</h1>
		
		<?php foreach($mensajes as $mensaje): ?>
		<div class="alert alert-success" role="alert"> 
			<?=$mensaje?>
		</div>
		<?php endforeach; ?>
		
		<form method="post" action="">
			<div class="form-group">
				<label for="id">ID</label>
				<input type="text" class="form-control" id="id" name="id" readonly="readonly" value="<?=$alumno->id?>">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del alumno" value="<?=$alumno->nombre?>">
			</div>
			<div class="form-group">
				<label for="apellido">Apellido</label>
				<input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido del alumno" value="<?=$alumno->apellido?>">
			</div>
			<div class="form-group">
				<label for="nacimiento">Fecha de Nacimiento</label>
				<input type="text" class="form-control" id="nacimiento" name="nacimiento" placeholder="yyyy-mm-dd" value="<?=$alumno->fechaNacimiento?>">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
			<a class="btn btn-danger" href="listar.php" role="button">Cancelar</a>
		</form>
	</div>
	
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>	
	
	<!-- jQuery UI -->
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	
	<script>
	$(function(){
		$( "#nacimiento" ).datepicker({
			dateFormat: "yy-mm-dd"
			, changeMonth: true
			, changeYear: true
			, minDate: new Date(1900, 1, 1)
			, maxDate: new Date(2000, 1, 1)
		});
	});
	</script>
</body>
</html>
