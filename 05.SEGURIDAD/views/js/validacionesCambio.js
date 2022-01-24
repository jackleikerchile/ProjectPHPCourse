/*=============================================
VALIDAR EDITAR
=============================================*/

function validarEditar() {

	var usuario = document.querySelector("#usuarioEditar").value;
	var password = document.querySelector("#passwordEditar").value;
	var email = document.querySelector("#emailEditar").value;

	/* VALIDAR USUARIO */

	if (usuario != "") {

		var caracteres = usuario.length;
		var expresiones = /^[a-zA-Z0-9]*$/;

		if (caracteres > 6) {

			document.querySelector("label[for='usuarioEditar']").innerHTML += "<br>Escribar por favor menos de 6 caracteres.";

			return false;

		}

		if (!expresiones.test(usuario)) {

			document.querySelector("label[for='usuarioEditar']").innerHTML += "<br>Por favor no escriba caracteres especiales.";

			return false;

		}

	}

	/* VALIDAR PASSWORD */

	if (password != "") {

		var caracteres = password.length;
		var expresiones = /^[a-zA-Z0-9]*$/;

		if (caracteres < 6) {

			document.querySelector("label[for='usuarioEditar']").innerHTML += "<br>Escriba por favor mas de 6 caracteres.";

			return false;
		}

		if (!expresiones.test(password)) {

			document.querySelector("label[for='usuarioEditar']").innerHTML += "<br>Por favor no escriba caracteres especiales.";

			return false;

		}

	}



	/* VALIDAR EMAIL */

	if (email != "") {

		var expresiones = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

		if (!expresiones.test(email)) {

			document.querySelector("label[for='usuarioEditar']").innerHTML += "<br>Escriba correctamente el email.";

			return false;

		}

	}
	





}



/*=====  FIN VALIDAR EDITAR  ======*/
