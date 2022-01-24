<h1>INGRESAR</h1>

<form method="post" accept-charset="utf-8" onsubmit="return validarIngreso()">

	<label for="usuarioIngreso">User</label>
	<input type="text" name="usuarioIngreso" placeholder="Maximo 6 caracteres" maxlength="6" id="usuarioIngreso" required="">

	<label for="passwordIngreso">Password</label>
	<input type="password" name="passwordIngreso" placeholder="Minimo 6 caracteres, incluir numero(s) y una mayuscula" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" id="passwordIngreso" required="">

	<input type="submit" value="Enviar"></input>

</form>

<?php 

$ingreso = new MvcController();
$ingreso -> ingresoUsuarioController();

if (isset($_GET["action"])) {

	if ($_GET["action"] == "fallo3intentos") {

		echo "Ha fallado 3 veces para ingresar, favor llenar el captcha";
		
	}

	if ($_GET["action"] == "fallo") {

		echo "Fallo al ingresar";
		
	}

}


?>