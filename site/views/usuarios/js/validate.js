$(document).ready(function(){

$('#marca').addClass('validate[required]');
$('#peso').addClass('validate[required]');
$('#descripcion').addClass('validate[required]');
$('#lista_lineas_global').addClass('validate[required]');

$('#form_marcas').validationEngine();

$('#nombre_marca').addClass('validate[required]');
$('#descripcion_marca').addClass('validate[required]');
$('#peso_marca').addClass('validate[required]');
$('#form_editar_marca').validationEngine();

/*$('#form_registro').validationEngine('validate');
	$('#cedula').addClass('validate[required,minSize[6],maxSize[8],custom[integer]]');
$('#nombres').addClass('validate[required,custom[onlyLetterSp]]');
$('#apellidos').addClass('validate[required,custom[onlyLetterSp]]');
$('#direccion').addClass('validate[required]');
$('#telefono').addClass('validate[required,custom[phone]]');
$('#email').addClass('validate[required,custom[email]]');
$('#loginr').addClass('validate[required,minSize[6],maxSize[12]]');
$('#pass').addClass('validate[required,minSize[6],maxSize[12]]');
$('#confirmar').addClass('validate[required,equals[pass],minSize[6],maxSize[12]]');*/
			
			

});



	
