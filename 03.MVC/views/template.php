<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Template</title>
	<link rel="stylesheet" type="text/css" href="views/css/styles.css">
</head>
<body>

<header>
	<h1>LOGOTIPO</h1>
</header>

<!------ Menu de Navegacion ------>
<?php include "modules/navegacion.php"; ?>



<section>

	<?php 

	$mvc = new MvcController;
	$mvc -> enlancesPaginasController();



	 ?>
	
</section>
	
</body>
</html>