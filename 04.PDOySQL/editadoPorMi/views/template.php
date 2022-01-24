<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Aplication</title>
	<link rel="stylesheet" type="text/css" href="css/styless.css">
</head>
<body>
	

<!-------------------- Menu de Navegacion ---------------------->
<?php include "modules/navegacion.php"; ?>

<section>
<?php 

$mvc = new MvcController();
$mvc -> enlacesPaginasController();


 ?>
	
</section>


</body>
</html>