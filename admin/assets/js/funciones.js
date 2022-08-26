function valida_formulario(){
	
	document.getElementById("mensaje").innerHTML="";


	if (document.getElementById("Nombre_prod").value== "" ) {
		alerta("danger", "El nombre es obligatoria");

		return false;
	}
	if (document.getElementById("Cost_prod").value== "" ) {
		alerta("danger", "el Costo es obligatorio");


		return false;
	}
	return true;
}