<?php 

class MvcController {

	#LLAMADA A LA PLANTILLA
	#------------------------------------------------


	public function plantilla() {

		#include() Se utiliza para invocar el archivo que contiene html.
		include "views/template.php";

	}



	#INTERACCION DEL USUARIO
	#------------------------------------------------
	public function enlancesPaginasController(){

		if (isset($_GET["action"])) {

			$enlancesController = $_GET["action"];
		}

		else {

			$enlancesController = "index";
		}
		

		$respuesta = enlancesPaginas::enlancesPaginasModel($enlancesController);

		include $respuesta;


		
	}


}


 ?>