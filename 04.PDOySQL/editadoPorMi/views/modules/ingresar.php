<h1>INGRESAR</h1>

<form method="post" accept-charset="utf-8">

	<input type="text" name="usuarioIngreso" placeholder="User" required="">

	<input type="password" name="passwordIngreso" placeholder="Password" required="">

	<input type="submit" value="Enviar"></input>

</form>

<?php 

$ingreso = new MvcController();
$ingreso -> ingresoUsuarioController();

if (isset($_GET["action"])) {

	if ($_GET["action"] == "fallo") {

		echo "Fallo al ingresar";
		
	}
}


?>