/*=============================================
VALIDAR REGISTRO
=============================================*/

function validarRegistro() {

	var usuario = document.querySelector("#usuarioRegistro").value;

	var password = document.querySelector("#passwordRegistro").value;

	var email = document.querySelector("#emailRegistro").value;

	var terminos = document.querySelector("#terminos").checked;

	/* VALIDAR USUARIO */

	if (usuario != "") {

		var caracteres = usuario.length;
		var expresiones = /^[a-zA-Z0-9]*$/;

		if (caracteres > 6) {

			document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>Escriba por favor menos de 6 caracteres.";

			return false;
		}

		if (!expresiones.test(usuario)) {

			document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>Por favor no escriba caracteres especiales.";

			return false;

		}

	}


	/* VALIDAR PASSWORD */

	if (password != "") {

		var caracteres = password.length;
		var expresiones = /^[a-zA-Z0-9]*$/;

		if (caracteres < 6) {

			document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>Escriba por favor mas de 6 caracteres.";

			return false;
		}

		if (!expresiones.test(usuario)) {

			document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>Por favor no escriba caracteres especiales.";

			return false;

		}

	}

	/* VALIDAR EMAIL */

	if (email != "") {

		var expresiones = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

		if (!expresiones.test(email)) {

			document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>Escriba correctamente el email.";

			return false;

		}

	}

	/* VALIDAR TERMINOS */

	if (!terminos) {

		document.querySelector("form").innerHTML += "<br>No se logro el registro, acepte terminos y condiciones";

		var usuario = document.querySelector("#usuarioRegistro").value = usuario;

		var password = document.querySelector("#passwordRegistro").value = password;

		var email = document.querySelector("#emailRegistro").value = email;


		return false;
	}


	
	return true;



}



/*=====  FIN VALIDAR REGISTRO  ======*/
