<h1>REGISTRO DE USUARIOS</h1>

<form method="post" action="" accept-charset="utf-8" onsubmit="return validarRegistro()">
	
	<label for="usuarioRegistro">User</label>
	<input type="text" name="usuarioRegistro" placeholder="Maximo 6 Caracteres" maxlength="6" id="usuarioRegistro" required="">

	<label for="passwordRegistro">Password</label>
	<input type="password" name="passwordRegistro" placeholder="Minimo 6 caracteres, incluir numero(s) y una mayuscula" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" id="passwordRegistro" required="">

	<label for="emailRegistro">Email</label>
	<input type="email" name="emailRegistro" placeholder="Escriba su email correctamente" id="emailRegistro" required="">

	<p><input type="checkbox" name="" id="terminos"><a href="#" title="">Acepta terminos y condiciones</a></p>

	<input type="submit" value="Enviar"></input>

</form>

<?php 

$registro = new MvcController();
$registro -> registroUsuarioController();


if (isset($_GET["action"])) {

	if ($_GET["action"] == "ok") {

		echo "<p>Registro Exitoso</p>";
		
	}
}


 ?>