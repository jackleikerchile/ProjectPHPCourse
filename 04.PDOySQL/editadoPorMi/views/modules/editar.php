<?php 

session_start();

if (!$_SESSION["validar"]) {
	
	header("location:index.php?action=ingresar");

	exit();

}


?>

<h1>EDITAR USUARIO</h1>

<form action="" method="post" accept-charset="utf-8">
	
	<?php

	$editarUsuario = new MvcController();
	$editarUsuario -> editarUsuarioController();
	$editarUsuario -> actualizarUsuarioController();


	?>

</form>