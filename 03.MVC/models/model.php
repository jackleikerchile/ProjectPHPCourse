<?php 

class enlancesPaginas {
	


	public function enlancesPaginasModel($enlancesModel){





		if ($enlancesModel == "nosotros" || $enlancesModel == "servicios" || $enlancesModel == "contactenos") {

			$module = "views/modules/".$enlancesModel.".php";

			
		}elseif ($enlancesModel == "index" ) {
			
			$module = "views/modules/inicio.php";

		}

		else {

			$module = "views/modules/inicio.php";
			
		}

		return $module;






	}


}



 ?>