



function addDispositivoDueno(){
	alert();
	var codigodispositivo=document.querySelector("#codigoDispositivo").value;
	var finca=document.querySelector("#finca").value;
	var estado=document.querySelector("#estado").value;
	var codigoAnimal=document.querySelector("#codigoAnimal").value;
	
	if(codigodispositivo.length==0){
	
			$("#codigoDispositivo").parent().parent().attr("class","form-group has-error has-feedback");
			$("#codigoDispositivo").parent().children("span").text("Campo requerido").show();
			
	
		return false;
	}else if(codigodispositivo.length<5 || codigodispositivo.length>10){
		$("#codigoDispositivo").parent().parent().attr("class","form-group has-error has-feedback");
			$("#codigoDispositivo").parent().children("span").text("Minimo 5 caracteres y Maximo 10").show();
		return false;

	}else{
	
		$("#codigoDispositivo").parent().parent().attr("class","form-group has-success has-feedback");
		$("#codigoDispositivo").parent().children("span").text("").hide();
		

	}

	if(codigoAnimal.length==0){
	
		$("#codigoAnimal").parent().parent().attr("class","form-group has-error has-feedback");
		$("#codigoAnimal").parent().children("span").text("Campo requerido").show();
		
		return false;
	}else if(codigoAnimal.length<4 || codigoAnimal.length>10){
		$("#codigoAnimal").parent().parent().attr("class","form-group has-error has-feedback");
			$("#codigoAnimal").parent().children("span").text("Minimo 4 caracteres y Maximo 10").show();
		return false;

	}else
	{
		
		$("#codigoAnimal").parent().parent().attr("class","form-group has-success has-feedback");
		$("#codigoAnimal").parent().children("span").text("").hide();
		
		
	}
	
	
	
	return true;
}



function addDispositivoAdmin(){

	var expresion=/^[A-Za-z0-9]+$/g;
	
var codigodispositivo=document.querySelector("#codigoDispositivo").value;
var finca=document.querySelector("#finca").value;
var estado=document.querySelector("#estado").value;
var codigoAnimal=document.querySelector("#codigoAnimal").value;


if(!expresion.test(codigoDispositivo)){
	$("#codigoDispositivo").parent().parent().attr("class"," has-error");
		$("#codigoDispositivo").parent().children("span").text("Solo Caracteres Alfanumericos").show();
	
	return false;

}
else if(codigodispositivo.length==0){
	
		$("#codigoDispositivo").parent().parent().attr("class"," has-error");
		$("#codigoDispositivo").parent().children("span").text("Campo requerido").show();
	
	return false;
}
else if(codigodispositivo.length<5 || codigodispositivo.length>10){
	$("#codigoDispositivo").parent().parent().attr("class","form-group has-error has-feedback");
		$("#codigoDispositivo").parent().children("span").text("Minimo 5 y maximo 10 Alfanumericos").show();
	
	return false;
}
else{
	$("#codigoDispositivo").parent().parent().attr("class","form-group has-success has-feedback");
		$("#codigoDispositivo").parent().children("span").text("").hide();
}



if((codigoAnimal.length>=4 && codigoAnimal.length<=10)|| codigoAnimal.length==0){
	alert("condicion 1");
	$("#codigoAnimal").parent().parent().attr("class","form-group has-success has-feedback");
	$("#codigoAnimal").parent().children("span").text("").hide();
}else{
	alert("condicion 2");
	$("#codigoAnimal").parent().parent().attr("class","form-group has-error has-feedback");
		$("#codigoAnimal").parent().children("span").text("Minimo 4 y maximo 10 Alfanumericos").show();
	
	return false;
}




if(estado<0 || estado>1){
	return false;
}

if(finca.length==0){
	
		$("#codigoDispositivo").parent().parent().attr("class","form-group has-error has-feedback");
		$("#codigoDispositivo").parent().children("span").text("Campo requerido").show();
	
	return false;
}



return true;
}





