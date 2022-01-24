/*=============================================
VALIDAR USUARIO EXISTENTE DE AJAX
=============================================*/
var usuarioExistente = false;
var emailExistente = false;


$("#usuarioRegistro").change(function(){

	// En vez de colocar "document.querySelector" SE COLOCA EL SIGNO PESOS($)
	// Y en vez de colocar ".value" SE COLOCA .VAL
	// "ESTO ES SYNTAXY JQUERY".
	var usuario = $("#usuarioRegistro").val();

	var datos = new FormData();
	datos.append("validarUsuario", usuario);

	//Ejecutar sentencia de ajax

	$.ajax({
		url: "views/modules/ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){

			if(respuesta == 0) {

				$("label[for='usuarioRegistro'] span").html('<p>Este usuario existe en la base de datos</p>');

				usuarioExistente = true;
			}

			else {

				$("label[for='usuarioRegistro'] span").html("");

				usuarioExistente = false;

			}
		}
	});
});


/*=====  FIN USUARIO EXISTENTE DE AJAX  ======*/


/*=============================================
VALIDAR EMAIL EXISTENTE DE AJAX
=============================================*/
$("#emailRegistro").change(function(){

	// En vez de colocar "document.querySelector" SE COLOCA EL SIGNO PESOS($)
	// Y en vez de colocar ".value" SE COLOCA .VAL
	// "ESTO ES SYNTAXY JQUERY".
	var email = $("#emailRegistro").val();

	var datos = new FormData();
	datos.append("validarEmail", email);

	//Ejecutar sentencia de ajax

	$.ajax({
		url:"views/modules/ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){

			if(respuesta == 0) {

				$("label[for='emailRegistro'] span").html('<p>Este email ya existe en la base de datos</p>');

				emailExistente = true;
			}

			else {

				$("label[for='emailRegistro'] span").html("");

				emailExistente = false;

			}
		}
	});
});

/*=====  FIN EMAIL EXISTENTE DE AJAX  ======*/












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

		if (usuarioExistente) {

			document.querySelector("label[for='usuarioRegistro'] span").innerHTML = "<p>Este usuario existe en la base de datos.</p>";

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

		if (emailExistente) {

			document.querySelector("label[for='emailRegistro'] span").innerHTML = "<p>Este email existe en la base de datos.</p>";

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
