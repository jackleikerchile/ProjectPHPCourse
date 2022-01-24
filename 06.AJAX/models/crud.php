<?php
#EXTENSION DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y metodos. Para definir una clase como extension, debo definir una clase padre, y se utiliza dentro de una clase hija

require_once "conexion.php";



class Datos extends Conexion {

	#REGISTRO DE USUARIO
	#---------------------------------------------------------------

	public function registroUsuarioModel($datosModel, $table) {

		#prepare() Prepara una sentencia SQL para ser ejecutada por el metodo PDOStatement::execute(). La sentencia SQL puede contener cero o mas marcadores de parametros con nombre (:name) o signos de interrogacion (?) por los cuales los valores reales seran sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parametros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $table(usuario, password, email) VALUES (:usuario,:password,:email)");

		#bindParam() Vincula una variable de PHP a un parametro de sustitucion con nombre o de signo de interrogacion correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		

		if ($stmt->execute()) {
			
			return "success";
		}

		else {

			return "error";

		}

		$stmt->close();

	}

	#INGRESO DE USUARIO
	#---------------------------------------------------------------
	public function ingresoUsuarioModel($datosModel, $table) {

		$stmt = Conexion::conectar()->prepare("SELECT usuario, password, intentos FROM $table WHERE usuario = :usuario");

		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->execute();

		#fetch(): Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetch();

		$stmt->close();

	}

	#INTENTOS DE USUARIO
	#---------------------------------------------------------------
	public function intentosUsuarioModel($datosModel, $table) {

		$stmt = Conexion::conectar()->prepare("UPDATE $table SET intentos = :intentos WHERE usuario = :usuario");

		$stmt->bindParam(":intentos", $datosModel["actualizarIntentos"], PDO::PARAM_INT);
		$stmt->bindParam(":usuario", $datosModel["usuarioActual"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			
			return "success";
		}

		else {

			return "error";

		}

		$stmt->close();

	}


	#VISTA DE USUARIO
	#---------------------------------------------------------------
	public function vistaUsuarioModel($table) {

		$stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email FROM $table");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		$stmt->close();

	}

	#EDITAR USUARIO
	#---------------------------------------------------------------
	public function editarUsuarioModel($datosModel, $table) {

		$stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email FROM $table WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch();


		$stmt->close();

	}

	#ACTUALIZAR USUARIO
	#---------------------------------------------------------------

	public function actualizarUsuarioModel($datosModel, $table) {

		$stmt = Conexion::conectar()->prepare("UPDATE $table SET usuario = :usuario, password = :password, email = :email WHERE id = :id");

		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);


		if ($stmt->execute()) {
			
			return "success";
		}

		else {

			return "error";

		}

		$stmt->close();


	}

	#BORARR USUARIO
	#---------------------------------------------------------------

	public function borrarUsuarioModel($datosModel, $table) {

		$stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);


		if ($stmt->execute()) {
			
			return "success";
		}

		else {

			return "error";

		}

		$stmt->close();

	}

	#VALIDAR USUARIO EXISTENTE
	#---------------------------------------------------------------

	public function validarUsuarioModel($datosModel, $table) {

		$stmt = Conexion::conectar()->prepare("SELECT usuario FROM $table WHERE usuario = :usuario");
		$stmt->bindParam(":usuario", $datosModel, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetch();


		$stmt->close();
		



	}




	#VALIDAR EMAIL EXISTENTE
	#---------------------------------------------------------------

	public function validarEmailModel($datosModel, $table) {

		$stmt = Conexion::conectar()->prepare("SELECT email FROM $table WHERE email = :email");
		$stmt->bindParam(":email", $datosModel, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetch();


		$stmt->close();
		



	}



}