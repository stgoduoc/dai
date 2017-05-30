<!DOCTYPE html>
<html>
<head>
	<title>Listado de alumnos</title>
	<meta charset="utf-8" />
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<?php

require_once "../../DAO/AlumnosDAO.php";

$alumnos = AlumnosDAO::getAll();
?>
<div class="container">
<h1>Alumnos</h1>
<a class="btn btn-success" href="form.php" role="button">Nuevo</a>
<table class="table table-hover">
	<thead style="background-color:#ccc">
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Fecha Creación</th>
			<th>Acciones</th>
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
			<td><?=$alumno->fechaCreacion?></td>
			<td>
				<a class="btn btn-info" href="form.php?id=<?=$alumno->id?>" role="button">Editar</a>
				<a class="btn btn-danger" href="delete.php?id=<?=$alumno->id?>" role="button">Eliminar</a>
			</td>
		</tr>
<?php
endforeach;
?>
	</tbody>
</table>
</div>

</body>
</html>
