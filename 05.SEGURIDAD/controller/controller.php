<?php
 

class MvcController{

	public function pagina(){

		include "views/template.php";

	}

	public function enlacesPaginasController(){

		if (isset($_GET["action"])){

			$enlacesController = $_GET["action"];
		}
		else {
			
			$enlacesController = "index";
		}

		$respuesta = enlancesPaginas::enlancesPaginaModel($enlacesController);

		include $respuesta;

	}

	#REGISTRO DE USUARIOS
	#-----------------------------------------------------

	public function registroUsuarioController() {

		if (isset($_POST["usuarioRegistro"])) {

			#preg_match = Realiza una comparacion con una expresion regular
			#Validacion de lado servidor

			if (preg_match('/^[a-zA-Z0-9]*$/', $_POST["usuarioRegistro"]) && 
				preg_match('/^[a-zA-Z0-9]*$/', $_POST["passwordRegistro"]) && 
				preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z0-9_]{2,4}$/', $_POST["emailRegistro"])) {

				#crypt() delvolvera el hash de un string utilizado el algoritmo estandar basado en DES de Unix o algoritmos alternativos que puedan estar disponibles en el sistema.

				$encriptar = crypt($_POST["passwordRegistro"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datosController = array("usuario"=>$_POST["usuarioRegistro"], 
										 "password"=>$encriptar, 
										 "email"=>$_POST["emailRegistro"]);

				$respuesta = Datos::registroUsuarioModel($datosController, "usuarios");


				if ($respuesta == "success") {

					header("location:ok");
					
				}

				else {

					header("location:index.php");
				}
			}

		}

	}

	#INGRESO DE USUARIOS
	#-----------------------------------------------------
	public function ingresoUsuarioController() {

		if (isset($_POST["usuarioIngreso"])) {

			if (preg_match('/^[a-zA-Z0-9]*$/', $_POST["usuarioIngreso"]) && 
				preg_match('/^[a-zA-Z0-9]*$/', $_POST["passwordIngreso"])) {


				$encriptar = crypt($_POST["passwordIngreso"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');


				$datosController = array("usuario"=>$_POST["usuarioIngreso"], 
										 "password"=>$encriptar);

				$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");


				$intentos = $respuesta["intentos"];
				$usuario = $_POST["usuarioIngreso"];
				$maximoIntentos = 2;

				if (intentos < maximoIntentos) {

					if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $encriptar ) {

						session_start();

						$_SESSION["validar"] = true;
						

						$intentos = 0;

						$datosController = array("usuarioActual"=>$usuario, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos = Datos::intentosUsuarioModel($datosController, "usuarios");

						header("location:usuarios");

					}

					else {

						++$intentos;

						$datosController = array("usuarioActual"=>$usuario, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos = Datos::intentosUsuarioModel($datosController, "usuarios");

						header("location:fallo");

					}

				}

				else {

						$intentos = 0;

						$datosController = array("usuarioActual"=>$usuario, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos = Datos::intentosUsuarioModel($datosController, "usuarios");

						header("location:fallo3intentos");

				}
			} 
		}

	}

	#VISTA DE USUARIOS
	#-----------------------------------------------------
	public function vistaUsuarioController() {

		$respuesta = Datos::vistaUsuarioModel("usuarios");

		foreach ($respuesta as $row => $item) {

			echo '<tr>
					<td>'.$item["usuario"].'</td>
					<td>'.$item["password"].'</td>
					<td>'.$item["email"].'</td>
					<td><a href="index.php?action=editar&id='.$item["id"].'"><button type="submit">Editar</button></a></td>
					<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button type="submit">Borrar</button></a></td>
				 </tr>';
		}

	}

	#EDITAR USUARIOS
	#-----------------------------------------------------
	public function editarUsuarioController() {

		$datosController = $_GET["id"];

		$respuesta = Datos::editarUsuarioModel($datosController, "usuarios");

		echo '	<input type="hidden" name="idEditar" value="'.$respuesta["id"].'">

				<label for="usuarioEditar">User</label>
				<input type="text" name="usuarioEditar" value="'.$respuesta["usuario"].'" id="usuarioEditar" placeholder="Maximo 6 Caracteres" maxlength="6" required="">

				<label for="passwordEditar">Password</label>
				<input type="text" name="passwordEditar" value="'.$respuesta["password"].'" id="passwordEditar" placeholder="Minimo 6 caracteres, incluir numero(s) y una mayuscula" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required="">

				<label for="emailEditar">Email</label>
				<input type="email" name="emailEditar" value="'.$respuesta["email"].'" id="emailEditar" placeholder="Escriba su email correctamente" required="">

				<input type="submit" name="" value="Actualizar">';

	}

	#ACTUALIZAR USUARIOS
	#-----------------------------------------------------

	public function actualizarUsuarioController() {

		if (isset($_POST["usuarioEditar"])) {

			if (preg_match('/^[a-zA-Z0-9]*$/', $_POST["usuarioEditar"]) && 
				preg_match('/^[a-zA-Z0-9]*$/', $_POST["passwordEditar"]) && 
				preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z0-9_]{2,4}$/', $_POST["emailEditar"])) {

				$encriptar = crypt($_POST["passwordIngreso"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				
					$datosController = array("id"=>$_POST["idEditar"],
								   "usuario"=>$_POST["usuarioEditar"], 
								   "password"=>$encriptar, 
								   "email"=>$_POST["emailEditar"]);

					$respuesta = Datos::actualizarUsuarioModel($datosController, "usuarios");


					if ($respuesta == "success") {

						header("location:cambio");

					}
					else {

						echo "error";

					}

			}

		}

	}

	#BORRAR USUARIOS
	#-----------------------------------------------------

	public function borrarUsuarioController() {

		if (isset($_GET["idBorrar"])) {

			$datosController = $_GET["idBorrar"];

			$respuesta = Datos::borrarUsuarioModel($datosController, "usuarios");

			if ($respuesta == "success") {
				
				header("location:usuarios");			
			}

		}

	}

}
