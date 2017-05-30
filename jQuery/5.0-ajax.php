<?php 
/**
Este archivo como es de ejemplo devuelve los mismos datos recibidos.

Generalmente este archivo debería conectar con una base de datos
para recuperar o guardar información.
*/

// stdClass es una clase genérica en PHP
$obj = new stdClass();
$obj->nombre = $_GET["nombre"];
$obj->correo = $_GET["correo"];
$obj->exitoso = true;
$obj->mensaje = "Registro guardado correctamente";
// json_encode devuelve el objeto como un string en formato JSON
$json = json_encode($obj);
echo $json;