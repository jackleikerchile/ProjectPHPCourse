<h1>REGISTRO DE USUARIOS</h1>

<form method="post" action="" accept-charset="utf-8">
	
	<input type="text" name="usuarioRegistro" placeholder="User" required="">

	<input type="password" name="passwordRegistro" placeholder="Password" required="">

	<input type="email" name="emailRegistro" placeholder="Email">

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