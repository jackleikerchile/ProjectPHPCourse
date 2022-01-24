<?php 

session_start();

if (!$_SESSION["validar"]) {
	
	header("location:ingresar");

	exit();

}


?>


<h1>USUARIOS</h1>

<table border="1">
	<caption>TABLA DE USUARIOS</caption>
	<thead>
		<tr>
			<th>User</th>
			<th>Password</th>
			<th>Email</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php 

		$vistaUsuario = new MvcController();
		$vistaUsuario -> vistaUsuarioController();
		$vistaUsuario -> borrarUsuarioController();


		 ?>
	</tbody>
</table>

<?php 

if (isset($_GET["action"])) {

	if ($_GET["action"] == "cambio") {

		echo "Cambio Exitoso";
		
	}
}


 ?>
