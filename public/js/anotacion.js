// Luego que escoje a la persona, toma los datos de documento, apellidos y nombres
function cambioJefatura(){
      var combo = document.getElementById("idJefatura");
      // Dato: <NumDoc> Apellidos,Nombres
	  var selected = combo.options[combo.selectedIndex].text;
	  posDoc=selected.indexOf(" ")  // Espacio en blanco luego del numero de documento
	  posApe=selected.indexOf(",")	// Apellidos luego , luego nombres
	  document.getElementById('Identificacion').value=selected.substring(0, posDoc); 
	  document.getElementById('Apellidos').value=selected.substring(posDoc+1,posApe);
	  document.getElementById('Nombres').value=selected.substring(posApe+1, 50);
}