function validarUsuario(){
	var identificacion=document.querySelector("#identificacion").value;
	var nombres=document.querySelector("#nombres").value;
	var primerApellido=document.querySelector("#primerApellido").value;
	var segundoApellido=document.querySelector("#segundoApellido").value;
	var email=document.querySelector("#email").value;
	var direccion=document.querySelector("#direccion").value;
	var telefono=document.querySelector("#telefono").value;

	//expresion para alfabeto y espacio
	var expresion=/^[a-zA-Z ]*$/;

	//expresion para correo
	var expCorreo=/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
	
	if(identificacion.length==0){

		$("#identificacion").parent().parent().attr("class","form-group has-error has-feedback");
		$("#identificacion").parent().children("span").text("Campo requerido").show();
		
		
		return false;

	}else if(isNaN(identificacion)){
		
		$("#identificacion").parent().parent().attr("class","form-group has-error has-feedback");
		$("#identificacion").parent().children("span").text("Debe ingresar Datos Numerico").show();
		
		
		return false;
	}else if(identificacion.length<6 || identificacion.length>10){

		$("#identificacion").parent().parent().attr("class","form-group has-error has-feedback");
		$("#identificacion").parent().children("span").text("Minimo 6 Digitos y maximo 10").show();

		return false;
	}else{
		
		$("#identificacion").parent().parent().attr("class","form-group has-success has-feedback");
		$("#identificacion").parent().children("span").text("").hide();
		
		


	}

	if(nombres.length==0){
		
		$("#nombres").parent().parent().attr("class","form-group has-error has-feedback");
		$("#nombres").parent().children("span").text("Campo requerido").show();
		
		return false;

	}else if(!expresion.test(nombres)){
		
		$("#nombres").parent().parent().attr("class","form-group has-error has-feedback");
		$("#nombres").parent().children("span").text("Debe ingresar Datos Alfabeticos").show();
		
		return false;
	}else if(nombres.length<3 || nombres.length>20){
		
		$("#nombres").parent().parent().attr("class","form-group has-error has-feedback");
		$("#nombres").parent().children("span").text("Minimo 3 Caracteres y maximo 20").show();
		

		return false;
	}else{
		
		$("#nombres").parent().parent().attr("class","form-group has-success has-feedback");
		$("#nombres").parent().children("span").text("");
		
	}

	if(primerApellido.length==0){
		
		$("#primerApellido").parent().parent().attr("class","form-group has-error has-feedback");
		$("#primerApellido").parent().children("span").text("Campo requerido").show();
	
		return false;

	}else if(!expresion.test(primerApellido)){
		
		$("#primerApellido").parent().parent().attr("class","form-group has-error has-feedback");
		$("#primerApellido").parent().children("span").text("Debe ingresar Datos Alfabeticos").show();
	
		return false;
	}else if(primerApellido.length<3 || primerApellido.length>20){
		
		$("#primerApellido").parent().parent().attr("class","form-group has-error has-feedback");
		$("#primerApellido").parent().children("span").text("Minimo 3 Caracteres y maximo 10").show();
		
		return false;
	}else{
		
		$("#primerApellido").parent().parent().attr("class","form-group has-success has-feedback");
		$("#primerApellido").parent().children("span").text("");
	
	}

	if(segundoApellido.length==0){
		
		$("#segundoApellido").parent().parent().attr("class","form-group has-error has-feedback");
		$("#segundoApellido").parent().children("span").text("Campo requerido").show();
	
		return false;

	}else if(!expresion.test(segundoApellido)){
		
		$("#segundoApellido").parent().parent().attr("class","form-group has-error has-feedback");
		$("#segundoApellido").parent().children("span").text("Debe ingresar Datos Alfabeticos").show();
	
		return false;
	}else if(segundoApellido.length<3 || segundoApellido.length>20){
		
		$("#segundoApellido").parent().parent().attr("class","form-group has-error has-feedback");
		$("#segundoApellido").parent().children("span").text("Minimo 3 Caracteres y maximo 10").show();
		
		return false;
	}else{
		
		$("#segundoApellido").parent().parent().attr("class","form-group has-success has-feedback");
		$("#segundoApellido").parent().children("span").text("");
	
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

	}else if(email.length < 15 || email.length >= 60){
		$("#iconotexto").remove();
		$("#email").parent().parent().attr("class","form-group has-error has-feedback");
		$("#email").parent().children("span").text("Minimo 15 caracteres y maximo 10").show();
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
		$("#direccion").parent().children("span").text("Minimo 10 y maximo 40 Caracteres ").show();
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