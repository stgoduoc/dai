<?php

class ConnectionFactory {
	
	const SERVIDOR 	= "localhost";
	const USUARIO 	= "root"; 
	const PASSWORD 	= "";
	const PUERTO	= "3307";
	const BASEDATOS	= "dai";
	
	private static $conexion = null;
	
	public static function getConnection(){
		if( isset($conexion) ) {
			return self::$conexion;
		}
		
		$conexion = new PDO("mysql:host=".self::SERVIDOR.";port=".self::PUERTO.";dbname=".self::BASEDATOS
							, self::USUARIO
							, self::PASSWORD
							, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
					);
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		self::$conexion = $conexion;
		return self::$conexion;
	}
	
}
