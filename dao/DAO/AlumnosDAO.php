<?php

require_once "Alumno.php";
require_once "ConnectionFactory.php";

class AlumnosDAO {
	
	const TABLA = "alumnos";
	
	public static function createObject($data){
		return new Alumno($data["id"], $data["nombre"], $data["apellido"], $data["fecha_creacion"]);
	}
	
	public static function getById($alumnoId) {
		$conexion = self::getConnection();
		$sql = "SELECT * FROM ".self::TABLA." WHERE id = :alumno_id";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(":alumno_id", $alumnoId);
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$statement->execute();
		$entidad = $statement->fetch();
		return self::createObject($entidad);
	}
	
	public static function getAll() {
		$conexion = self::getConnection();
		$sql = "SELECT * FROM ".self::TABLA."";
		$statement = $conexion->prepare($sql);
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$statement->execute();
		$lista = array();
		while( $entidad = $statement->fetch() ){
			array_push( $lista, self::createObject($entidad) );
		}
		return $lista;
	}
	
	public static function delete($alumnoId) {
		$alumnoId = intval($alumnoId);
		$conexion = self::getConnection();
		$sql = "DELETE FROM ".self::TABLA." WHERE id = :alumno_id";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(":alumno_id", $alumnoId);		
		$statement->execute();
	}
	
	public static function save(Alumno $alumno) {
		$conexion = self::getConnection();
		
		if($alumno->id == 0) {
			// alumno nuevo
			$sql = "INSERT INTO ".self::TABLA."(nombre, apellido) VALUES(:nombre, :apellido)";
		} else {
			// modificar alumno
			$sql = "UPDATE ".self::TABLA." SET nombre = :nombre, apellido = :apellido WHERE id = :alumno_id";
		}
		$statement = $conexion->prepare($sql);
		$statement->bindValue(":nombre", $alumno->nombre);
		$statement->bindValue(":apellido", $alumno->apellido);
		if($alumno->id > 0){
			$statement->bindValue(":alumno_id", $alumno->id);
		}
		$statement->execute();
		if($alumno->id == 0) {
			$alumno->id = intval($conexion->lastInsertId());
		}
		return $alumno;
	}
	
	private static function getConnection() {
		return ConnectionFactory::getConnection();
	}
	
}
