



function addDispositivoDueno(){
	var codigodispositivo=document.querySelector("#codigoDispositivo").value;
	var finca=document.querySelector("#finca").value;
	var estado=document.querySelector("#estado").value;
	var codigoAnimal=document.querySelector("#codigoAnimal").value;
	if(codigodispositivo.length==0){
		$("#iconotexto").remove();
			$("#codigoDispositivo").parent().parent().attr("class","form-group has-error has-feedback");
			$("#codigoDispositivo").parent().children("span").text("Campo requerido").show();
			$("#codigoDispositivo").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
			
	
		return false;
	}else{
		$("#iconotexto").remove();
		$("#codigoDispositivo").parent().parent().attr("class","form-group has-success has-feedback");
		$("#codigoDispositivo").parent().children("span").text("").hide();
		$("#codigoDispositivo").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
		

	}

	if(codigoAnimal.length==0){
		$("#iconotexto").remove();
		$("#codigoAnimal").parent().parent().attr("class","form-group has-error has-feedback");
		$("#codigoAnimal").parent().children("span").text("Campo requerido").show();
		$("#codigoAnimal").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		
		return false;
	}else{
		$("#iconotexto").remove();
		$("#codigoAnimal").parent().parent().attr("class","form-group has-success has-feedback");
		$("#codigoAnimal").parent().children("span").text("").hide();
		$("#codigoAnimal").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
		
		
	}
	
	
	
	return true;
	}





function addDispositivo(){
var codigodispositivo=document.querySelector("#codigoDispositivo").value;
var finca=document.querySelector("#finca").value;
var estado=document.querySelector("#estado").value;

if(codigodispositivo.length==0){
	$("#iconotexto").remove();
		$("#codigoDispositivo").parent().parent().attr("class","form-group has-error has-feedback");
		$("#codigoDispositivo").parent().children("span").text("Campo requerido").show();
		$("#codigoDispositivo").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		

	return false;
}

if(estado<0 || estado>1){
	return false;
}

if(finca.length==0){
	$("#iconotexto").remove();
		$("#codigoDispositivo").parent().parent().attr("class","form-group has-error has-feedback");
		$("#codigoDispositivo").parent().children("span").text("Campo requerido").show();
		$("#codigoDispositivo").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		
	return false;
}



return false;
}

