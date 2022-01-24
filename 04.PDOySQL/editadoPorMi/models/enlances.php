<?php 
class enlancesPaginas{

	public function enlancesPaginaModel($enlaces){

		if ($enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "editar" || $enlaces == "salir") {
			
			$module = "views/modules/".$enlaces.".php";
		}
		
		elseif ($enlaces == "index") {
			
			$module = "views/modules/registro.php";

		}

		elseif ($enlaces == "ok") {
			
			$module = "views/modules/registro.php";

		}

		elseif ($enlaces == "fallo") {
			
			$module = "views/modules/ingresar.php";

		}

		elseif ($enlaces == "cambio") {
			
			$module = "views/modules/usuarios.php";

		}

		else {
			
			$module = "views/modules/registro.php";

		}

		return $module;

	}

}



 ?>