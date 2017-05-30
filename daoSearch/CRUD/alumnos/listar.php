<!DOCTYPE html>
<html>
<head>
	<title>Listado de alumnos</title>
	<meta charset="utf-8" />
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<?php

require_once "../../DAO/AlumnosDAO.php";

if(isset($_GET["nombre"])){
	$nombre 	= htmlspecialchars($_GET["nombre"]);
	$apellido 	= htmlspecialchars($_GET["apellido"]);
}else {
	$nombre 	= "";
	$apellido 	= "";
}
$alumnos = AlumnosDAO::searchByNombreApellido($nombre, $apellido);
?>
<div class="container">
<h1>Alumnos</h1>
<form method="get">
<a class="btn btn-success" href="form.php" role="button">
	<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	Nuevo
</a>
<button type="submit" class="btn btn-warning">
	<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
	Buscar
</button>
<table class="table table-hover">
	<thead style="background-color:#ccc">
		<tr>
			<th>#</th>
			<th>
				Nombre<br />
				<input type="text" name="nombre" value="<?=$nombre?>" />
			</th>
			<th>
				Apellido<br />
				<input type="text" name="apellido" value="<?=$apellido?>" />
			</th>
			<th>Fecha de Nacimiento<br />(yyyy-mm-dd)</th>
			<th>Fecha Creación<br /></th>
			<th>Acciones<br /></th>
		</tr>
	</thead>
	<tbody>
<?php
foreach($alumnos as $alumno):
?>
		<tr>
			<td><?=$alumno->id?></td>
			<td><?=$alumno->nombre?></td>
			<td><?=$alumno->apellido?></td>
			<td><?=$alumno->fechaNacimiento?></td>
			<td><?=$alumno->fechaCreacion?></td>
			<td>
				<a class="btn btn-info" href="form.php?id=<?=$alumno->id?>" role="button">
					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					Editar
				</a>
				<a class="btn btn-danger" href="delete.php?id=<?=$alumno->id?>" role="button">
					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					Eliminar
				</a>
			</td>
		</tr>
<?php
endforeach;
?>
	</tbody>
</table>
</form>
</div>

</body>
</html>
