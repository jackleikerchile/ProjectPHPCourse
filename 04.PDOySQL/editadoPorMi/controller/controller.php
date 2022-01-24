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

			$datosController = array("usuario"=>$_POST["usuarioRegistro"], 
									 "password"=>$_POST["passwordRegistro"], 
									 "email"=>$_POST["emailRegistro"]);

			$respuesta = Datos::registroUsuarioModel($datosController, "usuarios");


			if ($respuesta == "success") {

				header("location:index.php?action=ok");
				
			}

			else {

				header("location:index.php");
			}

		}

	}

	#INGRESO DE USUARIOS
	#-----------------------------------------------------
	public function ingresoUsuarioController() {

		if (isset($_POST["usuarioIngreso"])) {

			$datosController = array("usuario"=>$_POST["usuarioIngreso"], 
									 "password"=>$_POST["passwordIngreso"]);

			$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");



			if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]) {

				session_start();

				$_SESSION["validar"] = true;


				header("location:index.php?action=usuarios");

			}

			else {

				header("location:index.php?action=fallo");

			}
		}

	}

	#INGRESO DE USUARIOS
	#-----------------------------------------------------
	public function vistaUsuarioController() {

		$respuesta = Datos::vistaUsuarioModel("usuarios");

		foreach ($respuesta as $row => $item) {

			echo '<tr>
					<td>'.$item["id"].'</td>
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

				<input type="text" name="usuarioEditar" value="'.$respuesta["usuario"].'" required="">

				<input type="text" name="passwordEditar" value="'.$respuesta["password"].'" required="">

				<input type="email" name="emailEditar" value="'.$respuesta["email"].'" required="">

				<input type="submit" name="" value="Actualizar">';

	}

	#ACTUALIZAR USUARIOS
	#-----------------------------------------------------

	public function actualizarUsuarioController() {

		if (isset($_POST["usuarioEditar"])) {
			
			$datosController = array("id"=>$_POST["idEditar"],
						   "usuario"=>$_POST["usuarioEditar"], 
						   "password"=>$_POST["passwordEditar"], 
						   "email"=>$_POST["emailEditar"]);

			$respuesta = Datos::actualizarUsuarioModel($datosController, "usuarios");


			if ($respuesta == "success") {

				header("location:index.php?action=cambio");

			}
			else {

				echo "error";

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
				
				header("location:index.php?action=usuarios");			
			}

		}

	}

}




 ?>