function validarUsuario(){
	var identificacion=document.querySelector("#identificacion").value;
	var nombres=document.querySelector("#nombres").value;
	var apellidos=document.querySelector("#apellidos").value;
	var email=document.querySelector("#email").value;
	var direccion=document.querySelector("#direccion").value;
	var telefono=document.querySelector("#telefono").value;

	//expresion para alfabeto y espacio
	var expresion=/^[a-zA-Z ]*$/;

	//expresion para correo
	var expCorreo=/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
	
	if(identificacion.length==0){
		$("#iconotexto").remove();
		$("#identificacion").parent().parent().attr("class","form-group has-error has-feedback");
		$("#identificacion").parent().children("span").text("Campo requerido").show();
		$("#identificacion").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		
		return false;

	}else if(isNaN(identificacion)){
		$("#iconotexto").remove();
		$("#identificacion").parent().parent().attr("class","form-group has-error has-feedback");

		$("#identificacion").parent().children("span").text("Debe ingresar Datos Numerico").show();
		$("#identificacion").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		
		return false;
	}else if(identificacion.length<6 || identificacion.length>10){
		$("#iconotexto").remove();
		$("#identificacion").parent().parent().attr("class","form-group has-error has-feedback");
		$("#identificacion").parent().children("span").text("Minimo 6 Digitos y maximo 10").show();
		$("#identificacion").parent().append("<span class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}else{
		$("#iconotexto").remove();
		$("#identificacion").parent().parent().attr("class","form-group has-success has-feedback");
		$("#identificacion").parent().children("span").text("").hide();
		$("#identificacion").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
		


	}

	if(nombres.length==0){
		$("#iconotexto").remove();
		$("#nombres").parent().parent().attr("class","form-group has-error has-feedback");
		$("#nombres").parent().children("span").text("Campo requerido").show();
		$("#nombres").parent().append("<span id='iconotexto'  class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;

	}else if(!expresion.test(nombres)){
		$("#iconotexto").remove();
		$("#nombres").parent().parent().attr("class","form-group has-error has-feedback");
		$("#nombres").parent().children("span").text("Debe ingresar Datos Alfabeticos").show();
		$("#nombres").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}else if(nombres.length<3 || nombres.length>20){
		$("#iconotexto").remove();
		$("#nombres").parent().parent().attr("class","form-group has-error has-feedback");
		$("#nombres").parent().children("span").text("Minimo 3 Caracteres y maximo 20").show();
		$("#nombres").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");

		return false;
	}else{
		$("#iconotexto").remove();
		$("#nombres").parent().parent().attr("class","form-group has-success has-feedback");
		$("#nombres").parent().children("span").text("");
		$("#nombres").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
		
		

	}

	if(apellidos.length==0){
		$("#iconotexto").remove();
		$("#apellidos").parent().parent().attr("class","form-group has-error has-feedback");
		$("#apellidos").parent().children("span").text("Campo requerido").show();
		$("#apellidos").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;

	}else if(!expresion.test(apellidos)){
		$("#iconotexto").remove();
		$("#apellidos").parent().parent().attr("class","form-group has-error has-feedback");
		$("#apellidos").parent().children("span").text("Debe ingresar Datos Alfabeticos").show();
		$("#apellidos").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>")
		return false;
	}else if(apellidos.length<3 || apellidos.length>20){
		$("#iconotexto").remove();
		$("#apellidos").parent().parent().attr("class","form-group has-error has-feedback");
		$("#apellidos").parent().children("span").text("Minimo 7 Caracteres y maximo 20").show();
		$("#apellidos").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}else{
		$("#iconotexto").remove();
		$("#apellidos").parent().parent().attr("class","form-group has-success has-feedback");
		$("#apellidos").parent().children("span").text("");
		$("#apellidos").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
		
		

	}


	if(email.length==0){
		$("#iconotexto").remove();
		$("#email").parent().parent().attr("class","form-group has-error has-feedback");
		$("#email").parent().children("span").text("Campo requerido").show();
		$("#email").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;

	}else if(!expCorreo.test(email)){
		$("#iconotexto").remove();
		$("#email").parent().parent().attr("class","form-group has-error has-feedback");
		$("#email").parent().children("span").text("Debe ingresar Correo Valido").show();
		$("#email").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;

	}else{
		$("#iconotexto").remove();
		$("#email").parent().parent().attr("class","form-group has-success has-feedback");

		$("#email").parent().children("span").text("");
		$("#email").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
		

	}


	if(direccion.length==0){
		$("#iconotexto").remove();
		$("#direccion").parent().parent().attr("class","form-group has-error has-feedback");
		$("#direccion").parent().children("span").text("Campo requerido").show();
		$("#direccion").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;

	}else if(direccion.length<10 || direccion.length>40){
		$("#iconotexto").remove();
		$("#direccion").parent().parent().attr("class","form-group has-error has-feedback");
		$("#direccion").parent().children("span").text("Minimo 10 y maximo 40 Caracteres Alfanumericos").show();
		$("#direccion").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;

	}else{
		$("#iconotexto").remove();
		$("#direccion").parent().parent().attr("class","form-group has-success has-feedback");
		$("#direccion").parent().children("span").text("").hide();
		$("#direccion").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
		
		
	}


	if(telefono.length==0){
		$("#iconotexto").remove();
		$("#telefono").parent().parent().attr("class","form-group has-error has-feedback");
		$("#telefono").parent().children("span").text("Campo requerido").show();
		$("#telefono").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;

	}else if(isNaN(telefono)){
		$("#iconotexto").remove();
		$("#telefono").parent().parent().attr("class","form-group has-error has-feedback");
		$("#telefono").parent().children("span").text("Debe ingresar Datos Numerico").show();
		$("#telefono").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}else if(telefono.length!=10){
		$("#iconotexto").remove();
		$("#telefono").parent().parent().attr("class","form-group has-error has-feedback");
		$("#telefono").parent().children("span").text("Debe contener 10 Digitos ").show();
		$("#telefono").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		return false;
	}else{
		$("#iconotexto").remove();
		$("#telefono").parent().parent().attr("class","form-group has-success has-feedback");
		$("#telefono").parent().children("span").text("");
		$("#telefono").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
		
		

	}






	return true;
}