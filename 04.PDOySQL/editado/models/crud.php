<?php
require_once "conexion.php";

class Datos extends Conexion {

	#REGISTRO DE USUARIO
	#----------------------------------------------

	public function registroUsuarioModel($datosModel, $tabla) {

		stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, password, email) VALUES (:usuario,:password,:email)");


		stmt->bindParam(":usuario", $datosController["usuario"], PDO::PARAM_STR);
		stmt->bindParam(":password", $datosController["password"], PDO::PARAM_STR);
		stmt->bindParam(":email", $datosController["email"], PDO::PARAM_STR);

	}

}


 ?>