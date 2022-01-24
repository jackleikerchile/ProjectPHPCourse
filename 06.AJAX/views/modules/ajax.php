<?php

#Enrutar carpetas ubicar conexion 
#controller/controller.php
#views/modules/ajax.php
# Empezamos a ajax.php despues pasamos a modules de modules pasamos a views llegamos a la raiz de la aplicacion "/" y entramos a la carpeta controller y llegamos al archivo controller.php

require_once "../../controller/controller.php";
require_once "../../models/crud.php";

class Ajax {

	public $validarUsuario;
	public $validarEmail;

	public function validarEmailAjax() {

		$datos = $this->validarEmail;

		$respuesta = MvcController::validarEmailController($datos);

		echo $respuesta;

	}

}

#Trabajo Asincrono si introdusco un usuario nombre ej: ana,
#Ana viene en este POST "$_POST["validarUsuario"];", se almacena en "$validarUsuario"
# De validarUsuario lleno la variable "$datos"
# Y la funcion "validarUsuarioAjax()" me va a generar un echo de lo que traiga la variable "$datos"
# Y ese echo se va a ver reflejado en la respuesta de "validacionRegistro.js".

if (isset($_POST["validarUsuario"])) {

	$a = new Ajax();
	$a -> validarUsuario = $_POST["validarUsuario"];
	$a -> validarUsuarioAjax();

}

if (isset($_POST["validarEmail"])) {

	$b = new Ajax();
	$b -> validarEmail = $_POST["validarEmail"];
	$b -> validarEmailAjax();
	
}