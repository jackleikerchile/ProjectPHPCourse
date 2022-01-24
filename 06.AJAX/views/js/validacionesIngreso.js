/*==========================================
VALIDAR INGRESO
============================================*/

function validarIngreso() {

	var usuario = document.querySelector("#usuarioIngreso").value;
	var password = document.querySelector("#passwordIngreso").value;


	/* VALIDAR USUARIO */

	if (usuario != "") {

		var caracteres = usuario.length;
		var expresiones = /^[a-zA-Z0-9]*$/;

		if (caracteres > 6) {

			document.querySelector("label[for='usuarioIngreso']").innerHTML +="<br>Escriba el usuario que registro correctamente";

			return false;


		}

		if (!expresiones.test(usuario)) {

			document.querySelector("label[for='usuarioIngreso']").innerHTML += "<br>Por favor no escriba caracteres especiales.";

			return false;

		}

	}

	/* VALIDAR PASSWORD */


	if (password != "") {

		var caracteres = password.length;
		var expresiones = /^[a-zA-Z0-9]*$/;

		if (caracteres < 6) {

			document.querySelector("label[for='usuarioIngreso']").innerHTML += "<br>Escriba por favor mas de 6 caracteres.";

			return false;
		}

		if (!expresiones.test(usuario)) {

			document.querySelector("label[for='usuarioIngreso']").innerHTML += "<br>Por favor no escriba caracteres especiales.";

			return false;

		}

	}
	
	


}



/*===== FIN VALIDAR INGRESO   ======*/
